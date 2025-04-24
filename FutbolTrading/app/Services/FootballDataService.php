<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class FootballDataService
{
    private $apiUrl = 'https://api.football-data.org/v4/competitions/';

    public function getCompetition($competitionCode)
    {
        $response = Http::withHeaders([
            'X-Auth-Token' => env('FOOTBALL_API_KEY'),
        ])->get($this->apiUrl.$competitionCode);

        return $response->json();
    }
    public function getTeams($competitionCode)
    {
        $url = $this->apiUrl . $competitionCode . '/teams';
        $response = Http::withHeaders([
            'X-Auth-Token' => env('FOOTBALL_API_KEY'),
        ])->get($url);

        return $response->json();
    }
}
