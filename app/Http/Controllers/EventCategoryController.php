<?php

namespace App\Http\Controllers;

use App\Models\EventCategory;
use Carbon\Carbon;
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
        return view('master/event_category/form/index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',  // Ensuring the category name is required and is a string with a max length
        ]);

        // // Create a new event category using the validated data
        // $eventCategory = new EventCategory();
        // $eventCategory->name = $validatedData['name'];
        // $eventCategory->save();

        EventCategory::query()->create([
            'name' => $request->name,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        // Redirect back to the index page with a success message
        return redirect()->route('event_category.index')->with('success', 'Event category created successfully!');
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
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // $category = EventCategory::findOrFail($id);
        // $category->name = $request->input('name');
        // $category->save();

        EventCategory::query()->where('id', $id)->update([
            'name' => $request->name,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        return redirect()->route('event_category.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $category = EventCategory::findOrFail($id);
        // $category->delete();

        EventCategory::query()->where('id', $id)->delete();
        return redirect()->route('event_category.index')->with('success', 'Category deleted successfully.');
    }
}
