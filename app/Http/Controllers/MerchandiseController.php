<?php

namespace App\Http\Controllers;

use App\Models\Merchandise;
use Illuminate\Http\Request;

class MerchandiseController extends Controller
{
    public function index() {

        $merchandises = Merchandise::orderBy('brand', 'asc')->get();

        return response()->json($merchandises);
    }

    public function getMerchandisesWithSoldItemsAndPurchasedItems($merchandiseId){
        $merchandiseId = Merchandise::with('sold_items','purchased_items')
            ->where('id', $merchandiseId)
            ->get();

        return response()->json($merchandiseId);
    }
}
