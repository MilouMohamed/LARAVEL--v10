<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {   
        $values=parent::toArray($request); 

        // if(!isset( $values->image)){
        //     $values->image=["image"];
        // }
        $values["image"]="test adasd asdasd asdasd ";
  
// dd($values);
        $values["image_path"]=url("storage/".$values["image"]);  
        if(isset($values["password"]))
        $values["psw"]=$values["password"]; //Normalisation des donnees
        //   $values["created_at_2"]=date_format(date_create($this["created_at"]),"Y-m-d");
        //   $values["created_at_3"]=$values["created_at_2"]=date_create();

        //   unset($values["created_at_2"],$values["updated_at"]);// delete 
        return $values;
    }


    
    public static function collection($resource)
    {
        return  parent::collection($resource)->additional([
            "count_test"=>$resource->count(),//Pour Ajouter Dans Json file dans navigator
        ]);
    }
}
