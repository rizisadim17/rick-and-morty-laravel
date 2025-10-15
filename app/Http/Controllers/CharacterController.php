<?php

namespace App\Http\Controllers;

use App\Services\CharacterService;
use Illuminate\Http\Request;

class CharacterController
{
    protected $characterService;

    public function __construct(CharacterService $characterService)
    {
        $this->characterService = $characterService;
    }

    public function index()
    {
        $data = $this->characterService->getAllCharacters();
        return view('characters.index', compact('data'));
    }

    public function show($id)
    {
        $data = $this->characterService->getCharacterById($id);
        
        if (!$data) {
            return view('errors.api-error', [
                'message' => 'Unable to load character details. Please try again later.'
            ]);
        }
        
        return view('characters.show', compact('data'));
    }
}