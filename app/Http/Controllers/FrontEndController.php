<?php

namespace App\Http\Controllers;

use App\Mail\SampleMail;
use App\Models\Berita;
use App\Models\BidangClient;
use App\Models\Client;
use App\Models\ContactUs;
use App\Models\Jasa;
use App\Models\KantorCabang;
use App\Models\Kegiatan;
use App\Models\Legalitas;
use App\Models\Sejarah;
use App\Models\VisiMisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = [
            'kegiatan' => Kegiatan::all(),
            'sejarah' => Sejarah::first(),
            'jasa' => Jasa::take(3)->get(),
            'client' => Client::all(),
            'berita' => Berita::take(3)->get(),
        ];

        // dd(DB::table('kegiatan')->select('*')->get());

        return view('layouts.frontend.home.index', $data);
    }

    public function sejarah()
    {

        $data = [

            'sejarah' => Sejarah::first(),
            // 'visi_misi' => VisiMisi::first(),
            // 'legalitas' => Legalitas::first(),
            // 'cabang' => KantorCabang::all(),


        ];

        // dd(DB::table('kegiatan')->select('*')->get());

        return view('layouts.frontend.profil_kami.sejarah', $data);
    }

    public function visi_misi()
    {

        $data = [

            // 'sejarah' => Sejarah::first(),
            'visi_misi' => VisiMisi::first(),
            // 'legalitas' => Legalitas::first(),
            // 'cabang' => KantorCabang::all(),


        ];

        // dd(DB::table('kegiatan')->select('*')->get());

        return view('layouts.frontend.profil_kami.visi-misi', $data);
    }

    public function kantor_cabang()
    {

        $data = [

            // 'sejarah' => Sejarah::first(),
            // 'visi_misi' => VisiMisi::first(),
            // 'legalitas' => Legalitas::first(),
            'cabang' => KantorCabang::all(),


        ];

        // dd(DB::table('kegiatan')->select('*')->get());

        return view('layouts.frontend.profil_kami.cabang', $data);
    }

    public function legalitas()
    {

        $data = [

            // 'sejarah' => Sejarah::first(),
            // 'visi_misi' => VisiMisi::first(),
            'legalitas' => Legalitas::first(),
            // 'cabang' => KantorCabang::all(),


        ];

        // dd(DB::table('kegiatan')->select('*')->get());

        return view('layouts.frontend.profil_kami.legalitas', $data);
    }


    public function jasa()
    {

        // $jasa_one

        if (!isset($_GET['id'])) {

            $jasa_one = Jasa::find(1);
        } else {
            $jasa_one = Jasa::find($_GET['id']);
        }


        $data = [
            'jasa' => Jasa::all(),
            'jasa_one' => $jasa_one
        ];

        // dd(DB::table('kegiatan')->select('*')->get());

        return view('layouts.frontend.jasa.index', $data);
    }

    public function klien()
    {

        $data = [

            'bidang_klien' => Jasa::all(),
        ];

        // dd(DB::table('kegiatan')->select('*')->get());

        return view('layouts.frontend.klien.index', $data);
    }

    public function berita()
    {

        $data = [
            'sejarah' => Sejarah::first(),
            'bidang_klien' => BidangClient::all(),
            'berita' => Berita::all(),
        ];

        // dd(DB::table('kegiatan')->select('*')->get());

        return view('layouts.frontend.berita.index', $data);
    }

    public function berita_detail($id)
    {

        $data = [
            'detail_berita' => Berita::find($id)
        ];

        // dd(DB::table('kegiatan')->select('*')->get());

        return view('layouts.frontend.berita.detail', $data);
    }

    public function kontak()
    {

        $data = [
            'sejarah' => Sejarah::first(),
            'bidang_klien' => BidangClient::all(),
            'berita' => Berita::all(),
        ];

        // dd(DB::table('kegiatan')->select('*')->get());

        return view('layouts.frontend.kontak.index', $data);
    }

    public function send_email(Request $request)
    {


        $data =  [
            'message' => $request->message,
            'mail_from' => $request->from_mail,
            'nama_pengirim' => $request->nama_pengirim
        ];

        $data_db = [
            'nama' => $request->nama_pengirim,
            'email' => $request->from_mail,
            'no_telepon' => $request->no_telepon,
            'isi_pesan' => $request->message,
        ];

        ContactUs::create($data_db);

        Mail::to('m.abizard1123@gmail.com')->send(
            new SampleMail($data)
        );

        // dd('Mail send successfully.');

        return redirect()->back()->with(['success' => 'Pesan anda berhasil dikirim!']);
    }
}