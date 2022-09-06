<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberProfileController extends Controller
{
    public function memberProfileView(){
        return view('member.updateProfile');
    }
}
