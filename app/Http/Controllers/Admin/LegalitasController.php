<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Legalitas;
use App\Models\Sejarah;
use Illuminate\Http\Request;

class LegalitasController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $page = "Legalitas";

        $data = [
            'title_url' => 'Profil Kami - ' . $page,
            'title_body' => $page,
            'url' => 'Profil Kami / ' . $page,
            'legalitas' => Legalitas::first()
        ];

        return view("layouts.admin.pages.legalitas-index", $data);
    }

    public function update(Request $request)
    {

        $messages = [
            'legalitas.required' => 'Field dibawah ini harus diisi.'
        ];


        $request->validate([
            'legalitas' => 'required'
        ], $messages);

        $data = [
            'legalitas' => $request->legalitas,
        ];

        $count_data = Legalitas::count();

        // dd($sejarah);

        if ($count_data > 0) {
            //update
            // dd('data lebih dari 1');
            Legalitas::where('id', 1)->update($data);
        } else {
            //update
            Legalitas::create($data);
        }



        return redirect()->back()->with(['success' => 'Data legalitas berhasil diubah!']);

        // dd($request->sejarah);
    }
}
