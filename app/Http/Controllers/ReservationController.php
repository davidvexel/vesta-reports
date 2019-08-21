<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\ReservationMeta;
use App\ReservationOption;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$user = Auth::user();

        $rows = [];

	    $query = Reservation::query();

	    $defaultRange = '';

	    if ( $user->hasRole('administrator') ) {
	        // Getting reservations from all clients
	        $available_options = ReservationOption::get('key')->toArray();
        } else if ( $user->hasRole('client') ) {
	        $query->where('client_id', $user->id);
			$available_options = $user->reservationOptions->toArray();
        } else {
        	return 'Not valid user role';
        }

        if ( $request->has('dateFilter') ) {
        	$filter = $request->dateFilter;

        	$filter = explode(' - ', $filter);

        	if ( isset( $filter[0] ) && ! empty( $filter[0] ) && isset( $filter[1] ) && ! empty( $filter[1] ) ) {
		        // Query between but sub/add 1 day for more precision
		        $query->whereBetween(
			        'created_at',
			        [
				        Carbon::parse($filter[0])->subDay(),
				        Carbon::parse($filter[1])->addDay(),
			        ]
		        );
	        }
        }

	    $reservations = $query->get()->toArray();

        foreach($reservations as $index => $reservation)
        {
            $rows[$index] = $reservation;
            $metas = ReservationMeta::where('reservation_id', $reservation['id'])->get();
            foreach ($metas as $meta)
            {
                $rows[$index][$meta->meta_key] = $meta->meta_value;
            }
        }

        return view('admin.reservations', compact('rows', 'available_options', 'defaultRange'));
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
