<?php

namespace App\Http\Controllers;

use App\Models\DataSir;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataSirController extends Controller
{
    public function index()
    {
        $dataSirs = DataSir::with('user')->paginate(10);
        return view('admin.datasirs.index', compact('dataSirs'));
    }

    public function create()
    {
        $users = User::select('id', 'name')->get();
        return view('admin.datasirs.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'nama' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'no_sir' => 'required|string|unique:data_sirs',
            'expire_date' => 'required|date',
            'status' => 'required|in:active,expired,revoked',
            'reminder' => 'nullable|date',
            'location' => 'required|string|max:255',
        ]);

        DataSir::create($request->all());
        return redirect()->route('datasirs.index')->with('success', 'Data SIR berhasil ditambahkan.');
    }

    public function show($id)
    {
        $dataSir = DataSir::with('user')->findOrFail($id);
        return view('admin.datasirs.show', compact('dataSir'));
    }

    public function edit($id)
    {
        $dataSir = DataSir::findOrFail($id);
        $users = User::select('id', 'name')->get();
        return view('admin.datasirs.edit', compact('dataSir', 'users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'nama' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'no_sir' => 'required|string|unique:data_sirs,no_sir,' . $id,
            'expire_date' => 'required|date',
            'status' => 'required|in:active,expired,revoked',
            'reminder' => 'nullable|date',
            'location' => 'required|string|max:255',
        ]);

        DB::table('data_sirs')->where('id', $id)->update([
            'user_id' => $request->user_id,
            'nama' => $request->nama,
            'position' => $request->position,
            'no_sir' => $request->no_sir,
            'expire_date' => $request->expire_date,
            'status' => $request->status,
            'reminder' => $request->reminder,
            'location' => $request->location,
            'updated_at' => now(),
        ]);

        return redirect()->route('datasirs.index')->with('success', 'Data SIR berhasil diperbarui.');
    }

    public function destroy($id)
    {
        DB::table('data_sirs')->where('id', $id)->delete();
        return redirect()->route('datasirs.index')->with('success', 'Data SIR berhasil dihapus.');
    }
}
