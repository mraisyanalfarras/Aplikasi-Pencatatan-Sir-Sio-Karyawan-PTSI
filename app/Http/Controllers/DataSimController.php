<?php

namespace App\Http\Controllers;

use App\Models\DataSim;
use App\Http\Requests\DataSimRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DataSimController extends Controller
{
    public function index()
    {
        $dataSims = DataSim::with('user')->paginate(10);
        return view('admin.datasims.index', compact('dataSims'));
    }

    public function create()
    {
        $users = \App\Models\User::select('id', 'nik', 'name')->get();
        return view('admin.datasims.create', compact('users'));
    }

    public function store(DataSimRequest $request)
    {
        $data = $request->validated();
        $data['foto'] = $this->handleUploadFoto($request);

        DataSim::create($data);

        return redirect()->route('datasims.index')->with('success', 'Data SIM berhasil ditambahkan.');
    }

    public function show($id)
    {
        $dataSim = DataSim::with('user')->findOrFail($id);
        return view('admin.datasims.show', compact('dataSim'));
    }

    public function edit($id)
    {
        $dataSim = DataSim::findOrFail($id);
        $users = \App\Models\User::select('id', 'nik', 'name')->get();
        return view('admin.datasims.edit', compact('dataSim', 'users'));
    }

    public function update(DataSimRequest $request, $id)
    {
        $dataSim = DataSim::findOrFail($id);
        $data = $request->validated();
        $data['foto'] = $this->handleUploadFoto($request, $dataSim);

        $dataSim->update($data);

        return redirect()->route('datasims.index')->with('success', 'Data SIM berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $dataSim = DataSim::findOrFail($id);

        // Hapus foto dari storage jika ada
        if ($dataSim->foto) {
            Storage::disk('public')->delete($dataSim->foto);
        }

        $dataSim->delete();

        return redirect()->route('datasims.index')->with('success', 'Data SIM berhasil dihapus.');
    }

    private function handleUploadFoto($request, $dataSim = null)
    {
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($dataSim && $dataSim->foto) {
                Storage::disk('public')->delete($dataSim->foto);
            }
            // Simpan foto baru di folder "foto_sim/"
            return $request->file('foto')->store('foto_sim', 'public');
        }
        return $dataSim ? $dataSim->foto : null;
    }
}
