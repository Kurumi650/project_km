<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Rit extends Model
{
    use HasFactory; 
    use SoftDeletes;
    protected $table = 'rit_overzicht';

    public function voertuig() {
        return $this->belongsTo(Voertuig::class, 'voertuig_id');
    }
}
