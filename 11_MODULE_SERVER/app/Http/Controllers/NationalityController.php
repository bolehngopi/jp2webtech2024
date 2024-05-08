<?php

namespace App\Http\Controllers;

use App\Models\Nationality;
use App\Http\Requests\StoreNationalityRequest;
use App\Http\Requests\UpdateNationalityRequest;
use Illuminate\Http\JsonResponse;

class NationalityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Nationality::query()->paginate(5);
        return new JsonResponse($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNationalityRequest $request)
    {
        $data = $request->validated();
        $nationality = new Nationality($data);
        $nationality->save();
        return new JsonResponse($nationality);
    }

    /**
     * Display the specified resource.
     */
    public function show(Nationality $nationality)
    {
        return new JsonResponse($nationality);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nationality $nationality)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNationalityRequest $request, Nationality $nationality)
    {
        $data = $request->validated();
       $nationality =$nationality->update();
        return new JsonResponse($nationality);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nationality $nationality)
    {
        $nationality->forceDelete();
    }
}
