<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;



class Role extends Model
{
    public function permissions(){
        return $this->belongsToMany('App\Models\Admin\Permission');
    }

    public function admins(){
        return $this->belongsToMany('App\Models\Admin\Admin');
    }

}
