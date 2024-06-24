<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Music Search Results</title>
    <style>
        .results-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 800px;
        }
        .results-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }
        .results-table th, .results-table td {
            color: purple;
        }
        .pagination, .back-button {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .pagination button, .back-button button {
            padding: 10px 20px;
            margin: 0 5px;
            border: none;
            border-radius: 5px;
            background-color: black;
            color: white;
            cursor: pointer;
        }
        @media (max-width: 600px) {
            .results-container {
                width: 100%;
                padding: 10px;
            }
            .results-title {
                font-size: 20px;
            }
            .results-table th, .results-table td {
                padding: 8px;
                font-size: 14px;
            }
            .pagination button, .back-button button {
                padding: 8px 16px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body class="bg-gradient-to-r from-pink-300 to-purple-300 flex items-center justify-center min-h-screen p-4">
<section class="results-container">
    <h1 class="results-title">Results</h1>
    <table class="results-table w-full border-collapse mb-6">
        <thead>
        <tr class="bg-gray-200">
            <th class="py-2 px-4 text-left">Artist</th>
            <th class="py-2 px-4 text-left">Album</th>
            <th class="py-2 px-4 text-left">Track</th>
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
    <div class="pagination">
        @if($page > 1)
            <button onclick="window.location.href='{{ route('results', ['lyrics' => $lyrics, 'page' => $page - 1]) }}'" class="px-4 py-2">Previous</button>
        @endif
        <button onclick="window.location.href='{{ route('results', ['lyrics' => $lyrics, 'page' => $page + 1]) }}'" class="px-4 py-2">Next</button>
    </div>
    <div class="back-button">
        <button onclick="window.location.href='{{ route('welcome') }}'" class="px-4 py-2">Go Back and Search Again</button>
    </div>
</section>
</body>
</html>






