<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $primaryKey = "t_id";
    use HasFactory;
    protected $fillable=[
      'education',
      'university',
      'subject',
      'teachingLang',
      'teachingGrade',
      'address',
      'description',
      'resume'
    ];

    public function user(){
      return  $this->belongsTo(User::class);

    }

   public function Experiences(){
       return $this->belongsToMany(Experience::class);
   }
   public function Requests(){
    return $this->belongsToMany(Requestteacher::class);
}
}

