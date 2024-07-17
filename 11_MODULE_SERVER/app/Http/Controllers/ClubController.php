<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Http\Requests\StoreClubRequest;
use App\Http\Requests\UpdateClubRequest;
use App\Http\Resources\ClubResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @group Clubs Management
 *
 * APIs for managing clubs
 */
class ClubController extends Controller
{
    /**
     *
     * Display a listing of the resource.
     *
     * @return JsonResponse
     *
     *
     */
    public function index(): JsonResponse
    {
        $clubs = Club::with('players')->paginate(5);
        return response()->json([
            'message' => 'Clubs retrieved successfully',
            'data' => ClubResource::collection($clubs)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreClubRequest $request
     * @return JsonResponse
     * @bodyParam name string required The name of the club. Example: Manchester United
     */
    public function store(StoreClubRequest $request): JsonResponse
    {
        $data = $request->validated();
        $club = Club::create($data);
        return response()->json([
            'message' => 'Club created successfully',
            'data' => new ClubResource($club)
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Club $club
     * @return JsonResponse
     * @urlParam club required The ID of the club. Example: 1
     */
    public function show(Club $club): JsonResponse
    {
        return response()->json([
            'message' => 'Club retrieved successfully',
            'data' => new ClubResource($club->load('players'))
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     *
     * @param UpdateClubRequest $request
     * @param Club $club
     * @return JsonResponse
     * @urlParam club required The ID of the club. Example: 1
     * @bodyParam name string required The name of the club. Example: Manchester United
     */
    public function update(UpdateClubRequest $request, Club $club): JsonResponse
    {
        $data = $request->validated();
        $club->update($data);
        return response()->json([
            'message' => 'Club updated successfully',
            'data' => new ClubResource($club)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Club $club
     * @return JsonResponse
     * @urlParam club required The ID of the club. Example: 1
     */
    public function destroy(Club $club): JsonResponse
    {
        $deleted = $club->forceDelete();

        if (!$deleted) {
            return response()->json([
                'message' => 'Club could not be deleted'
            ], 400);
        }

        return response()->json([
            'message' => 'Club deleted successfully'
        ], 204);
    }
}
