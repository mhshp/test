<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GohnakhoreController extends Controller
{
    public function index($id)
    {
return view('pages.gohnakhore',compact('id'));
    }
}
