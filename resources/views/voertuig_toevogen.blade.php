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
                    <a href="rit_toevogen" class="block text-blue-900 font-bold bg-gray-200 hover:bg-gray-300 hover:translate-x-1 transform transition px-3 py-2 rounded-md">
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

        <!-- Main Content -->
        
        <main class="flex-1 p-5 bg-white flex justify-center items-center">
            
            <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
                <div class="bg-gray-50 p-4 mb-6 rounded-lg shadow-md">
                    <h2 class="text-xl font-semibold text-gray-800 text-center">Voertuig Toevoegen</h2>
                </div>
                <form action="/voertuig_opslaan" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="kenteken" class="block text-sm font-semibold text-gray-700">Kenteken</label>
                        <input type="text" id="kenteken" name="kenteken" class="w-full p-2 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="merk" class="block text-sm font-semibold text-gray-700">Merk</label>
                        <input type="text" id="merk" name="merk" class="w-full p-2 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="model" class="block text-sm font-semibold text-gray-700">Model</label>
                        <input type="text" id="model" name="model" class="w-full p-2 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="bouwjaar" class="block text-sm font-semibold text-gray-700">Bouwjaar</label>
                        <select id="bouwjaar" name="bouwjaar" class="w-full p-2 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            <?php
                            for ($year = 2024; $year >= 2006; $year--) {
                                echo "<option value=\"$year\">$year</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="hudig_km" class="block text-sm font-semibold text-gray-700">Huidige Kilometerstand</label>
                        <input type="number" id="hudig_km" name="hudig_km" class="w-full p-2 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div>
                        <input type="submit" value="Verstuur" class="w-full p-2 bg-blue-600 text-white font-bold rounded-md cursor-pointer hover:bg-blue-700 transition duration-300">
                    </div>
                </form>
            </div>
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-blue-500 text-white text-center p-4">
        <p>&copy; 2024 Auto Website. Alle rechten voorbehouden.</p>
    </footer>
</body>
</html>
