<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Search</title>
    <link rel="stylesheet" href="/css/app.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="bg-gradient-to-r from-pink-200 to-purple-200 flex items-center justify-center min-h-screen font-sans">
<div class="bg-white p-10 rounded-lg shadow-md w-full max-w-md">
    <h1 class="text-2xl font-bold text-center mb-6">Search Lyrics</h1>
    <form id="search-form">
        @csrf
        <div class="mb-4">
            <label for="lyrics" class="block text-gray-700">Enter Lyrics:</label>
            <input type="text" name="lyrics" id="lyrics" class="w-full p-2 border border-gray-300 rounded mt-2" required>
        </div>
        <div class="flex justify-center">
            <button type="submit" class="bg-purple-700 text-white px-4 py-2 rounded">Search</button>
        </div>
    </form>
</div>
<div id="results-container"></div>
<div id="pagination-container" class="flex justify-center mt-4"></div>

<script src="/js/api.js"></script>
<script src="/js/main.js"></script>
</body>
</html>



