<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dash()
    {
      $page_title = 'Admin Dashboard';
      $page_description = '';
      return view('pages.admin.dashboardadmin',compact('page_title','page_description'));
    }
    public function mgsec()
    {
      $page_title = 'Main Gate Security User Table';
      $page_description = '';
      return view('pages.admin.mgsecadmin',compact('page_title','page_description'));
    }
    public function dock()
    {
      $UserMasterdata = User::get();
      $page_title = 'All User Table';
      $page_description = '';
      return view('pages.admin.dockinadmin',compact('UserMasterdata','page_title','page_description'));
    }
    public function edit($id)
    {
      echo $id ;
    //  $test = '''.$id.''';
      $UserMasterdata = User::where('id','=',$id)->get();
      $page_title = 'Edit User';
      $page_description = '';
      return view('pages.admin.editadmin',compact('UserMasterdata','page_title','page_description'));
    }
    public function delete($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return redirect('/admin/dockinadmin');
}
    public function saveUser(Request $request, $id)
    {
      $UserMasterdata = User::find($id);
      $UserMasterdata->name = request('name');
      $UserMasterdata->email = request('email');
      $UserMasterdata->UserType = request('UserType');
      $UserMasterdata->save();
      return redirect('/home');
    }
}
