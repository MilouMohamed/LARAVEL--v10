<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Mail\ProfileMail;
use Cache;
use Hash;
use Illuminate\Http\Request;
use App\Models\profile;
use Illuminate\Support\Facades\Mail;

class ProfileController extends Controller
{


   public function __construct()
   {
      $this->middleware("auth")->except(["show", "create", "store","Verefy_email"]);// Tous Sef Que Show
   }
   public function index()
   {
      // $profilles = profile::paginate(12);
      $profilles = Cache::remember("profilles", 10, function () {
         return profile::paginate(12);
      });

      return view("profile/index", compact("profilles"));
   }

   // public function show(Request $reqst) 
   // public function show(profile $profile) // v 67
   public function show(string $id) // v 29
   {

      /*  $id = (int) $reqst->id;  
        $prof = profile::find($id);
        // $prof= profile::findOrFail( $id); //si obligatoire Like requere

        if ($prof === null) {
           return abort(404);
        }*/
      // dd($prof);
      // return view("profile/show", compact("prof"));

      // Profile video 67
      // $profile = profile::findOrFail($id);
// dd($profile);
//  Cache::get("Profile_1");
// Cache::put("Profile_1", $profile,5); 



      $prefex = "Profile_$id";
      //M1
      /*  if (Cache::has($prefex)) {
           $profile = Cache::get($prefex);
        } else {
           $profile = profile::findOrFail($id);
           Cache::put($prefex, $profile, 20);
        }*/
      //M2
      $profile = Cache::remember($prefex, 10, function () use ($id) {
         return profile::findOrFail($id);
      });
      // Cache::forget($prefex) Supprimer Cache

      // dd($profile);
      return view("profile/show", compact("profile"));//29
   }


   public function create()
   {
      return view("profile.create");
   }


   public function store(ProfileRequest $request)
   {// v32
      // public function store(Request $request){ 
      // OU  $request->post(); db meme que name(dans View)

      /*    $name=$request->name;
          $email=$request->email;
          $bio=$request->bio;
          $password=$request->password;
    */
      /* $fildes=    $request->validate([
              // "name"=>"required|unique:nomTable|date|max:30|min:3|between:2,20",
              "name"=>"required",
              "email"=>"required|unique:profiles",
              "password"=>"required|confirmed",
              "bio"=>"required"
           ]);*/ //v 31

      $fildes = $request->validated();// Les Champ Valide


      //storage/profile/imgs/
      $filename = "/profile/imgs/profile.JPG";
      if ($request->hasFile("image")) {
         $filename = $request->file("image")->store("profile/imgs", "public");//v 38
      }
      $fildes["image"] = $filename;

      $fildes["password"] = Hash::make($fildes["password"]);// v31 crpayeg pws 
      //  dd($fildes);// les Cahmap valider
      $proflie = profile::create($fildes);// v31

      /*    profile::create([
             "name"=>$name,
             "email"=>$email,
             "password"=>$password,
             "bio"=>$bio,
          ]);*/

      $email = $request->email;
      Mail::to($email)->send(new ProfileMail($proflie));


      return redirect()->route("profiles.index")->with("god", "Votre Compte est bien Ajouter from Flashbag : $email");
   }

   public function Verefy_email(string $hash)
   {
      [$ceatedAt, $id] = explode("///", base64_decode($hash));
      $profile = profile::findOrFail($id);
      $email = $profile->email;
      $name = $profile->name;
   // dump($profile->created_at->toDateTimeString(), $ceatedAt,$id);
 
      if ($profile->created_at->toDateTimeString() !== $ceatedAt  ) {
         return abort(404,"Probleme de verification !!!");
         // return response("Probleme ",403);
      }

      if (is_null($profile->email_verified_at)) {
         $profile->fill([
            "email_verified_at" => time()
         ])->save();
         $msg = false;
      } else {
         $msg = "Ce Mail ($email) est Deja Verify ";
      }


      return view("emails.email_veryfed", compact("name", "email", "msg"));
   }


   public function destroy(profile $profile)
   {
      $profile->delete();
      return redirect()->route("profiles.index")->with("god", "Le Profile  a ete bien Supprimer");
   }


   public function edit(profile $profile)
   {
      return view("profile.edit", compact("profile"));

   }

   public function update(ProfileRequest $request, profile $profile)
   {
      // $profile->update();
      $fildes = $request->validated();// Les Champ Valide

      $filename = "/profile/imgs/profile.JPG";

      if ($request->hasFile("image")) {
         $filename = $request->file("image")->store("/profile/imgs", "public");//v 38
      }
      $fildes["image"] = $filename;

      $fildes["password"] = Hash::make($fildes["password"]);

      // dd($fildes);
      $profile->fill($fildes)->save();

      return to_route("profiles.show", $profile->id)->with("god", "Vous aves Modifie le Profile ");
   }



}
