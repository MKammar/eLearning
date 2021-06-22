<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;
    protected $primaryKey = "certificate_id";
    protected $fillable = [
        's_id',
        't_id',
        'isgenerated',

    ];

    public function User(){
        return $this->belongsTo(User::class);
    }
}
