<?php

namespace App\Http\Controllers\Api;

use App\Models\Restaurant;
use App\Services\RestaurantService;
use App\Http\Resources\Restaurant as RestaurantResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class RestaurantController extends ApiController
{
    private $restaurantService;

    public function __construct(RestaurantService $restaurantService)
    {
        $this->restaurantService = $restaurantService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            
            $restaurants = RestaurantResource::collection(Restaurant::all());
            return $restaurants;
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
            
            $this->restaurantService->validate($request->all());
            $restaurant = $this->restaurantService->store($request->all());
            return new RestaurantResource($restaurant);
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
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        try {
            $this->restaurantService->validate($request->all());
            $restaurantUpdated = $this->restaurantService->update($request->all(),$restaurant);
            return new RestaurantResource($restaurantUpdated);
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
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        try {
            $this->restaurantService->delete($restaurant);
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
