<?php

namespace App\Http\Controllers;

use App\Models\Nationality;
use App\Http\Requests\StoreNationalityRequest;
use App\Http\Requests\UpdateNationalityRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * @group Nationalities Management
 *
 * APIs for managing nationalities
 */
class NationalityController extends Controller
{
    /**
     *
     * Display a listing of the resource.
     *
     * @return ResourceCollection
     *
     */
    public function index(): ResourceCollection
    {
        $data = Nationality::query()->paginate(5);
        return new ResourceCollection($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreNationalityRequest $request
     * @return JsonResponse
     * @bodyParam name string required The name of the nationality. Example: Indonesia
     */
    public function store(StoreNationalityRequest $request): JsonResponse
    {
        $data = $request->validated();
        $nationality = Nationality::create($data);
        return response()->json([
            'message' => 'Successfully',
            'data' => $nationality
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Nationality $nationality
     * @return JsonResponse
     *
     */
    public function show(Nationality $nationality): JsonResponse
    {
        return response()->json($nationality);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateNationalityRequest $request
     * @param Nationality $nationality
     * @return JsonResponse
     * @bodyParam name string required The name of the nationality. Example: Indonesia
     */
    public function update(UpdateNationalityRequest $request, Nationality $nationality): JsonResponse
    {
        $data = $request->validated();
        $nationality->update($data);
        return response()->json([
            'message' => 'Successfully',
            'data' => $nationality
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Nationality $nationality
     * @return JsonResponse
     *
     */
    public function destroy(Nationality $nationality): JsonResponse
    {
        $deleted = $nationality->forceDelete();

        if (!$deleted) {
            return response()->json([
                'message' => 'Failed to delete'
            ], 500);
        }

        return response()->json([
            'message' => 'Successfully'
        ], 204);
    }
}
