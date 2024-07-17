<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Http\Requests\StorePositionRequest;
use App\Http\Requests\UpdatePositionRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * @group Positions Management
 *
 * APIs for managing positions
 */
class PositionController extends Controller
{
    /**
     *
     * Display a listing of the resource.
     *
     * @return ResourceCollection
     */
    public function index(): ResourceCollection
    {
        $positions = Position::query()->paginate(5);
        return new ResourceCollection($positions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePositionRequest $request
     * @return JsonResponse
     * @bodyParam name string required The name of the position. Example: Goalkeeper
     */
    public function store(StorePositionRequest $request): JsonResponse
    {
        $data = $request->validated();
        $position = Position::create($data);
        return response()->json([
            'message' => 'Successfully',
            'data' => $position
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Position $position
     * @return JsonResponse
     */
    public function show(Position $position): JsonResponse
    {
        return response()->json($position);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePositionRequest $request
     * @param Position $position
     * @return JsonResponse
     * @bodyParam name string required The name of the position. Example: Goalkeeper
     */
    public function update(UpdatePositionRequest $request, Position $position): JsonResponse
    {
        $data = $request->validated();
        $position->update($data);
        return response()->json([
            'message' => 'Successfully',
            'data' => $position
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Position $position
     * @return JsonResponse
     */
    public function destroy(Position $position): JsonResponse
    {
        $position->forceDelete();
        return response()->json([
            'message' => 'Successfully'
        ], 204);
    }
}
