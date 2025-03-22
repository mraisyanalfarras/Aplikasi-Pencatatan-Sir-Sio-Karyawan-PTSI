<?php

namespace App\Http\Controllers;

use App\Models\Payroll;
use App\Models\Employee;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payrolls = Payroll::with('employee')->get(); 
        return view('admin.payroll.index', compact('payrolls')); 
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all(); 
        return view('admin.payroll.create', compact('employees'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'salary' => 'required|numeric',
        ]);
        Payroll::create($request->all());
        return redirect()->route('payroll.index')->with('success', 'Payroll created successfully.');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payroll $payroll)
    {
        $employees = Employee::all(); 
        return view('admin.payroll.edit', compact('payroll', 'employees'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payroll $payroll)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'salary' => 'required|numeric',
        ]);
        $payroll->update($request->all()); 
        return redirect()->route('payroll.index')->with('success', 'Payroll updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payroll $payroll)
    {
        $payroll->delete(); 
        return redirect()->route('payroll.index')->with('success', 'Payroll deleted successfully.');
    }
}