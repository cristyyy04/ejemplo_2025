<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class PagesController extends Controller
{
    public function home(){
        return view('home');
    }
    public function contact(){
        return view('contactos');  
    }
    public function saludos($nombre="Invitado"){
        $html="<h2>contenido en html</h2>";
$script="<script>alert('problema')</script>";
$consolas=["Play Station 4",
"Xbox ONe",
"Wii U"
];
        return view('saludos', compact('nombre','html','script','consolas'));
    }
   /*    public function salones_disponibles($zona="ituzaingo"){
        return view('salones_disponibles',compact('zona'));
    }*/
}
