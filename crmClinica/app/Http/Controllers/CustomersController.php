<?php

namespace App\Http\Controllers;

use App\Models\Patients;
use Illuminate\Http\Request;


class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public readonly Patients $patients;

    public function __construct()
    {
        $this->patients = new Patients;
    }


    public function index()
    {
        $patinets = $this->patients->all();

        return view("users.customers.index", ['customers' => $patinets]);
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
    public function show(Patients $customer)
    {
        return view('users.customers.show', [
            'customer'=>$customer,
        ]);
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
