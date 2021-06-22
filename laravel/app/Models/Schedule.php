<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $primaryKey = "sc_id";
    use HasFactory;
    protected $fillable=[
      's_id',
      't_id',
      'day',
      'start_time',
      'end_time',
    ];

    public function user(){
      return  $this->belongsTo(User::class);
    }


}
