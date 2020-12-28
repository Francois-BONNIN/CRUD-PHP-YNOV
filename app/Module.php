<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    public function student(){
        return $this -> belongsToMany(Student::class);
    }

    public function promotion(){
        return $this -> belongsToMany(Promotion::class);
    }
}
