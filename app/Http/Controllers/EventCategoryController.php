<?php

namespace App\Http\Controllers;

use App\Models\EventCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session as FacadesSession;

class EventCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eventCategoryData = EventCategory::query()->get();
        return view('master/event_category/index', [
            "eventCategoryData" => $eventCategoryData
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master/event_category/form/index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $data = $request->validate([
            'name' => 'required|string|max:255',  
        ]);

        if (!$data) {
            FacadesSession::flash('message', 'Category gagal ditambah !');
            FacadesSession::flash('alert-class', 'failed');
            return redirect()->route('event_category.index');
        }

        // $eventCategory = new EventCategory();
        // $eventCategory->name = $validatedData['name'];
        // $eventCategory->save();

        EventCategory::query()->create([
            'name' => $request->name,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        FacadesSession::flash('message', 'Category berhasil ditambah !');
        FacadesSession::flash('alert-class', 'success');

        //return redirect()->route('event_category.index')->with('success', 'Event category created successfully!');
        return redirect()->route('event_category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categoryData = EventCategory::findOrFail($id);
        return view('master/event_category/form/index', 
            compact('categoryData')
        ); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        if (!$data) {
            FacadesSession::flash('message', 'Category gagal diupdate !');
            FacadesSession::flash('alert-class', 'failed');
            return redirect()->route('event_category.index');
        }

        // $category = EventCategory::findOrFail($id);
        // $category->name = $request->input('name');
        // $category->save();

        EventCategory::query()->where('id', $id)->update([
            'name' => $request->name,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        FacadesSession::flash('message', 'Category berhasil diupdate !');
        FacadesSession::flash('alert-class', 'success');

        // return redirect()->route('event_category.index')->with('success', 'Category updated successfully.');
        return redirect()->route('event_category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $category = EventCategory::findOrFail($id);
        // $category->delete();

        EventCategory::query()->where('id', $id)->delete();

        FacadesSession::flash('message', 'Category berhasil dihapus !');
        FacadesSession::flash('alert-class', 'success');

        // return redirect()->route('event_category.index')->with('success', 'Category deleted successfully.');
        return redirect()->route('event_category.index');
    }
}
