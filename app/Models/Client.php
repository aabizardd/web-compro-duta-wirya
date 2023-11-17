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

        $details = Client::join('jasa', 'jasa.id', '=', 'client.id_jasa')
            ->get(['client.pemberi_tugas', 'client.id', 'client.logo_client', 'jasa.nama_jasa']);

        return $details;
    }

    public static function get_client_by_id($id)
    {

        $details = Client::join('jasa', 'jasa.id', '=', 'client.id_jasa')
            ->where('client.id', '=', $id)
            ->get(['client.pemberi_tugas', 'client.id', 'client.logo_client', 'jasa.nama_jasa', 'client.id_jasa']);

        return $details;
    }
}