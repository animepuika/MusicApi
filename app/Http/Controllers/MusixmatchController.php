<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MusixmatchController extends Controller
{
    public function search(Request $request)
    {
        $apiKey = env('MUSIXMATCH_API_KEY');
        $lyrics = $request->input('lyrics');
        $page = $request->input('page', 1);
        $pageSize = 7;

        $response = Http::get('https://api.musixmatch.com/ws/1.1/track.search', [
            'q_lyrics' => $lyrics,
            'apikey' => $apiKey,
            'page_size' => $pageSize,
            'page' => $page,
            'format' => 'json'
        ]);

        $results = $response->json()['message']['body']['track_list'];

        return view('results', compact('results', 'lyrics', 'page'));
    }
}









