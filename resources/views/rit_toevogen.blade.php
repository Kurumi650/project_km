<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto Informatie Formulier</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col min-h-screen font-sans">
    <!-- Header -->
    <header class="bg-blue-500 text-white p-1 flex items-center justify-center">
        <div class="flex items-center">
            <img src="logo.png" alt="" class="h-12 mr-4">
            <h1 class="text-2xl font-bold">Auto Website</h1>
        </div>
    </header>

    <div class="flex flex-1">   
        <!-- Menu -->
        <nav class="w-48 bg-gray-100 p-5 shadow-md text-sm">
            <ul class="space-y-4">
                <li>
                    <a href="/" class="block text-blue-900 font-bold bg-gray-200 hover:bg-gray-300 hover:translate-x-1 transform transition px-3 py-2 rounded-md">
                        <span class="mr-2">&#128187;</span>
                        Home
                    </a>
                </li>
                <li>
                    <a href="voertuig_toevogen" class="block text-blue-900 font-bold bg-gray-200 hover:bg-gray-300 hover:translate-x-1 transform transition px-3 py-2 rounded-md">
                        <span class="mr-2">&#128664;</span>
                        Voertuig-Toevogen
                    </a>
                </li>
                <li>
                    <a href="rit_toevogen" class="block text-blue-900 font-bold bg-gray-200 hover:bg-gray-300 hover:translate-x-1 transform transition px-3 py-2 rounded-md">
                        <span class="mr-1">&#128663;</span>
                        Rit-Toevogen
                    </a>
                </li>
                <li>
                    <a href="/rit_overzicht" class="block text-blue-900 font-bold bg-gray-200 hover:bg-gray-300 hover:translate-x-1 transform transition px-3 py-2 rounded-md">
                        <span class="mr-1">&#128204;</span> <!-- Unicode-icoon voor 'Rit-Toevogen' -->
                        Rit-Overzicht
                    </a>
                </li>
                <li>
                    <a href="/info" class="block text-blue-900 font-bold bg-gray-200 hover:bg-gray-300 hover:translate-x-1 transform transition px-3 py-2 rounded-md">
                        <span class="mr-2">&#8505;</span>
                        Info
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Main Content -->
        <main class="flex-1 p-6 bg-white flex justify-center items-center">
            <div class="w-full max-w-6xl">
                <!-- Titel Box -->
                <div class="bg-gray-50 p-4 mb-6 rounded-lg shadow-md">
                    <h2 class="text-xl font-semibold text-gray-800 text-center">Rit Toevoegen</h2>
                </div>

                <!-- Formulier Box -->
                <div class="bg-gray-50 p-8 rounded-lg shadow-md">
                    <form action="/rit_opslaan" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Auto Selectie -->
                            <div>
                                <label for="auto" class="block text-sm font-medium text-gray-700">Kies een auto</label>
                                <select id="auto" name="voertuig_id" class="mt-1 block w-full max-w-xs border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 py-1">
                                    <option value="" disabled selected>Selecteer een auto</option>
                                    @foreach ($voertuigen as $voertuig)
                                        <option value="{{ $voertuig->id }}">{{ $voertuig->kenteken }}&nbsp;/&nbsp;{{ $voertuig->merk }}</option>
                                    @endforeach
                                </select>
                                @error('voertuig_id')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                    
                            <!-- Datum -->
                            <div>
                                <label for="datum" class="block text-sm font-medium text-gray-700">Datum</label>
                                <input type="date" id="datum" name="datum" class="mt-1 block w-full max-w-xs border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 py-1">
                                @error('datum')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                    
                            <!-- Tijd van -->
                            <div>
                                <label for="tijd_van" class="block text-sm font-medium text-gray-700">Tijd van</label>
                                <input type="time" id="tijd_van" name="tijd_van" class="mt-1 block w-full max-w-xs border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 py-1">
                                @error('tijd_van')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                    
                            <!-- Tijd tot -->
                            <div>
                                <label for="tijd_tot" class="block text-sm font-medium text-gray-700">Tijd tot</label>
                                <input type="time" id="tijd_tot" name="tijd_tot" class="mt-1 block w-full max-w-xs border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 py-1">
                                @error('tijd_tot')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                    
                            <!-- Locatie van -->
                            <div>
                                <label for="locatie_van" class="block text-sm font-medium text-gray-700">Locatie van</label>
                                <input type="text" id="locatie_van" name="locatie_van" class="mt-1 block w-full max-w-xs border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 py-1" placeholder="Vul de vertrek locatie in">
                                @error('locatie_van')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                    
                            <!-- Locatie tot -->
                            <div>
                                <label for="locatie_tot" class="block text-sm font-medium text-gray-700">Locatie tot</label>
                                <input type="text" id="locatie_tot" name="locatie_tot" class="mt-1 block w-full max-w-xs border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 py-1" placeholder="Vul de bestemming in">
                                @error('locatie_tot')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                    
                            <!-- Afstand -->
                            <div>
                                <label for="afstand" class="block text-sm font-medium text-gray-700">Afstand (in km)</label>
                                <input type="number" id="afstand" name="afstand" class="mt-1 block w-full max-w-xs border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 py-1" placeholder="Vul de afstand in">
                                @error('afstand')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                    
                            <!-- Submit Button -->
                            <div class="mt-6 text-right">
                                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                                    Rit aanmaken
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-blue-500 text-white text-center p-4">
        <p>&copy; 2024 Auto Website. Alle rechten voorbehouden.</p>
    </footer>
</body>
</html>
