<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\str;
use Session;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate(5);
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.user.addUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'slug' => str::slug($request->name, '-'.rand(1, 200)),
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'userRole' => $request->userRole,
            'description' => ucfirst($request->description),
           ]);

           if($request->hasFile('image')){
            $image = $request->image;
            $newImgName = time().'-'.$image->getClientOriginalName();
            $image->move('storage/user/',$newImgName);
            $user->image = $newImgName;
            $user->save();
        }

        session::flash('success', 'User Created Successfully');
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
    public function edit(user $user)
    {
        
        return view('admin.user.edit', compact(['user']));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'sometimes|nullable|min:8',
        ]);

            $user->name = $request->name;
            $user->slug = str::slug($request->name, '-'.rand(1, 200));
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->userRole = $request->userRole;
            $user->description = ucfirst($request->description);
           

           if($request->hasFile('image')){
            $image = $request->image;
            $newImgName = time().'-'.$image->getClientOriginalName();
            $image->move('storage/user/',$newImgName);
            $user->image = $newImgName;
            $user->save();
        }
        $user->save();

        session::flash('success', 'User Updated Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    public function delete($id){ 
        $delId = User::find($id);
        
        $delId->delete();
        return ['success' => true, 'message'=>'Delete successfully'];
        }


        public function profile(){ 
            $user = auth()->user();
            return view('admin.user.profile', compact('user'));
            }
        
        public function profileupdate(){ 
            $user = auth()->user();
            return view('admin.user.updateProfile', compact('user'));
            }
        
   
        
}