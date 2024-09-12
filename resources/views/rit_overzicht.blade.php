<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto Website</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col min-h-screen font-sans">
    <header class="bg-blue-500 text-white p-2 flex items-center justify-center">
        <div class="flex items-center">
            <img src="logo.png" alt="" class="h-12 mr-4">
            <h1 class="text-2xl font-bold">Voertuigen</h1>
        </div>
    </header>

    @if (session('voertuig_opgeslaagd'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('voertuig_opgeslaagd') }}</span>
        </div>
    @endif

     @if (session('rit_opgeslaagd'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('rit_aangemaakt') }}</span>
        </div>
    @endif

    @if (session('voertuig_bewerkt'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('voertuig_bewerkt') }}</span>
    </div>
    @endif

    <div class="flex flex-1">
        <nav class="w-48 bg-gray-100 p-5 shadow-md text-sm">
            <ul class="space-y-4">
                <li>
                    <a href="/" class="block text-blue-900 font-bold bg-gray-200 hover:bg-gray-300 hover:translate-x-1 transform transition px-3 py-2 rounded-md">
                        <span class="mr-2">&#128187;</span>
                        Home
                    </a>
                </li>
                <li>
                    <a href="/voertuig_toevogen" class="block text-blue-900 font-bold bg-gray-200 hover:bg-gray-300 hover:translate-x-1 transform transition px-3 py-2 rounded-md">
                        <span class="mr-2">&#128664;</span>
                        Voertuig-Toevogen
                    </a>
                </li>
                <li>
                    <a href="/rit_toevogen" class="block text-blue-900 font-bold bg-gray-200 hover:bg-gray-300 hover:translate-x-1 transform transition px-3 py-2 rounded-md">
                        <span class="mr-1">&#128663;</span>
                        Rit-Toevogen
                    </a>
                </li>
                <li>
                    <li>
                        <a href="/rit_overzicht" class="block text-blue-900 font-bold bg-gray-200 hover:bg-gray-300 hover:translate-x-1 transform transition px-3 py-2 rounded-md">
                            <span class="mr-1">&#128204;</span> <!-- Unicode-icoon voor 'Rit-Toevogen' -->
                            Rit-Overzicht
                        </a>
                    </li>
                    <a href="/info" class="block text-blue-900 font-bold bg-gray-200 hover:bg-gray-300 hover:translate-x-1 transform transition px-3 py-2 rounded-md">
                        <span class="mr-2">&#8505;</span>
                        Info
                    </a>
                </li>
            </ul>
        </nav>

        <main class="flex-1 p-5 bg-white">
            <!-- Titel Box -->
            <div class="bg-gray-50 p-4 mb-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold text-gray-800 text-center">Voertuigen Informatie</h2>
            </div>
            <div class="border rounded-lg p-5 shadow-lg shadow-black/70">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700">
                            <th class="p-3 font-semibold border-b">Kenteken</th>
                            <th class="p-3 font-semibold border-b">Datum</th>
                            <th class="p-3 font-semibold border-b">Tijd van</th>
                            <th class="p-3 font-semibold border-b">Tijd tot</th>
                            <th class="p-3 font-semibold border-b">Locatie van</th>
                            <th class="p-3 font-semibold border-b">Locatie tot</th>
                            <th class="p-3 font-semibold border-b">Afstand</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rit_overzichten as $rit_overzicht)
                            <tr class="hover:bg-gray-100">
                                <td class="p-3 border-b text-center">
                                    <div class="bg-yellow-400 text-black font-mono rounded-md border border-black px-2 py-1 text-lg">
                                        {{$rit_overzicht->voertuig->kenteken}}
                                    </div>
                                </td>
                                <td class="p-3 border-b text-center">{{$rit_overzicht->datum}}</td>
                                <td class="p-3 border-b text-center">
                                    {{ \Carbon\Carbon::parse($rit_overzicht->tijd_van)->format('H:i') }}
                                </td>
                                <td class="p-3 border-b text-center">
                                    {{ \Carbon\Carbon::parse($rit_overzicht->tijd_tot)->format('H:i') }}
                                </td>
                                <td class="p-3 border-b text-center">{{$rit_overzicht->locatie_van}}</td>
                                <td class="p-3 border-b text-center">{{$rit_overzicht->locatie_tot}}</td>
                                <td class="p-3 border-b text-center">
                                    {{$rit_overzicht->afstand}} KM
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
        
    </div>

    <footer class="bg-blue-500 text-white text-center p-4">
        <p>&copy; 2024 Auto Website. Alle rechten voorbehouden.</p>
    </footer>
</body>
</html>
