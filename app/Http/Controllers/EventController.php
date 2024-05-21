<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $events = Event::all();
        return view('event', compact('events'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'eventName' => 'required',
            'eventStart' => 'required|date',
            'eventEnd' => 'required|date|after_or_equal:eventStart',
        ]);

        Event::create([
            'name' => $validatedData['eventName'],
            'start_date' => Carbon::createFromFormat('d-m-Y', $validatedData['eventStart']),
            'end_date' => Carbon::createFromFormat('d-m-Y', $validatedData['eventEnd']),
        ]);

        return redirect()->route('events')->with('success', 'Event created successfully!');
    }

    public function show(Event $event)
    {
        //
    }

    public function edit(Request $request)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $validatedData = $request->validate([
            'eventName' => 'required',
            'eventStart' => 'required|date',
            'eventEnd' => 'required|date|after_or_equal:eventStart',
        ]);

        $event->update([
            'name' => $validatedData['eventName'],
            'start_date' => Carbon::createFromFormat('d-m-Y', $validatedData['eventStart']),
            'end_date' => Carbon::createFromFormat('d-m-Y', $validatedData['eventEnd']),
        ]);

        return redirect()->route('events')->with('success', 'Event updated successfully!');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('events')->with('success', 'Event deleted successfully!');
    }
}
