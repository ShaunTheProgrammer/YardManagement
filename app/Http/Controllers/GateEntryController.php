<?php

namespace App\Http\Controllers;

use App\Models\YmGateentry;
use App\Models\ActivityMaster;
use App\Models\VehicleTypeMaster;
use Illuminate\Http\Request;

class GateEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $page_title = 'List of Vehicle';
        $page_description = 'Inward List of Vehicle';
        $GateentryData = YmGateentry::where('status','!=','Gate Out')->orderBy('createdon', 'desc')->paginate(5);
  
        return view('GateEntry.index',compact('GateentryData','page_title','page_description'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function outwardlist()
    {
        //
        $page_title = 'List of Vehicle';
        $page_description = '( Ready for Outward )';
        $GateentryData = YmGateentry::where('status','Docked Out')->orderBy('createdon', 'desc')->paginate(5);
  
        return view('gateoutentry.index',compact('GateentryData','page_title','page_description'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $page_title = 'Gate In';
        $page_description = '( Security check and Gate Entry)';

        //$GateentryData = YmGateentry::get();

        $ActivityMasterdata = ActivityMaster::get();
        $VehicleTypeMasterdata = VehicleTypeMaster::get();
        return view('GateEntry.create',compact('ActivityMasterdata','VehicleTypeMasterdata','page_title','page_description'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
          //
          $request->validate([
            'gateintime' => 'required',
            'vehiclenumber' => 'required',
            'vehicletype' => 'required',
            'drivername' => 'required',
            'activitytype' => 'required',
            'Paperchecked' => 'required',
            'vehicleinspected' => 'required',
           
        ]);
  
       $input = $request->all() ;
       if (array_key_exists("Paperchecked", $input)) {
            if ($request['Paperchecked'] == "on") {
                $request['Paperchecked']  = 1;
            }
            else
            {
                $request['Paperchecked']  = 0;
            }    
       }


       if (array_key_exists("vehicleinspected", $input)) {
        if ($request['vehicleinspected'] == "on") {
            $request['vehicleinspected']  = 1;
        }
        else
        {
            $request['vehicleinspected']  = 0;
        }    
        }

        $request['idWarehouse']  = 1;
        $current_time = \Carbon\Carbon::now()->timestamp;
        $request['createdon'] = $current_time  ;
        $request['updatedon'] = $current_time  ;
        $request['createdby'] = session('username');
        $request['updatedby'] = session('username');

        YmGateentry::create($request->all());
   
        return redirect()->route('GateEntry.index')
                        ->with('success','Gate Entry created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\YmGateentry  $ymGateentry
     * @return \Illuminate\Http\Response
     */
    public function show(YmGateentry $ymGateentry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\YmGateentry  $ymGateentry
     * @return \Illuminate\Http\Response
     */
    public function edit(YmGateentry $ymGateentry)
    {
        //
    }


  /**
     * Show the form for outward entry the specified resource.
     *
     * @param  \App\Models\YmGateentry  $ymGateentry
     * @return \Illuminate\Http\Response
     */
    public function gateoutentry($id)
    {
        //
        $page_title = 'List of Vehicle';
        $page_description = '( Ready for Outward )';
        $ActivityMasterdata = ActivityMaster::get();
        $VehicleTypeMasterdata = VehicleTypeMaster::get();
        $GateentryData = YmGateentry::find($id);
        return view('gateoutentry.gateoutentry',compact('GateentryData','id','ActivityMasterdata','VehicleTypeMasterdata'));
    }

/**
     * Show the form for outward entry the specified resource.
     *
     * @param  \App\Models\YmGateentry  $ymGateentry
     * @return \Illuminate\Http\Response
     */
    public function releasevehicle(Request $request,$id)
    {
        //
        $current_time = \Carbon\Carbon::now()->timestamp;
        $ActivityMasterdata = ActivityMaster::get();
        $VehicleTypeMasterdata = VehicleTypeMaster::get();
        $GateentryData = YmGateentry::find($id);
        $GateentryData->gateoutremark = request('gateoutremark');
        $GateentryData->status = 'Gate Out';
        $GateentryData->updatedby = session('username');
        $GateentryData->updatedon = $current_time  ;
        $GateentryData->gateout = $current_time  ;
        $GateentryData->save();
        return redirect('outwardlist');
       // return view('gateoutentry.gateoutentry',compact('GateentryData','id','ActivityMasterdata','VehicleTypeMasterdata'));
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\YmGateentry  $ymGateentry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, YmGateentry $ymGateentry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\YmGateentry  $ymGateentry
     * @return \Illuminate\Http\Response
     */
    public function destroy(YmGateentry $ymGateentry)
    {
        //
    }
}
