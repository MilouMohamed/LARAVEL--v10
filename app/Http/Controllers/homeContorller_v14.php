<?php

namespace App\Http\Controllers;

use App\Mail\ProfileMail;
use Auth;
use Illuminate\Http\Request;
use Mail;

class homeContorller_v14 extends Controller
{
public function index_v14(Request $request)  {
// v72 Email
// $email=new ProfileMail();
/* 
$name=Auth::user()->name;
$email=Auth::user()->email;
$name="name One ";
$email="Email one";
  Mail::to($email)->send(new ProfileMail($name,$email)); 
*/
// dd($email->content() );
//   $body="1220 vie";
//   return view("emails.inscription",compact("body"));


 /*   $n1 =10;
     $n2 =20;
    $nom="v14";
    $colors=["red","yellow","blue"];
$users=[
    ["id"=>1,"nom"=>"Nom 1","metie"=>"Prof 1"],
    ["id"=>2,"nom"=>"Nom 2","metie"=>"Prof 2"],
    ["id"=>3,"nom"=>"Nom 3","metie"=>"Prof 3"]
];
    return view("home",compact("users","nom","colors","n1","n2")); */ 
    //M1// $lastCompteur = $request->session()->get("Compteur",0);
    // $request->session()->put("Compteur",++$lastCompteur);
    // M2 
    // $lastCompteur =  $request->session()->increment("Compteur1",10);// v70
    $lastCompteur =  $request->session()->push("Compteurt.t1",[4,5,8,]);// v70
    $lastCompteur =  $request->session()->get("Compteurt.t1" );// v70
    $request->session()->forget("Compteurt.t1");// forget supprimer definitivemnt // delete deplace dans curbaille exemple
    return view("home",compact("lastCompteur"));
}
}
