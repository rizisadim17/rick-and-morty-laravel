<?php

namespace App\Http\Controllers;

use App\Services\CharacterService;
use App\Services\LocationService;
use Illuminate\Http\Request;

class LocationController
{
    protected $characterService;
    protected $locationService;

    public function __construct(
        CharacterService $characterService,
        LocationService $locationService
    ) {
        $this->characterService = $characterService;
        $this->locationService = $locationService;
    }

    public function searchDimension()
    {
        return view('locations.search-dimension');
    }

    public function searchLocation()
    {
        return view('locations.search-location');
    }

    public function charactersByLocation($location, Request $request)
    {
        $page = (int) $request->query('page', 1);
        
        try {
            $data = $this->characterService->getCharactersByLocation($location, $page);
        } catch (\Exception $e) {
            $data = ['characters' => [], 'pagination' => []];
        }

        return view('locations.search-location', [
            'characters' => $data['characters'] ?? [],
            'pagination' => $data['pagination'] ?? [],
            'search' => $location,
        ]);
    }

    public function charactersByDimension($dimension, Request $request)
    {
        $page = (int) $request->query('page', 1);
        
        try {
            $data = $this->characterService->getCharactersByDimension($dimension, $page);
        } catch (\Exception $e) {
            $data = ['characters' => [], 'pagination' => []];
        }

        return view('locations.search-dimension', [
            'characters' => $data['characters'] ?? [],
            'pagination' => $data['pagination'] ?? [],
            'search' => $dimension,
        ]);
    }

    public function show($id, Request $request)
    {
        $page = (int) $request->query('page', 1);
        $result = $this->locationService->getLocationById($id, $page);
        
        if (!$result) {
            return view('errors.api-error', [
                'message' => 'Unable to load location details. Please try again later.'
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

        return view('locations.show', [
            'details' => $result['location_data'],
            'pagination' => $result['pagination'],
            'characters' => $characterData,
        ]);
    }
}