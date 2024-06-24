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
        }
        .pagination {
            display: flex;
            justify-content: center;
        }
        .pagination button {
            padding: 10px 20px;
            margin: 0 5px;
            border: none;
            border-radius: 5px;
            background-color: black;
            color: white;
            cursor: pointer;
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
        <tbody id="results-table-body">
        <!-- Results will be inserted here dynamically -->
        </tbody>
    </table>
    <div class="pagination">
        <button id="prev-page">Previous</button>
        <button id="next-page">Next</button>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="module">
    $(document).ready(function() {
        const lyrics = @json(request()->query('lyrics'));
        const page = @json(request()->query('page', 1));

        if (lyrics) {
            getResults(lyrics, page);
        }

        function getResults(lyrics, page) {
            $.ajax({
                url: `{{ route('results') }}`,
                data: {
                    lyrics: lyrics,
                    page: page
                },
                success: function(response) {
                    const trackList = response.message.body.track_list;
                    const resultsTableBody = $('#results-table-body');
                    resultsTableBody.empty();
                    trackList.forEach(track => {
                        const trackInfo = track.track;
                        resultsTableBody.append(`
                            <tr>
                                <td>${trackInfo.artist_name}</td>
                                <td>${trackInfo.album_name}</td>
                                <td>${trackInfo.track_name}</td>
                            </tr>
                        `);
                    });
                },
                error: function() {
                    alert('Error retrieving data');
                }
            });
        }

        $('#prev-page').click(function() {
            const prevPage = Math.max(1, parseInt(page) - 1);
            window.location.href = `{{ route('results') }}?lyrics=${encodeURIComponent(lyrics)}&page=${prevPage}`;
        });

        $('#next-page').click(function() {
            const nextPage = parseInt(page) + 1;
            window.location.href = `{{ route('results') }}?lyrics=${encodeURIComponent(lyrics)}&page=${nextPage}`;
        });
    });
</script>
</body>
</html>






