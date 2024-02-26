<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meres extends Model
{
    use HasFactory;
    public $table = "meresek";
    public $primaryKey = "m_id";
    public $timestamps = false;
    public $guarded = [];
}
