<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateWifi;
use App\Wifi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WifiController extends Controller
{
    /**
     * Wifi model.
     *
     * @var Wifi
     */
    private $wifi;

    /**
     * WifiController constructor.
     *
     * @param Wifi $wifi
     */
    public function __construct(Wifi $wifi)
    {
        $this->wifi = $wifi;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'success' => true,
            'item' => $this->wifi->summary()
        ]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateWifi $request)
    {
        $validated = $request->validated();

        DB::transaction(function () use ($validated){
            foreach ($validated['data'] as $data) {
                $this->wifi = $this->wifi->create($this->wifi->prepareData($data));
            }
        }, 3);

        return response()->json([
            'success' => true
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Wifi  $wifi
     * @return \Illuminate\Http\Response
     */
    public function show(Wifi $wifi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Wifi  $wifi
     * @return \Illuminate\Http\Response
     */
    public function edit(Wifi $wifi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Wifi  $wifi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wifi $wifi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Wifi  $wifi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wifi $wifi)
    {
        //
    }
}
