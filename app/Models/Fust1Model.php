<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fust1Model extends Model
{
    use HasFactory;
    public $table = "fusterzekelo1-tabla";
    public $primaryKey = "f1_id";
    public $timestamps = false;
    public $guarded = [];
}
