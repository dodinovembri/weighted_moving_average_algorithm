<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
        $data['users'] = UserModel::all();
        return view('user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->input('password') != $request->input('password_confirm')) {
            return redirect(url('user/create'))->with('error', 'Your password doesnt match !');
        }else{
            $check = UserModel::where('email', $request->input('email'))->first();
            if (empty($check)) {
                $insert = new UserModel();
                $insert->name = $request->name;        
                $insert->email = $request->email;        
                $insert->password = Hash::make($request->password);                       
                $insert->created_at = date("Y-m-d H:i:s");
                $insert->save();

                return redirect(url('user'))->with('message', 'Success adding new User !');
            }else{
                return redirect(url('user'))->with('error', 'User already exist !');            
            }    
        }
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
        $data['user'] = UserModel::find($id);
        return view('user.edit', $data);
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
        if ($request->input('password') != $request->input('password_confirm')) {
            return redirect(url('user/create'))->with('error', 'Your password doesnt match !');
        }else{
            $update = UserModel::find($id);
            $update->name = $request->name;        
            $update->password = Hash::make($request->password);                       
            $update->created_at = date("Y-m-d H:i:s");
            $update->save();

            return redirect(url('user'))->with('message', 'Success update User !');
             
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $findtodelete = UserModel::find($id);
        $findtodelete->delete();
        return redirect(url('user'))->with('message', 'Success delete User !');
    }
}
