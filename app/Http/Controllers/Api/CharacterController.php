<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\CharacterService;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    public function __construct(protected CharacterService $characterService)
    {
    }

    public function index()
    {
        $data = $this->characterService->getAllCharacters();
        return response()->json($data);
    }

    public function show(int $id)
    {
        $data = $this->characterService->getCharacterById($id);

        if (!$data) {
            return response()->json(['error' => 'Character not found'], 404);
        }

        return response()->json($data);
    }
}
