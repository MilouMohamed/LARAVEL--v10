<?php

namespace App\Models;

use Egulias\EmailValidator\Validation\EmailValidation;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class profile extends User implements MustVerifyEmail //Pour veryfie par laravel dans bd
{
    use SoftDeletes;
   /* use HasFactory;
     use Notifiable; deja dans User */

    protected $fillable=[
         "name","email","password","bio","image","email_verified_at"
    ];// pour insertiion dans db  (les Champ pour modification)


public function publications(){ 
    return $this->hasMany(Publication::class);
}

/*
    public function getImageAttribute($value){
return "my iimmgg Wooo $value";
} */

    /*
 public function  getRouteKeyName() : string{ //v 29
// return "id"; // par defaul
return "email";  
}*/

}
