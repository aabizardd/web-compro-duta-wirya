<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jasa;
use App\Models\KantorCabang;
use Illuminate\Http\Request;

class JasaController extends Controller
{

    public function index()
    {

        $page = "Jasa";

        $data = [
            'title_url' => 'Admin PT. Duta Wirya - ' . $page,
            'title_body' => $page,
            'url' => $page,
            'jasa' => Jasa::all()
        ];

        return view("layouts.admin.pages.jasa-index", $data);
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $data = $request->all();

        Jasa::create($data);

        return redirect()->back()->with(['success' => 'Data jasa berhasil ditambahkan!']);
    }

    public function destroy($id)
    {
        Jasa::where('id', $id)->delete();

        return redirect()->back()->with(['success' => 'Data jasa berhasil dihapus!']);
    }

    public function update(Request $request, $id)
    {
        $data = [
            'nama_jasa' => $request->nama_jasa,
        ];

        Jasa::where('id', $id)->update($data);
        return redirect()->back()->with(['success' => 'Data jasa berhasil diubah!']);
    }
}
