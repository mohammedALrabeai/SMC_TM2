<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::all();

        return response()->json($subscriptions);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $subscription = Subscription::create($data);

        return response()->json($subscription, 201);
    }

    public function show($id)
    {
        $subscription = Subscription::findOrFail($id);

        return response()->json($subscription);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'sometimes|required|string',
            'description' => 'nullable|string',
            'start_date' => 'sometimes|required|date',
            'end_date' => 'sometimes|required|date',
        ]);

        $subscription = Subscription::findOrFail($id);
        $subscription->update($data);

        return response()->json($subscription);
    }

    public function destroy($id)
    {
        $subscription = Subscription::findOrFail($id);
        $subscription->delete();

        return response()->json(['message' => 'Subscription deleted successfully']);
    }
}
