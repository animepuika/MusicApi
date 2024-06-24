<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Music Search Results</title>
    <style>
        body {
            background: linear-gradient(to right, #ffcccc, #ccccff);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .results-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 800px;
        }
        .results-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }
        .results-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .results-table th, .results-table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
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
<body>
<section class="results-container">
    <h1 class="results-title">Results</h1>
    <table class="results-table">
        <thead>
        <tr>
            <th>Artist</th>
            <th>Album</th>
            <th>Track</th>
        </tr>
        </thead>
        <tbody>
        @foreach($results as $result)
            <tr>
                <td>{{ $result['track']['artist_name'] }}</td>
                <td>{{ $result['track']['album_name'] }}</td>
                <td>{{ $result['track']['track_name'] }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pagination">
        @if($page > 1)
            <button onclick="window.location.href='{{ route('results', ['lyrics' => $lyrics, 'page' => $page - 1]) }}'">Previous</button>
        @endif
        <button onclick="window.location.href='{{ route('results', ['lyrics' => $lyrics, 'page' => $page + 1]) }}'">Next</button>
    </div>
    <div class="back-button">
        <button onclick="window.location.href='{{ route('welcome') }}'">Search Page</button>
    </div>
</section>
</body>
</html>






