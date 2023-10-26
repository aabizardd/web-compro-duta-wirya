<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BidangClient;
use App\Models\Jasa;
use Illuminate\Http\Request;

class BidangClientController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $page = "Daftar Bidang Client";

        $data = [
            'title_url' => 'Admin PT. Duta Wirya - ' . $page,
            'title_body' => $page,
            'url' => 'Client / ' . $page,
            'bidang' => BidangClient::all()
        ];

        return view("layouts.admin.pages.bidangclient-index", $data);
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $data = $request->all();

        BidangClient::create($data);

        return redirect()->back()->with(['success' => 'Data bidang client berhasil ditambahkan!']);
    }

    public function destroy($id)
    {
        BidangClient::where('id', $id)->delete();

        return redirect()->back()->with(['success' => 'Data bidang client berhasil dihapus!']);
    }

    public function update(Request $request, $id)
    {
        $data = [
            'nama_bidang' => $request->nama_bidang,
        ];

        BidangClient::where('id', $id)->update($data);
        return redirect()->back()->with(['success' => 'Data bidang client berhasil diubah!']);
    }
}
