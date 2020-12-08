<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalutacionsController extends Controller
{
    public function index() {
        return "Hola, bon dia, com estàs?";
    }
}
