<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class ApiService
{
    protected $client;

    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client;
        $this->apiKey = env('RAPIDAPI_KEY'); // Ambil API keydari file .env
    }

    // Fungsi untuk mendapatkan semua tim
    public function getMovies()
    {
        try {
            $response = $this->client->request('GET',
                'https://imdb236.p.rapidapi.com/imdb/most-popular-movies', ['headers' => ['x-rapidapi-key' => $this->apiKey], 'verify' => false,
                    // // Menonaktifkan verifikasi SSL
                ]);
            // return json_decode($response->getBody()->getContents(), true);
            $data = json_decode($response->getBody()->getContents(), true);

            return $data;
        } catch (RequestException $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
