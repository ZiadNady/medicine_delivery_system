<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location as PharmacyLocation;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function create(Request $request, $id)
    {
        // Create a new pharmacy location record with the given pharmacy ID
        $location = new PharmacyLocation();
        $location->pharmacy_id = $id;
        $location->address = $request->input('address');
        $location->city = $request->input('city');
        $location->state = $request->input('state');
        $location->zip = $request->input('zip');
        $location->save();

        // Redirect back to the pharmacy edit page
        return redirect()->route('pharmacy.edit', $id);
    }

    public function update(Request $request, $id)
    {
        // Update the pharmacy location record with the given ID
        $location = PharmacyLocation::findOrFail($id);
        $location->address = $request->input('address');
        $location->city = $request->input('city');
        $location->state = $request->input('state');
        $location->zip = $request->input('zip');
        $location->save();

        // Redirect back to the pharmacy edit page
        return redirect()->route('pharmacy.edit', $location->pharmacy_id);
    }

    public function delete($id)
    {
        // Delete the pharmacy location record with the given ID
        $location = PharmacyLocation::findOrFail($id);
        $pharmacy_id = $location->pharmacy_id;
        $location->delete();

        // Redirect back to the pharmacy edit page
        return redirect()->route('pharmacy.edit', $pharmacy_id);
    }
}
