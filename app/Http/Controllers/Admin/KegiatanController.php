<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jasa;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $page = "Foto Kegiatan";

        $data = [
            'title_url' => 'Admin PT. Duta Wirya - ' . $page,
            'title_body' => $page,
            'url' => $page,
            'kegiatan' => Kegiatan::all()
        ];

        return view("layouts.admin.pages.kegiatan-index", $data);
    }

    public function store(Request $request)
    {


        $data = [
            'nama_kegiatan' => $request->nama_kegiatan,
            // 'id_bidang_client' => $request->id_bidang_client,
        ];


        if ($request->hasFile('foto_kegiatan')) {

            $file = $request->file('foto_kegiatan');

            $imageName = time() . '.' . $request->foto_kegiatan->extension();
            $request->foto_kegiatan->move(public_path('assets/admin/assets/img/foto_kegiatan'), $imageName);
            $data['foto_kegiatan'] = $imageName;
        }

        Kegiatan::create($data);

        return redirect()->back()->with(['success' => 'Data kegiatan berhasil ditambahkan!']);
    }

    public function destroy($id)
    {

        $data = Kegiatan::find($id);

        if (file_exists(public_path('assets/admin/assets/img/foto_kegiatan/' . $data->foto_kegiatan))) {
            unlink(public_path('assets/admin/assets/img/foto_kegiatan/' . $data->foto_kegiatan));
        }

        $data->delete();

        return redirect()->back()->with(['success' => 'Data klien berhasil dihapus!']);
    }


    public function get_kegiatan($id)
    {
        $kegiatan = Kegiatan::find($id);

        if (!$kegiatan) {
            return response()->json(['message' => 'Kegiatan not found'], 404);
        }

        return response()->json(['kegiatan' => $kegiatan], 200);
    }


    public function update(Request $request, $id)
    {

        // dd($request->logo_client);

        $kegiatan = Kegiatan::find($id);

        $data = [
            'nama_kegiatan' => $request->nama_kegiatan,
            // 'id_bidang_client' => $request->id_bidang_client,
        ];

        if ($request->hasFile('foto_kegiatan')) {

            $file = $request->file('foto_kegiatan');
            $fileName = $file->getClientOriginalName();

            // dd($fileName);

            if (file_exists(public_path('assets/admin/assets/img/foto_kegiatan/' . $request->old_foto_kegiatan))) {
                unlink(public_path('assets/admin/assets/img/foto_kegiatan/' . $request->old_foto_kegiatan));
            }

            $imageName = time() . '.' . $request->foto_kegiatan->extension();
            $request->foto_kegiatan->move(public_path('assets/admin/assets/img/foto_kegiatan/'), $imageName);
            $data['foto_kegiatan'] = $imageName;
        } else {
            $data['foto_kegiatan'] = $request->old_foto_kegiatan;
        }


        $kegiatan->update($data);
        return redirect()->back()->with(['success' => 'Data kegiatan berhasil diubah!']);
    }
}