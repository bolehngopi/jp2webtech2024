<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Http\Requests\StorePlayerRequest;
use App\Http\Requests\UpdatePlayerRequest;
use App\Http\Resources\PlayerResource;
use App\Models\Club;
use App\Models\Nationality;
use App\Models\Position;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @group Players Management
 *
 * APIs for managing players
 */
class PlayerController extends Controller
{
    /**
     *
     * Display a listing of the resource.
     *
     * @return JsonResponse
     *
     */
    public function index(): JsonResponse
    {
        $players = Player::all();
        return response()->json([
            'message' => 'Players retrieved successfully',
            'data' => PlayerResource::collection($players)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePlayerRequest $request
     * @return JsonResponse
     * @bodyParam full_name string required The full name of the player. Example: John Doe
     * @bodyParam email string required The email of the player. Example: [email protected]
     * @bodyParam password string required The password of the player. Example: secret
     * @bodyParam height float required The height of the player. Example: 180.5
     * @bodyParam weight float required The weight of the player. Example: 75.5
     * @bodyParam description string required The description of the player. Example: A great player
     * @bodyParam squad_number integer required The squad number of the player. Example: 10
     * @bodyParam club_id integer required The ID of the club that the player belongs to. Example: 1
     * @bodyParam positions_id integer required The ID of the position that the player belongs to. Example: 1
     * @bodyParam nationality_id integer required The ID of the nationality that the player belongs to. Example: 1
     * @bodyParam active boolean required The status of the player. Example: 1
     */
    public function store(StorePlayerRequest $request): JsonResponse
    {
        $data = $request->validated();
        $player = Player::create($data);
        return response()->json([
            'message' => 'Player created successfully',
            'data' => new PlayerResource($player)
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Player $player
     * @return JsonResponse
     */
    public function show(Player $player): JsonResponse
    {
        return response()->json(new PlayerResource($player));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePlayerRequest $request
     * @param Player $player
     * @return JsonResponse
     * @bodyParam full_name string required The full name of the player. Example: John Doe
     * @bodyParam email string required The email of the player. Example: [email protected]
     * @bodyParam password string required The password of the player. Example: secret
     * @bodyParam height float required The height of the player. Example: 180.5
     * @bodyParam weight float required The weight of the player. Example: 75.5
     * @bodyParam description string required The description of the player. Example: A great player
     * @bodyParam squad_number integer required The squad number of the player. Example: 10
     * @bodyParam club_id integer required The ID of the club that the player belongs to. Example: 1
     * @bodyParam positions_id integer required The ID of the position that the player belongs to. Example: 1
     * @bodyParam nationality_id integer required The ID of the nationality that the player belongs to. Example: 1
     * @bodyParam active boolean required The status of the player. Example: 1
     * @urlParam player required The ID of the player. Example: 1
     *
     */
    public function update(UpdatePlayerRequest $request, Player $player): JsonResponse
    {
        $data = $request->validated();

        // Update club if club_id is provided in the request
        if ($request->has('club_id')) {
            $clubId = $data['club_id'];
            $club = Club::findOrFail($clubId);
            $player->club()->associate($club);
            unset($data['club_id']); // Remove club_id from update data
        }

        // Update position if positions_id is provided in the request
        if ($request->has('positions_id')) {
            $positionId = $data['positions_id'];
            $position = Position::findOrFail($positionId);
            $player->position()->associate($position);
            unset($data['positions_id']); // Remove positions_id from update data
        }

        // Update nationality if nationality_id is provided in the request
        if ($request->has('nationality_id')) {
            $nationalityId = $data['nationality_id'];
            $nationality = Nationality::findOrFail($nationalityId);
            $player->nationality()->associate($nationality);
            unset($data['nationality_id']); // Remove nationality_id from update data
        }

        // Update player's other attributes
        $update = $player->update($data);

        if (!$update) {
            return response()->json(['message' => 'Failed to update player'], 500);
        }

        return response()->json([
            'message' => 'Player updated successfully',
            'data' => new PlayerResource($player->refresh()) // Refresh to get updated relationships
        ]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Player $player
     * @return JsonResponse
     * @urlParam player required The ID of the player. Example: 1
     */
    public function destroy(Player $player): JsonResponse
    {
        $deleted = $player->forceDelete();

        if (!$deleted) {
            return response()->json(['message' => 'Failed to delete player'], 500);
        }

        return response()->json([
            'message' => 'Player deleted successfully'
        ], 204);
    }
}
