<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $model = User::get();
        return view('home', compact('model'));
    }

    public function create(){
        return view('create');
    }

    public function store(Request $req){
        $model = $req->all();
        $model['password'] = Hash::make($req->password);
        User::create($model);
        return redirect()->route('home');
    }

    public function edit($id){
        $model = User::find($id);
        return view('edit', compact('model'));
    }

    public function update($id, Request $req){
        $user = User::find($id);
        $model = $req->all();
        $model['password'] = Hash::make($req->password);
        $user->update($model);
        return redirect()->route('home');
    }

    public function destroy($id){
        $model = User::find($id);
        $model->delete();
        return back();
    }
}
