<?php

namespace App\Http\Controllers;

use App\Models\Emp;
use App\Models\User;
use Illuminate\Http\Request;

class EmpController extends Controller
{
    public function index()
    {
        return Emp::all();
    }

    public function show($id)
    {
        return Emp::find($id);
    }

    public function store(Request $request)
    {
        $emp = Emp::create($request->all());

        return response()->json($emp, 201);
    }

    public function update(Request $request, $id)
    {
        $emp = Emp::findOrFail($id);
        $emp->update($request->all());

        return response()->json($emp, 200);
    }

    public function delete($id)
    {
        Emp::findOrFail($id)->delete();

        return response()->json(null, 204);
    }

    public function getUserEmployees($userId)
    {
        $user = User::find($userId);

        if (! $user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $employees = $user->emps;

        return response()->json($employees);
    }
}
