<?php

namespace App\Http\Controllers;

use App\Timer;
use Illuminate\Http\Request;

class TimerController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $timer         = new Timer();
        $timer->name   = $request->input('name');
        $timer->active = true;

        $request->user()->timers()->save($timer);

        return $this->jsonResponse($timer);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Timer $timer
     * @return \Illuminate\Http\Response
     */
    public function show(Timer $timer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Timer               $timer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Timer $timer)
    {
        //
    }

    /**
     * @param Request $request
     * @param Timer   $timer
     * @return \Illuminate\Http\JsonResponse
     */
    public function stop(Request $request, Timer $timer)
    {
        $timer->stop();
        $timer->save();


        return $this->jsonResponse($timer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Timer $timer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Timer $timer)
    {
        //
    }
}
