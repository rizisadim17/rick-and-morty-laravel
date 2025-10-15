<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CharacterService
{
    protected $baseUrl;
    protected $paginationService;

    public function __construct(PaginationService $paginationService)
    {
        $this->baseUrl = config('services.rickandmorty.base_url');
        $this->paginationService = $paginationService;
    }

    public function getAllCharacters()
    {
        try {
            $response = Http::timeout(10)
                ->retry(3, 100)
                ->get($this->baseUrl . '/character');
            
            if (!$response->successful()) {
                Log::warning("Failed to fetch all characters");
                return [];
            }
            
            $data = $response->json();
            $characters = [];
            
            if (!empty($data['results'])) {
                foreach ($data['results'] as $character) {
                    $characters[] = $this->characterDetails($character);
                }
            }
            
            return $characters;
            
        } catch (\Exception $e) {
            Log::error("Error fetching characters: " . $e->getMessage());
            return [];
        }
    }

    public function getCharacterById(int $id): ?array
    {
        try {
            $response = Http::timeout(10)
                ->retry(3, 100) // Retry 3 times with 100ms delay
                ->get($this->baseUrl . '/character/' . $id);
            
            if ($response->successful()) {
                return $this->characterDetails($response->json());
            }
            
            \Log::warning("API returned non-200 status for character {$id}");
            return null;
            
        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            \Log::error("Connection failed for character {$id}: " . $e->getMessage());
            return null;
        } catch (\Exception $e) {
            \Log::error("Unexpected error for character {$id}: " . $e->getMessage());
            return null;
        }
    }

    public function getCharactersByDimension(string $dimension, int $page = 1): ?array
    {
        $url = $this->baseUrl . '/location?dimension=' . urlencode($dimension);
        return $this->getCharactersByLocationOrDimension($url, $page);
    }

    public function getCharactersByLocation(string $location, int $page = 1): ?array
    {
        $url = $this->baseUrl . '/location?name=' . urlencode($location);
        return $this->getCharactersByLocationOrDimension($url, $page);
    }

    private function getCharactersByLocationOrDimension(string $url, int $page): ?array
    {
        try {
            $response = Http::timeout(10)
                ->retry(3, 100)
                ->get($url);
            
            if (!$response->successful()) {
                Log::warning("Failed to fetch location data from: {$url}");
                return ['characters' => [], 'pagination' => ['total_pages' => 0]];
            }
            
            $data = $response->json();
            $allCharacterUrls = [];

            if (!empty($data['results'])) {
                foreach ($data['results'] as $location) {
                    if (!empty($location['residents'])) {
                        $allCharacterUrls = array_merge($allCharacterUrls, $location['residents']);
                    }
                }
            }

            $characters = [];
            $pagination = $this->paginationService->paginate($allCharacterUrls, $page, 20);

            foreach ($pagination['characters_per_page'] as $residentUrl) {
                try {
                    $characterResponse = Http::timeout(10)->get($residentUrl);
                    if ($characterResponse->successful()) {
                        $characters[] = $this->characterDetails($characterResponse->json());
                    }
                } catch (\Exception $e) {
                    Log::warning("Failed to fetch character from: {$residentUrl}");
                    continue;
                }
            }

            return [
                'characters' => $characters,
                'pagination' => $pagination,
            ];
            
        } catch (\Exception $e) {
            Log::error("Error in getCharactersByLocationOrDimension: " . $e->getMessage());
            return ['characters' => [], 'pagination' => ['total_pages' => 0]];
        }
    }

    private function characterDetails($data): array
    {
        return [
            'id' => $data['id'] ?? '',
            'name' => $data['name'] ?? '',
            'status' => $data['status'] ?? '',
            'species' => $data['species'] ?? '',
            'gender' => $data['gender'] ?? '',
            'image' => $data['image'] ?? '',
            'origin' => [
                'name' => $data['origin']['name'] ?? '',
                'url' => $data['origin']['url'] ?? ''
            ],
            'location' => [
                'name' => $data['location']['name'] ?? '',
                'url' => $data['location']['url'] ?? ''
            ],
            'episode' => $data['episode'] ?? [],
        ];
    }
}