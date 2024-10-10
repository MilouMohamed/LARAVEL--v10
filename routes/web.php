<?php
use App\Http\Controllers\homeContorller_v14;
use App\Http\Controllers\homeController;
use App\Http\Controllers\InfosController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicationController;
use App\Services\Calcul;  
use Illuminate\Http\Request;
use Illuminate\Http\Response;  
use Illuminate\Support\Facades\Route;


//  v53 
// Route::get("publication.create",[PublicationController::class,"create"])->name("pub.creat");
Route::resource("publication",PublicationController::class);





// v 52
Route::get('/request',function(Request $request){

    //  dd($request->ip()); //  127.0.0.1
    //  dd($request->isSecure()); // False
    // dd($request->isMethod("get")); //True False
    // dd($request->method()); //GET
    // dd($request->host());// localhost Ou IP 127.0.0.1
    // dd($request->is("request")); // si le path is (True)
    // dd($request->path());//request (sans parameters)
    // dd($request->url(),$request->fullUrl());
    //http://127.0.0.1:8000/request?id=55 fullUrl
});

// v 52
    Route::get('/header',function(Request $request){
      
    echo $request->header("host","If Not Exist");// if null
    dd($request->header());
$responce=new Response(["data"=>"ookk"]);
$res =$responce->withHeaders([
    "Content-Type"=>"Application/Json"
    //, "Content-Type"=>"text/html",
    ,"X-Medox"=>"Yes"
]);
// dump($res);
     return $res;
});




// v 51
Route::get("/cookies/get",function(Request $request){
dd( $request->cookie("Age"));// Respect Case
});
// v 51
Route::get("/cookies/set/{cook?}",function($cok=100){
    $resp=new Response();
    echo "------- $cok ------- ";
// $cokObg= cookie("Age",$cok,1);// dure limite
$cokObg= cookie()->forever("Age",$cok);// 400 jrs
return $resp->withCookie($cokObg);

});



// v50
Route::get("/salam",function(){ 
   //  return new Response("salam Error ",500);// Voir La place des Errors consol
    //   return response()->download("storage/profile/imgs/profile.jpg",disposition:"inline"); // pour ignore 
      return response()->download("storage/profile/imgs/profile.jpg"); // pour ignore 
});


// v48
Route::get("/srv/{a}/{b}",function($a,$b){
    $som=Calcul::somme($a,$b);
    dd($som);
});


//******** DE VIDOE 47   ************************* */
Route::get("/ggg",function ( ){
   return redirect()->away("https://www.google.ma");// vers page externe
})->name("rout");


Route::get("/age/{age?}",function ($g ="00"){
//    return "<h1> Age Title  $g </h1>" ;
// dd(Route::current());
// dd(Route::currentRouteName());
dd(Route::currentRouteAction());
 
});








//******** DE VIDOE 1 A 46   ************************* */
Route::get('/v14', [homeContorller_v14::class, "index_v14"])->name("homePage") ; //->middleware("auth"); v46 ou dans Conroller
Route::get('/homepage', [homeContorller_v14::class, "index_v14"])->name("home") ;  

/*
// Profile
Route::prefix("profiles")->name("profiles.")->group(function () {  // v44
    Route::controller(ProfileController::class)->group(function () {

        Route::get('/', "index")->name("index");
        // Route::get('/profiles',[ProfileController::class,"index"])->name("profiles.index");
        Route::get('/create', "create")->name("create");
        Route::post('/store', "store")->name("store");
    });
    Route::delete('/{profile}', [ProfileController::class, "destroy"])->name("destroy"); // v29 route model binding
    Route::get('/{profile}/edit', [ProfileController::class, "edit"])->name("edit"); // v36  
// edite 
    Route::put('/{profile}', [ProfileController::class, "update"])->name("update"); // v36  
    Route::get('/{profile}', [ProfileController::class, "show"])->name("show")
        ->where("id", "\d+"); // v29 route model binding
// Route::get('/profiles/{id}',[ProfileController::class,"show"])->name("show.index")->where("id","\d+");
// End Profile

}); */
// la palece des 7 Routes et 9 lignes
Route::resource("profiles",ProfileController::class);// v 45
Route::get("/Verefy_email/{hash}",[ProfileController::class,"Verefy_email"]);

Route::get('/info', [homeContorller_v14::class, "index_v14"])->name("settings.index");



Route::middleware("guest")->group(function(){

Route::get("/login", [LoginController::class, "show"])->name("login.show");
Route::post("/login", [LoginController::class, "login"])->name("login.login");
});

Route::get("logout", [LoginController::class, "logout"])->name("logout")->middleware("auth");

// Route::get('/info',[InfosController::class,"index"]);


// Route::get('/test/{nom}',[homeController::class,"test"]);

/*
// Route::get('/test/{nom}/{pren}', function ($nm,$pren) {
Route::get('/test/{nom}/{pren}', function (Request $request) {
    // Route::get('/', function (Request $request) {
// Request $request Aussi pour les fichers et les formulaires 
// dd($request->nom);   // comme var_dump 
     return view('test',["nom"=>$request->nom ,"pren"=>$request->pren]);


    // var_dump($_GET);
    // return view('test',["nom"=>"Nom 1","prenom"=>"Pren 1","colors"=>["white","red","rouge"]]);
    // return view('test',["nom"=>$nm,"pren"=>$pren]);
});
 
*/

