<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            'password'  => 'required|string|min:6',
        ]);

        // $aluno = User::create($request->only(['name', 'email']));
        $aluno = User::create([
            'name'  => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // 'password' => $request->password,
        ]);
        return response()->json($aluno, 201);
    }

    public function update(Request $request, $id)
    {
        $aluno = User::findOrFail($id);

        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6',
        ]);

        $data = $request->only(['name', 'email']);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $aluno->update($data);

        return response()->json($aluno);
    }

    public function destroy($id)
    {
        $aluno = User::findOrFail($id);
        $aluno->delete();

        return response()->json(null, 204);
    }


    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        $aluno = User::where('email', $request->email)->first();

        if (!$aluno || !Hash::check($request->password, $aluno->password)) {
            return response()->json(['message' => 'Credenciais inválidas'], 401);
        }

        return response()->json($aluno);
    }
}