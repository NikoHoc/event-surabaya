@extends('base.index')

@section('library-css')

@endsection


@section('content')
<div class="container mx-auto px-4 mt-5 mb-5">
    <div class="flex items-center mb-5">
        <h1 class="text-2xl font-bold">Event</h1>
    </div>

    @if(isset($eventData))
        <!-- Edit Form -->
        <form action="{{ route('events.update', $eventData->id) }}" method="POST" class="inline">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-4 gap-4 mt-2">
                <div>
                    <p>Event Name:</p>
                    <input type="text" name="title" value="{{ $eventData->title }}" class="input input-bordered input-info w-full max-w-xs" />
                </div>
                <div class="mb-2">
                    <p>Event Category:</p>
                    <select name="event_category" class="select select-bordered w-full max-w-xs">
                        <option value="" disabled>Select Event Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" 
                                {{ $eventData->event_category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        
            <div class="grid grid-cols-4 gap-4 mt-2">
                <div class="mb-2">
                    <p>Start Time:</p>
                    <input type="time" name="start_time" value="{{ \Carbon\Carbon::parse($eventData->start_time)->format('h:i') }}" class="input input-bordered input-info w-full max-w-xs" />
                </div>
                <div>
                    <p>Date:</p>
                    <input type="date" name="date" value="{{ \Carbon\Carbon::parse($eventData->date)->format('Y-m-d') }}" class="input input-bordered input-info w-full max-w-xs" />
                </div>
            </div>
        
            <div class="mb-2 mt-2">
                <p>Location:</p>
                <input type="text" name="venue" value="{{ $eventData->venue }}" class="input input-bordered input-info w-full max-w-xs" />
            </div>
        
            <div class="mb-2 mt-2">
                <p>Organizer:</p>
                <select name="organizer" class="select select-bordered w-full max-w-xs">
                    <option value="" disabled selected>Select Organizer</option>
                    @foreach($organizers as $organizer)
                        <option value="{{ $organizer->id }}" 
                            {{ $eventData->organizer_id == $organizer->id ? 'selected' : '' }}>
                            {{ $organizer->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        
            <div class="mb-2 mt-2">
                <p>Booking URL:</p>
                <input id="booking_url" type="text" name="booking_url" value="{{ $eventData->booking_url }}" class="input input-bordered input-info w-full max-w-xs" />
            </div>
        
            <div class="mb-2 mt-2">
                <p>Description:</p>
                <textarea class="editor" name="description">{{ $eventData->description }}</textarea>
            </div>
        
            <div class="mb-2 mt-2">
                <label for="exampletags" class="inline-block mb-2">Tags</label>
                <input type="text" name="tags" value="{{ isset($eventData) ? json_encode(json_decode($eventData->tags)) : '["Tags1", "Tags2"]' }}" class="tagify w-full leading-5 relative text-sm py-2 px-4 rounded text-gray-800 bg-white border border-gray-300 focus:outline-none focus:border-gray-400 focus:ring-0" id="tags">
            </div>

            <div class="flex space-x-2 mt-4">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('master.event.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
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
                    <select name="event_category" class="select select-bordered w-full max-w-xs">
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
                <input id="booking_url" type="text" name="booking_url" value="" class="input input-bordered input-info w-full max-w-xs" />
            </div>

            <div class="mb-2 mt-2">
                <p>Description:</p>
                <textarea class="editor" name="description">Add Your Description</textarea>
            </div>

            <div class="mb-2 mt-2">
                <label for="exampletags" class="inline-block mb-2">Tags</label>
                <input type="text" name="tags" placeholder="input tag" class="tagify w-full leading-5 relative text-sm py-2 px-4 rounded text-gray-800 bg-white border border-gray-300 focus:outline-none focus:border-gray-400 focus:ring-0" id="tags">
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
<script>
    $(document).ready(function () {
        var input = $('#tags')[0]; // Get the input element
        var tagify = new Tagify(input);
    });
</script>
@endsection