<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BidangClient;
use App\Models\Jasa;
use App\Models\KantorCabang;
use Illuminate\Http\Request;

class JasaController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $page = "Jasa";

        $data = [
            'title_url' => 'Admin PT. Duta Wirya - ' . $page,
            'title_body' => $page,
            'url' => $page,
            'jasa' => Jasa::all(),
            'client_bidang' => BidangClient::all(),
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
            'detail_jasa' => $request->detail_jasa,
            'keterangan_jasa' => $request->keterangan_jasa,
        ];

        Jasa::where('id', $id)->update($data);
        return redirect()->back()->with(['success' => 'Data jasa berhasil diubah!']);
    }


    public function get_jasa($id)
    {

        $jasa = Jasa::find($id);

        if (!$jasa) {
            return response()->json(['message' => 'Jasa not found'], 404);
        }

        return response()->json(['jasa' => $jasa], 200);
    }
}