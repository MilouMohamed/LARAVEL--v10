<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublicationRequest;
use App\Models\Publication;
use Auth; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PublicationController extends Controller
{


    public function __construct()
    {

        $this->middleware("auth")->except("index");
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $publications = Publication::latest()->paginate(200);
        return view("Publication.index", compact("publications"));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("publication.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PublicationRequest $request)
    {

        $formValidate = $request->validated();
        $imgName = "";
        if ($request->hasFile("image")) {
            echo "Oui || " . $request->file("image");
            $imgName = $request->file("image")->store("Publication/imgs", "public");
        }
        $formValidate["image"] = $imgName;
        // dd($formValidate); 
        $formValidate["Profile_id"] = Auth::user()->id;

        Publication::create($formValidate);

        return to_route("publication.index");

    }

    /**
     * Display the specified resource.
     */
    public function show(Publication $publication)
    {
        return dd("Is Show");

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publication $publication,Request $requestt)
    {

        // v 61 if (!Gate::allows("update-publication",$publication)) {
        //     return abort("404");
        // } 
        //supprime v 62 Gate::authorize("update-publication",$publication);
        // Gate::authorize("update",$publication);// v 62 M1
  $this->authorize("update",$publication);// v 62 m2

      /*  if ($requestt->user()->cannot("update", $publication)) {
            abort(403);
        }*/ 

        return view("publication.edit", compact("publication"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PublicationRequest $request, Publication $publication)
    {


      //  Gate::authorize("update-publication", $publication);//v61
        // if (!Gate::allows("update-publication",$publication)) {
        //     return abort("404");
        // }  v61

        $this->authorize("update",$publication);// v 62


        $validate = $request->validated();

        $imgName = "Publication/imgs/noImg.jpg";

        if (!is_null($publication->image)) {
            $imgName = $publication->image;
        }
        if ($request->hasFile("image")) {
            $imgName = $request->file("image")->store("Publication/imgs", "public");
        }
        $validate["image"] = $imgName;
        // dd($validate);
        // Publication::update($validate);
        $publication->fill($validate)->save();
        return to_route("publication.index")->with("god", "Vous aves Modifie la Publication  ");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publication $publication)
    {
        if (Auth::id() !== $publication->Profile_Pub->id) {
            return abort("404");
        }
        $publication->delete();
        return redirect()->route("publication.index")->with("god", "La publication a ete bien Supprimer");
    }
}
