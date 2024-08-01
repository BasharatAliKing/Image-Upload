<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();
        return view('showImage', compact('users'));
        // return $users;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('newImage');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $file = $request->file('photo');
        $request->validate([
            'photo' => 'required|mimes:png,jpg,'
        ]);
        // dd($file);
        $path = $request->file('photo')->store('image', 'public');
        User::create([
            'file_upload' => $path,
        ]);
        return redirect()->route('user.index')->with("status", 'Image Upload Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('editImage', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        if ($request->hasFile('photo')) {
            
            // remove Prev Image
            $image_path = public_path("storage/") . $user->file_upload;

            if (file_exists($image_path)) {
                @unlink($image_path);
            }
            $path = $request->photo->store('image', 'public');
            $user->file_upload = $path;
            $user->save();
            return redirect()->route('user.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user=User::find($id);
        $user->delete();

        $image_path=public_path('storage/') . $user->file_upload;
        
        if(file_exists($image_path)){
             @unlink($image_path);
        }
        return redirect()->route('user.index');
    }
}