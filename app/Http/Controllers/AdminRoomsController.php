<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Room;

class AdminRoomsController extends Controller
{
    public function index(Request $request) {
        $hotels = Hotel::all();
        $rooms = Room::with('hotel')->orderBy('created_at', 'desc')->paginate(10);

        if ($request->ajax()) {
            return view('admin.rooms.table', compact('rooms', 'hotels'))->render();
        }
    
        return view('admin.rooms.index', compact('rooms', 'hotels'));
    
    }

    public function create() {

       
        return view('admin.rooms.create');

    }


    public function store(Request $request) {

        $validatedData = $request->validate([
            'hotel_id' => 'required|numeric',
            'description' => 'required|string',
            'room_type' => 'required|in:Single room,Double room,Twin room,Suite',    
            'capacity' => 'required|numeric',
            'price' => 'required|numeric',
        ]);


        Room::create($validatedData); // Save the order
        return redirect()->route('admin.rooms.index')->with('success', 'Room created successfully!');
    }

    public function edit($id)
    {
        $room = Room::findOrFail($id);
        $hotels = Hotel::all();

        if (request()->ajax()) {
            // Render the edit modal view with the room data
            $view = view('admin.rooms.edit', compact('room', 'hotels'))->render();
            return response()->json(['html' => $view]);
        }


        return view('admin.rooms.edit', compact('room', 'hotels'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'hotel_id' => 'required|numeric',
            'description' => 'required|string',
            'room_type' => 'required|in:Single room,Double room,Twin room,Suite',    
            'capacity' => 'required|numeric',
            'price' => 'required|numeric'
        ]);

        $room = Room::findOrFail($id);
        
        $room->update($validatedData);
        return redirect()->back()->with('success', 'Room updated successfully!');
    }

    public function destroy($id)
    {
        $rooms = Room::findOrFail($id);
        $rooms->delete(); // This sets the 'deleted_at' timestamp

        return redirect()->route('admin.rooms.index')->with('success', 'Room deleted successfully!');
    }
}