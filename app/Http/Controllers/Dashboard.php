<?php

namespace HeyZues\Http\Controllers;

use Illuminate\Http\Request;

class Dashboard extends Controller {


    public function index()
    {
        $my_array = ["title"=>"some_title","content"=>"some_content"];
        return view("employes/index", ['name' => 'Samantha']);

    }

}
