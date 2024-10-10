<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\profile;

class Publication extends Model
{
    use HasFactory;
    use SoftDeletes;
    

    protected $fillable=[
        "titre","body","image","Profile_id"
    ];


    public function Profile_Pub() {   
        return $this->belongsTo(profile::class,"Profile_id");
        // return pub avec id de profile  (inner join  en pub.Prof_id et prof.id)
    }

}
