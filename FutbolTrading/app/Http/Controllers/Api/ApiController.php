<?php

// Tomas

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\FootballDataService;
use Illuminate\View\View;

class ApiController extends Controller
{
    protected $footballDataService;

    public function __construct(FootballDataService $footballDataService)
    {
        $this->footballDataService = $footballDataService;
    }

    public function players(): View
    {

        $competitionData = $this->footballDataService->getCompetition('PL');

        $teamsData = $this->footballDataService->getTeams('PL');

        return view('api.players', [
            'data' => $competitionData,
            'teams' => $teamsData['teams'] ?? [],
        ]);
    }
}
