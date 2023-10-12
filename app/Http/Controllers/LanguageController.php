<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    //
    public function changeLanguage(string $locale){
        //stocker la langue choisie dans la section de l'utilisation 
        Session::put('local', $locale);
        //rediriger sur la page précédente
        return redirect()->back();
    }
}
