<?php

namespace App\Http\Controllers;

use App\Models\DataSir;
use App\Models\User;
use Illuminate\Http\Request;

class DataSirController extends Controller
{
    public function index()
    {
        $dataSirs = DataSir::with('user')->paginate(10);
        return view('admin.datasirs.index', compact('dataSirs'));
    }

    public function create()
    {
        $users = User::all();
        return view('admin.datasirs.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'no_sir' => 'required|unique:data_sirs,no_sir',
            'expire_date' => 'required|date',
            'status' => 'required|in:active,expired,revoked',
            'location' => 'required',
        ]);

        $user = User::findOrFail($request->user_id);

        DataSir::create([
            'user_id' => $user->id,
            'nik' => $user->nik,
            'nama' => $user->name,
            'position' => $user->position,
            'no_sir' => $request->no_sir,
            'expire_date' => $request->expire_date,
            'status' => $request->status,
            'reminder' => $request->reminder,
            'location' => $request->location,
        ]);

        return redirect()->route('datasirs.index')->with('success', 'Data SIR berhasil ditambahkan!');
    }

    public function show(DataSir $datasir)
    {
        return view('admin.datasirs.show', compact('datasir'));
    }

    public function edit(DataSir $datasir)
    {
        $users = User::all();
        return view('admin.datasirs.edit', compact('datasir', 'users'));
    }

    public function update(Request $request, DataSir $datasir)
    {
        $request->validate([
            'no_sir' => 'required|unique:data_sirs,no_sir,' . $datasir->id,
            'expire_date' => 'required|date',
            'status' => 'required|in:active,expired,revoked',
            'location' => 'required',
        ]);

        $user = User::findOrFail($request->user_id);

        $datasir->update([
            'user_id' => $user->id,
            'nik' => $user->nik,
            'nama' => $user->name,
            'position' => $user->position,
            'no_sir' => $request->no_sir,
            'expire_date' => $request->expire_date,
            'status' => $request->status,
            'reminder' => $request->reminder,
            'location' => $request->location,
        ]);

        return redirect()->route('datasirs.index')->with('success', 'Data SIR berhasil diperbarui!');
    }

    public function destroy(DataSir $datasir)
    {
        $datasir->delete();
        return redirect()->route('datasirs.index')->with('success', 'Data SIR berhasil dihapus!');
    }
}
