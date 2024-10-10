<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
   public function index(Request $request)
   {
      $n1=10;
      $n2=20;
      $color="red";
      $nom = "Med1 Comp";
      $langs = [];
      $langs = ["PHP", "React", "laravel", "js"];
$users=[
   ["id"=>1,"nom"=>1,"metie"=>1],
   ["id"=>2,"nom"=>2,"metie"=>2],
   ["id"=>3,"nom"=>3,"metie"=>3],
];

      return view("home", compact("nom", "langs","color","n1","n2","users"));
   // return view("home", ["nom"=>$nom,"langs" =>$langs ]);
      
     //  return view("test", ["nom"=>$request->nom]);
      /*
       $home =$request->hom ;
      return view("home",["home"=>$home]);

      // return "<br>funct Index dans Controller<br>";

      */
   }

   public function test(Request $rqst){
      // $nom = "Med1";

      return view("test",["nom"=>$rqst->nom]);
   }
}
