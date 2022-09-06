<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FamilyController extends Controller
{
    public function addFamilyView(){
        return view('member.family.add');
    }
}
