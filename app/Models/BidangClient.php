<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BidangClient extends Model
{
    use HasFactory;

    protected $table = "bidang_client";
    protected $guarded = [];
}
