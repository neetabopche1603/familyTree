<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cast;

class CastController extends Controller
{
   
public function cast(){
    $casts = Cast::get();
    return view('admin.cast.index',compact('casts'));

}
    public function addCastView(){
        return view('admin.cast.add');
    }


    public function addcast(Request $request)
    {
        
        $cast=new Cast();
        $cast->cast_name = strtoupper($request->cast_name);
        $cast->save();
        return redirect()->route('admin.showAllCast')->with('success', 'Store Create Successfully.....');
    }

    public function editCastView($id)
    {
        $editCastView = Cast::find($id);
        return view('admin.cast.edit', compact('editCastView'));
    }
    public function castUpdate(Request $request)
    {
        $castUpdate =  Cast::find($request->id);
        $castUpdate->cast_name = strtoupper($request->cast_name);
        $castUpdate->update();
        return redirect()->route('admin.showAllCast')->with('success', 'Store Update Successfully.....');
        
}

public function deletecast($id){
    $deletecast = Cast::find($id)->delete();
    return redirect()->route('admin.showAllCast')->with('success', 'Store Delete Successfully.....');

}

}