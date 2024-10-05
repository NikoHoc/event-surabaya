@extends('base.index')

@section('library-css')
<link href="https://cdn.datatables.net/v/dt/dt-2.1.8/datatables.min.css" rel="stylesheet">
@endsection


@section('content')
<div class="container mx-auto px-4 mt-5">
    <div class="flex items-center mb-5">
        <h1 class="text-2xl font-bold">Event Category</h1>
    </div>

    <form action="{{ route('event_category.update', $categoryData->id) }}" method="POST" class="inline">
        @csrf
        @method('PUT')
        <p class="mb-2">Category Name:</p>
        <input
            type="text"
            name="name"
            value="{{ $categoryData->name }}" 
            class="input input-bordered input-info w-full max-w-xs" />
        
        <div class="flex space-x-2 mt-4 ">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('event_category.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
    
    
    
</div>

@endsection




@section('library-js')
<script src="https://cdn.datatables.net/v/dt/dt-2.1.8/datatables.min.js"></script>
@endsection