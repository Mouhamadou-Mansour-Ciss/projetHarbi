<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mouton;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
class MoutonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function listeMoutons()
    {
        // Lister tous les moutons disponibles dans l'application
        $moutons = Mouton::all();
        return view('mouton.listeMouton', compact('moutons'));
    }
    
    public function index()
    {
        // Vérifier si l'utilisateur est connecté et a le profil "eleveur"
        if (Auth::check() && Auth::user()->profile === 'eleveur') {
            // Récupérer tous les moutons de l'éleveur connecté
            $user = Auth::user();
            $moutons = $user->moutons;
            return view('mouton.listeUsersMouton', compact('moutons'));
        } else {
            // Rediriger vers la liste de tous les moutons si l'utilisateur n'est pas un éleveur
            return redirect()->route('moutons.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mouton.ajoutMouton');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valider les données entrées par l'utilisateur
        $request->validate([
            'nom' => 'required|string|max:255',
            'prix' => 'required|numeric',
            'generalogie' => 'required|string|max:255',
            'race' => 'required|string|max:255',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation de l'image
        ]);

        // Assurez-vous de stocker le chemin de l'image dans la base de données, pas le fichier lui-même
        $mouton = new Mouton();
        $mouton->nom = $request->input('nom');
        $mouton->prix = $request->input('prix');
        $mouton->generalogie = $request->input('generalogie');
        $mouton->race = $request->input('race');

        // Vérifiez s'il y a un fichier image dans la demande
        if ($request->hasFile('images')) {
            $imagePath = $request->file('images');
            $extension = $imagePath->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $imagePath->move('assets/images/', $filename);
            $mouton->images = $filename;
        } else {
            $mouton->images = '';
        }

        // Récupérez l'ID de l'utilisateur actuellement connecté et associez-le à l'éleveur du mouton
        $mouton->user_id = auth()->user()->id;

        $mouton->save();
        return redirect()->route('moutons.index')->with('success', 'Mouton ajouté avec succès.');
    }



    /**
     * Display the specified resource.
     */
    public function showUsers($id)
    {
        $mouton = Mouton::findOrFail($id);

        $proprietaire = User::findOrFail($mouton->user_id);
        return view('mouton.detailsListeMoutons', compact('mouton','proprietaire'));

    }
    public function show($id)
    {
        $mouton = Mouton::findOrFail($id);
        // Récupérez l'utilisateur associé au mouton en utilisant le user_id du mouton
        $proprietaire = User::findOrFail($mouton->user_id);
        return view('mouton.detailsMouton', compact('mouton','proprietaire'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        //
        $mouton = Mouton::findOrFail($id);
        // Assurez-vous que seul l'éleveur propriétaire peut modifier le mouton
        if ($mouton->user_id != auth()->user()->id) {
            abort(403); // Accès interdit
        }
            return view('mouton.modifierMouton', compact('mouton'));
        }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $mouton = Mouton::findOrFail($id);

        // Assurez-vous que seul l'éleveur propriétaire peut modifier le mouton
        if ($mouton->user_id != auth()->user()->id) {
            abort(403); // Accès interdit
        }
    
        // Validez les données du formulaire ici (ex : nom, prix, généalogie, race, etc.)
        $request->validate([
            'nom' => 'required',
            'prix' => 'required',
            'generalogie' => 'required',
            'race' => 'required',
            'images' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Assurez-vous que le fichier est une image valide et ne dépasse pas 2 Mo.
        ]);
    
        // Si une nouvelle image est fournie, téléchargez-la et mettez à jour le chemin de l'image.
        if ($request->hasFile('images')) {
            $imagePath = $request->file('images');
            $extension = $imagePath->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $imagePath->move('assets/images/', $filename);
    
            // Supprimez l'ancienne image du serveur si elle existe
            if (File::exists(public_path('assets/images/' . $mouton->images))) {
                File::delete(public_path('assets/images/' . $mouton->images));
            }
    
            $mouton->images = $filename;
        }
        $mouton->update([
            'nom' => $request->input('nom'),
            'prix' => $request->input('prix'),
            'generalogie' => $request->input('generalogie'),
            'race' => $request->input('race'),
            // Mettez à jour d'autres attributs du mouton si nécessaire
        ]);

        return redirect()->route('moutons.index')->with('success', 'Mouton mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $mouton = Mouton::findOrFail($id);
        // Assurez-vous que seul l'éleveur propriétaire peut supprimer le mouton
        if ($mouton->user_id != auth()->user()->id) {
            abort(403); // Accès interdit
        }
        
        // Supprimez le mouton
        $mouton->delete();
        
        return redirect()->back()->with('success', 'Mouton supprimé avec succès.');
    }
}
