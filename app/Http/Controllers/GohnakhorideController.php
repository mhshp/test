<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GohnakhorideController extends Controller
{
    public function show()
    {

// $peoples =['فهیمه', "جواد" , "فاطمه" , "حسین", "مهدی" , "پدر ", "مادر" ];
        DB::insert("insert into gohnakhoride ");
$peoples=DB::select('select * from gohnakhoride ');
        // return view('gohnakhoride',compact("peoples"));
 return $peoples;
    }
}
