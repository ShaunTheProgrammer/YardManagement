<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleTypeMaster;
use App\Models\Vehicle;
use App\Models\ActivityMaster;
use Illuminate\Support\Facades\Redirect;

class YardInController extends Controller
{
  public function create()
  {
      //

      $page_title = 'Gate In';
      $page_description = '( Security check and Gate Entry)';

      //$GateentryData = YmGateentry::get();

      $ActivityMasterdata = ActivityMaster::get();
      $VehicleTypeMasterdata = VehicleTypeMaster::get();
      return view('pages.security.secgatein',compact('ActivityMasterdata','VehicleTypeMasterdata','page_title','page_description'));
  }
  public function store(Request $data)
  {
    var_dump($_REQUEST);
    $data->validate([
      'vehicleid' =>'required',
      'vehicletypeid' =>'required',
      'drivername' =>'required',
      'drivermobile' =>'required',
      'ActivityTypeID' =>'required',


  ]);

  $vehicleID = Vehicle::create([
     'vehicleid' => $data['vehicleid'],
     'vehicletypeid' => $data['vehicletypeid'],
     'drivername' => $data['drivername'],
     'drivermobile' => $data['drivermobile'],
  ]);
  return \Redirect::back()->withErrors(['success', 'Record Has Been Created']);


  }

}
