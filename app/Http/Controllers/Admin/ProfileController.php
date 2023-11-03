<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jasa;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // dd(auth()->id());

        $page = "Update Akun";

        $data = [
            'title_url' => 'Admin PT. Duta Wirya - ' . $page,
            'title_body' => $page,
            'url' => $page,
            'admin' => User::find(auth()->id())
        ];

        return view("layouts.admin.pages.profil-index", $data);
    }
}
