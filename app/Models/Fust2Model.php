<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fust2Model extends Model
{
    use HasFactory;
    public $table = "helyszinek";
    public $primaryKey = "h_id";
    public $timestamps = false;
    public $guarded = [];

}
