<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Events;
use App\Models\Sarpras;

class BandingkanEvent extends Controller
{
    public function index(Request $request)
    {
        $all_event = Events::all();
        $events = [];

        if (isset($_POST['generate'])) {
            $select1Value = $request->input('select1');
            $select2Value = $request->input('select2');
            $events1 = Events::where('id', $select1Value)->get();
            $events2 = Events::where('id', $select2Value)->get();
            $events[] = $events1;
            $events[] = $events2;
        }


        return view('admin.bandingkanEvent', [
            'events' => $all_event,
            'selected_events' => $events
            // 'selected_event' => isset($_POST['generate']) ? $events : ''
            // 'event_id' => isset($_POST['generate']) ? dd($event_id) : ''
        ]);

        // $event1 = Events::all();
        // $event2 = Events::all();

        // return view('./admin/bandingkanEvent',compact('event1', 'event2'));
    }

    // public function getEventById($id)
    // {
    //     $event = Events::findOrFail($id);

    //     return response()->json($event);
    // }
}
