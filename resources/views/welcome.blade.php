<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Music Search</title>
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
        .search-container {
            text-align: center;
        }
        .title {
            font-size: 24px;
            font-weight: bold;
            color: black;
            text-shadow: 1px 1px 2px purple;
            text-align: left;
            margin-left: calc(50% - 175px); /* Center align the heading with search box */
        }
        .search-box {
            margin-top: 20px;
            padding: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 350px;
        }
        .search-button {
            margin-top: 10px;
            padding: 15px 30px;
            border: none;
            border-radius: 20px;
            background-color: black;
            color: white;
            cursor: pointer;
        }
        @media (max-width: 600px) {
            .search-container {
                width: 90%;
            }
            .search-box {
                width: 100%;
            }
            .title {
                width: 100%;
            }
        }
    </style>
</head>
<body>
<section class="search-container">
    <h1 class="title">Lyric Matcher</h1>
    <form id="search-form">
        @csrf
        <input type="text" name="lyrics" id="lyrics" class="search-box" placeholder="What Song are you trying to find?">
        <br>
        <button type="submit" class="search-button">Search</button>
    </form>
</section>
<div id="results-container" class="bg-white p-10 rounded-lg shadow-md w-full max-w-2xl mt-6"></div>
<div id="pagination-container" class="flex justify-center mt-4"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="module" src="/js/main.js"></script>
</body>
</html>



