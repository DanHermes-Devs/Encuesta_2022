<?php

namespace App\Http\Controllers;

use App\Graficas;
use Illuminate\Http\Request;

class GraficasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.graficas.index');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Graficas  $graficas
     * @return \Illuminate\Http\Response
     */
    public function show(Graficas $graficas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Graficas  $graficas
     * @return \Illuminate\Http\Response
     */
    public function edit(Graficas $graficas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Graficas  $graficas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Graficas $graficas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Graficas  $graficas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Graficas $graficas)
    {
        //
    }
}
