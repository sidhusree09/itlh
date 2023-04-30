<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{

    public function index()
    {
        return 'index';
    }
    public function show()
    {
        $user = auth()->user();
        return view('profiles.show', compact('user'));
    }

    public function edit()
    {
        $user = auth()->user();
        return view('profiles.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.auth()->user()->id,
            /*'email' => [
                            'nullable',
                            'email','max:255',
                            Rule::unique('users')->ignore($user->id),
                        ],*/
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user = User::find(auth()->user()->id)->first();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        
        $filename = '';
        if ($request->hasFile('avatar')) {             
            // Get the uploaded file and generate a unique filename
            $image = $request->file('avatar');
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();            
            // Move the uploaded file to a directory
            $image->move(public_path('uploads'), $filename);
         }    
        
        $profile = Profile::where('user_id',$user->id)->first();
        if($profile == null)
           $profile = new Profile; 
        $profile->bio = $request->bio;
        $profile->avatar = $filename;
        $profile->phone_number = $request->phone_number;
        $profile->location = $request->location;
        $profile->user_id = auth()->user()->id;
        $profile->save();

        if ($request->filled('password')) {
            $user->password = bcrypt($validatedData['password']);
        }

        $user->save();

        return redirect()->route('profile.show', $user->id)->with('success', 'Profile updated successfully');
    }
}
