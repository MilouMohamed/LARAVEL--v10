<?php

namespace App\Http\Controllers;

use App\Mail\ProfileMail;
use App\Models\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;

class LoginController extends Controller
{
    public function show()
    {
        return view("/login/show");
    }
    public function login(Request $request)
    {
        $emial = $request->login;
        $password = $request->password;
        $valus = ["email" => $emial, "password" => $password];
        //   $valus = ["email" => "123", "password" => "123"];

        // dd(Auth::attempt($valus));// change Table dans Config/Auto (user to profiles)


        if (Auth::attempt($valus)) {
            $profile = Auth::user();
            if ($profile->hasVerifiedEmail()) {
                $request->session()->regenerate();
                return redirect()->route("homePage")->with("god", "Voue etes Connecte Par Email " . $emial);
            } else {
                $request->session()->invalidate();
                Mail::to($emial)->send(new ProfileMail($profile));
                return back()->withErrors([
                    "Verification" => "Merci de Verifier Votre Compte Mail Pour Active Votre  Email  ($emial)",
                ]);
            }

        } else {
            return back()->withErrors([
                "login_error" => "Email Ou mot de pass Incorect ."
            ])->onlyInput("login");
        }
        // return view("login.login",compact(   "emial" ));
    }

    public function logout()
    {
        session()->flush();
        Auth::logout();
        return to_route("homePage")->with("god", "Vous Etes Bine Deconnecter");
    }

}
