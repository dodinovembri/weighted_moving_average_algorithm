<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
        
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth()->user()->id;
        $data['profile'] = UserModel::find($user_id);

        return view('profile.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
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
        $update = UserModel::find($id);
        $update->name = $request->post('name');
        $update->update();

        return redirect(url('profile'))->with('message', 'Success update profile!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function password()
    {
        $user_id = Auth()->user()->id;
        $data['profile'] = UserModel::find($user_id);

        return view('profile.password', $data);
    }

    public function update_password(Request $request, $id)
    {
        if ($request->input('password') != $request->input('password_confirm')) {
            return redirect(url('profile/password'))->with('error', 'Your password doesnt match !');
        }else{
            $update = UserModel::find($id);
            $update->password = Hash::make($request->post('password'));
            $update->update(); 

            return redirect(url('profile/password'))->with('message', 'Success update password!');
        }
    }
}
