<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $primaryKey = "feedback_id";
    protected $fillable = [
        's_id',
        't_id',
        'rate',
        'description',

    ];
    public function User(){
        return $this->belongsTo(Feedback::class);
    }
}
