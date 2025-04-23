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

        $data = $this->footballDataService->getCompetition('PL');

        return view('api.players', ['data' => $data]);
    }
}
