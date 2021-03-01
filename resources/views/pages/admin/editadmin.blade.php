@extends('layout.default')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="pull-right">
              <a class="btn btn-primary" href="{{ route('dashad') }}"> Cancel</a>
          </div>
            <div class="card">
                <div class="card-header">{{ __('Edit') }}</div>

                <div class="card-body">
                  <form method="POST" action="{{route('saveUser',$UserMasterdata[0]->id)}}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$UserMasterdata[0]->name}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="UserType" class="col-md-4 col-form-label text-md-right">{{ __('UserType') }}</label>
                        <select class=" col-md-6 form-control kt-select2 select2" id="UserType" name="UserType" value="{{ $UserMasterdata[0]->UserType }}" required autocomplete="UserType" autofocus>
                          @if($UserMasterdata[0]->UserType ="WH Manager")
                          <option selected value="WH Manager">Warehouse Manager</option>
                          @else
                          <option value="WH Manager">Warehouse Manager</option>
                          @endif
                          @if($UserMasterdata[0]->UserType ="Security")
                          <option selected value="Security">Security</option>
                          @else
                          <option value="Security">Security</option>
                          @endif
                          @if($UserMasterdata[0]->UserType ="Dock Supervisor")
                          <option selected value="Dock Supervisor">Dock Supervisorr</option>
                          @else
                          <option value="Dock Supervisor">Dock Supervisor</option>
                          @endif
                          @if($UserMasterdata[0]->UserType ="Admin")
                          <option selected value="Admin">Admin</option>
                          @else
                          <option value="Admin">Admin</option>
                          @endif

                        </select>
                                @error('UserType')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$UserMasterdata[0]->email}}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                      {{--  <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
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
