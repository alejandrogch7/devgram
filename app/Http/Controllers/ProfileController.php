<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Laravel\Facades\Image;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function store(Request $request)
    {
        // modify the request
        $request->request->add(['username' => Str::slug($request->username)]);

        $this->validate($request, [
            'username' => ['required', 'unique:users,username,' . Auth::user()->id, 'min:3', 'max:30', 'not_in:twitter,facebook,instagram,editar-perfil'],
            'name' => ['required', 'string', 'max:255']
        ]);


        if ($request->image) 
        {
            $image = $request->file('image');

            $nameImage = Str::uuid() . "." . $image->extension();

            $imageServer = Image::read($image);
            $imageServer->cover(1000, 1000);

            $imagePath = public_path('profiles') . "/" . $nameImage;
            $imageServer->save($imagePath);
        }

        if ($request->password || $request->current_password) {
            $this->validate($request, [
                'current_password' => 'required',
                'password' => 'required|confirmed|min:10',
            ]);

            if (Hash::check($request->current_password, Auth::user()->password)) {
                // Update the password
                Auth::user()->password = Hash::make($request->password);
            } else {
                // Return an error if the current password doesn't match
                return back()->with('message', 'The current password is incorrect');
            }
        }

        // Save Changes
        $user = User::find(Auth::user()->id);
        $user->name = $request->name ?? Auth::user()->name;
        $user->username = $request->username ?? Auth::user()->username;
        $user->email = $request->email ?? Auth::user()->email;
        $user->image = $nameImage ?? Auth::user()->image ?? null;
        $user->save();

        // Redirect 
        return redirect()->route('posts.index', $user->username);
    }
}
