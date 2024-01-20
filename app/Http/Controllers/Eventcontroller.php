<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $event = Event::all();
        return view('event')->with('events', $event);
    }
    // function index(){
    //     $event = Event::all();
    //     return view('event', compact('event'));
    // }

    function save_events(Request $request){
        $validatedData = $request->validate([
            'Id' => 'integerIncrements',
            'EventName' => 'required|string|max:500',
            'Date' => 'required|string|max:500',
            'Location' => 'required|string|max:500',
            'Attendees' => 'required|string|max:500',
        ]);

        Event::create($validatedData);

        return back();
    }

    function delete_events($id){
        $event = Event::find($id);
        $event->delete();
        return back();
    }

    function update_events($id){
        $event = Event::find($id);
        return view('update_Events', compact('event'));
    }

    function save_updated_events(Request $request){
        $validatedData = $request->validate([
            'EventName' => $request->update_event_name,
            'Date' => $request->update_date,
            'Location' => $request->update_location,
            'Attendees' => $request->update_attendees,
        ]);
        Event::updated($validatedData);
        return back();
    }
}