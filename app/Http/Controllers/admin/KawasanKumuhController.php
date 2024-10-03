<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Rt;
use Illuminate\Http\Request;

class KawasanKumuhController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rts = Rt::whereIn('tingkat_status', ['KUMUH RINGAN', 'KUMUH SEDANG', 'KUMUH TINGGI'])->get();
        return view('pages.admin.kawasankumuh.index', compact('rts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
