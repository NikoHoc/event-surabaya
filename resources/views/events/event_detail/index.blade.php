@extends('base.index')

@section('library-css')
<link href="https://cdn.datatables.net/v/dt/dt-2.1.8/datatables.min.css" rel="stylesheet">
@endsection


@section('content')

<div class="container mx-auto px-4 mt-5">
    <div class="grid grid-cols-2 gap-5 mt-5">
        <div>
            <h1 class="font-semibold">{{ $event->categoryEvents ? $event->categoryEvents->name : 'No Category' }}</h1>
            <h1 class="font-black text-3xl">{{ $event->title }}</h1>
        </div>
        <div class="flex justify-end">
            <a href="{{ route('events/index') }}" class="btn btn-info">Back</a>
        </div>
    </div>
    
    <img class="mt-5" src="{{ asset('assets/default-image.jpg') }}" alt="Event Image">
    <div class="grid grid-cols-2 gap-5 mt-5">
        <div>
            <h1 class="font-bold">Organizer</h1>
            <p>{{ $event->organizer->name }}</p>
        </div>
        <div>
            <h1 class="font-bold">Date and Time</h1>
            <p class="font-bold">{{ $event->date->format('D, M d Y') }} - {{ $event->start_time->format('h:i A') }}</p>
        </div>
        <div>
            <h1 class="font-bold">Booking URL</h1>
            <p>{{ $event->booking_url }}</p>
        </div>
        <div>
            <h1 class="font-bold">Location</h1>
            <p>{{ $event->venue }}</p>
        </div>
    </div>
    <div class="grid grid-rows-2 grid-flow-col gap-4 mt-5">
        <div>
            <h1 class="font-bold">About This Event</h1>
            <p>{{ $event->description }}</p>
        </div>
        <div>
            <h1 class="font-bold">Tags</h1>
            @foreach (json_decode($event->tags) as $tag)
                <div class="badge badge-primary">{{ $tag }}</div>
            @endforeach
        </div>
    </div>
</div>

@endsection




@section('library-js')
<script src="https://cdn.datatables.net/v/dt/dt-2.1.8/datatables.min.js"></script>
@endsection