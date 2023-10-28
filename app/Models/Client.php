<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table = 'client';
    protected $guarded = [];

    public static function get_client_all()
    {

        $details = Client::join('bidang_client', 'bidang_client.id', '=', 'client.id_bidang_client')
            ->get(['client.pemberi_tugas', 'client.id', 'client.logo_client', 'bidang_client.nama_bidang']);

        return $details;
    }

    public static function get_client_by_id($id)
    {

        $details = Client::join('bidang_client', 'bidang_client.id', '=', 'client.id_bidang_client')
            ->where('client.id', '=', $id)
            ->get(['client.pemberi_tugas', 'client.id', 'client.logo_client', 'bidang_client.nama_bidang', 'client.id_bidang_client']);

        return $details;
    }
}
