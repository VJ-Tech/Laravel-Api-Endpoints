<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {

        $users = User::orderBy('id', 'asc')->get();

        return response()->json($users);
    }

    public function getUserWithSalesAndPurchases($userId){
        $userId = User::with('sales','purchases')
            ->where('id', $userId)
            ->get();

        return response()->json($userId);
    }

    public function destroy($userId){
        $user = User::find($userId);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->sales->each(function ($sale) {
            $sale->sold_items()->delete();
            $sale->delete();
        });
        $user->purchases->each(function ($purchase) {
            $purchase->purchased_items()->delete();
            $purchase->delete();
        });
        $user->delete();

        return response()->json(['message' => 'User and related data deleted successfully']);
    }

    public function store(Request $request ) {
        $fields = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create($fields);
        return response()->json([
            'status' => 'ok',
            'message' => 'New User has been recorded id '. $user->id
        ]);
    }

    public function update(Request $request, User $userId) {
        $fields = $request->validate([
            'name' => 'string|max:255',
            'email' => 'email',
            'password' => 'string|min:6',
        ]);

        $userId->update($fields);
        return response()->json([
            'status' => 'ok',
            'message' => 'user '.$userId->id. ' has updated'
        ]);
    }
}
