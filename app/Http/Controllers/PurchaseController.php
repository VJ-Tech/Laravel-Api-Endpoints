<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index() {

        $purchases = Purchase::orderBy('id', 'asc')->get();

        return response()->json($purchases);
    }

    public function getPurchasesWithSupplierUserAndPurchasedItems($purchaseId){
        $purchaseId = Purchase::with('user','supplier','purchased_items')
            ->where('id', $purchaseId)
            ->get();

        return response()->json($purchaseId);
    }
}
