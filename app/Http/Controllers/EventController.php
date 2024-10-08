<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventCategory;
use App\Models\Organizer;
use Carbon\Carbon;
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
        // Validate the incoming request
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'venue' => 'required|string|max:255',
            'date' => 'required|date',
            'start_time' => 'required',
            'description' => 'required|string',
            'booking_url' => 'nullable|string|max:255',
            'tags' => 'required|json',
            'organizer' => 'required|exists:organizers,id',
            'event_category' => 'required|exists:event_categories,id',
        ]);

        if (!$data) {
            FacadesSession::flash('message', 'Event gagal ditambah !');
            FacadesSession::flash('alert-class', 'failed');
            return redirect()->route('master.event.index');
        }

        Event::create([
            'title' => $request->title,
            'venue' => $request->venue,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'description' => $request->description,
            'booking_url' => $request->booking_url,
            'tags' => $request->tags, // Save tags as JSON
            'organizer_id' => $request->organizer,
            'event_category_id' => $request->event_category,
        ]);

        FacadesSession::flash('message', 'Event berhasil ditambah!');
        FacadesSession::flash('alert-class', 'success');

        return redirect()->route('master.event.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $event = Event::with('categoryEvent', 'organizer')->find($id);
        return view('events.event_detail.index', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $eventData = Event::findOrFail($id);
        $organizers = Organizer::all();
        $categories = EventCategory::all();

        return view('master/event/form/index', compact('eventData', 'organizers', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the incoming request
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'venue' => 'required|string|max:255',
            'date' => 'required|date',
            'start_time' => 'required',
            'description' => 'required|string',
            'booking_url' => 'nullable|string|max:255',
            'tags' => 'required|json',
            'organizer' => 'required|exists:organizers,id',
            'event_category' => 'required|exists:event_categories,id',
        ]);

        if (!$data) {
            FacadesSession::flash('message', 'Event gagal ditambah !');
            FacadesSession::flash('alert-class', 'failed');
            return redirect()->route('master.event.index');
        }

        Event::query()->where('id', $id)->update([
            'title' => $request->title,
            'venue' => $request->venue,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'description' => $request->description,
            'booking_url' => $request->booking_url,
            'tags' => $request->tags, 
            'organizer_id' => $request->organizer,
            'event_category_id' => $request->event_category,
            'updated_at' => Carbon::now(),
        ]);

        FacadesSession::flash('message', 'Event berhasil ditambah!');
        FacadesSession::flash('alert-class', 'success');

        return redirect()->route('master.event.index');
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
