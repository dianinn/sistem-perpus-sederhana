<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use App\User;

class AdminController extends Controller
{

    protected $admin = 'dianindria20@gmail.com';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.admins.index', [
            'users' => $users,
            'admin' => $this->admin
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $dataAdmin = $request->all();
        $dataAdmin['password'] = bcrypt($request->password);

        dd($dataAdmin);

        User::create($dataAdmin);

        return redirect()->route('admin.index')->with('status', 'Admin baru berhasil ditambahkan!');
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
    public function edit(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ($request->user()->email !== $this->admin) {
            if ($request->user()->id === $user->id) {
                return view('admin.admins.edit', compact('user'));
            }  
            return 'No acceess';
        } 
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
        $this->validate(request(), [
            'name' => 'required',
            'email' => Rule::unique('users')->ignore($id),
        ]);

        if ($request->user()->email !== $this->admin) {
            if ($request->user()->id === User::findOrFail($id)->id) {
                $dataUser = $request->only(['name', 'email']);

                if ($request->password) {
                    $dataUser['password'] = $request->password;
                }
        
                User::findOrFail($id)->update($dataUser);
        
                return redirect()->route('admin.index')->with('status', 'Data Admin berhasil diperbaharui!');
            }
            return 'No acceess';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->user()->email !== $this->admin) {
            return 'No acceess';
        }

        User::findOrFail($id)->delete();
        return redirect()->route('admin.index')->with('status', 'Data Admin berhasil dihapus!');
    }
}
