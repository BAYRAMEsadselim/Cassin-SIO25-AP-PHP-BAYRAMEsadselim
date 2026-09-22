<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Joueurs U11</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-5xl mx-auto bg-white rounded-xl shadow-md p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Gestion des Licences U11</h1>
            <a href="{{ route('joueurs.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                + Ajouter un joueur
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b bg-gray-50">
                    <th class="p-3">Nom</th>
                    <th class="p-3">Prénom</th>
                    <th class="p-3">N° Licence</th>
                    <th class="p-3">Certificat</th>
                    <th class="p-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($joueurs as $joueur)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-3 font-semibold">{{ $joueur->nom }}</td>
                        <td class="p-3">{{ $joueur->prenom }}</td>
                        <td class="p-3">{{ $joueur->numero_licence }}</td>
                        <td class="p-3">
                            @if($joueur->certificat_medical_valide)
                                <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded font-medium">Valide</span>
                            @else
                                <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded font-medium">Incomplet</span>
                            @endif
                        </td>
                        <td class="p-3 flex items-center gap-3">
                            <!-- Voir -->
                            <a href="{{ route('joueurs.show', $joueur) }}" class="text-blue-600 hover:underline">
                                Voir
                            </a>

                            <!-- Modifier -->
                            <a href="{{ route('joueurs.edit', $joueur) }}" class="text-amber-600 hover:underline font-semibold">
                                Modifier
                            </a>

                            <!-- Supprimer -->
                            <form action="{{ route('joueurs.destroy', $joueur) }}" method="POST" onsubmit="return confirm('Es-tu sûr de vouloir supprimer ce joueur ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 hover:underline font-semibold">
                                    Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-4 text-center text-gray-500">Aucun joueur enregistré pour le moment.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
