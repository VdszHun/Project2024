<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fust2Model extends Model
{
    use HasFactory;
    public $table = "fusterzekelo2-tabla";
    public $primaryKey = "f2_id";
    public $timestamps = false;
    public $guarded = [];
}
