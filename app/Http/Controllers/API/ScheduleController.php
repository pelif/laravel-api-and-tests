<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Services\Contracts\ScheduleServiceInterface;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

/**
 * @OA\Server(url="http://localhost/api")
 * @OA\Info(title="Test Febrafar API", version="1.0")
 */
class ScheduleController extends Controller
{
    private $service;

    public function __construct(ScheduleServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
    *  @OA\GET(
    *      path="/api/schedules",
    *      summary="Get all schedules",
    *      description="Get all schedules without date filters",
    *      tags={"Test"},
    *      @OA\Response(
    *          response=200,
    *          description="successful operation"
    *      )
    *  )
    */
    public function index(Request $request)
    {
        return $this->service->index($request);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->service->store($request);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Schedule $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Schedule $schedule)
    {
        return $this->service->update($request, $schedule);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        return $this->service->destroy($schedule);
    }

}
