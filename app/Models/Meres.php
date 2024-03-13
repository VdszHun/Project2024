<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Meres extends Model
{
    use HasFactory;
    public $table = "meresek";
    public $primaryKey = "m_id";
    public $timestamps = false;
    public $guarded = [];

    public function helyszinek(){

        return $this->hasMany(helyszin::class, 'h_id', 'h_id');
    }

}
