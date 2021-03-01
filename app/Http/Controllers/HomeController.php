<?php

namespace App\Http\Controllers;
use App\Models\YmGateentry;
use App\Models\ActivityMaster;
use App\Models\VehicleTypeMaster;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $usertype = session()->get('UserType');
      if($usertype == 'Dock Security')
      {
        return view('pages.security.dashboardsc');
      }
      else if($usertype == 'Admin')
      {
        return view('pages.admin.dashboardadmin');
      }
      else if($usertype == 'Security')
      {
        $page_title = 'List of Vehicle';
        $page_description = 'Inward List of Vehicle';
        $GateentryData = YmGateentry::where('status','!=','Gate Out')->orderBy('createdon', 'desc')->paginate(5);
        return view('gateentry.index',compact('GateentryData','page_title','page_description'))->with('i', (request()->input('page', 1) - 1) * 5);
      }
      else if($usertype == 'WH Manager')
      {
        $totalVehicle = YmGateentry::where('status','!=','Gate Out')->get()->count();
        $dockVehicle = YmGateentry::where('status','=','Docked In')->get()->count();
        $loading = YmGateentry::where('status','=','Docked In')->where('activitytype','=','Loading')->get()->count();
        $unloading = YmGateentry::where('status','=','Docked In')->where('activitytype','=','Unloading')->get()->count();
        return view('manager.managerdash',compact('totalVehicle','dockVehicle','loading','unloading'));
      }
      else {
        return view('publichome');
      }
      //  return view('home');
    }
}
