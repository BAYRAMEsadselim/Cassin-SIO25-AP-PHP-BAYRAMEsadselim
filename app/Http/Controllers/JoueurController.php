<?php

namespace App\Http\Controllers;

use App\Models\Joueur;
use Illuminate\Http\Request;

class JoueurController extends Controller
{
    // Afficher la liste des joueurs
    public function index()
    {
        $joueurs = Joueur::all();
        return view('joueurs.index', compact('joueurs'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        return view('joueurs.create');
    }

    // Enregistrer un joueur dans la BDD
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:50',
            'prenom' => 'required|string|max:50',
            'date_naissance' => 'required|date',
            'numero_licence' => 'required|string|unique:joueurs',
            'position' => 'nullable|string',
            'nom_responsable' => 'nullable|string|max:100',
            'telephone_responsable' => 'nullable|string|max:20',
            'email_responsable' => 'nullable|email|max:100',
        ]);

        Joueur::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'date_naissance' => $request->date_naissance,
            'numero_licence' => $request->numero_licence,
            'position' => $request->position,
            'certificat_medical_valide' => $request->has('certificat_medical_valide'),
            'nom_responsable' => $request->nom_responsable,
            'telephone_responsable' => $request->telephone_responsable,
            'email_responsable' => $request->email_responsable,
        ]);

        return redirect()->route('joueurs.index')->with('success', 'Joueur ajouté avec succès !');
    }

    // Afficher la fiche identifiant d'un joueur
    public function show(Joueur $joueur)
    {
        return view('joueurs.show', compact('joueur'));
    }

    // Supprimer un joueur de la base de données
    public function destroy(Joueur $joueur)
    {
        $joueur->delete();

        return redirect()->route('joueurs.index')->with('success', 'Joueur supprimé avec succès !');
    }

    // Afficher le formulaire d'édition
    public function edit(Joueur $joueur)
    {
        return view('joueurs.edit', compact('joueur'));
    }

    // Enregistrer les modifications dans MariaDB
    public function update(Request $request, Joueur $joueur)
    {
        $request->validate([
            'nom' => 'required|string|max:50',
            'prenom' => 'required|string|max:50',
            'date_naissance' => 'required|date',
            'numero_licence' => 'required|string|unique:joueurs,numero_licence,' . $joueur->id,
            'position' => 'nullable|string',
            'nom_responsable' => 'nullable|string|max:100',
            'telephone_responsable' => 'nullable|string|max:20',
            'email_responsable' => 'nullable|email|max:100',
        ]);

        $joueur->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'date_naissance' => $request->date_naissance,
            'numero_licence' => $request->numero_licence,
            'position' => $request->position,
            'certificat_medical_valide' => $request->has('certificat_medical_valide'),
            'nom_responsable' => $request->nom_responsable,
            'telephone_responsable' => $request->telephone_responsable,
            'email_responsable' => $request->email_responsable,
        ]);

        return redirect()->route('joueurs.index')->with('success', 'Joueur mis à jour avec succès !');
    }
}
