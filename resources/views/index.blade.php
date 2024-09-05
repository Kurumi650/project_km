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
                    <a href="#" class="block text-blue-900 font-bold bg-gray-200 hover:bg-gray-300 hover:translate-x-1 transform transition px-3 py-2 rounded-md">
                        <span class="mr-2">&#8505;</span> <!-- Unicode-icoon voor 'Info' -->
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
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Itereer over elk voertuig -->
                    @foreach ($voertuigen as $voertuig)
                    <div class="border rounded-lg p-5 shadow-md">
                        <table class="w-full border-collapse">
                            <tbody>
                                <tr class="border-b">
                                    <td class="p-3 font-semibold">Kenteken:</td>
                                    <td class="p-3">
                                        <div class="bg-yellow-400 text-black font-mono rounded-md border border-black text-center inline-block px-2 py-1 text-lg tracking-wide">
                                            {{$voertuig->kenteken}}
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <td class="p-3 font-semibold">Merk:</td>
                                    <td class="p-3">{{$voertuig->merk}}</td>
                                </tr>
                                <tr class="border-b">
                                    <td class="p-3 font-semibold">Model:</td>
                                    <td class="p-3">{{$voertuig->model}}</td>
                                </tr>
                                <tr class="border-b">
                                    <td class="p-3 font-semibold">Bouwjaar:</td>
                                    <td class="p-3">{{$voertuig->bouwjaar}}</td>
                                </tr>
                                <tr>
                                    <td class="p-3 font-semibold">Huidige KM:</td>
                                    <td class="p-3">{{$voertuig->hudig_km}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @endforeach
                    <!-- Voeg meer auto's toe op dezelfde manier -->
                </div>
            </div>
        </main>
    </div>

    <footer class="bg-blue-500 text-white text-center p-4">
        <p>&copy; 2024 Auto Website. Alle rechten voorbehouden.</p>
    </footer>
</body>
</html>
