<?php

namespace App\Imports;

use App\Report;
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
	    // 1. Verify files
    	if ( empty( $rows) ) {
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

    	$report_fetch = Report::find($report->id);
    	dd($report_fetch);

	    // 3. Create a reservation for each row
	    // 4. Create the reservation meta for each row field
	    foreach ($rows as $row)
	    {
		    dd($rows[0]);
	    }
    }
}
