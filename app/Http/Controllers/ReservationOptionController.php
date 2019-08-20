<?php

namespace App\Http\Controllers;

use App\ReservationOption;
use App\User;
use Illuminate\Http\Request;

class ReservationOptionController extends Controller
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ReservationOption $reservationOption
     * @return \Illuminate\Http\Response
     */
    public function show(ReservationOption $reservationOption)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ReservationOption $reservationOption
     * @return \Illuminate\Http\Response
     */
    public function edit(ReservationOption $reservationOption)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\ReservationOption   $reservationOption
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReservationOption $reservationOption)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ReservationOption $reservationOption
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReservationOption $reservationOption)
    {
        //
    }

    public function updateClientOptions($userId, Request $request)
    {
    	$input = $request->except('_token');
    	$client = User::find($userId);

    	$client->reservationOptions()->sync( array_keys($input) );

    	return redirect()->back()->with('success', 'Opciones actualizadas correctamente.');
    }
}
