<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KantorCabang;
use App\Models\VisiMisi;
use Illuminate\Http\Request;

class KantorCabangController extends Controller
{
    //

    public function index()
    {

        $data = [
            'title_url' => 'Profil Kami - Kantor Cabang',
            'title_body' => 'Kantor Cabang',
            'url' => 'Profil Kami / Kantor Cabang',
            'cabang' => KantorCabang::all()
        ];

        return view("layouts.admin.pages.kantorcabang-index", $data);
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $data = $request->all();

        KantorCabang::create($data);

        return redirect()->back()->with(['success' => 'Data kantor cabang berhasil ditambahkan!']);
    }

    public function destroy($id)
    {
        KantorCabang::where('id', $id)->delete();

        return redirect()->back()->with(['success' => 'Data kantor cabang berhasil dihapus!']);
    }

    public function update(Request $request, $id)
    {

        // dd($id);

        $data = [
            'nama_kantor' => $request->nama_kantor,
            'pemimpin_cabang' => $request->pemimpin_cabang,
            'alamat_cabang' => $request->alamat_cabang,
        ];

        // dd($data);
        KantorCabang::where('id', $id)->update($data);
        return redirect()->back()->with(['success' => 'Data kantor cabang berhasil diubah!']);
    }
}