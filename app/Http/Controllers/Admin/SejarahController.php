<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sejarah;
use Illuminate\Http\Request;

class SejarahController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $data = [
            'title_url' => 'Profil Kami - Sejarah',
            'title_body' => 'Sejarah',
            'url' => 'Profil Kami / Sejarah',
            'sejarah_data' => Sejarah::first()
        ];

        return view("layouts.admin.pages.sejarah-index", $data);
    }

    public function update(Request $request)
    {

        $messages = [
            'sejarah.required' => 'Field dibawah ini harus diisi.'
        ];


        $request->validate([
            'sejarah' => 'required'
        ], $messages);

        $data = [
            'sejarah' => $request->sejarah,
        ];

        $count_data = Sejarah::count();

        // dd($sejarah);

        if ($count_data > 0) {
            //update
            // dd('data lebih dari 1');
            Sejarah::where('id', 1)->update($data);
        } else {
            //update
            Sejarah::create($data);
        }



        return redirect()->back()->with(['success' => 'Data sejarah berhasil diubah!']);

        // dd($request->sejarah);
    }
}