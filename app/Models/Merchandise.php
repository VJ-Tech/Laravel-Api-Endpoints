<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchandise extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function sold_items() {
        return $this->hasMany(SoldItem::class);
    }

    public function purchased_items() {
        return $this->hasMany(PurchasedItem::class);
    }
}
