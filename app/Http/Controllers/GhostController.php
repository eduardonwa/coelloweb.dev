<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GhostController extends Controller
{
    public function index() {
        return view('ghost.index');
    }
}
