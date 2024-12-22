<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CheckoutReport;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $checkout = CheckoutReport::with('user')->get();
        return view('report.index', compact('checkout'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userId = Auth::id();
        $checkouts = CheckoutReport::where('user_id', $userId)->get();
        return view('report.history', compact('checkouts'));
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
        $checkout = CheckoutReport::find($id);
        return view('report.detail',compact('checkout'));
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
        $checkout = CheckoutReport::findOrFail($id);
        $checkout->approval = $request->approval;
        $checkout->save();
    
        return redirect()->back()->with('success', 'Approval status updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
