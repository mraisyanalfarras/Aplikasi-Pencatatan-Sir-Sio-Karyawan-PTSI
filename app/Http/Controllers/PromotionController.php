<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    /**
     * Menampilkan daftar promosi
     */
    public function index()
    {
        $promotions = Promotion::all();
        return view('admin.promotions.index', compact('promotions'));
    }

    /**
     * Menampilkan form untuk membuat promosi baru
     */
    public function create()
    {
        return view('admin.promotions.create');
    }

    /**
     * Menyimpan promosi baru ke database
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'is_active' => 'required|boolean'
        ]);

        Promotion::create($request->all());

        return redirect()->route('promotions.index')
            ->with('success', 'Promosi berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail promosi
     */
    public function show(Promotion $promotion)
    {
        return view('admin.promotions.show', compact('promotion'));
    }

    /**
     * Menampilkan form untuk mengedit promosi
     */
    public function edit(Promotion $promotion)
    {
        return view('admin.promotions.edit', compact('promotion'));
    }

    /**
     * Mengupdate data promosi di database
     */
    public function update(Request $request, Promotion $promotion)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'is_active' => 'boolean'
        ]);

        $promotion->update($validated);

        return redirect()->route('promotions.index')
            ->with('success', 'Promosi berhasil diperbarui');
    }

    /**
     * Menghapus promosi dari database
     */
    public function destroy(Promotion $promotion)
    {
        $promotion->delete();

        return redirect()->route('promotions.index')
            ->with('success', 'Promosi berhasil dihapus');
    }
}
