<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un joueur U11</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-lg mx-auto bg-white rounded-xl shadow-md p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Nouveau Joueur U11</h1>

        <form action="{{ route('joueurs.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block font-medium">Nom</label>
                <input type="text" name="nom" required class="w-full border rounded p-2">
            </div>

            <div>
                <label class="block font-medium">Prénom</label>
                <input type="text" name="prenom" required class="w-full border rounded p-2">
            </div>

            <div>
                <label class="block font-medium">Date de naissance</label>
                <input type="date" name="date_naissance" required class="w-full border rounded p-2">
            </div>

            <div>
                <label class="block font-medium">Numéro de licence</label>
                <input type="text" name="numero_licence" required class="w-full border rounded p-2">
            </div>

            <div>
                <label class="block font-medium">Poste / Position</label>
                <input type="text" name="position" placeholder="ex: Attaquant, Gardien..." class="w-full border rounded p-2">
            </div>

            <hr class="my-4 border-gray-200">
            <h2 class="text-lg font-semibold text-gray-700">Contact du responsable légal</h2>

            <div>
                <label class="block font-medium">Nom du responsable (Parent)</label>
                <input type="text" name="nom_responsable" placeholder="ex: Dupont Jean" class="w-full border rounded p-2">
            </div>

            <div>
                <label class="block font-medium">Téléphone d'urgence</label>
                <input type="tel" name="telephone_responsable" placeholder="ex: 06 12 34 56 78" class="w-full border rounded p-2">
            </div>

            <div>
                <label class="block font-medium">Adresse Email</label>
                <input type="email" name="email_responsable" placeholder="ex: parent@gmail.com" class="w-full border rounded p-2">
            </div>
            <hr class="my-4 border-gray-200">

            <div class="flex items-center gap-2">
                <input type="checkbox" name="certificat_medical_valide" id="certif" value="1">
                <label for="certif">Certificat médical fourni et valide</label>
            </div>

            <div class="flex justify-between items-center mt-6">
                <a href="{{ route('joueurs.index') }}" class="text-gray-600 hover:underline">Annuler</a>
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Enregistrer</button>
            </div>
        </form>
    </div>
</body>
</html>