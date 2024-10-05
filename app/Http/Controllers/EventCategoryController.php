<?php

namespace App\Http\Controllers;

use App\Models\EventCategory;
use Illuminate\Http\Request;

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
        //
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
        $category = EventCategory::find($id);
        return view('master/event_category/detail/index', [
            "categoryData" => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = EventCategory::findOrFail($id);
        $category->name = $request->input('name');
        $category->save();

        return redirect()->route('event_category.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = EventCategory::findOrFail($id);
        $category->delete();
        return redirect()->route('event_category.index')->with('success', 'Category deleted successfully.');
    }
}
