<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::all(); 
        return view('admin.listUser', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $user = User::findOrFail($id);
        return view('admin.editUser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin')->with('success', 'Utilisateur supprimé avec succès.');
    }
    public function blockUser($id)
    {
        $user = User::findOrFail($id);

        if (!$user->statut) {
            $user->update(['statut' => true]);
            return redirect()->back()->with('success', 'Utilisateur bloqué avec succès.');
        }

        return redirect()->back()->with('info', "L'utilisateur est déjà bloqué.");
    }

    public function unblockUser($id)
    {
        $user = User::findOrFail($id);
        
        if ($user->statut) {
            $user->update(['statut' => false]);
            return redirect()->back()->with('success', 'Utilisateur débloqué avec succès.');
        }

        return redirect()->back()->with('info', "L'utilisateur est déjà débloqué.");
    }
}
