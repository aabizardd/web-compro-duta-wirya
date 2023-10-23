<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
