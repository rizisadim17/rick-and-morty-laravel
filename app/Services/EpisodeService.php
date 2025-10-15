<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class EpisodeService
{
    protected $baseUrl;
    protected $paginationService;

    public function __construct(PaginationService $paginationService)
    {
        $this->baseUrl = config('services.rickandmorty.base_url');
        $this->paginationService = $paginationService;
    }

    public function getAllEpisodes()
    {
        try {
            $response = Http::timeout(10)
                ->retry(3, 100)
                ->get($this->baseUrl . '/episode');
            
            if (!$response->successful()) {
                Log::warning("Failed to fetch all episodes");
                return [];
            }
            
            $data = $response->json();
            $episodes = [];
            
            foreach ($data['results'] as $episode) {
                $episodes[] = [
                    'id' => $episode['id'] ?? '',
                    'name' => $episode['name'] ?? '',
                    'air_date' => $episode['air_date'] ?? '',
                    'episode' => $episode['episode'] ?? '',
                    'url' => $episode['url'] ?? '',
                ];
            }
            
            usort($episodes, function ($a, $b) {
                return strtotime($b['air_date']) <=> strtotime($a['air_date']);
            });
            
            return $episodes;
            
        } catch (\Exception $e) {
            Log::error("Error fetching episodes: " . $e->getMessage());
            return [];
        }
    }

    public function getEpisodeById(int $id, int $page)
    {
        try {
            $response = Http::timeout(10)
                ->retry(3, 100)
                ->get($this->baseUrl . '/episode/' . $id);
            
            if (!$response->successful()) {
                Log::warning("Failed to fetch episode {$id}");
                return null;
            }
            
            $data = $response->json();
            $characterUrls = $data['characters'] ?? [];
            $pagination = $this->paginationService->paginate($characterUrls, $page, 20);

            $episodeData = [
                'id' => $data['id'] ?? '',
                'name' => $data['name'] ?? '',
                'air_date' => $data['air_date'] ?? '',
                'episode' => $data['episode'] ?? '',
                'url' => $data['url'] ?? '',
            ];

            return [
                'episode_data' => $episodeData,
                'pagination' => $pagination,
            ];
            
        } catch (\Exception $e) {
            Log::error("Error fetching episode {$id}: " . $e->getMessage());
            return null;
        }
    }
}