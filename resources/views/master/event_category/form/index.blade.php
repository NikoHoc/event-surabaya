@extends('base.index')

@section('library-css')

@endsection


@section('content')
<div class="container mx-auto px-4 mt-5">
    <div class="flex items-center mb-5">
        <h1 class="text-2xl font-bold">Event Category</h1>
    </div>

    @if(isset($categoryData))
        <!-- Edit Form -->
        <form action="{{ route('event_category.update', $categoryData->id) }}" method="POST" class="inline">
            @csrf
            @method('PUT')
            <div class="mb-2">
                <p class="mb-2">Category Name:</p>
                <input type="text" name="name" value="{{ $categoryData->name }}" class="input input-bordered input-info w-full max-w-xs" />
            </div>
            <div class="flex space-x-2 mt-4">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('event_category.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    @else
        <!-- Create Form -->
        <form action="{{ route('event_category.store') }}" method="POST" class="inline">
            @csrf
            <div class="mb-2"><p class="mb-2">Category Name:</p>
                <input type="text" name="name" value="" class="input input-bordered input-info w-full max-w-xs" />
            </div>
            
            <div class="flex space-x-2 mt-4">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('event_category.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    @endif
    
    
    
</div>

@endsection


@section('library-js')

@endsection