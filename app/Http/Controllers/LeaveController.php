<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\Employee;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    /**
     * Menampilkan daftar cuti
     */
    public function index()
    {
        $leaves = Leave::with(['employee.user'])->latest()->paginate(10);
        return view('admin.leave.index', compact('leaves'));
    }

    /**
     * Menampilkan form untuk membuat cuti baru
     */
    public function create()
    {
        $employees = Employee::with('user')->get();
        return view('admin.leave.create', compact('employees'));
    }

    /**
     * Menyimpan data cuti baru ke database
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:employees,user_id',
            'description' => 'required|string|max:255',
            'start_of_date' => 'required|date',
            'end_of_date' => 'required|date|after_or_equal:start_of_date',
            'status' => 'required|in:pending,approved,rejected',
        ]);

        try {
            Leave::create($validatedData);
            return redirect()
                ->route('leave.index')
                ->with('success', 'Data cuti berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Terjadi kesalahan saat menambahkan data cuti')
                ->withInput();
        }
    }

    /**
     * Menampilkan form untuk mengedit cuti
     */
    public function edit(Leave $leave)
    {
        $employees = Employee::with('user')->get();
        return view('admin.leave.edit', compact('leave', 'employees'));
    }

    /**
     * Memperbarui data cuti di database
     */
    public function update(Request $request, Leave $leave)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:employees,user_id',
            'description' => 'required|string|max:255', 
            'start_of_date' => 'required|date',
            'end_of_date' => 'required|date|after_or_equal:start_of_date',
            'status' => 'required|in:pending,approved,rejected',
        ]);

        try {
            $leave->update($validatedData);
            return redirect()
                ->route('leave.index')
                ->with('success', 'Data cuti berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Terjadi kesalahan saat memperbarui data cuti')
                ->withInput();
        }
    }

    /**
     * Menghapus data cuti dari database
     */
    public function destroy(Leave $leave)
    {
        try {
            $leave->delete();
            return redirect()
                ->route('leave.index')
                ->with('success', 'Data cuti berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Terjadi kesalahan saat menghapus data cuti');
        }
    }
}
