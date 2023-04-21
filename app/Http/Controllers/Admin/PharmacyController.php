<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pharmacy;
use Illuminate\Http\Request;

class PharmacyController extends Controller
{
    // Show the form for creating a new pharmacy
    public function create()
    {
        return view('pharmacies.create');
    }

    // Store a newly created pharmacy in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email|unique:pharmacies',
        ]);

        $pharmacy = new Pharmacy;
        $pharmacy->name = $request->input('name');
        $pharmacy->address = $request->input('address');
        $pharmacy->phone_number = $request->input('phone_number');
        $pharmacy->email = $request->input('email');
        $pharmacy->save();

        return redirect()->route('pharmacies.index')->with('success', 'Pharmacy added successfully');
    }

    // Show the form for editing the specified pharmacy
    public function edit(Pharmacy $pharmacy)
    {
        return view('pharmacies.edit', compact('pharmacy'));
    }

    // Update the specified pharmacy in the database
    public function update(Request $request, Pharmacy $pharmacy)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email|unique:pharmacies,email,' . $pharmacy->id,
        ]);

        $pharmacy->name = $request->input('name');
        $pharmacy->address = $request->input('address');
        $pharmacy->phone_number = $request->input('phone_number');
        $pharmacy->email = $request->input('email');
        $pharmacy->save();

        return redirect()->route('pharmacies.index')->with('success', 'Pharmacy updated successfully');
    }

    // Remove the specified pharmacy from the database
    public function destroy(Pharmacy $pharmacy)
    {
        $pharmacy->delete();

        return redirect()->route('pharmacies.index')->with('success', 'Pharmacy removed successfully');
    }

    // Display a listing of pharmacies
    public function index()
    {
        $pharmacies = Pharmacy::all();

        return view('pharmacies.index', compact('pharmacies'));
    }
}
