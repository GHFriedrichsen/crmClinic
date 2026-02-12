<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClinicRequest;
use App\Models\Clinic;
use Illuminate\View\View;

class ClinicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $clinics = Clinic::all();

        return view('admin.clinics.index', compact('clinics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.clinics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClinicRequest $request)
    {
        Clinic::create($request->validated());

        return redirect()->route('admin.clinics.index')
            ->with('success', 'Clinic created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $clinicId): View
    {
        $clinic = Clinic::findOrFail($clinicId);
        // dd($clinic); // Keep for further debugging if needed

        return view('admin.clinics.show', compact('clinic'));
    }
}
