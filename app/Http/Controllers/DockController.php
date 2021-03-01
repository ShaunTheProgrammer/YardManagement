<?php

namespace App\Http\Controllers;

use App\Models\YmGateentry;
use App\Models\ActivityMaster;
use App\Models\VehicleTypeMaster;
use Illuminate\Http\Request;

class DockController extends Controller
{
    public function docklist()
    {
      $GateentryData = YmGateentry::where('status','!=','Gate Out')->where('status','!=','Docked In')->where('status','!=','Docked Out')->orderBy('createdon', 'desc')->paginate(5);
      return view('docksup.docklist',compact('GateentryData'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function dockin($id){
      $page_title = 'List of Vehicle';
      $page_description = '( Ready for Dock IN )';
      $ActivityMasterdata = ActivityMaster::get();
      $VehicleTypeMasterdata = VehicleTypeMaster::get();
      $GateentryData = YmGateentry::find($id);
      return view('docksup.dockin',compact('GateentryData','id','ActivityMasterdata','VehicleTypeMasterdata'));
    }
    public function dockedin(Request $request,$id)
    {
        //
        $current_time = \Carbon\Carbon::now()->timestamp;
        $ActivityMasterdata = ActivityMaster::get();
        $VehicleTypeMasterdata = VehicleTypeMaster::get();
        $GateentryData = YmGateentry::find($id);
        $GateentryData->gateoutremark = request('gateoutremark');
        $GateentryData->status = 'Docked In';
        $GateentryData->updatedby = session('username');
        $GateentryData->updatedon = $current_time  ;
        $GateentryData->dockin = $current_time  ;
        $GateentryData->save();
        return redirect('/docksup/docklist');
       // return view('gateoutentry.gateoutentry',compact('GateentryData','id','ActivityMasterdata','VehicleTypeMasterdata'));
    }
    public function dockoutlist()
    {
      $GateentryData = YmGateentry::where('status','!=','Docked Out')->where('status','!=','Gate Out')->where('status','!=','Gate In')->where('status','!=','Gate-In')->orderBy('createdon', 'desc')->paginate(5);
      return view('docksup.dockoutlist',compact('GateentryData'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function dockout($id){
      $page_title = 'List of Vehicle';
      $page_description = '( Ready for Dock Out )';
      $ActivityMasterdata = ActivityMaster::get();
      $VehicleTypeMasterdata = VehicleTypeMaster::get();
      $GateentryData = YmGateentry::find($id);
      return view('docksup.dockout',compact('GateentryData','id','ActivityMasterdata','VehicleTypeMasterdata'));
    }
    public function dockedout(Request $request,$id)
    {
        //
        $current_time = \Carbon\Carbon::now()->timestamp;
        $ActivityMasterdata = ActivityMaster::get();
        $VehicleTypeMasterdata = VehicleTypeMaster::get();
        $GateentryData = YmGateentry::find($id);
        $GateentryData->gateoutremark = request('gateoutremark');
        $GateentryData->status = 'Docked Out';
        $GateentryData->updatedby = session('username');
        $GateentryData->updatedon = $current_time  ;
        $GateentryData->dockin = $current_time  ;
        $GateentryData->save();
        return redirect('/docksup/dockoutlist');
       // return view('gateoutentry.gateoutentry',compact('GateentryData','id','ActivityMasterdata','VehicleTypeMasterdata'));
    }

}
