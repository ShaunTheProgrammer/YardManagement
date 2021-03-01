<?php

namespace App\Listeners\Auth;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class UserLoggedIn
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Login'*  $event
     * @return void
     */
    public function handle(Login $event)
    {
        session(['UserType' => null ]) ;
        session(['email' => null ]) ;
        $userid = $event->user->id;
        //var_dump( $userid );
        $userdata = User::where('id',$userid)->first();
        if (!is_null($userdata)) {
            $UserType =  $userdata->UserType;
            $email =  $userdata->email;
            $username = $userdata->name;
            session(['UserType' => $UserType]) ;
            session(['email' => $email ]) ;
            session(['username' => $username ]) ;
        }
        else
        {
              session(['UserType' => null ]) ;
              return view('pages.dashboard', compact('page_title', 'page_description'));
            // redirect to profile check of userprofile page
        }

        //return redirect()->route('dashboard');
    }

}
