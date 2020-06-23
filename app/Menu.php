<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    public function submenus(){
        return $this->hasMany('App/Menu','menus_id');
    }

    public function allFuncation(){
        $posts = Menu::all();
        echo "<pre>";
        print_r($posts);
        echo "</pre>";
    }
}
