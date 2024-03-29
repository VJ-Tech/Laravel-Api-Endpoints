<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoldItem extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function sale(){
        return $this->belongsTo(Sale::class);
    }

    public function merchandise(){
        return $this->belongsTo(Merchandise::class);
    }
}
