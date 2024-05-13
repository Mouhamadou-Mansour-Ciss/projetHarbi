<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mouton;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
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
    public function home()
    {
        return view('accueil');
    }

    public function dashboard(){
        if (Auth::check() && Auth::user()->profile === 'eleveur'||Auth::check() && Auth::user()->profile === 'admin') {
        $users = User::all();
        $moutons = Mouton::all();
        $userRole = Auth::user()->profile;
        return view('dashboard', compact('moutons','users', 'userRole'));
        }else{
            return redirect()->route('moutons.liste');
        }
    }

    //methode pour afficher le formulaire de modification du uers
    public function modifier()
    {
        // Récupérer les données de l'utilisateur connecté
        $user = auth()->user();

        return view('users.index', compact('user'));
    }

    //methode pour modifier les corrdonner du users
    public function update(Request $request)
    {
        //// Valider les données du formulaire
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore(auth()->user()->id),
            ],
            'adresse' => 'required',
            'telephone' => 'required',
        ]);

        // Mettez à jour les données de l'utilisateur
        $user = auth()->user();
        $user->update($request->all());

        // Redirigez l'utilisateur vers la page de profil avec un message de succès
        return redirect()->back()->with('success', 'Coordonnées mises à jour avec succès.');
    
    }

    //methode qui affiche la vue modifier mot de passe
    public function modifierPassword(){
        return view('users.motPasse');
    }

    //methode pour modifier le mot de passe
    public function updatePassword(Request $request)
    {
            // Valider les données du formulaire
        $request->validate([
            'password' => 'required|min:8|confirmed',
            'ancien_password' => 'required|min:8',
        ]);

        // Récupérez l'utilisateur actuellement authentifié
        $user = auth()->user();

        // Vérifiez d'abord si l'ancien mot de passe est correct
        if (Hash::check($request->ancien_password, $user->password)) {
            // Le mot de passe actuel est correct, mettez à jour le mot de passe
            $user->update([
                'password' => Hash::make($request->password),
            ]);

            // Redirigez l'utilisateur vers la page de profil avec un message de succès
            return redirect()->back()->with('success', 'Mot de passe mis à jour avec succès.');
        } else {
            // L'ancien mot de passe est incorrect, redirigez avec un message d'erreur
            return redirect()->back()->with('error', 'L\'ancien mot de passe est incorrect.');
        }

    }

    //methode pour afficher la vue details users
    public function show($id)
    {
        //
        $user = User::findOrFail($id);
        return view('admin.detailsUser', compact('user'));
    }

    //methode pour modifier
    // public function edit(string $id)
    // {
    //     //
    //     $user = User::findOrFail($id);
    //     return view('admin.editUser', compact('user'));
    // }

    //methode supprimer
    public function delete(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'Utilisateur supprimé avec succès.');
    }

    //methode bloquer
    public function bloquer($id)
     {
    
        $user = User::findOrFail($id);

        if (!$user->statut) {
            $user->update(['statut' => true]);
            return redirect()->back()->with('success', 'Utilisateur bloqué avec succès.');
        }

        return redirect()->back()->with('info', "L'utilisateur est déjà bloqué.");
    }

    //methode debloquer
    public function deBloquer($id)
    {
        $user = User::findOrFail($id);
        
        if ($user->statut) {
            $user->update(['statut' => false]);
            return redirect()->back()->with('success', 'Utilisateur débloqué avec succès.');
        }

        return redirect()->back()->with('info', "L'utilisateur est déjà débloqué.");
    }

    
}
