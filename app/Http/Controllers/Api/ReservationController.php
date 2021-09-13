<?php

namespace App\Http\Controllers\Api;

use App\Models\Reservation;
use App\Services\ReservationService;
use App\Http\Resources\Reservation as ReservationResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ReservationController extends ApiController
{
    private $reservationService;

    public function __construct(ReservationService $reservationService)
    {
        $this->reservationService = $reservationService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            
            $reservations = ReservationResource::collection(Reservation::all());
            return $reservations;
        }
        catch (Exception $exception)
        {
            
            return 'fail';
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            
            $this->reservationService->validate($request->all());
            $reservation = $this->reservationService->store($request->all());
            return new ReservationResource($reservation);
        }
        catch (Exception $exception)
        {
            return Response::json([
                'msg' => 'fail'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        try {
            $this->reservationService->validate($request->all());
            $reservationUpdated = $this->reservationService->update($request->all(),$reservation);
            return new ReservationResource($reservationUpdated);
        }
        catch (Exception $exception)
        {
            return Response::json([
                'msg' => 'fail'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        try {
            $this->reservationService->delete($reservation);
            return Response::json([
                'msg' => 'success'
            ], 200);
        }
        catch (Exception $exception)
        {
            
            return Response::json([
                'msg' => 'fail'
            ], 500);
        }
    }
}
