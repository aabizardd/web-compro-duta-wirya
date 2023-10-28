<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BidangClient;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $page = "Daftar Client";

        $data = [
            'title_url' => 'Admin PT. Duta Wirya - ' . $page,
            'title_body' => $page,
            'url' => 'Client / ' . $page,
            'client' => Client::get_client_all(),
            'bidang_client' => BidangClient::all(),
        ];

        return view("layouts.admin.pages.client-index", $data);
    }


    public function store(Request $request)
    {


        $data = [
            'pemberi_tugas' => $request->pemberi_tugas,
            'id_bidang_client' => $request->id_bidang_client,
        ];


        if ($request->hasFile('logo_client')) {

            $file = $request->file('logo_client');

            $imageName = time() . '.' . $request->logo_client->extension();
            $request->logo_client->move(public_path('assets/admin/assets/img/logo_client'), $imageName);
            $data['logo_client'] = $imageName;
        }

        Client::create($data);

        return redirect()->back()->with(['success' => 'Data klien berhasil ditambahkan!']);
    }

    public function destroy($id)
    {
        Client::where('id', $id)->delete();

        return redirect()->back()->with(['success' => 'Data klien berhasil dihapus!']);
    }

    public function get_client_by_id($id)
    {
        $client = Client::get_client_by_id($id);

        if (!$client) {
            return response()->json(['message' => 'Client not found'], 404);
        }

        return response()->json(['client' => $client], 200);
    }

    public function update(Request $request, $id)
    {

        // dd($request->logo_client);

        $client = Client::find($id);

        $data = [
            'pemberi_tugas' => $request->pemberi_tugas,
            'id_bidang_client' => $request->id_bidang_client,
        ];

        if ($request->hasFile('logo_client')) {

            $file = $request->file('logo_client');
            $fileName = $file->getClientOriginalName();

            // dd($fileName);

            if (file_exists(public_path('assets/admin/assets/img/logo_client/' . $request->old_logo_client))) {
                unlink(public_path('assets/admin/assets/img/logo_client/' . $request->old_logo_client));
            }

            $imageName = time() . '.' . $request->logo_client->extension();
            $request->logo_client->move(public_path('assets/admin/assets/img/logo_client'), $imageName);
            $data['logo_client'] = $imageName;
        } else {
            $data['logo_client'] = $request->old_logo_client;
        }


        $client->update($data);
        return redirect()->back()->with(['success' => 'Data klien berhasil diubah!']);
    }
}
