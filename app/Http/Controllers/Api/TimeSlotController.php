<?php

namespace App\Http\Controllers\Api;

use App\Models\TimeSlot;
use App\Services\TimeSlotService;
use App\Http\Resources\TimeSlot as TimeSlotResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class TimeSlotController extends ApiController
{
    private $timeSlotService;

    public function __construct(TimeSlotService $timeSlotService)
    {
        $this->timeSlotService = $timeSlotService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            
            $timeSlots = TimeSlotResource::collection(TimeSlot::all());
            return $timeSlots;
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
            
            $this->timeSlotService->validate($request->all());
            $timeSlot = $this->timeSlotService->store($request->all());   
            return new TimeSlotResource($timeSlot);
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
     * @param  \App\Models\TimeSlot  $timeSlot
     * @return \Illuminate\Http\Response
     */
    public function destroy(TimeSlot $timeSlot)
    {
        try {
            $this->timeSlotService->delete($timeSlot);
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
