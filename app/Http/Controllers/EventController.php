<?php

namespace App\Http\Controllers;

use App\Models\Event;
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
        return view('master/event/form/index'); 
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
        return view('master/organizer/form/index', 
            compact('eventData')
        ); 
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

        FacadesSession::flash('message', 'Organizer berhasil dihapus !');
        FacadesSession::flash('alert-class', 'success');

        return redirect()->route('organizer.index');
    }
}
