<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Events;
use App\Models\Sarpras;

class BandingkanEvent extends Controller
{
    public function index()
    {
        // $data = [
        //     // 'user' => User::all(),
        //     'event' => Events::all(),
        //     // 'sarpras' => Sarpras::all(),
        // ];
        $event1 = Events::all();
        $event2 = Events::all();

        return view('./admin/bandingkanEvent',compact('event1', 'event2'));
    }

    public function getEventById($id)
    {
        $event = Events::findOrFail($id);

        return response()->json($event);
    }
}
