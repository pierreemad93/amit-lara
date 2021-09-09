<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
        $posts = Post::all();

        return view('admin.posts.all' ,  compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        return view('admin.posts.create');
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
        $data = $request->all();
        $rules = [ 
            'title' => ['required' , 'unique:posts' , 'min:4' , 'max:25'],
            'desc' => ['required'] , 
            'image'  =>['required'  , 'mimes:jpg,bmp,png,jpeg'] ,
            'author' =>[Rule::in(Auth::user()->name)],
        ];
        $validator = Validator::make($data,$rules);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($data);
        }

        $profilePicture =$request->file('image');
        $picName = time()."_".$profilePicture->getClientOriginalName();
        $profilePicture->move('adminpanel\img' , $picName);
        Post::create([
            'title' =>  $request->title , 
            'desc' =>   $request->desc,
            'author' => $request->author , 
            'image'  => $picName ,
            'user_id' => $request->user_id
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
        //
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
}
