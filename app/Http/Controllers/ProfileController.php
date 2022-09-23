<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $profile = Profile::where('user_id', $user->id)->first();
        return view('frontend.profile.index', compact('user', 'profile'));
    }

    public function create(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $user_id = $user->id;

        $request->file('image')->move('images/profile', $request->file('image')->getClientOriginalName());

        $profile = Profile::create([
            'phone' => $request->phone,
            'address' => $request->address,
            'image' => $request->file('image')->getClientOriginalName(),
            'user_id' => $user_id
        ]);

        Alert::success('Berhasil', 'Profile berhasil dibuat');

        return redirect('profile');
    }

    public function update(Request $request, $id)
    {
        $profile = Profile::find($id);
        $profile->update($request->all());

        if ($request->hasFile('image')) {
            $request->file('image')->move('images/profile', $request->file('image')->getClientOriginalName());
            $profile->image = $request->file('image')->getClientOriginalName();
            $profile->save();
        }

        Alert::success('Berhasil', 'Profile berhasil diupdate');

        return redirect('profile');
    }
}
