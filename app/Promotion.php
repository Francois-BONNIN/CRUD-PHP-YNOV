<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    public function student(){
        return $this -> hasMany(Student::class);
    }

    public function module(){
        return $this -> belongsToMany(Module::class);
    }
}
