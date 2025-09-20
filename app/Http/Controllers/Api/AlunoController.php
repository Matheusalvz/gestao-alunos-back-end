<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users',
        ]);

        $aluno = User::create($request->only(['name', 'email']));
        return response()->json($aluno, 201);
    }

    public function update(Request $request, $id)
    {
        $aluno = User::findOrFail($id);

        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $aluno->update($request->only(['name', 'email']));
        return response()->json($aluno);
    }

    public function destroy($id)
    {
        $aluno = User::findOrFail($id);
        $aluno->delete();

        return response()->json(null, 204);
    }
}