<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view( 'users.index' , compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $password=$request->get('password');
        $kpassword=$request->get('kpassword');
        if ($password == $kpassword){
        $save_user = new \App\User;
        $save_user->name=$request->get('nama');
        $save_user->email=$request->get('email');
        $save_user->username=$request->get('usname');
        $save_user->password=\Hash::make($request->get( 'password' ));
        $save_user->roles=json_encode($request->get('roles'));
        $save_user->address=$request->get('alamat');
        $save_user->phone=$request->get('telp');
        $save_user->status=$request->get('status');
        $save_user->save();
        }
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users_edit = \App\User::findOrFail($id);
        return view( 'users.edit' , ['user' => $users_edit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $password=$request->get('password');
        $kpassword=$request->get('kpassword');
        $user = \App\User::findOrFail($id);
        if($request->get('ubahpass') == 'ubah'){
        if ($password == $kpassword){
        $user->name=$request->get('nama');
        $user->email=$request->get('email');
        $user->username=$request->get('usname');
        $user->roles=json_encode($request->get('roles'));
        $user->address=$request->get('alamat');
        $user->phone=$request->get('telp');
        $user->status=$request->get('status');
        $user->password=\Hash::make($request->get( 'password' ));
        $user->save();
        }
        }else{
        $user->name=$request->get('nama');
        $user->email=$request->get('email');
        $user->username=$request->get('usname');
        $user->roles=json_encode($request->get('roles'));
        $user->address=$request->get('alamat');
        $user->phone=$request->get('telp');
        $user->status=$request->get('status');
        $user->save();
        }
    return redirect()->route( 'users.index');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = \App\User::findOrFail($id);
        $users->delete();
        return redirect()->route( 'users.index');
    }
}
