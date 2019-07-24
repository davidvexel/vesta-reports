<?php

namespace App\Http\Controllers;

use App\Imports\ReservationsImport;
use App\Report;
use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
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
     * @param  \App\Report $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Report              $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        // Delete report
        // Delete reservations with this report
    }

    /**
     *
     */
    public function importReportForm()
    {
        return view('admin.import-report');
    }

    /**
     * Process the report importation
     *
     * @param $request
     */
    public function processReport(Request $request)
    {
        $user = Auth::user();
        $input = $request->except('_token');

        $import = Excel::import(new ReservationsImport($input, $user), $request->file('report'));

        if ($import) {
            return redirect()->to('/reservations');
        } else {
            return redirect()->back()->with(['error' => 'Unable to import.']);
        }

    }
}
