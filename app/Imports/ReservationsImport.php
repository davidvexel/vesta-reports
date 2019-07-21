<?php

namespace App\Imports;

use App\Report;
use App\Reservation;
use App\ReservationMeta;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToCollection;

class ReservationsImport implements ToCollection
{
    public $input;

    public $user;

    public function __construct($input, $user)
    {
        $this->input = $input;
        $this->user = $user;
    }

    /**
     * Import a CSV with reservations
     *
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
    	// important limit for server
        set_time_limit(0);

        // 1. Verify files
        if (empty($rows) ) {
            return false;
        }

        // 2. Create report
        $report = Report::create(
            [
            'user_id' => $this->input['client'],
            'file_name' => $this->input['report']->getClientOriginalName(),
            'imported_by' => $this->user->id
            ]
        );

        // 3. Create a reservation for each row
        // 4. Create the reservation meta for each row field
        foreach ($rows as $index => $row)
        {
	        if($index === 0) {
		        continue;
	        }

	        // titles
            $titles = $rows[0];

            // @TODO: Validate each title is a valid option
            $reservation = Reservation::create(['report_id' => $report->id]);

            // Create reservation meta for each row title
            foreach ($titles as $rowIndex => $title)
            {
                if (empty($row[$rowIndex]) ) {
                    continue;
                }
                ReservationMeta::create(
                    [
                    'reservation_id' => $reservation->id,
                    'meta_key' => strtolower($title),
                    'meta_value' => $row[$rowIndex]
                    ]
                );
            }
        }
    }
}
