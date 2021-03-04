<?php

namespace App\Http\Controllers\Auth;

use App\Activation;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;

class LoginSocialController extends Controller
{
    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToFacebookProvider()
    {
        return \Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return void
     */
    public function handleProviderFacebookCallback()
    {
        $user = \Socialite::driver('facebook')->user(); // Fetch authenticated user
        dd($user);
    }

    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToGoogleProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/login');
        }
        // only allow people with @company.com to login
        /*if(explode("@", $user->email)[1] !== 'company.com'){
            return redirect()->to('/');
        }*/
        // check if they're an existing user
        $existingUser = User::where('email', $user->email)->first();
        if ($existingUser) {
            // log them in
            //dd($existingUser);
            $query = Activation::updateOrCreate(
                ['user_id' => $existingUser->id],
                ['user_id' => $existingUser->id, 'completed' => 1]
            );
            //auth()->login($existingUser, true);s
            if ($query->completed == 1) {
                return Redirect::to('https://telemedicina.today/web/paciente/triaje-paso-1');
            } else {
                // return redirect()->back()->with('error', 'Verificar su cuenta');
                return redirect()->back();
            }
        } else {
            //echo "crear usuario";
           // dd($user);
            // create a new user
            /*Activation::updateOrCreate(['user_id' => $existingUser->id],['user_id'=>$existingUser->id, 'completed'=> 1]);
            $newUser                  = new User;
            $newUser->name            = $user->name;
            $newUser->email           = $user->email;
            $newUser->img          = $user->avatar_original;
            $newUser->save();
            auth()->login($newUser, true);*/
            // return redirect('/register')->with(
            //     'success2',
            //     'Registrate gratis para poder acceder.'
            // );
            return view('register')->with(["infoSocialite"=>array("name"=>$user->name, "email"=>$user->email, "avatar_original"=>$user->avatar_original, "provider"=>"google", "provider_id"=>$user->id)]);

        }
        return redirect()->to('/');
    }
}
