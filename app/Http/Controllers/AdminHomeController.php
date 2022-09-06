<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cast;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AdminHomeController extends Controller
{
    public function showMember(){

       $showMember = User::join('casts','users.cast_id','=','casts.id')->where('role',2)->select('casts.*','users.*')->get();
        return view('admin.member.index',compact('showMember'));
    }

    public function addMemberView()
    {
        $data['casts']=Cast::get();
        return view('admin.member.add',$data); 
    }

    public function addmemberstore(Request $request)
    {
        $validatedData = $request->validate([
            'memberName' => 'required',
            'email' => 'required|unique:users|max:255',
            'password' => 'min:8',
            'password_confirmation' => 'required_with:password|same:password|min:8',
            'cast_id' => 'required',
            'image.*' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',

        ]);

        $storeMember = new User();
        $storeMember->name = strtoupper($request->memberName);
        $storeMember->email = $request->email;
        $storeMember->password = Hash::make($request->password);
        $storeMember->cast_id = $request->cast_id;
        $storeMember->image = 'avtar.jpg';
        $storeMember->role = 2;
        $storeMember->save();
        return redirect()->route('admin.showMember')->with('success', 'Member Create Successfully.....');
    }

    public function editMemberView($id){
        $editMemberView = User::find($id);
        $castDatas = Cast::get();
        return view('admin.member.edit',compact('editMemberView','castDatas'));
    }

    public function memberUpdate(Request $request){
        $updateMember = User::find($request->id);
        $updateMember->name = strtoupper($request->memberName);
        $updateMember->email = $request->email;
        $updateMember->cast_id = $request->cast_id;

        if($request->password != ''){
         $updateMember->password = Hash::make($request->password);
        }

        $updateMember->cast_id = $request->cast_id;
        $updateMember->update();
        return redirect()->route('admin.showMember')->with('success', 'Member Update Successfully.....');
    }

    public function memberDelete($id){
        $memberDelete = User::find($id)->delete();
        return redirect()->route('admin.showMember')->with('delete', 'Member Delete Successfully.....');

    }
   
}
