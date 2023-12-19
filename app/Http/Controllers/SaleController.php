<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index() {

        $sales = Sale::orderBy('id', 'asc')->get();

        return response()->json($sales);
    }

    public function getSalesWithCustomerUserAndSoldItems($saleId){
        $saleId = Sale::with('user','customer','sold_items')
            ->where('id', $saleId)
            ->get();

        return response()->json($saleId);
    }
}
