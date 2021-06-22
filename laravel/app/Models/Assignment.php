<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;
    protected $primaryKey = "a_id";
    protected $fillable = [
        's_id',
        't_id',
        'title',
        'startDatetime',
        'endDatetime',
        'isSubmitted',
        'grade',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function questions(){
        return $this->belongsToMany(Question::class);
    }
}
