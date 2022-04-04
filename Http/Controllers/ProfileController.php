<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\RegisterController;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use App\Models\User;
use App\Models\Ads;
use App\Models\Categories;
use Symfony\Component\HttpKernel\Profiler\Profile;
use Auth;

class ProfileController extends Controller
{
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
    public function show(Ads $ads, $id)
    {
        return view('profile', compact('ads', $ads->id));
    }

    
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user = auth()->user();
        return view('edit_profile');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, User $user, $id)
    {
       //try{
        $update = $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'nickname' => ['required', 'string', 'max:255', 'unique:users,nickname,' . $id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id], 
            'password' => ['required', 'min:8'],
            'password_confirm' => ['required_with:password', 'same:password'],
            'phone_number' => ['required', 'string', 'min:10', 'max:10', 'unique:users,phone_number,' . $id],
        ]);
        
        
        $user = auth()->user();
        $user->update([
            'name' => $request->name,
            'nickname' => $request->nickname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number
        ]);  
        return view("profile")->withErrors(['Profil modifié !']);
    /*}catch(\Illuminate\Database\QueryException $ex){ 
            echo 'Nickname, email or phone number must be unique ! Please retry';
            return view('edit_profile');
        }*/
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


/*crud admin */
public function adminusers()
    {     
            $users = user::all();
            return view('admin.users', compact('users'));
        
    }
public function adminShow(User $users, $id)
    {
        $users = User::find($id);
        return view('admin.show_profile', compact('users', $users->id));
    }


public function adminEdit(User $user, $id)
    {
        $users = User::find($id);
        return view('admin.edit_profile', compact('users', $users->id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function adminUpdate(Request $request, User $users, $id)
    {
       //try{
        

        $update = $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'nickname' => ['required', 'string', 'max:255', 'unique:users,nickname,' . $id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id], 
            'password' => ['required', 'min:8'],
            'password_confirm' => ['required_with:password', 'same:password'],
            'phone_number' => ['required', 'string', 'min:10', 'max:10', 'unique:users,phone_number,' . $id],
            'is_admin' => ['nullable', 'boolean']
        ]);
        $users = User::find($id);
        $users->update([
            'name' => $request->name,
            'nickname' => $request->nickname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
            'is_admin' => $request->is_admin
        ]);  
     
        return redirect('admin/users')->withErrors(['User modifié !']);
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function adminDestroy($id)
    {
        
        $users = User::find($id);
        $ads = Ads::where('user_id','=', $id);
        
        $users->delete();
        $ads->delete();
        return redirect('admin/users')->withErrors(['User et annonces supprimés !']);
    }
}




