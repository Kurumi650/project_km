<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto Website</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="flex flex-col min-h-screen font-sans">
    <header class="bg-blue-500 text-white p-2 flex items-center justify-center">
        <div class="flex items-center">
            <img src="logo.png" alt="" class="h-12 mr-4">
            <h1 class="text-2xl font-bold">Voertuigen</h1>
        </div>
    </header>
    <div class="flex flex-1">
        <nav class="w-48 bg-gray-100 p-5 shadow-md text-sm">
            <ul class="space-y-4">
                <li>
                    <a href="/" class="block text-blue-900 font-bold bg-gray-200 hover:bg-gray-300 hover:translate-x-1 transform transition px-3 py-2 rounded-md">
                        <span class="mr-2">&#128187;</span> <!-- Unicode-icoon voor 'Home' -->
                        Home
                    </a>
                </li>
                <li>
                    <a href="/voertuig_toevogen" class="block text-blue-900 font-bold bg-gray-200 hover:bg-gray-300 hover:translate-x-1 transform transition px-3 py-2 rounded-md">
                        <span class="mr-2">&#128664;</span> <!-- Unicode-icoon voor 'Voertuig-Toevogen' -->
                        Voertuig-Toevogen
                    </a>
                </li>
                <li>
                    <a href="/rit_toevogen" class="block text-blue-900 font-bold bg-gray-200 hover:bg-gray-300 hover:translate-x-1 transform transition px-3 py-2 rounded-md">
                        <span class="mr-1">&#128663;</span> <!-- Unicode-icoon voor 'Rit-Toevogen' -->
                        Rit-Toevogen
                    </a>
                </li>
                <li>
                    <a href="/rit_overzicht" class="block text-blue-900 font-bold bg-gray-200 hover:bg-gray-300 hover:translate-x-1 transform transition px-3 py-2 rounded-md">
                        <span class="mr-1">&#128204;</span> <!-- Unicode-icoon voor 'Rit-Overzicht' -->
                        Rit-Overzicht
                    </a>
                </li>
                <li>
                    <a href="/info" class="block text-blue-900 font-bold bg-gray-200 hover:bg-gray-300 hover:translate-x-1 transform transition px-3 py-2 rounded-md">
                        <span class="mr-2">&#8505;</span> <!-- Unicode-icoon voor 'Info' -->
                        Info
                    </a>
                </li>
            </ul>
        </nav>

        <main class="flex-1 p-5 bg-white">
            <!-- Titel Box -->
            <div class="bg-gray-50 p-4 mb-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold text-gray-800 text-center">App Informatie</h2>
            </div>
            
            <!-- Toegevoegde tekst -->
            <div class="bg-gray-50 p-4 rounded-lg shadow-md">
                <h3 class="text-lg font-semibold text-gray-800">Voertuigen en Ritten Beheren</h3>
                <p class="mt-2 text-gray-700">Welkom bij de Auto Website! Hier kun je eenvoudig voertuigen en ritten beheren. Hieronder vind je een kort overzicht van de beschikbare functies:</p>
                
                <h4 class="mt-4 font-semibold text-gray-800">Voertuig Toevoegen</h4>
                <p class="mt-2 text-gray-700">Wil je een nieuw voertuig toevoegen? Klik op de link <strong>"Voertuig-Toevoegen"</strong> in het menu aan de zijkant. Je krijgt dan een formulier te zien waar je de gegevens van het voertuig kunt invullen, zoals het merk, model en kenteken. Na het invullen klik je op <strong>"Opslaan"</strong> om het voertuig toe te voegen aan de database.</p>
                
                <h4 class="mt-4 font-semibold text-gray-800">Voertuig Bewerken</h4>
                <p class="mt-2 text-gray-700">Om een bestaand voertuig te bewerken, ga je naar de pagina <strong>"Voertuigen Overzicht"</strong>. Zoek het voertuig dat je wilt aanpassen en klik op de <strong>"Bewerken"</strong> knop. Je kunt nu de details van het voertuig wijzigen en opslaan door op <strong>"Opslaan"</strong> te klikken.</p>
                
                <h4 class="mt-4 font-semibold text-gray-800">Voertuig Verwijderen</h4>
                <p class="mt-2 text-gray-700">Als je een voertuig wilt verwijderen, ga je naar <strong>"Voertuigen Overzicht"</strong>, zoek het voertuig en klik op de <strong>"Verwijderen"</strong> knop. Bevestig je keuze in het bevestigingsvenster. Let op: een verwijderd voertuig kan niet meer worden hersteld.</p>
                
                <h4 class="mt-4 font-semibold text-gray-800">Rit Toevoegen</h4>
                <p class="mt-2 text-gray-700">Wil je een rit voor een voertuig toevoegen? Ga naar de pagina <strong>"Rit-Toevoegen"</strong>. Hier kun je de details van de rit invullen, zoals de start- en einddatum, het voertuig en andere relevante informatie. Klik op <strong>"Opslaan"</strong> om de rit toe te voegen.</p>
                
                <h4 class="mt-4 font-semibold text-gray-800">Rit Overzicht</h4>
                <p class="mt-2 text-gray-700">Op de pagina <strong>"Rit-Overzicht"</strong> kun je alle ritten bekijken die voor je voertuigen zijn ingevoerd. Je kunt hier zien wanneer de ritten hebben plaatsgevonden en voor welk voertuig ze zijn geregistreerd.</p>
                
                <p class="mt-4 text-gray-700">Mocht je nog vragen hebben of hulp nodig hebben, aarzel dan niet om contact met ons op te nemen via de <strong>"Info"</strong> pagina.</p>
            </div>
        </main>
    </div>

    <footer class="bg-blue-500 text-white text-center p-4">
        <p>&copy; 2024 Auto Website. Alle rechten voorbehouden.</p>
    </footer>

</body>
</html>
