<?php

namespace App\Http\Controllers;

use App\Models\DataSio;
use App\Models\User;
use Illuminate\Http\Request;

class DataSioController extends Controller
{
    /**
     * Tampilkan daftar semua Data SIO.
     */
    public function index()
    {
        $dataSios = DataSio::with('user')->paginate(10); // Ambil data dengan paginasi
        return view('admin.datasios.index', compact('dataSios'));
    }

    /**
     * Tampilkan form untuk menambahkan Data SIO baru.
     */
    public function create()
{
    $users = User::all(); // Ambil semua data user
    return view('admin.datasios.create', compact('users'));
}

    /**
     * Simpan Data SIO baru.
     */
    public function store(Request $request)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'nik' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'position' => 'required|string',
        'no_sio' => 'required|string|max:255',
        'type' => 'required|string|max:255',
        'class' => 'required|string|max:255',
        'expire_date' => 'required|date',
        'status' => 'required|in:active,expired,pending',
        'location' => 'required|string|max:255',
    ]);

    DataSio::create($request->all());

    return redirect()->route('datasios.index')->with('success', 'Data SIO berhasil ditambahkan.');
}


    /**
     * Tampilkan detail Data SIO berdasarkan ID.
     */
    public function show($id)
    {
        $dataSio = DataSio::with('user')->findOrFail($id);
        return view('admin.datasios.show', compact('dataSio'));
    }

    /**
     * Tampilkan form edit Data SIO berdasarkan ID.
     */
    public function edit($id)
    {
        $dataSio = DataSio::findOrFail($id);
        $users = User::all();
        return view('admin.datasios.edit', compact('dataSio', 'users'));
    }

    /**
     * Update Data SIO berdasarkan ID.
     */
    public function update(Request $request, $id)
    {
        $dataSio = DataSio::findOrFail($id);

        $request->validate([
            'user_id'     => 'sometimes|exists:users,id',
            'nik'         => 'sometimes|string|max:20',
            'name'        => 'sometimes|string|max:100',
            'position'    => 'sometimes|string|max:50',
            'no_sio'      => 'sometimes|string|max:50',
            'type'        => 'sometimes|string|max:50',
            'class'       => 'sometimes|string|max:10',
            'expire_date' => 'sometimes|date',
            'status'      => 'sometimes|in:active,expired,pending',
            'location'    => 'sometimes|string|max:255',
        ]);

        $dataSio->update($request->all());

        return redirect()->route('datasios.index')->with('success', 'Data SIO berhasil diperbarui!');
    }

    /**
     * Hapus Data SIO berdasarkan ID.
     */
    public function destroy($id)
    {
        $dataSio = DataSio::findOrFail($id);
        $dataSio->delete();

        return redirect()->route('datasios.index')->with('success', 'Data SIO berhasil dihapus!');
    }
}
