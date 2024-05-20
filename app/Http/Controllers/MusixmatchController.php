<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Pagination\LengthAwarePaginator;

class MusixmatchController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function search(Request $request)
    {
        if ($request->isMethod('post')) {
            $lyrics = $request->input('lyrics');
            session(['lyrics' => $lyrics]);
        } else {
            $lyrics = session('lyrics');
        }

        $client = new Client();
        $apiKey = env('MUSIXMATCH_API_KEY');

        $perPage = 7;
        $currentPage = LengthAwarePaginator::resolveCurrentPage('page');

        $response = $client->get('https://api.musixmatch.com/ws/1.1/track.search', [
            'query' => [
                'q_lyrics' => $lyrics,
                'apikey' => $apiKey,
                'page_size' => $perPage,
                'page' => $currentPage,
                'format' => 'json'
            ]
        ]);

        $data = json_decode($response->getBody(), true);
        $tracks = collect($data['message']['body']['track_list'] ?? []);
        $total = $data['message']['header']['available'] ?? 0;

        // Create a LengthAwarePaginator instance
        $paginator = new LengthAwarePaginator(
            $tracks,
            $total,
            $perPage,
            $currentPage,
            ['path' => LengthAwarePaginator::resolveCurrentPath(), 'pageName' => 'page']
        );

        return view('results', ['paginator' => $paginator, 'tracks' => $tracks]);
    }
}









