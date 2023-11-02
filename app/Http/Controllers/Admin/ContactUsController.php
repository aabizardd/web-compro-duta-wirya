<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\Jasa;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $page = "Pesan Kontak";

        $data = [
            'title_url' => 'Admin PT. Duta Wirya - ' . $page,
            'title_body' => $page,
            'url' => $page,
            'contact_us' => ContactUs::all()
        ];

        return view("layouts.admin.pages.contactus-index", $data);
    }

    public function destroy($id)
    {

        $data = ContactUs::find($id);

        $data->delete();

        return redirect()->back()->with(['success' => 'Data pesan kontak berhasil dihapus!']);
    }
}
