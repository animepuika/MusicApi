<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Search Results</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body class="bg-gradient-to-r from-pink-200 to-purple-200 flex items-center justify-center min-h-screen font-sans">
<div class="bg-white p-10 rounded-lg shadow-md w-full max-w-2xl">
    <h1 class="text-2xl font-bold text-center mb-6">Results</h1>
        <table class="min-w-full bg-white">
            <thead>
            <tr>
                <th class="py-2 px-4 bg-gray-200 text-purple-700">Artist</th>
                <th class="py-2 px-4 bg-gray-200 text-purple-700">Album</th>
                <th class="py-2 px-4 bg-gray-200 text-purple-700">Track</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($tracks as $track)
                <tr class="border-b border-green-100">
                    <td class="py-2 px-4">{{ $track['track']['artist_name'] }}</td>
                    <td class="py-2 px-4">{{ $track['track']['album_name'] }}</td>
                    <td class="py-2 px-4">{{ $track['track']['track_name'] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    <div class="flex justify-between items-center mt-6">
        <a href="{{ route('home') }}" class="text-purple-700">&larr; Home</a>
    </div>
    <div>
        {{ $paginator->links('vendor.pagination.tailwind') }}
    </div>
</div>
</body>
</html>






