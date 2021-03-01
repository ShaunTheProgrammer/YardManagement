{{-- Extends layout --}}
@extends('layout.default')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Inward Entry</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('GateEntry.index') }}"> Cancel</a>
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

<form action="{{ route('GateEntry.store') }}" method="POST">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3">
            <div class="form-group">
                <fieldset class="form-group ">
                    <label for="gateindate">Inward Date</label>
                    <span class="required">*</span>
                    <input type="date" id="gateindate" maxlength="15"  value="{{old('gateindate')}}" class="form-control" placeholder="Date" name="gateindate"
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
                    <input type="time" id="gateintime" maxlength="6" class="form-control" value="{{old('gateintime')}}" placeholder="Date" name="gateintime"
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
                 <input type="text" maxlength="15"  class="form-control" name="vehiclenumber" value="{{old('vehiclenumber')}}" placeholder="vehiclenumber">
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
                            <option value="{{$uVehicleTypeMasterdata->vehicletypeid}}" @if($uVehicleTypeMasterdata->vehicletypeid == old('vehicletype')) selected @endif > {{$uVehicleTypeMasterdata->vehicletypeid}}</option>
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
                <input type="text" maxlength="50" class="form-control" value="{{old('drivername')}}"  name="drivername" placeholder="drivername">
            </div>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3">
            <div class="form-group">
            <label for="drivermobilnumber" class="col-form-label text-md-right">{{('Driver Mobile Number') }}</label>
                <input type="text" maxlength="12" class="form-control" name="drivermobilnumber" value="{{old('drivermobilnumber')}}" placeholder="drivermobilnumber">
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3">
            <div class="form-group">
                <label for="activitytype" class="col-form-label text-md-right">{{('Activity Type') }}</label>
                    <select class="form-control kt-select2 select2" id="activitytype" name="activitytype" selected="{{ old('activitytype') }}" required
                                autocomplete="activitytype" autofocus>
                            <option value="0">Select Activity </option>
                            @foreach ($ActivityMasterdata as $uActivityMasterdata)
                                <option value="{{$uActivityMasterdata->ActivityTypeID}}" @if($uActivityMasterdata->ActivityTypeID == old('activitytype')) selected @endif  > {{$uActivityMasterdata->ActivityTypeID}}</option>
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
                <input type="number" maxlength="3" class="form-control" id="noof"name="noofboxes" value="{{ old('noofboxes') }}"  placeholder="noofboxes" min="1">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3">
            <div class="form-group ">
                <div class="checkbox-inline">
                    <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-primary">
                        <input type="checkbox" class="form-control"
                        @if(old('vehicleinspected') == 'on' ) checked @endif
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
                        <input type="checkbox" class="form-control"  @if(old('Paperchecked') == 'on' ) checked @endif  name="Paperchecked">
                            <span></span>Paper Checked</label>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group ">

                <label for="gateinremark" class="col-form-label text-md-right">{{('Remarks') }}</label>
                <input type="text" maxlength="500" class="form-control" value="{{old('gateinremark')}}"  name="gateinremark" placeholder="Remarks">

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
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
<script>

jQuery(document).ready(function(){
  $("#activitytype").change(function() {
      if($(this).val() == 'Loading'){
        $("#noof").css('display', 'none');
      }else{

      }
  });
});


</script>
@endsection
