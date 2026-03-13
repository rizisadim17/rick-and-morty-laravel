<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\CharacterService;
use App\Services\EpisodeService;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    public function __construct(
        protected EpisodeService $episodeService,
        protected CharacterService $characterService,
    ) {
    }

    public function index()
    {
        $data = $this->episodeService->getAllEpisodes();

        if (empty($data)) {
            return response()->json(['error' => 'Unable to load episodes'], 503);
        }

        return response()->json($data);
    }

    public function show(int $id, Request $request)
    {
        $page = (int) $request->query('page', 1);
        $result = $this->episodeService->getEpisodeById($id, $page);

        if (!$result) {
            return response()->json(['error' => 'Episode not found'], 404);
        }

        $characters = [];
        foreach ($result['pagination']['characters_per_page'] ?? [] as $characterUrl) {
            $characterId = basename($characterUrl);
            $character = $this->characterService->getCharacterById((int) $characterId);
            if ($character) {
                $characters[] = $character;
            }
        }

        return response()->json([
            'episode' => $result['episode_data'],
            'characters' => $characters,
            'pagination' => [
                'current_page' => $result['pagination']['current_page'],
                'total_pages' => $result['pagination']['total_pages'],
                'has_next' => $result['pagination']['has_next'],
                'has_prev' => $result['pagination']['has_prev'],
            ],
        ]);
    }
}
