<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto Website</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Modal Styles */
        .modal {
            display: none;
            position: fixed; 
            z-index: 1000; 
            left: 0;
            top: 0;
            width: 100%;
            height: 100%; 
            overflow: auto;
            background-color: rgb(0,0,0); 
            background-color: rgba(0,0,0,0.4); 
            justify-content: center;
            align-items: center;
        }
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto; 
            padding: 20px;
            border: 1px solid #888;
            width: 80%; 
            max-width: 500px;
            border-radius: 8px;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
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
            <span class="block sm:inline">{{ session('rit_opgeslaagd') }}</span>
        </div>
    @endif

    @if (session('voertuig_bewerkt'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('voertuig_bewerkt') }}</span>
    </div>
    @endif

    @if (session('success'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">success!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
    @endif

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
                <h2 class="text-xl font-semibold text-gray-800 text-center">Voertuigen Informatie</h2>
            </div>
            <div class="border rounded-lg p-5 shadow-lg shadow-black/70">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Itereer over elk voertuig -->
                    @foreach ($voertuigen as $voertuig)
                        <div class="relative border rounded-lg p-5 shadow-md">
                            <!-- Action Icons Container -->
                            <div class="absolute top-2 right-2 flex space-x-1">
                                <!-- Edit Icon -->
                                <a href="/voertuigen/{{$voertuig->id}}/edit_voertuig" class="text-blue-600 hover:text-blue-800 transition duration-300">
                                    <i class="fas fa-pen fa-sm"></i>
                                </a>
                                <!-- Delete Icon -->
                                <form id="deleteForm" action="{{ route('voertuigen.delete', $voertuig->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="showModal(event, '{{ route('voertuigen.delete', $voertuig->id) }}')" class="flex items-center space-x-2 text-red-500 px-2 py-1 rounded-none border-none bg-transparent">
                                        <i class="fas fa-trash-alt text-sm"></i>
                                    </button>                                    
                                </form>                                                                                               
                            </div>
                            <!-- Vehicle Info Table -->
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
                </div>
            </div>
        </main>
    </div>
    <!-- Modal -->
    <div id="confirmationModal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close" onclick="hideModal()">&times;</span>
            <h2 class="text-lg font-semibold">Bevestiging</h2>
            <p>Weet u zeker dat u dit voertuig wilt verwijderen?</p>
            <div class="mt-4 flex justify-end space-x-4">
                <button onclick="confirmDeletion()" class="bg-blue-500 text-white px-4 py-2 rounded">Ja</button>
                <button onclick="hideModal()" class="bg-gray-500 text-white px-4 py-2 rounded">Nee</button>
            </div>
        </div>
    </div>

    <footer class="bg-blue-500 text-white text-center p-4">
        <p>&copy; 2024 Auto Website. Alle rechten voorbehouden.</p>
    </footer>

    <script>
        var deleteUrl;
        function showModal(event, url) {
            event.preventDefault();
            deleteUrl = url;
            document.getElementById('confirmationModal').style.display = 'flex';
        }
    
        function hideModal() {
            document.getElementById('confirmationModal').style.display = 'none';
        }
    
        function confirmDeletion() {
            var form = document.getElementById('deleteForm');
            form.action = deleteUrl; // Update the form action to the URL
            form.submit(); // Submit the form
        }
    </script>
</body>
</html>
