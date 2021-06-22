<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'phone',
        'imageUser',
        'password',
        'role',
        'imageUser',
    ];

    public function teacher(){
       return $this->hasOne(Teacher::class);
    }

    public function Requests(){
        return $this->belongsToMany(Requestteacher::class);
    }
    public function Assignments(){
        return $this->belongsToMany(Assignment::class);
     }
     public function Schedules(){
        return $this->belongsToMany(Schedule::class);
     }


     public function Certificates(){
        return $this->belongsToMany(Certificate::class);
    }
    public function Feedbacks(){
        return $this->belongsToMany(Feedback::class);
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $guarded=[];

    public function messages(){
        return $this->hasMany(Message::class,'from');
    }
}
