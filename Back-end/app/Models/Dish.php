<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dish extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    public function restaurant(){
        return $this->belongsTo(Restaurant::class)->withTrashed();
    }

    public function orders(){
        return $this -> belongsToMany(Order :: class);
    }
}
