<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Triat\ExcelGenerator;
use App\Http\Controllers\Admin\Triat\PDFGenerator;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Providers\SweetAlertServiceProvider;
use Illuminate\Http\UploadedFile ;
use SweetAlert;

class UserController extends Controller
{
    use PDFGenerator , ExcelGenerator;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users = SELECT * FROM users 
        // $users = User::all();
            $users= User::all();
        return view('admin.users.all' , compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::all();
        return view('admin.users.create' , compact('roles'));

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
        $data=$request->all();
        $rules=[
            'name'=>['required', 'string' , 'min:4' , 'max:25'] , 
            'email'=>['required','unique:users' , 'email'] , 
            'password'=> ['required'] , 
            'image'  =>['required'  , 'mimes:jpg,bmp,png,jpeg'] ,
            'role' => ['required'] ,
        ];
        $validator = Validator::make($data,$rules);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($data);
        }

        //store at database 
        //upload image 
        $profilePicture =$request->file('image');
        $picName = time()."_".$profilePicture->getClientOriginalName();
        $profilePicture->move('adminpanel\img' , $picName);
        User::create([
            'name' =>  $request->name , 
            'email' => $request->email ,
            'password'=> Hash::make($request->password) , 
            'image'  => $picName ,
            'role_id' => $request->role
        ]);
        return redirect()->back();
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
        $user = User::findOrFail($id);
        return view('admin.users.show' , compact('user'));
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
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
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
        //
        $data=$request->all();
        $rules=[
            'name'=>['required', 'string' , 'min:4' , 'max:25'] , 
            'email'=>['required','unique:users' , 'email'] , 
            'password'=> ['required']
        ];
        $validator = Validator::make($data,$rules);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($data);
        }
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name ,
            'email' => $request->email
        ]);
        return redirect()->back();
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
        $user= User::findOrFail($id);
        $user->delete();
        return redirect()->back();
    }

}
