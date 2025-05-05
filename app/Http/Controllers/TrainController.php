<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Train; // Import Train Model

class TrainController extends Controller
{
    // Show all trains (READ)
    public function index()
    {
        $trains = Train::all();
        
        return view('admin.dashboard', compact('trains'));
    }

    // Show create form
    public function create()
   {
       return view('trains.create');
   }

    // Store new train (CREATE)
    public function store(Request $request)
    {
        $request->validate([
            'train_no' => 'required|unique:trains,train_no',
            'name' => 'required',
            'route' => 'required',
            'departure_time' => 'required',
            'arrival_time' => 'required',
            'date' => 'required|date',
            'from_city' => 'required',
            'to_city' => 'required',
            'prize' => 'required|numeric',
            'status' => 'required',

        ]);

        Train::create($request->all());

        return redirect()->route('admin.dashboard')->with('success', 'Train added successfully!');
    }

    // Show edit form
    public function edit(Train $train)
    {
        return view('trains.edit', compact('train'));
        // Fetch all trains to pass to the view
       // $trains = Train::all();
        //return view('admin.dashboard', compact('trains', 'train'));
    }

    // Update train details (UPDATE)
    public function update(Request $request, Train $train)
    {
        $request->validate([
            'train_no' => 'required|unique:trains,train_no,' . $train->id,
            'name' => 'required',
            'route' => 'required',
            'departure_time' => 'required',
            'arrival_time' => 'required',
            'date' => 'required|date',
            'from_city' => 'required',
            'to_city' => 'required',
            'prize' => 'required|numeric',
            'status' => 'required',
        ]);

        $train->update($request->all());

        return redirect()->route('admin.dashboard')->with('success', 'Train updated successfully!');
    }

    // Delete a train (DELETE)
    public function destroy(Train $train)
    {
        $train->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Train deleted successfully!');
    }
    //search
    public function search(Request $request) {
        $trains = Train::where('from_city', $request->from_city)
                        ->where('to_city', $request->to_city)
                        ->get();
        return view('user.dashboard', compact('trains'));
    }
}
