<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class AdminUsersController extends Controller
{
    public function index(){
        $users = User::all();
        return view('adminDashboard.users.index',[
            'users'=>$users,
        ]);
    }
    public function create(){
        
        return view('adminDashboard.users.create');
    }
    public function store(Request $request){
        $request->validate([
            'firstName'=>'required|max:250',
            'lastName'=>'required|max:250',
            'course'=>'required|max:250',
            'email'=>'required|max:250|email',
            'password'=>'required|min:8',
        ]);
        if (!Role::all()->contains('name',$request->role)){
            Role::create(['name'=>$request->role]);
        }
        $user = User::create(
            [
            'name'=> $request->firstName." " .$request->lastName,
            'firstName'=>$request->firstName,
            'lastName'=>$request->lastName,
            'course'=>$request->course,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            ]
        );
        $user->assignRole($request->role);

        return redirect()->route('admin.users')->with('success',"The user was added!");
        

    }
    public function destroy(User $user){
        $user->delete();
        return back()->with('success',"The user was deleted!");
    }
    public function edit(User $user){
        return view('adminDashboard.users.edit',
        [
            'user'=>$user
        ]);
    }
    public function update(User $user,Request $request){
        $request->validate([
            'firstName'=>'required|max:250',
            'lastName'=>'required|max:250',
            'course'=>'required|max:250',
            'email'=>'required|max:250|email',
        ]);
        if (!Role::all()->contains('name',$request->role)){
            Role::create(['name'=>$request->role]);
        }
        $user->update([
            'name'=> $request->firstName." " .$request->lastName,
            'firstName'=>$request->firstName,
            'lastName'=>$request->lastName,
            'course'=>$request->course,
            'email'=>$request->email,
        ]);
        $user->roles()->detach();
        $user->assignRole($request->role);

        return redirect()->route('admin.users')->with('success',"The user was updated!");
        

    }
}
