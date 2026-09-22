<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Fiche Joueur U11</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-md mx-auto bg-white rounded-xl shadow-md p-6 border-t-4 border-blue-600">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Fiche Identifiant U11</h1>
        
        <div class="space-y-3">
            <p><strong>Nom :</strong> {{ $joueur->nom }}</p>
            <p><strong>Prénom :</strong> {{ $joueur->prenom }}</p>
            <p><strong>Date de Naissance :</strong> {{ \Carbon\Carbon::parse($joueur->date_naissance)->format('d/m/Y') }}</p>
            <p><strong>N° de Licence :</strong> <span class="bg-gray-200 px-2 py-1 rounded">{{ $joueur->numero_licence }}</span></p>
            <p><strong>Poste :</strong> {{ $joueur->position ?? 'Non renseigné' }}</p>
            <p><strong>Certificat Médical :</strong> 
                @if($joueur->certificat_medical_valide)
                    <span class="text-green-600 font-bold">Valide</span>
                @else
                    <span class="text-red-600 font-bold">Incomplet / En attente</span>
                @endif
            </p>
        </div>

        <div class="mt-6 pt-4 border-t border-gray-200">
            <h2 class="text-lg font-bold text-gray-700 mb-2">Contact Responsable Légal</h2>
            <p><strong>Nom :</strong> {{ $joueur->nom_responsable ?? 'Non renseigné' }}</p>
            <p><strong>Téléphone :</strong> 
                @if($joueur->telephone_responsable)
                    <a href="tel:{{ $joueur->telephone_responsable }}" class="text-blue-600 font-semibold hover:underline">{{ $joueur->telephone_responsable }}</a>
                @else
                    Non renseigné
                @endif
            </p>
            <p><strong>Email :</strong> {{ $joueur->email_responsable ?? 'Non renseigné' }}</p>
        </div>

        <a href="{{ route('joueurs.index') }}" class="inline-block mt-6 text-blue-600 hover:underline">← Retour à la liste</a>
    </div>
</body>
</html>