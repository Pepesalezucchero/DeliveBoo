<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Restaurant extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    public function dishes(){
        return $this -> hasMany(Dish :: class);
    }

    public function user(){
        return $this -> belongsTo(User :: class);
    }

    public function typologies(){
        return $this -> belongsToMany(Typology :: class);
    }
}
