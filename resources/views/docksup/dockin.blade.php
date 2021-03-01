{{-- Extends layout --}}
@extends('layout.default')

@section('content')
<form action="{{ route('dockedin',$GateentryData->idgateentry) }}" method="POST">
    {{ csrf_field() }}


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
                             @if($uVehicleTypeMasterdata->vehicletypeid == $GateentryData->vehicletype )
                                <option value="{{$uVehicleTypeMasterdata->vehicletypeid}}" selected @if($uVehicleTypeMasterdata->vehicletypeid == old('vehicletype')) selected @endif > {{$uVehicleTypeMasterdata->vehicletypeid}}</option>
                                @else
                                 <option value="{{$uVehicleTypeMasterdata->vehicletypeid}}" @if($uVehicleTypeMasterdata->vehicletypeid == old('vehicletype')) selected @endif > {{$uVehicleTypeMasterdata->vehicletypeid}}</option>
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

    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Docked IN</button>

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
