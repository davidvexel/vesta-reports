<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\ReservationMeta;
use App\ReservationOption;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = [];
        $reservations = Reservation::all()->toArray();
        $available_options = ReservationOption::get('key')->toArray();

        foreach($reservations as $index => $reservation)
        {
            $rows[$index] = $reservation;
            $metas = ReservationMeta::where('reservation_id', $reservation['id'])->get();
            foreach ($metas as $meta)
            {
                $rows[$index][$meta->meta_key] = $meta->meta_value;
            }
        }

        return view('admin.reservations', compact('rows', 'available_options'));
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
     * @param  \App\Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Reservation         $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        // Delete reservation_metas with this reservation id
    }
}
