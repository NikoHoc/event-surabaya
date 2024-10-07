<?php

namespace App\Http\Controllers;

use App\Models\Organizer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session as FacadesSession;

class OrganizerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $organizerData = Organizer::query()->get();
        return view('master/organizer/index', compact('organizerData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master/organizer/form/index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'facebook_link' => 'required',
            'x_link' => 'required',
            'website_link' => 'required',
            
        ]);

        if (!$data) {
            FacadesSession::flash('message', 'Organizer gagal ditambah !');
            FacadesSession::flash('alert-class', 'failed');
            return redirect()->route('organizer.index');
        }

        Organizer::create([
            'name' => $request->name,
            'description' => $request->description,
            'facebook_link' => $request->facebook_link,
            'x_link' => $request->x_link,
            'website_link' => $request->website_link,
        ]);

        FacadesSession::flash('message', 'Organizer berhasil ditambah !');
        FacadesSession::flash('alert-class', 'success');

        return redirect()->route('organizer.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $organizerData = Organizer::findOrFail($id);
        return view('master/organizer/detail/index',
            compact('organizerData')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $organizerData = Organizer::findOrFail($id);
        return view('master/organizer/form/index', 
            compact('organizerData')
        ); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'facebook_link' => 'required',
            'x_link' => 'required',
            'website_link' => 'required',
            
        ]);
        if (!$data) {
            FacadesSession::flash('message', 'Organizer gagal diupdate !');
            FacadesSession::flash('alert-class', 'failed');
            return redirect()->route('organizer.index');
        }

        Organizer::query()->where('id', $id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'facebook_link' => $request->facebook_link,
            'x_link' => $request->x_link,
            'website_link' => $request->website_link,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        FacadesSession::flash('message', 'Organizer berhasil diupdate !');
        FacadesSession::flash('alert-class', 'success');

        return redirect()->route('organizer.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Organizer::query()->where('id', $id)->delete();

        FacadesSession::flash('message', 'Organizer berhasil dihapus !');
        FacadesSession::flash('alert-class', 'success');

        return redirect()->route('organizer.index');
    }
}
