<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Http\Resources\ProfileResource;
use App\Models\profile;
use App\Models\Publication;
use Cache;
use DB;
use Hash;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    private const CACHE_API_Profiles="Profies_api";
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //M1 $profiles=profile::all();
    //M1   return  response()->json($profiles);
    // return Publication::all();//Not supprimer
    //   return Publication::withTrashed()->get(); // Toutes
    
    // return ProfileResource::collection(profile::all());
    
    // Cache::forget("CACHE_API_Profiles");
 
// dd( DB::table("profiles")->where("id","2")->first());
// dd( DB::table("profiles")->where("id","2")->value("email"));
// dd( DB::table("profiles")->find(8));// par ID
// dd( DB::table("profiles")->pluck("name","email"));// all Email value => key
// dd( DB::table("profiles")->get(["id","name","email"]));// all Email  and name and id
// dd( DB::table("profiles")->select(["id","name","bio"])->where("id",">",5)->get());// all bio  and name and id whwre id = 2
// dd( DB::table("profiles")->select()->where("created_at",">","2024-9-28")->get());// all  whwre created_at > 2024-5-5
// dd( DB::table("profiles")->sum("id"));//agrigation Avg/ Count /max /min
// dd( DB::table("profiles")->where("id","=",101)->exists());//existance   True False
// dd( DB::table("profiles")->join("publications","profiles.id","=","publications.id")->get());//Jointure
// dd( DB::table("profiles")->whereMonth("created_at",">=","1")->get());//whereDate or whereYear
// dd( DB::table("profiles")->where([
    // ["id",">",6],
    // ["created_at","<","2024-11-1"],
// ])->get());//where X and Y
/*
dd( DB::table("profiles")->where([
    ["id","=",1]
])->orWhere([
    ["id","=",5]
])->get());  */

// dd( DB::table("profiles")->whereIn("id",[1,3,8] )->get());//where X or Y
// dd( DB::table("profiles")->whereBetween("id",[2,5] )->get()); 
// dd( DB::table("profiles")
// ->whereNot("id","=",1 )
// ->get()); 
/* dd( DB::table("profiles")
->orderBy("name")
->get()); 
 dd( DB::table("profiles")
 ->orderBy("name","desc")
 ->get());   */
 /*
  DB::table("profiles")
  ->orderBy("name","desc")
  ->dd();    
  DB::table("profiles")
->where("id","=",2)
->dump();  // Pour Afficher La data
 */

    // v68  
    Cache::delete(self::CACHE_API_Profiles);
  return  Cache::remember(self::CACHE_API_Profiles,5000,function(){
        return ProfileResource::collection(profile::all());
    });

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //http://127.0.0.1:8000/api/profiles pour ajouter POST
        $formFild=$request->all(); 

        $formFild["password"]=Hash::make($request->password);
        
        Cache::forget(self::CACHE_API_Profiles);
        profile::create($formFild); 
        return  new ProfileResource($formFild);
           

    }

    /**
     * Display the specified resource.
     */
    public function show(profile $profile)
    {
        return new ProfileResource($profile);// v 66
        // return $profile;

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, profile $profile)
    {

        /*
 "id" => 6
    "name" => "suuprimer 2222"
    "email" => "supprime1@gmail.com2"
    "password" => "0000"
    "bio" => "bionb abasm a sdamsd ashdasdbionb abasm a sdamsd ashdasdbionb abasm a sdamsd ashdasdbionb abasm a sdamsd ashdasdbionb abasm a sdamsd ashdasdbionb abasm a sdamsd ashdasda sdamsd ashdasdbionb abasm a sdamsd ashdasdbionb abasm a sdamsd ashdasd"
        */
        // dd($profile);
        $formFild=$request->all();
        // dd($formValidate);
        $formFild["password"] =Hash::make($request->password);
        $profile->fill($formFild)->save();
        $profile= new ProfileResource($profile);// v 66

        Cache::forget(self::CACHE_API_Profiles);
        return $profile;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(profile $profile)
    { 
         $profile->delete();
        Cache::forget(self::CACHE_API_Profiles);
        $data=[
            "ID"=>$profile->id,
            "name"=>$profile->name,
            "email"=>"Mwdox@gmail.com",
            "langProg"=>["n1"=>1,"n2"=>2,"n3"=>3]
        ];
        return response()->json(
            $data,201
        );
    }
}
