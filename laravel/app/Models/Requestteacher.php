<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requestteacher extends Model
{
    use HasFactory;
    protected $primaryKey = "r_id";

    protected $fillable = [
        'Response',
        'meetingDate',
        'meetingTime',
        
    ];

    public function Teacher()
    {
        return $this->hasOne(Teacher::class);
    }
    public function User()
    {
        return $this->hasOne(User::class);
    }
}
