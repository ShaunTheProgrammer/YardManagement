{{-- Extends layout --}}
@extends('layout.default')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('outwardlist') }}"> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('releasevehicle',$GateentryData->idgateentry) }}" method="POST">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3">
            <div class="form-group">
                <fieldset class="form-group ">
                
                    <label for="gateindate">Inward Date</label>
                    <span class="required">*</span>
                    <input type="date" id="gateindate" maxlength="15" readonly value="{{$GateentryData->gateindate->format('Y-m-d')}}" class="form-control" placeholder="Date" name="gateindate"
                    @if ($errors->has('gateindate'))
                    <span class=" text-danger">
                        <strong id="startdate-error">{{$errors->first('gateindate')}}</strong>
                    </span>
                    @endif
                </fieldset>
            </div>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2">
            <div class="form-group">
                <fieldset class="form-group ">
                    <label for="gateintime">Gate In Time</label>
                    <span class="required">*</span>
                    <input type="time" id="gateintime" maxlength="6" readonly class="form-control" value="{{$GateentryData->gateintime->format('H:i')}}" placeholder="Date" name="gateintime" 
                    @if ($errors->has('gateintime'))
                    <span class=" text-danger">
                        <strong id="startdate-error">{{$errors->first('gateintime')}}</strong>
                    </span>
                    @endif
                </fieldset>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3">
            <div class="form-group">
                <fieldset class="form-group ">
                <label for="vehiclenumber" class="col-form-label text-md-left">Vehicle Number</label>
                <span class="required">*</span>
                 <input type="text" maxlength="15"  class="form-control" name="vehiclenumber" readonly value="{{$GateentryData->vehiclenumber}}" placeholder="vehiclenumber">
                 </fieldset>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <fieldset class="form-group ">
                    <label for="vehicletype" class="col-md-6 col-form-label text-md-left">{{('vehicletype')}}</label>
                        <select class=" col-md-6 form-control kt-select2 select2" id="vehicletype" name="vehicletype" value="{{ old('vehicletype') }}" required autocomplete="vehicletype"
                                autofocus>
                            <option value="0">Select Vehicle Type</option>
                            @foreach ($VehicleTypeMasterdata as $uVehicleTypeMasterdata)
                             @if($uVehicleTypeMasterdata->VehicleTypeID == $GateentryData->vehicletype )
                                <option value="{{$uVehicleTypeMasterdata->VehicleTypeID}}" selected @if($uVehicleTypeMasterdata->VehicleTypeID == old('vehicletype')) selected @endif > {{$uVehicleTypeMasterdata->VehicleTypeID}}</option>
                                @else
                                 <option value="{{$uVehicleTypeMasterdata->VehicleTypeID}}" @if($uVehicleTypeMasterdata->VehicleTypeID == old('vehicletype')) selected @endif > {{$uVehicleTypeMasterdata->VehicleTypeID}}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('vehicletype')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </fieldset>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <label for="drivername" class="col-form-label text-md-right">{{('Driver Name') }}</label>
                <input type="text" maxlength="50" class="form-control" readonly  value="{{$GateentryData->drivername}}"  name="drivername" placeholder="drivername">
            </div>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3">
            <div class="form-group">
            <label for="drivermobilnumber" class="col-form-label text-md-right">{{('Driver Mobile Number') }}</label>
                <input type="text" maxlength="12" class="form-control" name="drivermobilnumber" readonly value="{{$GateentryData->drivermobilnumber}}" placeholder="drivermobilnumber">
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3">
            <div class="form-group">
                <label for="activitytype" class="col-form-label text-md-right">{{('Activity Type') }}</label>
                    <select class="form-control kt-select2 select2" id="activitytype" name="activitytype" disable selected="{{ old('activitytype') }}" required
                                autocomplete="activitytype" autofocus>
                            <option value="0">Select Activity </option>
                            @foreach ($ActivityMasterdata as $uActivityMasterdata)
                                @if($uActivityMasterdata->ActivityTypeID == $GateentryData->activitytype )
                                <option  value="{{$uActivityMasterdata->ActivityTypeID}}" selected @if($uActivityMasterdata->ActivityTypeID == old('activitytype')) selected @endif  > {{$uActivityMasterdata->ActivityTypeID}}</option>
                                @else
                                <option value="{{$uActivityMasterdata->ActivityTypeID}}"  @if($uActivityMasterdata->ActivityTypeID == old('activitytype')) selected @endif  > {{$uActivityMasterdata->ActivityTypeID}}</option>
                                @endif
                            @endforeach
                    </select>
                    @error('activitytype')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong> </span>
                    @enderror
            </div>      
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2">
            <div class="form-group">
            <label for="noofboxes" class="col-form-label text-md-right">{{('Number of Boxes') }}</label>
                <input type="number" maxlength="3" class="form-control" name="noofboxes" readonly value="{{$GateentryData->noofboxes }}"  placeholder="noofboxes">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3">
            <div class="form-group ">
                <div class="checkbox-inline">
                    <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-primary">
                        <input type="checkbox" class="form-control"   
                        @if($GateentryData->vehicleinspected) == '1' ) checked @endif
                         name="vehicleinspected">
                        <span></span>Vehicle Inspected
                        </label>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <div class="checkbox-inline">
                    <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-primary">
                        <input type="checkbox" class="form-control"  @if($GateentryData->Paperchecked  == '1' ) checked @endif  name="Paperchecked">
                            <span></span>Paper Checked</label>        
                </div>
            </div> 
        </div>
    </div>
    <div class="row">
        <div class="col-xs-9 col-sm-9 col-md-9">
            <div class="form-group ">
                <label for="gateinremark" class="col-form-label text-md-right">{{('Gate In Remarks') }}</label>
                <input type="text" maxlength="500" class="form-control" readonly  value="{{$GateentryData->gateinremark}}"  name="gateinremark" placeholder="Remarks">
            </div>
        </div>
        <div class="col-xs-9 col-sm-9 col-md-9">
            <div class="form-group ">
                <label for="gateoutremark" class="col-form-label text-md-right">{{('Gate Out Remarks') }}</label>
                <input type="text" maxlength="500" class="form-control"   value="{{$GateentryData->gateoutremark}}"  name="gateoutremark" placeholder="Gate Out Remarks">
            </div>
        </div>
    </div>

    <div class="row">                  
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Release Vehicle</button>
            <a class="btn btn-primary" href="{{ route('outwardlist') }}"> Back</a>
        </div>
    </div>

</form>
@endsection
@section('scripts')
<script>
$(document).ready(function() {
    $('.select2').select2();
});
</script>
@endsection