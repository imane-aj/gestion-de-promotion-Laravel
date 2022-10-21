<?php

namespace App\Models;

use App\Models\Promotion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory ,SoftDeletes;
    protected $table = 'students';
    protected $fillable = [
        'name', 'lastName', 'email', 'promoToken'
    ];

    public function promotions(){
        $this->belongsTo(Promotion::class);
    }
}
