@extends('layout.default')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Vehicle Yard IN') }}</div>
                @if($errors->any())
   @foreach ($errors->all() as $error)
      <div>{{ $error }}</div>
  @endforeach
@endif
                <div class="card-body">
                    <form method="POST" action="{{route('secstore')}}">
                        @csrf

                        <div class="form-group row">
                            <label for="vehicleid" class="col-md-4 col-form-label text-md-right">{{ __('Vehicle ID') }}</label>

                            <div class="col-md-6">
                                <input id="vehicleid" type="text" class="form-control @error('name') is-invalid @enderror" name="vehicleid" value="{{ old('Vehicle ID') }}" required autocomplete="vehicleid" autofocus>

                                @error('vehicleid')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                          <label for="vehicletypeid" class="col-md-4 col-form-label text-md-right">{{('Vehicle Type')}}</label>


                                      <div class="col-md-6">
                                        <select class="col-md-4 form-control kt-select2 select2" id="vehicletypeid" name="vehicletypeid" value="{{ old('Vehicle Type') }}" required autocomplete="vehicletypeid"
                                                autofocus>
                                            <option value="0">Select Vehicle Type</option>
                                            @foreach ($VehicleTypeMasterdata as $uVehicleTypeMasterdata)
                                            <option value="{{$uVehicleTypeMasterdata->vehicletypeid}}" @if($uVehicleTypeMasterdata->vehicletypeid == old('vehicletype')) selected @endif > {{$uVehicleTypeMasterdata->vehicletypeid}}</option>
                                            @endforeach
                                        </select>
                                      </div>
                                      @error('vehicletypeid')
                                          <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror


                        </div>

                        <!-- <div class="form-group row">
                            <label for="UserType" class="col-md-4 col-form-label text-md-right">{{ __('UserType') }}</label>

                            <div class="col-md-6">
                                <input id="UserType" type="text" class="form-control @error('UserType') is-invalid @enderror" name="UserType" value="{{ old('UserType') }}" required autocomplete="UserType" autofocus>

                                @error('UserType')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> -->
                        <div class="form-group row">
                            <label for="drivername" class="col-md-4 col-form-label text-md-right">{{ __('Driver Name') }}</label>

                            <div class="col-md-6">
                                <input id="drivername" type="text" class="form-control @error('drivername') is-invalid @enderror" name="drivername" value="{{ old('Driver Name') }}" required autocomplete="drivername" autofocus>

                                @error('drivename')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="drivermobile" class="col-md-4 col-form-label text-md-right">{{ __('Driver Mobile') }}</label>

                            <div class="col-md-6">
                                <input id="drivermobile" type="tel" class="form-control @error('drivermobile') is-invalid @enderror" name="drivermobile" value="{{ old('Driver Mobile') }}" required autocomplete="drivermobile">

                                @error('drivermobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                          <label for="ActivityTypeID" class="col-md-4 col-form-label text-md-right">{{('Activity Type')}}</label>


                                      <div class="col-md-6">
                                        <select class="col-md-4 form-control kt-select2 select2" id="ActivityTypeID" name="ActivityTypeID" value="{{ old('Activity Type') }}" required autocomplete="ActivityTypeID"
                                                autofocus>
                                            <option value="0">Select Activity Type</option>
                                            @foreach ($ActivityMasterdata as $uActivityMasterdata)
                                            <option value="{{$uActivityMasterdata->ActivityTypeID}}" @if($uActivityMasterdata->ActivityTypeID == old('ActivityTypeID')) selected @endif > {{$uActivityMasterdata->ActivityTypeID}}</option>
                                            @endforeach
                                        </select>
                                      </div>
                                      @error('ActivityTypeID')
                                          <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror


                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Enter Warehouse') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
<script>
$(document).ready(function() {
    $('.select2').select2();
});
</script>
@endsection
