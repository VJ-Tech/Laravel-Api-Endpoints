<?php

namespace App\Http\Controllers;

use App\Models\SoldItem;
use Illuminate\Http\Request;

class SoldItemController extends Controller
{
    public function index() {

        $soldItems = SoldItem::orderBy('id', 'asc')->get();

        return response()->json($soldItems);
    }

    public function getSoldItemsWithSalesAndMerchandises($soldItemsId){
        $soldItemsId = SoldItem::with('sale','merchandise')
            ->where('id', $soldItemsId)
            ->get();

        return response()->json($soldItemsId);
    }
}
