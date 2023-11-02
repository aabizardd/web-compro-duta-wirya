<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Jasa;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $page = "Berita";

        $data = [
            'title_url' => 'Admin PT. Duta Wirya - ' . $page,
            'title_body' => $page,
            'url' => $page,
            'berita' => Berita::all()
        ];

        return view("layouts.admin.pages.berita-index", $data);
    }

    public function create(Request $request)
    {

        $page = "Buat Berita";

        $data = [
            'title_url' => 'Admin PT. Duta Wirya - ' . $page,
            'title_body' => $page,
            'url' => 'Berita / ' . $page,
            'berita' => Berita::all()
        ];

        return view("layouts.admin.pages.berita-create", $data);
    }


    public function store(Request $request)
    {

        $data = [
            'judul' => $request->judul_berita,
            'isi' => $request->isi,
            // 'id_bidang_client' => $request->id_bidang_client,
        ];


        if ($request->hasFile('cover')) {

            $file = $request->file('cover');

            $imageName = time() . '.' . $request->cover->extension();
            $request->cover->move(public_path('assets/admin/assets/img/cover_berita'), $imageName);
            $data['cover'] = $imageName;
        }

        Berita::create($data);

        return redirect()->route('berita')->with(['success' => 'Data berita berhasil ditambahkan!']);
    }

    public function destroy($id)
    {
        $data = Berita::find($id);

        if (file_exists(public_path('assets/admin/assets/img/cover_berita/' . $data->cover))) {
            unlink(public_path('assets/admin/assets/img/cover_berita/' . $data->cover));
        }

        $data->delete();

        return redirect()->back()->with(['success' => 'Data berita berhasil dihapus!']);
    }

    public function edit($id)
    {

        $page = "Update Berita";

        $data = [
            'title_url' => 'Admin PT. Duta Wirya - ' . $page,
            'title_body' => $page,
            'url' => 'Berita / ' . $page,
            'berita' => Berita::find($id)
        ];

        return view("layouts.admin.pages.berita-edit", $data);
    }

    public function update(Request $request, $id)
    {

        // $data = Berita::find($id);

        // dd($request->all());

        $kegiatan = Berita::find($id);

        $data = [
            'judul' => $request->judul_berita,
            'isi' => $request->isi,
        ];

        if ($request->hasFile('cover')) {

            $file = $request->file('cover');
            $fileName = $file->getClientOriginalName();

            // dd($fileName);

            if (file_exists(public_path('assets/admin/assets/img/cover_berita/' . $request->cover_old))) {
                unlink(public_path('assets/admin/assets/img/cover_berita/' . $request->cover_old));
            }

            $imageName = time() . '.' . $request->cover->extension();
            $request->cover->move(public_path('assets/admin/assets/img/cover_berita/'), $imageName);
            $data['cover'] = $imageName;
        } else {
            $data['cover'] = $request->cover_old;
        }


        $kegiatan->update($data);
        return redirect()->back()->with(['success' => 'Data kegiatan berhasil diubah!']);
    }
}