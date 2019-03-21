<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::orderBy('id','ASC')->paginate(9);
        return view('users.index',compact('users'))
        ->with('i', ($request->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // already have register
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit',compact('user'));
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
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users'
        ]);
        $input = $request->all();
        $user = User::find($id);
        $user->update($input);
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'username' => 'required|unique:users',
        //     //'password' => 'required|same:password-confirm'
        // ]);
        // //$input = $request->all();
        // // if(!empty($input['password'])) {
        // //     $input['password'] = Hash::make($input['password']);
        // // } else {
        // //     $input = array_except($input,array('password'));
        // // }
        // $user = User::find($id);
        // $user->name = $request->get('name');
        // $user->email = $request->get('email');
        // $user->username = $request->get('username');
        // $user->save();
        // //$user->update($input);
        return redirect()->route('users.index')->with('success','User Update Successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')->with('success','User Deleted');
    }
}
