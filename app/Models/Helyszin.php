<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Helyszin extends Model
{
    use HasFactory;
    public $table = "helyszinek";
    public $primaryKey = "h_id";
    public $timestamps = false;
    public $guarded = [];

    public function meresek(){

        return $this->hasMany(Meres::class, 'h_id', 'h_id');
    }
}
