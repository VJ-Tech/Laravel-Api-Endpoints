<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index() {

        $suppliers = Supplier::orderBy('company_name', 'asc')->get();

        return response()->json($suppliers);
    }

    public function getSupplierWithPurchases($supplierId){
        $supplierId = Supplier::with('purchases')
            ->where('id', $supplierId)
            ->get();

        return response()->json($supplierId);
    }

    public function destroy($supplierId){
        $supplier = Supplier::find($supplierId);

        if (!$supplier) {
            return response()->json(['message' => 'Not found'], 404);
        }

        $supplier->purchases->each(function ($purchase) {
            $purchase->purchased_items()->delete();
            $purchase->delete();
        });

        $supplier->delete();

        return response()->json(['message' => 'Related data deleted successfully']);
    }
}
