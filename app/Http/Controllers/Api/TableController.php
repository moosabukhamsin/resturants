<?php

namespace App\Http\Controllers\Api;

use App\Models\Table;
use App\Services\TableService;
use App\Http\Resources\Table as TableResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class TableController extends ApiController
{
    private $tableService;

    public function __construct(TableService $tableService)
    {
        $this->tableService = $tableService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            
            $tables = TableResource::collection(Table::all());
            return $tables;
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
            
            $this->tableService->validate($request->all());
            $table = $this->tableService->store($request->all());
            return new TableResource($table);
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
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function show(Table $table)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Table $table)
    {
        try {
            $this->tableService->validate($request->all());
            $tableUpdated = $this->tableService->update($request->all(),$table);
            return new TableResource($tableUpdated);
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
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function destroy(Table $table)
    {
        try {
            $this->tableService->delete($table);
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
