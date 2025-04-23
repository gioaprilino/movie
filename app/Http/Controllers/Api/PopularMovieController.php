<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ApiService;

class PopularMovieController extends Controller
{
    protected $apiService;

    // Menambahkan dependensi pada constructor
    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    // Method untuk mendapatkan semua tim
    public function getMovies()
    {
        // Ambil data tim dari API
        $movies = $this->apiService->getMovies();

        // return response()->json($movies);
        return view('movies', ['data' => $movies]);

    }
}
