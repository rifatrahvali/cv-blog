<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function profile()
    {
        $admin = Auth::guard('admin')->user();
        $admins = Admin::all();

        return view('admin.admin-user-profile-card.au-profile-card', compact('admin', 'admins'));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|min:8',
        ]);

        $admin = Auth::guard('admin')->user();
        $admin->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.admin-user-profile-card.au-profile-card')->with('success', 'Password updated successfully.');
    }
    

    public function profileUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,' . Auth::id(),
        ]);

        $admin = Auth::guard('admin')->user();
        $admin->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success', 'Profil başarıyla güncellendi.');
    }

    public function updateRole(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);
        $admin->role = $request->has('role') ? 'admin' : 'user';
        $admin->save();

        return redirect()->route('admin.admin-user-profile-card.au-profile-card')->with('success', 'Admin role updated successfully.');
    }
    public function deleteAdmin($id)
    {
        $admin = Admin::findOrFail($id);

        // Admin kendini silemesin
        if (Auth::id() == $admin->id) {
            return redirect()->back()->with('error', 'Kendi hesabınızı silemezsiniz.');
        }

        $admin->delete();

        return redirect()->back()->with('success', 'Profil başarıyla silindi.');
    }
}