<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\CharacterService;
use App\Services\LocationService;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function __construct(
        protected CharacterService $characterService,
        protected LocationService $locationService,
    ) {
    }

    public function show(int $id, Request $request)
    {
        $page = (int) $request->query('page', 1);
        $result = $this->locationService->getLocationById($id, $page);

        if (!$result) {
            return response()->json(['error' => 'Location not found'], 404);
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
            'location' => $result['location_data'],
            'characters' => $characters,
            'pagination' => [
                'current_page' => $result['pagination']['current_page'],
                'total_pages' => $result['pagination']['total_pages'],
                'has_next' => $result['pagination']['has_next'],
                'has_prev' => $result['pagination']['has_prev'],
            ],
        ]);
    }

    public function searchDimension(Request $request)
    {
        $dimension = $request->query('q', '');

        if (!$dimension) {
            return response()->json(['characters' => [], 'pagination' => null]);
        }

        $page = (int) $request->query('page', 1);
        $data = $this->characterService->getCharactersByDimension($dimension, $page);

        return response()->json([
            'characters' => $data['characters'] ?? [],
            'pagination' => isset($data['pagination']) ? [
                'current_page' => $data['pagination']['current_page'],
                'total_pages' => $data['pagination']['total_pages'],
                'has_next' => $data['pagination']['has_next'],
                'has_prev' => $data['pagination']['has_prev'],
            ] : null,
        ]);
    }

    public function searchLocation(Request $request)
    {
        $location = $request->query('q', '');

        if (!$location) {
            return response()->json(['characters' => [], 'pagination' => null]);
        }

        $page = (int) $request->query('page', 1);
        $data = $this->characterService->getCharactersByLocation($location, $page);

        return response()->json([
            'characters' => $data['characters'] ?? [],
            'pagination' => isset($data['pagination']) ? [
                'current_page' => $data['pagination']['current_page'],
                'total_pages' => $data['pagination']['total_pages'],
                'has_next' => $data['pagination']['has_next'],
                'has_prev' => $data['pagination']['has_prev'],
            ] : null,
        ]);
    }

    public function charactersByLocation(string $location, Request $request)
    {
        $page = (int) $request->query('page', 1);
        $data = $this->characterService->getCharactersByLocation($location, $page);

        return response()->json([
            'characters' => $data['characters'] ?? [],
            'pagination' => isset($data['pagination']) ? [
                'current_page' => $data['pagination']['current_page'],
                'total_pages' => $data['pagination']['total_pages'],
                'has_next' => $data['pagination']['has_next'],
                'has_prev' => $data['pagination']['has_prev'],
            ] : null,
        ]);
    }

    public function charactersByDimension(string $dimension, Request $request)
    {
        $page = (int) $request->query('page', 1);
        $data = $this->characterService->getCharactersByDimension($dimension, $page);

        return response()->json([
            'characters' => $data['characters'] ?? [],
            'pagination' => isset($data['pagination']) ? [
                'current_page' => $data['pagination']['current_page'],
                'total_pages' => $data['pagination']['total_pages'],
                'has_next' => $data['pagination']['has_next'],
                'has_prev' => $data['pagination']['has_prev'],
            ] : null,
        ]);
    }
}
