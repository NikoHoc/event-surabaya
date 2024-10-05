@extends('base.index')

@section('library-css')
<link href="https://cdn.datatables.net/v/dt/dt-2.1.8/datatables.min.css" rel="stylesheet">
@endsection


@section('content')
<div class="container mx-auto px-4 mt-5">
    <h1 class="text-xl font-bold">Events in Surabaya</h1>
</div>
<div class="container mx-auto px-4 mt-4">
    <div class="grid grid-cols-3 gap-4">
        @foreach ($events as $event)
        <div class="card bg-base-100 shadow-xl border-4 border-info mb-4">
            <img src="{{ asset('assets/default-image.jpg') }}" alt="Event Image" class="rounded-t-xl h-60" />
            
            <div class="card-body">
                <h2 class="card-title">{{ $event->title }}</h2>
                <p class="font-bold">{{ $event->date->format('D, M d Y') }} - {{ $event->start_time->format('h:i A') }}</p>
                <p>{{ $event->venue }}</p>
                <p>Free</p>
                <p>Organizer: {{ $event->organizer->name }}</p>
                <div class="card-actions justify-end">
                    <a href="{{ route('events.show', $event->id) }}" class="btn btn-primary">Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
</div>



@endsection




@section('library-js')
<script src="https://cdn.datatables.net/v/dt/dt-2.1.8/datatables.min.js"></script>
@endsection