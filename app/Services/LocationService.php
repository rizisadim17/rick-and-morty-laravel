<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class LocationService
{
    protected $baseUrl;
    protected $paginationService;

    public function __construct(PaginationService $paginationService)
    {
        $this->baseUrl = config('services.rickandmorty.base_url');
        $this->paginationService = $paginationService;
    }

    public function getLocationById(int $id, int $page)
    {
        try {
            $response = Http::timeout(10)
                ->retry(3, 100)
                ->get($this->baseUrl . '/location/' . $id);
            
            if (!$response->successful()) {
                Log::warning("Failed to fetch location {$id}");
                return null;
            }

            $data = $response->json();
            $characterUrls = $data['residents'] ?? [];
            $pagination = $this->paginationService->paginate($characterUrls, $page, 20);

            $locationData = [
                'id' => $data['id'] ?? '',
                'name' => $data['name'] ?? '',
                'type' => $data['type'] ?? '',
                'dimension' => $data['dimension'] ?? '',
                'url' => $data['url'] ?? '',
            ];

            return [
                'location_data' => $locationData,
                'pagination' => $pagination,
            ];
            
        } catch (\Exception $e) {
            Log::error("Error fetching location {$id}: " . $e->getMessage());
            return null;
        }
    }
}