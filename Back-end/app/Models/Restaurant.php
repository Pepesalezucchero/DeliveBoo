<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    public function dishes(){
        return $this -> hasMany(Dish :: class);
    }

    public function user(){
        return $this -> belongsTo(User :: class);
    }

    public function typologies(){
        return $this -> hasMany(Typology :: class);
    }

    public function orders(){
        return $this -> hasMany(Order :: class);
    }
}
