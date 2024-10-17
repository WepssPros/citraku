<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Perealisasian;
use Illuminate\Http\Request;

class PerealisasianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perealisasians = Perealisasian::all();
        return view('pages.admin.perealisasian.index', compact('perealisasians'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $perealisasians = Perealisasian::all();
        return view('pages.admin.opt-penanganan.perealisasian', compact('perealisasians'));
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
