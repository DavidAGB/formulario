<?php

namespace App\Http\Controllers;

use App\Models\expertises;
use App\Http\Requests\StoreexpertisesRequest;
use App\Http\Requests\UpdateexpertisesRequest;

class ExpertisesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreexpertisesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreexpertisesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\expertises  $expertises
     * @return \Illuminate\Http\Response
     */
    public function show(expertises $expertises)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\expertises  $expertises
     * @return \Illuminate\Http\Response
     */
    public function edit(expertises $expertises)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateexpertisesRequest  $request
     * @param  \App\Models\expertises  $expertises
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateexpertisesRequest $request, expertises $expertises)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\expertises  $expertises
     * @return \Illuminate\Http\Response
     */
    public function destroy(expertises $expertises)
    {
        //
    }
}
