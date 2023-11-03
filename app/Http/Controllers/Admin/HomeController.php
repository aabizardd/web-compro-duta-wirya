<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $data = [
            'title_url' => 'Dashboard',
            'title_body' => 'Dashboard',
            'url' => 'Dashboard',
            // 'sejarah_data' => Sejarah::first()
        ];

        return view('layouts.admin.pages.home', $data);
    }


    public function update(Request $request)
    {

        $admin = User::find(auth()->id());

        // dd($admin->name);

        $admin->password = Hash::make($request->input('password'));

        // Save the updated user record
        $admin->save();

        // Redirect or respond as needed, e.g., back to the profile page with a success message
        return redirect()->route('profile')->with('success', 'Password updated successfully');
    }
}