<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function index()
    {
        $medicines = Medicine::all();

        return view('medicines.index', compact('medicines'));
    }

    public function create()
    {
        return view('medicines.create');
    }

    public function store(Request $request)
    {
        $medicine = new Medicine();

        $medicine->name = $request->input('name');
        $medicine->description = $request->input('description');
        $medicine->price = $request->input('price');

        $medicine->save();

        return redirect()->route('medicines.index');
    }

    public function edit($id)
    {
        $medicine = Medicine::findOrFail($id);

        return view('medicines.edit', compact('medicine'));
    }

    public function update(Request $request, $id)
    {
        $medicine = Medicine::findOrFail($id);

        $medicine->name = $request->input('name');
        $medicine->description = $request->input('description');
        $medicine->price = $request->input('price');

        $medicine->save();

        return redirect()->route('medicines.index');
    }

    public function destroy($id)
    {
        $medicine = Medicine::findOrFail($id);

        $medicine->delete();

        return redirect()->route('medicines.index');
    }
}
