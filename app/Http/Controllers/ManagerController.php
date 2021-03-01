<?php

namespace App\Http\Controllers;

use App\Models\YmGateentry;
use App\Models\ActivityMaster;
use App\Models\VehicleTypeMaster;
use Illuminate\Http\Request;
use PDF;

class ManagerController extends Controller
{
    public function dash()
    {
      $totalVehicle = YmGateentry::where('status','!=','Gate Out')->get()->count();
      $dockVehicle = YmGateentry::where('status','=','Docked In')->get()->count();
      return view('manager.managerdash',compact('totalVehicle','dockVehicle'));

    }
    public function pdf(Request $request)
    {
        $students = YmGateentry::all();

        //$pdf = PDF::loadView('manager.manlist', compact('students'));
        //$content = $pdf->download()->getOriginalContent();
//Storage::put('/Users/shaundeshpande/Downloads/name.pdf',$content) ;
$pdf = PDF::loadView('manager.testmanage',compact('students'));
return $pdf->download('name.pdf');
    }
}
