<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class LoginController extends Controller
{
    //

    public function AjaxSignIn(Request $request)
    {
        $token = $request->_token_google_client;
        $fullName = $request->_full_name;
        $imgUrl = $request->_image_url;
        $email = $request->_email;
        $id_google = $request->_id_google;

        session()->put('mail', $email);
        session()->put('name', $fullName);
        session()->put('img', $imgUrl);

       if(explode("@", $email)[1] !== 'carnalmedia.com'){
            return false;
        }
        else
        {
            //if mail => carnal domain, check if user already exists, if so send back Ajax data
            $existingUser = User::where('email', $email)->first();
            if($existingUser)
            {
                return $request;
            }
            else
            {
                // create a new user
                $newUser                  = new User;
                $newUser->name            = $fullName;
                $newUser->email           = $email;
                $newUser->google_id       = $id_google;
                $newUser->avatar          = $imgUrl;
                $newUser->save();

                // then send back data
                return $request;
            }


        }
     }

     // if email = carnalmedia domain -> store session then redirect to the dashboard
     public function confirmLogin()
     {
        $mail = session()->get('mail');
        return view('dashboard');
     }

     // flushes the session stored => logout redirect to login view
     public function logout()
     {
        session()->flush();
        return redirect('/');
    }

}
