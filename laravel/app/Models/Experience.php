<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $primaryKey = "exp_id";
    protected $fillable = [
        'expTitle',
        'expDes',
        'expStart',
        'expEnd',
        't_id',
    ];

    public function Teacher()
    {
        return $this->hasOne(Teacher::class);
    }


}
