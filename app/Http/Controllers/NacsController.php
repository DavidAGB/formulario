<?php

namespace App\Http\Controllers;

use App\Models\nacs;
use App\Http\Requests\StorenacsRequest;
use App\Http\Requests\UpdatenacsRequest;

class NacsController extends Controller
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
     * @param  \App\Http\Requests\StorenacsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorenacsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\nacs  $nacs
     * @return \Illuminate\Http\Response
     */
    public function show(nacs $nacs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\nacs  $nacs
     * @return \Illuminate\Http\Response
     */
    public function edit(nacs $nacs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatenacsRequest  $request
     * @param  \App\Models\nacs  $nacs
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatenacsRequest $request, nacs $nacs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\nacs  $nacs
     * @return \Illuminate\Http\Response
     */
    public function destroy(nacs $nacs)
    {
        //
    }
}
