@extends('base.index')

@section('library-css')

@endsection


@section('content')
<div class="container mx-auto px-4 mt-5">
    <div class="flex items-center mb-5">
        <h1 class="text-2xl font-bold">Event</h1>
    </div>

    @if(isset($organizerData))
        <!-- Edit Form -->
        {{-- <form action="{{ route('organizer.update', $organizerData->id) }}" method="POST" class="inline">
            @csrf
            @method('PUT')
            <div class="mt-2">
                <p>Organizer Name:</p>
                <input type="text" name="name" value="{{ $organizerData->name }}" class="input input-bordered input-info w-full max-w-xs" />
            </div>

            <div class="grid grid-cols-4 gap-4 mt-2">
                <div>
                    <p>Facebook:</p>
                    <input type="text" name="facebook_link" value="{{ $organizerData->facebook_link }}" class="input input-bordered input-info w-full max-w-xs" />
                </div>
                <div>
                    <p>X:</p>
                    <input type="text" name="x_link" value="{{ $organizerData->x_link }}" class="input input-bordered input-info w-full max-w-xs" />
                </div>
            </div>

            <div class="mb-2 mt-2">
                <p>Website:</p>
                <input type="text" name="website_link" value="{{ $organizerData->website_link }}" class="input input-bordered input-info w-full max-w-xs" />
            </div>

            <div class="mb-2 mt-2">
                <p>Description:</p>
                <textarea class="editor" name="description">{{ isset($organizerData) ? $organizerData->description : "Hello, World !" }}</textarea>
            </div>

            <div class="flex space-x-2 mt-4">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('organizer.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form> --}}
    @else
        <!-- Create Form -->
        <form action="{{ route('events.store') }}" method="POST" class="inline">
            @csrf
            
            <div class="grid grid-cols-4 gap-4 mt-2">
                <div>
                    <p>Event Name:</p>
                    <input type="text" name="title" value="" class="input input-bordered input-info w-full max-w-xs" />
                </div>
                <div class="mb-2">
                    <p>Event Category:</p>
                    <select name="category" class="select select-bordered w-full max-w-xs">
                        <option value="" disabled selected>Select Event Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-4 gap-4 mt-2">
                <div class="mb-2">
                    <p>Start Time:</p>
                    <input type="time" name="start_time" value="" class="input input-bordered input-info w-full max-w-xs" />
                </div>
                <div>
                    <p>Date:</p>
                    <input type="date" name="date" value="" class="input input-bordered input-info w-full max-w-xs" />
                </div>
            </div>

            <div class="mb-2 mt-2">
                <p>Location:</p>
                <input type="text" name="venue" value="" class="input input-bordered input-info w-full max-w-xs" />
            </div>

            <div class="mb-2 mt-2">
                <p>Organizer:</p>
                <select name="organizer" class="select select-bordered w-full max-w-xs">
                    <option value="" disabled selected>Select Organizer</option>
                    @foreach($organizers as $organizer)
                        <option value="{{ $organizer->id }}">{{ $organizer->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-2 mt-2">
                <p>Booking URL:</p>
                <input type="text" name="booking_url" value="" class="input input-bordered input-info w-full max-w-xs" />
            </div>

            <div class="mb-2 mt-2">
                <p>Description:</p>
                <textarea class="editor" name="description">Add Your Description</textarea>
            </div>

            <div class="mb-2 mt-2">
                <label for="exampletags" class="inline-block mb-2">Tags</label>
                <input type="text" name="tags" value="Tags1, Tags2" class="tagify w-full leading-5 relative text-sm py-2 px-4 rounded text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0 dark:text-gray-300 dark:bg-gray-700 dark:border-gray-700 dark:focus:border-gray-600" id="exampletags" minlength="2">
            </div>

            <div class="flex space-x-2 mt-4">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('master.event.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    @endif
    
    
    
</div>

@endsection


@section('library-js')

@endsection