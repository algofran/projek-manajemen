<?php

namespace App\Http\Controllers;

use App\Models\IconnetExp;
use App\Http\Requests\StoreIconnetExpRequest;
use App\Http\Requests\UpdateIconnetExpRequest;

class IconnetExpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('icon_plus.lists_iconnet');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIconnetExpRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(IconnetExpController $iconnetExp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IconnetExpController $iconnetExp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIconnetExpRequest $request, IconnetExpController $iconnetExp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IconnetExpController $iconnetExp)
    {
        //
    }
}
