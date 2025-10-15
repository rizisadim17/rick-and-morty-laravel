<?php

namespace App\Http\Controllers;

use App\Services\EpisodeService;
use App\Services\CharacterService;
use Illuminate\Http\Request;

class EpisodeController
{
    protected $episodeService;
    protected $characterService;

    public function __construct(
        EpisodeService $episodeService,
        CharacterService $characterService
    ) {
        $this->episodeService = $episodeService;
        $this->characterService = $characterService;
    }

    public function index()
    {
        $data = $this->episodeService->getAllEpisodes();
    
        if (empty($data)) {
            return view('errors.api-error', [
                'message' => 'Unable to load episodes. Please try again later.'
            ]);
        }
        
        return view('episodes.index', compact('data'));
    }

    public function show($id, Request $request)
    {
        $page = (int) $request->query('page', 1);
        $result = $this->episodeService->getEpisodeById($id, $page);
        
        if (!$result) {
            return view('errors.api-error', [
                'message' => 'Unable to load episode details. Please try again later.'
            ]);
        }
        
        $characterData = [];
        if (!empty($result['pagination']['characters_per_page'])) {
            foreach ($result['pagination']['characters_per_page'] as $characterUrl) {
                $characterId = basename($characterUrl);
                $characterDetails = $this->characterService->getCharacterById((int)$characterId);
                if ($characterDetails) {
                    $characterData[] = $characterDetails;
                }
            }
        }

        return view('episodes.show', [
            'data' => $result['episode_data'],
            'pagination' => $result['pagination'],
            'characters' => $characterData,
        ]);
    }
}