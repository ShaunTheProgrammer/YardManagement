@guest

<div class="navi-footer  px-8 py-5">
	<a class="btn btn-light-primary font-weight-bold" href="{{ route('register')}}">{{__('Register')}}</a>
		<a class="btn btn-light-primary font-weight-bold" href="{{ route('login')}}">{{__('Log IN')}}</a>

        <!-- <a href="#" target="_blank" class="btn btn-light-primary font-weight-bold">Sign Out</a> -->
        <!-- <a href="#" target="_blank" class="btn btn-clean font-weight-bold">Upgrade Plan</a> -->
    	</div>

@else
<div class="navi-footer  px-8 py-5">
		<a class="btn btn-light-primary font-weight-bold" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Sign Out') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

        <!-- <a href="#" target="_blank" class="btn btn-light-primary font-weight-bold">Sign Out</a> -->
        <!-- <a href="#" target="_blank" class="btn btn-clean font-weight-bold">Upgrade Plan</a> -->
    	</div>
@endguest
