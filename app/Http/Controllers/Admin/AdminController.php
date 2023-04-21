<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Show a list of all admins
    public function index()
    {
        $admins = Admin::all();
        return view('admin.index', compact('admins'));
    }

    // Show the form for creating a new admin
    public function create()
    {
        return view('admin.create');
    }

    // Store a newly created admin in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:admins,email',
            'password' => 'required|min:8'
        ]);

        $admin = new Admin([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password'))
        ]);

        $admin->save();

        return redirect('/admin')->with('success', 'Admin has been added');
    }

    // Show the form for editing the specified admin
    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('admin.edit', compact('admin'));
    }

    // Update the specified admin in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:admins,email,'.$id,
            'password' => 'nullable|min:8'
        ]);

        $admin = Admin::find($id);
        $admin->name = $request->get('name');
        $admin->email = $request->get('email');
        if ($request->filled('password')) {
            $admin->password = bcrypt($request->get('password'));
        }
        $admin->save();

        return redirect('/admin')->with('success', 'Admin has been updated');
    }

    // Remove the specified admin from the database
    public function destroy($id)
    {
        $admin = Admin::find($id);
        $admin->delete();

        return redirect('/admin')->with('success', 'Admin has been deleted');
    }
}
