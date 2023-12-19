<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index() {

        $custumers = Customer::orderBy('name', 'asc')->get();

        return response()->json($custumers);
    }

    public function getCustomerWithSales($customerId){
        $customer = Customer::with('sales')
            ->where('id', $customerId)
            ->get();

        return response()->json($customer);
    }

    public function destroy($customerId){
        $customer = Customer::find($customerId);

        if (!$customer) {
            return response()->json(['message' => 'Not found'], 404);
        }

        $customer->sales->each(function ($sale) {
            $sale->sold_items()->delete();
            $sale->delete();
        });

        $customer->delete();

        return response()->json(['message' => 'Related data deleted successfully']);
    }
}
