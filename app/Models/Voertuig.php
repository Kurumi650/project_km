<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voertuig extends Model
{
    use HasFactory;

    protected $table = 'voertuigen';

    protected $dates = ['deleted_at']; 

    // De kolomnaam die je wilt gebruiken voor soft delete
    const DELETED_AT_COLUMN = 'deleted_at'; 

    public function ritten() {
        return $this->hasMany(Rit::class);
    }

    // Overriding the delete method to use a custom soft delete column
    public function delete()
    {
        $this->{self::DELETED_AT_COLUMN} = now();
        $this->save();
    }
}

