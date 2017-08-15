<?php

namespace HeyZues\Http\Controllers;

use Illuminate\Http\Request;

class Dashboard extends Controller {


    public function index()
    {
        $my_array = ["title"=>"some_title","content"=>"some_content"];
        return view("examples/home", ['saludo' => 'From Laravel Controller']);

    }

    public function toggle()
    {
        $my_array = ["title"=>"some_title","content"=>"some_content"];
        return view("examples/toggle", ['saludo' => 'From Laravel Controller']);

    } 

    public function tabs()
    {
        $my_array = ["title"=>"some_title","content"=>"some_content"];
        return view("examples/tabs", ['saludo' => 'From Laravel Controller']);

    } 

    public function forms()
    {
        $my_array = ["title"=>"some_title","content"=>"some_content"];
        return view("examples/forms", ['saludo' => 'From Laravel Controller']);

    }

    public function accordion()
    {
        $my_array = ["title"=>"some_title","content"=>"some_content"];
        return view("examples/accordion", ['saludo' => 'From Laravel Controller']);

    }        

    public function touch()
    {
        $my_array = ["title"=>"some_title","content"=>"some_content"];
        return view("examples/touch", ['saludo' => 'From Laravel Controller']);

    } 

    public function drag()
    {
        $my_array = ["title"=>"some_title","content"=>"some_content"];
        return view("examples/drag", ['saludo' => 'From Laravel Controller']);

    }

    public function overlay()
    {
        $my_array = ["title"=>"some_title","content"=>"some_content"];
        return view("examples/overlay", ['saludo' => 'From Laravel Controller']);

    }

      

}
