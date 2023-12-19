<?php

namespace App\Http\Controllers;

use App\Models\PurchasedItem;
use Illuminate\Http\Request;

class PurchasedItemController extends Controller
{
    public function index() {

        $purchasedItems = PurchasedItem::orderBy('id', 'asc')->get();

        return response()->json($purchasedItems);
    }

    public function getPurchasedItemsWithPurchasesAndMerchandises($purchasedItemsId){
        $purchasedItemsId = PurchasedItem::with('purchase','merchandise')
            ->where('id', $purchasedItemsId)
            ->get();

        return response()->json($purchasedItemsId);
    }
}
