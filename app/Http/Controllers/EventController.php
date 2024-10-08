<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventCategory;
use App\Models\Organizer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session as FacadesSession;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eventData = Event::query()->get();
        return view('events/index', [
            'events' => $eventData
        ]);
    }


    public function indexMaster()
    {
        $eventData = Event::query()->get();
        return view('master/event/index', compact('eventData')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $organizers = Organizer::all();
        $categories = EventCategory::all();

        return view('master/event/form/index', compact('organizers', 'categories'));
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
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $eventData = Event::findOrFail($id);
        $organizers = Organizer::all();

    return view('master/event/form/index', compact('eventData', 'organizers'));
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
        Event::query()->where('id', $id)->delete();

        FacadesSession::flash('message', 'Event berhasil dihapus !');
        FacadesSession::flash('alert-class', 'success');

        return redirect()->route('master.event.index');
    }
}
