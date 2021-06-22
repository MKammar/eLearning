<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $primaryKey = "q_id";
    protected $fillable = [
        'a_id',
        'question',
        'choice1',
        'choice2',
        'choice3',
        'choice4',
        'answer',
        'correctAnswer',
    ];
    public function assignment(){
        return $this->belongsTo(Assignment::class);
    }
}
