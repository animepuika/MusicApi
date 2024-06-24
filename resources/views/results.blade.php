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
            text-align: center;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            width: 100%;
            margin-top: 20px;
        }
        .title {
            font-size: 24px;
            font-weight: bold;
            color: black;
            text-shadow: 1px 1px 2px purple;
        }
        .results-table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        .results-table th, .results-table td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }
        .results-table th {
            background-color: #f0f0f0;
        }
        .pagination {
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }
        .pagination button {
            margin: 0 5px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: black;
            color: white;
            cursor: pointer;
        }
        .pagination button.active {
            background-color: purple;
        }
        @media (max-width: 600px) {
            .results-container {
                width: 90%;
            }
            .results-table th, .results-table td {
                padding: 5px;
            }
        }
    </style>
</head>
<body>
<div class="results-container">
    <h1 class="title">Search Results</h1>
    <div id="results-container">
        <!-- Results will be dynamically inserted here -->
    </div>
    <div id="pagination-container" class="pagination">
        <!-- Pagination buttons will be dynamically inserted here -->
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="module" src="/js/main.js"></script>
</body>
</html>






