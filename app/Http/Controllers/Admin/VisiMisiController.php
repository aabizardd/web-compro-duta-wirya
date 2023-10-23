<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisiMisi;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'title_url' => 'Profil Kami - Visi & Misi',
            'title_body' => 'Visi & Misi',
            'url' => 'Profil Kami / Visi & Misi',
            'visi_misi' => VisiMisi::first()
        ];

        return view("layouts.admin.pages.visimisi-index", $data);
    }

    public function update(Request $request)
    {
        $messages = [
            'visi.required' => 'Field visi ini harus diisi.',
            'misi.required' => 'Field misi ini harus diisi.'
        ];


        $request->validate([
            'visi' => 'required',
            'misi' => 'required'
        ], $messages);

        $data = [
            'visi' => $request->visi,
            'misi' => $request->misi,
        ];

        $count_data = VisiMisi::count();

        // dd($sejarah);

        if ($count_data > 0) {
            //update
            // dd('data lebih dari 1');
            VisiMisi::where('id', 1)->update($data);
        } else {
            //update
            VisiMisi::create($data);
        }



        return redirect()->back()->with(['success' => 'Data visi dan misi berhasil diubah!']);
    }
}