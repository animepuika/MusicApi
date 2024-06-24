<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Music Search Results</title>
</head>
<body class="bg-gradient-to-r from-pink-300 to-purple-300 flex items-center justify-center min-h-screen p-4">
<section class="bg-white p-6 rounded-lg shadow-lg w-full max-w-3xl">
    <h1 class="text-2xl font-bold text-center mb-6">Results</h1>
    <table class="w-full table-auto mb-6">
        <thead>
        <tr class="bg-gray-200">
            <th class="py-2 px-4 text-left text-purple-600">Artist</th>
            <th class="py-2 px-4 text-left text-purple-600">Album</th>
            <th class="py-2 px-4 text-left text-purple-600">Track</th>
        </tr>
        </thead>
        <tbody>
        @foreach($results as $result)
            <tr class="border-b">
                <td class="py-2 px-4">{{ $result['track']['artist_name'] }}</td>
                <td class="py-2 px-4">{{ $result['track']['album_name'] }}</td>
                <td class="py-2 px-4">{{ $result['track']['track_name'] }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="flex justify-center space-x-4 mb-4">
        @if($page > 1)
            <button onclick="window.location.href='{{ route('results', ['lyrics' => $lyrics, 'page' => $page - 1]) }}'" class="px-4 py-2 bg-black text-white rounded-lg hover:bg-purple-700 transition duration-300">Previous</button>
        @endif
        <button onclick="window.location.href='{{ route('results', ['lyrics' => $lyrics, 'page' => $page + 1]) }}'" class="px-4 py-2 bg-black text-white rounded-lg hover:bg-purple-700 transition duration-300">Next</button>
    </div>
    <div class="flex justify-center">
        <button onclick="window.location.href='{{ route('welcome') }}'" class="px-4 py-2 bg-black text-white rounded-lg hover:bg-purple-700 transition duration-300">Go Back and Search Again</button>
    </div>
</section>
</body>
</html>






