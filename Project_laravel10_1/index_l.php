<?php
echo "laravel";
// Ecom 1
// v5 filters 
/*use Illuminate\Http\Request;
function index(Request $request)
    {  // $produits=Produit::query()->orderBy("created_at","desc")->limit(3)->get(); 
        $produitsQuery = Produit::query();
        $name = $request->input("Name"); 
        if ($name != null) { 
             $produitsQuery->where("Name","like","%{$name}%");   }
 
        $produits = $produitsQuery->get();
*/
/*
dasn Controller (Jointure Inner Join )
 $categories = Categorie::query()->with("produits")->has("produits")->get(); 
        $categoriesSelected=$request->input("categoriesID"); 
        if($categoriesSelected != null){ 
            // $categories->wheres("categorie_id","in",$categoriesSelected);
            $produitsQuery->whereIn("categorie_id",$categoriesSelected);
        }
         
        
        $produits = $produitsQuery->get();

 <input  @checked(in_array(  $categorie->id,$categIdSelected)) class="form-check-input" type="checkbox" value="{{ $categorie->id }}" id="category_{{ $key }}"
        name="categories[]" />

$categoriesSelected=$request->input("categories"); 
        

dans view 
@foreach ($categories as $key => $categorie)
    <div class="form-check">
        <input class="form-check-input" type="checkbox" 
               value="{{ $categorie->id }}" 
               id="category_{{ $key }}" 
               name="categories[]"/> <!-- Utilisation de "categories[]" pour obtenir un tableau en PHP -->
        <label class="form-check-label" for="category_{{ $key }}">
            {{ $categorie->Name }} <!-- Affichage du nom de la catégorie -->
        </label>
    </div>
@endforeach

*/


// Ecom 1
// v4
// composer require laravel/ui "4.2.2"
// php artisan ui bootstrap --auth
// npm install && npm run dev    
// npm run dev pour files scss

// v 4  20.20 Pour Rederege si connecter  
// authenticated  // Pour une rederection vers Des Pages Dashboard
// namespace App\Http\Controllers\Auth; LoginController redefinision ici 
// namespace Illuminate\Foundation\Auth; func authenticated


// v1
// .env  APP_DEBUG=true
// composer require barryvdh/laravel-debugbar 
//pour Les requetes sql sur console

/************************** */
// middleware 
// composer require laravel/breeze
// php artisan breeze:install



// VIdeo      V74
// suceruse l authentication
// class profile extends User implements MustVerifyEmail
//Login >>  Auth::user()->hasVerifiedEmail() verefie si dans bd est deja verefied
// $profile = Auth::user();
// if ($profile->hasVerifiedEmail()) {
    // $request->session()->regenerate();




// VIdeo      V73
// confirmation  email
//Dans Class ProfileMail  Pour Envoyer email et nom 
// public function __construct($nameP ,$emailP)
// public function __construct(private profile $profile)
/*
  $href=url("")."/Verefy_email/".base64_encode($date_creat."///".$id);
        return new Content(
            view: 'emails.inscription',
            with:[
                "email"=>$this->profile->email,
                "name"=>$this->profile->name, 
                "href"=>$href,
            ]
*/

/*  function verefy email
  [$ceatedAt, $id] = explode("///", base64_decode($hash));
      $profile = profile::findOrFail($id);
      $email = $profile->email;
      $name = $profile->name;
   dump($profile->created_at->toDateTimeString(), $ceatedAt,$id);
 
      if ($profile->created_at->toDateTimeString() !== $ceatedAt  ) {
         return abort(404,"Probleme de verification !!!");
         // return response("Probleme ",403);
      }


*/











// VIdeo      V72
// envoyer  Un Email  (https://mailtrap.io/)
// php artisan make:mail ProfileMail (ceartion class mail)
// php artisan config:cache  (pour vide le cache de config)home > index
// index page controller exempl 
// Mail::to("test0022b@gmail.com")->send(new ProfileMail()); 

/* dans class ProfileMail   attaechment return [
 Attachment::fromStorage("public/profile/imgs/profile.JPG")
    ->as("image.jpg")
    ->withMime("image/jpg")  */




// VIdeo      V71
// Vite cooment intaller react ou  vj front end
// instalation 
        // nodejs
        // cmd vs instalation des pakage FrontEnd
        // npm install        install all the dependencies in your project
       // npm  install --save-dev @vitejs/plugin-react (Pour react js)
/*
vite.confid.js ... defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        react(),// ajouter React function
*/
// composer require laravel/ui (Pour Installer bootstrap local et d autres files)
// php artisan ui bootstrap
// npm install && npm run dev 
// npm run build (dans Public / build / assets app-xxxx fiche compeler) 
// pour installer React 
// npm install --save-dev react react-dom 



// VIdeo      V70
// session 
// comme Cache
// .env  SESSION_DRIVER=database 
// php artisan session:table
// php artisan migrate
// $lastCompteur =  $request->session()->increment("Compteur",3);// et(decrement)nbr chaque refreche
// $request->session()->forget("Compteurt.t1");// forget supprimer definitivemnt // delete deplace dans curbaille exemple



// VIdeo      V69
// Query Builder laravel
// dd( DB::table("profiles")->where("name","yasine")->get());// array
// dd( DB::table("profiles")->where("id","2")->first());// Un seul
// dd( vars: DB::table("profiles")->where("id","2")->value("email"));
// dd( DB::table("profiles")->count("id"));//agrigation Count /max /min
// dd( DB::table("profiles")->where("id","=",101)->exists());//existance   True False
// dd( DB::table("profiles")->join("publications","profiles.id","=","publications.id")->get());//Jointure
/*
dd( DB::table("profiles")->where([
    ["id","=",1]
])->orWhere([
    ["id","=",5]
])->get())    select X or Y */
// dd( DB::table("profiles")->whereIn("id",[1,3,8] )->get());//where X or Y
// dd( DB::table("profiles")->whereBetween("id",[2,5] )->get()); 
/*
 dd( DB::table("profiles")
->orderBy("name","desc")
->get());  
*/
// select * from `profiles` order by `name` desc 
// DB::table("profiles")->orderBy("name","desc")->dd();  // Pour Affciher La Requete

 /*
  DB::table("profiles")
  ->orderBy("name","desc")
  ->dd();    
  DB::table("profiles")
->where("id","=",2)
->dump();  // Pour Afficher La data
 */




// VIdeo      V68
//Cache WebServices







// VIdeo      V67
// php artisan cache:table (Pour Cree une table dans db pour les caches)
// cache et cache_locks
// php artisan migrate
// config  
// 'default' => env('CACHE_DRIVER', 'database'),// databese place pour stoce les donnees
// .env  CACHE_DRIVER=database 
/* Pour importe les donnes du cache
 $profile= Cache::remember($prefex,10,function() use ($id){
         return profile::findOrFail($id);
      });
      // Cache::forget($prefex) Supprimer Cache
*/





// VIdeo      V66
// php artisan make:resource ProfileResource
// Pour Personaliser les Resource De Json
// Ou Lieu de returne Profile  en vas reteurne une colection Pesronaliser 
// dans ControlProfile dans func show 
        // return new ProfileResource($profile);// v 66
        // $values["created_at_2"]=date_format(date_create($this->created_at),"Y-m-d");Normalisation des donnees
        // return $values;
// Pour PAge Not FOund 
/*
//API/*  => JSON namespace App\Exceptions;
        $this->renderable(function (NotFoundHttpException $nfex,Request $request) {
            if ($request->is("api/*")) {
                return response()->json([
                    "Message"=>"Probleme not found"
                ],404);
            }
        });
*/





// VIdeo      V65
// Afficher Ajouter Modifier Supprimer WebServices 
// aficharge  
    //M1 $profiles=profile::all();
    //M1   return  response()->json($profiles);
    // return Publication::all();//Not supprimer
    // return Publication::withTrashed()->get(); // Toutes
//  meme pour delete et update    $data=[
    // "name"=>"Mwdox",
    // "email"=>"Mwdox@gmail.com",
    // "langProg"=>["n1"=>1,"n2"=>2,"n3"=>3]
// ];
// return response()->json(
    // $data
// );




// VIdeo      V64
// Liste Profile (web services)
// php artisan make:co ntroller Api/ProfileController --model=profile --api  
// php artisan make:controller Admin\CategorieController --model=Categorie
// Pour Creer Contorller Pour Model Categorie   v2 ecom (5)
// Dans Route(web) api.php aouter 
// Route::apiResource("profiles",ProfileController::class);//ProfileContr de api
// public function index()
// $produits=Produit::query()->with('function de hasMny')->paginate(12);
// pour dimine les requettes 
// { $profiles=profile::all();
// $products =Produit::query()->paginate(3);
// {{ $products->links()}}// buttons bootsreap
//
// problele de style <  et  >    
/*namespace App\Providers;
 boot(): void
  {  Paginator::useBootstrapFive();
*/
//   return  response()->json($profiles); Format Json
//Ou 
    // return Publication::all();//Not supprimer
    // return Publication::withTrashed()->get(); // Toutes


// VIdeo      V63
// Web Services REST
// Thiorique  


// VIdeo      V62
// les Autorisations et Permission  
//----> Polices     Comme(Controllers)
//(creation d un Policy sur Publication) php artisan make:policy publicationPolicy --model=publication
/////// Ajouter Le code dans Provider / AuthServiceProvider
// protected $policies = [ 
    // Publication::class => publicationPolicy::class,
    // update(GenericUser $user, publication $publication): bool
    // {   return $user->id === $publication->Profile_id;

    //Pour probleme undefind genericUser  
//   dans config/auth.php   'users' => [ 
        //  'driver' => 'eloquent',
        //  'table' => 'profiles',
        //  "model"=>profile::class

//Probleme (profile::getAuthIdentifierName()) class profile extends User
// dans controller if ($requestt->user()->cannot("update", $publication)) {
//     abort(403);
// }
       
// dans View cardPub   @can("update", $publication) place de @auto et if(update)


// VIdeo      V61
// les Autorisations et Permission
//----> Gates       Comme(Routes)
//----> Polices     Comme(Controllers)
// app/http/Provider/AuthService
/* public function boot(): void
    { $this->registerPolicies(); 
        //Gates  V61
        Gate::define("update-publication",function(GenericUser $profile,Publication $pub){
            return $profile->id === $pub->Profile_id;
        });
    }
*/
// if (!Gate::allows("update-publication",$publication)) { v61

//best => Gate::authorize("update-publication",$publication);//v61





// VIdeo      V60
// les Autorisations et Permission
/* Methode 1
 if (Auth::id() !== $publication->Profile_Pub->id) {
            return abort("404");
        } 
*/



// VIdeo      V59
// Afficher Image du profiele dans la list des publication
// public function Profile_Pub() {   
    // return $this->belongsTo(profile::class,"Profile_id");
// } 
// dans create
/*
 @foreach ($categories as $categorie) 
      <option   @selected(old('categorie_id') == $categorie->id) value="{{$categorie->id}}">{{$categorie->Name}}</option>
    @endforeach
  
**/


// VIdeo      V58
// Afichage des publicatios dans Profile laravel
// return $this->hasMany(Publication::class); comme jointure (Publication et Profile)
// <x-PubCard :canUpdate="auth()->user()->id === $pub->Profile_id" :pub="$pub" />



// VIdeo      V57
// Affecter Pub a un utilisateur
//dans View @auth
// @if ($pub->Profile_id === Auth::user()->id)
/*** Controller ****************** */
// $formValidate["Profile_id"] =Auth::user()->id;



// VIdeo      V56
// Relationship
// 1 - n  | n - n  | n - 1  ...
//php artisan make:migration add_Profile_id_to_publications_table //Pour Ajouter Un  nevau champ 
// $table->unsignedBigInteger("Profile_id");
// $table->foreign("Profile_id")->references("id")->on("profiles")->onDelete("Cascad")->onUpdate("Cascad");



// VIdeo      V55
// Page index(Afficher Les Publs) Publications



// VIdeo      V54
// Modifier Publication




// VIdeo      V53
// Ajouter Publicatin 
// Route::resource("publication",PublicationController::class);
// Pour Linke automaticment et mis les Routes 
// php artisan make:request PublicationRequest
        // Pour Ajouter roules(validation des Donnees titre ...)








// VIdeo      V52
// headers Responces Request
// $responce=new Response(["data"=>"ookk"]);
// $res =$responce->withHeaders([
    // "Content-Type"=>"Application/Json"
    //, "Content-Type"=>"text/html",
// ]);
    //  return $res;

    // dd($request->header()); info sur header 
    // "accept" => array:1 [▼
    // 0 => "text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/png,image/svg+xml,*/*;q=0.8"
//   ]
// dd($request->url(),$request->fullUrl());
    //http://127.0.0.1:8000/request?id=55 fullUrl



// VIdeo      V51
// Cookies Laravel
// $cokObg= cookie("Age",$cok,1);// dure limite
// $cokObg= cookie()->forever("Age",$cok);// 400 jrs
// return $resp->withCookie($cokObg);
// Route::get("/cookies/get",function(Request $request){
    // dd( $request->cookie("Age"));// Respect Case


// VIdeo      V50
// Response Afficher And Download file
// return response()->download("storage/profile/imgs/profile.jpg"); // pour ignore 

 
// VIdeo      V49
//Request,input,string
// use Illuminate\Http\Request ; dans route web 
// pour use   function(Request $request )dump($request->name);
// Pour les perfermance use  $request->input("name_inpt");// ben perfermance
// dump($request->input("name_inpt","si name_inpt n est pas dans from"));
// dump($request->date("date_inpt" ));
//

// VIdeo      V48
//injection de dépendances  class dans  parametres d une fun 
// Route::get("/srv/{a}/{b}",function($a,$b,Calcul $calcul){
    //injection de dépendances
        // $som=$calcul->somme($a,$b);
// class Calcul



// VIdeo      V47
// Routege \ Argument Option  \ Away \ Cache 
// Route::get("/age/{age?}" // ? pour Facultatif
// dd(Route::current());
// dd(Route::currentRouteName()); // name 
// dd(Route::currentRouteAction()); // Action stor|create|destroy ....

// Route::get(...(){ return redirect()->away("https://www.google.ma");// vers page externe

//php artisan route:cache
//php artisan route:clear


// VIdeo      V46
// protected function redirectTo(Request $request): ?string
// {  return $request->expectsJson() ? null : route('login.show');
// dans Route  ->middleware("auth");Ou dans Controller constructor
// php artisan make:middlewere NomMiddlewere



// VIdeo      V45
// Route Group Resources (dans 1 ligne)
// php artisan route:list --name=profile  (Pour Afficher Les Routes De Profile)
// Route::resource("profiles",ProfileController::class); // Nom soit Miniscul

//php artisan make:model Publication -mcr  (Model / Controller / Resources)



// VIdeo      V44
// Route Group
// Route::prefix("profiles")->name("profiles.")->group(function(){ ici les Route::get..
        // Name(ici) et get(ici)
// Route::controller(ProfileController::class)->group(function () {
/* 
Route::prefix("profiles")->name("profiles.")->group(function () {
    Route::controller(ProfileController::class)->group(function () { 
    
        Route::get('/', "index")->name("index"); 
        // enplace de 
       Route::get('/profiles',[ProfileController::class,"index"])->name("profiles.index");

*/


// VIdeo      V43
// changemant de Routes Name
/*Model / Profile
public function getImageAttribute($value){
return "my iimmgg Wooo $value";// si  image nexiste pas
}
*/




// VIdeo      V42
// securete csrf





// VIdeo      V41
// VIdeo      V40 
// Afficher Et Modifier Image
// cmd php artisan storage:link  (storage dans public)
//src="{{asset("./storage/$prfl->image")}}" Oui 



// VIdeo      V39
//Soft delete 
//cmd  php artisan make:migration add_delete_at_to_profiles_table --table=profiles
//Migration \ func up $table->softDeletes(); 
//Migration \ func down  $table->dropSoftDeletes(); 
// cmd   php artisan migrate

// Models \ profile \ use SoftDeletes;  use Illuminate\Database\Eloquent\SoftDeletes; 


// VIdeo      V38
// Ajouter Image Dans BD
//rules(): array { return [ "image"=>"image|mimes:png,jpg,svg,jpeg|max:2048(en kb en peux ajouter les Dimentions)"
// dans Contr stor  $request->file("image")->store("profile/imgs","public");
//  $filename= $request->file("image")->store("profile/imgs","public");//v 38 (public pour les serveur exemple s3 voir v 38)
// $fildes["image"]=$filename;
// $filename= $request->file("image")->storeAs("profile/imgs","nameFile","public");//v 38

// VIdeo      V37
// Ajouter Un Champ Dans BD image
// php artisan make:migration add_image_to_profiles_table --table=profiles
// func up(){   $table->string("image",150)->after("bio");}
// func down(){   $table->dropColumn("image");}
// php artisan migrate        pour execute vers bd
// from 



// VIdeo      V36
//Modifier Le Nom de Route Soin miniscule 
//form   @csrf  @method("put")
// Route::put
// controller update(ProfileRequest $request,profile $profile ) 
   // $profile->update();
 //  $fildes = $request->validated();// Les Champ Valide//original et Attribuits
//$profile->fill($fildes)->save();




// VIdeo V35 
// Supprission
//Route::delete(....
// <form ...> @method("DELETE") 
// func destroy(profile $profile) $profile->delete();


// VIdeo      V34
// Logout Decennection  
// @auth  si connecte @endauth  // @guest si non connecte @endguest
// session()->flush();
// Auth::logout();
// {{Auth()->user()->email}}


// VIdeo      V33
// Autontification 
/*
if (Auth::attempt($valus)) {
    $request->session()->regenerate();
    return redirect()->route("homePage")->with("god","Voue etes Connecte Par Email ". $emial); 
} else {
    return back()->withErrors([
        "login_error" => "Email Ou mot de pass Incorect ."
    ])->onlyInput("login");
}*/
// ----------------------
// dans controller login
// dd(Auth::attempt($valus));
// use Illuminate\Support\Facades\Auth;
// changemet de table user vers table Profiles dans fichier config {Auto}




// VIdeo      V32
// Validation Par Class
//php artisan make:request ProfileRequest (voir http /Requests)
// $fildes=  $request->validated();// Les Champ Valide
//


// VIdeo      V31
// crypateg et VAlidation du mote de passe
//ProfileControle  $request->validate([ "password"=>"required|confirmed",
//type="text" name="password_confirmation"
// crypage
// 
// $fildes["password"]=Hash::make($fildes["password"]);


// VIdeo      V30
// la validation d un formulaire
//$request->validate([
    // "name"=>"required|unique:nomTable
 //  @error('name') {{$message}} @enderror
 /* all errors
 @if ($errors->any())
        @foreach ($errors->all() as $error)
            {{$error}}
        @endforeach 
    @endif
*/


// VIdeo      V29
// Route model binding 
//Controller == return view("profile/show",compact("profile") );//29
//Routes == Route::get('/profiles/{profile}
//Routes == Route::get('/profiles/{profile:email}
// getRouteKeyName() : string{  return "id"; default
// Attension  '/profiles/{profile} meme dans action delete update eedite 


// VIdeo      V28
// Redirectnio 
// redirect("/home")
// redirect()->route(...)  == to_route(...)
// redirect()->action(...)
// back(...)->withInput()


// VIdeo      V27 
// FlashBag  route()->width("keySession","msg")
// @if(session()->has('sucess')) 
/* une fois
@if (session()->has("Success"))
  <div class="alert alert-success">
    {{Session::get("Success")}}
*/

// VIdeo      V26
// Insertion de Donnees STORE
// @csrf pour les formulaires ( view create )
// form  enctype="multipart/form-data" (Image)
//Model ==> Profile ==> protected $fillable=[ "name","amil",..
       



// VIdeo      V25
// Formulaire pour  Ajouter

// VIdeo      V24
// cadr Profile

// VIdeo      V23
// Show Profile details


// VIdeo      V22
// Pagination Router Condition(whire("id","\d+"))


// VIdeo      V21
// Profile Dans un Table Html
// href={{route("homePage")}} et name("homePage")
// $profilles=  profile::all();  dans View


// Controller      V20
//Documentation


// Controller      V19  seeder
// php artisan migrate:fresh --seed
// php artisan make:factory ProfileFactory --model=profile (Pour Creer Une factory pour insere dans bd )

  


// Controller      V18
// Creer des donnees de test Seending / Seender (insert)
//php artisan db:seed (Pour inser dans databaseSeeder.php)
//php artisan make:seeder ProfileSeeder
//php artisan db:seed --class=ProfileSeeder (execute un  seul fichier )


// Controller      V17
// ORM  Model et Migrations (fichier .env (datebase et mysql))
//php artisan make:model profile -m OU(--migration)
//php artisan migrate (Pour cree les tables) pas de changemet si une table est cree



// Controller      V16
// ORM Object Relation Mapping => crud
//php artisan make:model profile

// Controller      V15
// components Slots 


// Controller      V14
// components et Props 




// Controller      V13
// @extends ("layout.master") 
// @section("title")
// @yield("title")


// Controller      V12
// Layout  @extends("layout.master") html5

// Controller      V11
// blade   include  / once endOnce / onculeFirst ...

// Controller      V10
// blade (switch isset Empty)


// Controller      V9
// blade if foreach

// Controller      v8
// php artisan make:controller homeController
// <h2>{{$home}}</h2> 
//homeController::class end use namespace1 


// composer dump-autoload (laravel 10)



// Passage de donnees a la vue      v7
// Request $request

 

//composer create-project laravel/laravel formation_Mo_Ja ;
//composer create-project --prefer-dist laravel/laravel nom-du-projet "10.*"



// cd formation_mo_ja/
// php artisan          ===> all cmd
// php artisan  serve    ===> lance le serveur
// php artisan optimize:clear  (all cache delete)
// Instal           v3
// Routage          v6
/****************************** 
    Route web.php
        GET     => lecture
        POST    => Ajouter (Formulaire) 
        PUT     => Modification Complet
        PATCH   => Modification Partielle
        DELLETE => Supprimer

 Eexemple User => nom ="Nom1" , pren ="pre 1";
               PATCH  selement nom
               PUT    selement nom et pren
        */





















/******************************** */

        /*

<?php
namespace App\Http\Controllers\User\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\ProduitRequest;
use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Http\Request;
use View;

class StorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $produits=Produit::query()->orderBy("created_at","desc")->limit(3)->get(); 
        $produits = Produit::query()->get();

        $produits=Produit::pluck("prix")->all();
        $min=min($produits);
        $max=max($produits);
 
        
        $produitsQuery = Produit::query()->get();

        $name = $request->input("Name");
        if ($name != null) {
            $produitsQuery->where("Name", "like", "%{$name}%");
        }



        $min = request()->input("min");
        $max = request()->input("max");

        if(!is_null($max)){
            $max =0;
        }



        $categories = Categorie::query()->with("produits")->has("produits")->get();

        $categoriesSelected = $request->input("categoriesID");
        if ($categoriesSelected != null) {
            // $categories->wheres("categorie_id","in",$categoriesSelected);
            $produitsQuery->whereIn("categorie_id", $categoriesSelected);
        }


        $produits = $produitsQuery->get();

        return View("store.index", compact("produits", "categories"));
    }



}


*/
/**************************************** */


@extends ("layouts.app")

@section("Titre", "Page Stor")

@section("content") 
<!-- <h1>-------- ----------- ----------- --------- -</h1> -->
<div class="row">
  <!-- $categories -->
  <div class="col-md-2 sticky-top">

    <form method="get" class="border  p-1">
      <h2 class="fw-bolder" >Filters</h2>
      <div class="form-group border p-1">
        <label for="Name" class="form-label">Name : </label>
        <input type="text" name="Name" id="Name" class="form-control" value="{{Request::input("Name")}}" />
      </div>
      <hr>
      <div class="form-check  border p-1">
      <h5 class="text-center border-bottom ">Categories</h5>
        @php 
         $categIdSelected = Request::input("categoriesID", []); 
    @endphp 

        @foreach ($categories as $key => $categorie)
      <div class="form-check">
        <input @checked(in_array($categorie->id, $categIdSelected)) class="form-check-input" type="checkbox"
        value="{{ $categorie->id }}" id="category_{{ $key }}" name="categoriesID[]" />
        <label class="form-check-label hand" for="category_{{ $key }}">
        {{ $categorie->Name }}
        </label>
      </div>
    @endforeach

      </div>


      <div class="form-group border p-1">
      <h5 class="text-center border-bottom ">Prix</h5> 
        <label for="min" class="form-label">Min : </label>
        <input  min="0" type="number" name="min" id="min" class="form-control" value="{{Request::input("min")}}" />
      </div>
      <div class="form-group border p-1">
        <label for="max" class="form-label">Max : </label>
        <input max="2000000" step="10" type="number" name="max" id="max" class="form-control" value="{{Request::input("max")}}" />
      </div>

      

      <div class="form-group mt-1">
        <button type="submit" class="btn btn-primary w-100">Recherche</button>
        <a href="/" class="btn btn-warning w-100 mt-1">Reset</a>
      </div>
    </form>
  </div>
  <div class="col-md-10">

    <div class="d-flex justify-content-between  align-items-center mt-4">

      <h2>Liste Des Produits </h2>
      <a href="{{route("produits.create")}}" class="btn btn-primary">Ajouter</a>
    </div>
    <hr>
    @if (session()->has("Success"))
    <div class="alert alert-success">
      {{session()->get("Success")}}
    </div>
  @endif
    <div class="row   g-5">
      @forelse($produits as $prod)

      <div class="col col-md-4">
      <div class="card">
        <img src="{{ asset("./storage/$prod->Image")}}" class="card-img-top" alt="No Image">
        <div class="card-body">
        <h5 class="card-title  " style="text-decoration:underline red 3px;">{{$prod->id}} | {{$prod->Name}} </h5>
        <p class="card-text">
          {!! str($prod->Description)->limit(120) !!}
        </p>
        <div class="d-flex justify-content-between align-items-center">
          <span class="badge text-bg-success"> Quantite : {{$prod->Qtt}} </span>
          <span class="badge text-bg-info"> Prix : {{$prod->Prix}} MAD</span>
        </div>
        </div>
        <div class="card-footer">
        <small class="text-body-secondary">Last updated {{$prod->created_at}}</small>
        </div>

      </div>
      </div>
    @empty
      <div class="m-auto w-100 mt-5   bg-warning  ">
      <p class="text text-danger text-center  p-2 fs-1 fw-b ">Pas De Produits </p>
      </div>
    @endforelse


    </div>
  </div>

</div>


@endsection