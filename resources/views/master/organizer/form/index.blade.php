@extends('base.index')

@section('library-css')

@endsection


@section('content')
<div class="container mx-auto px-4 mt-5">
    <div class="flex items-center mb-5">
        <h1 class="text-2xl font-bold">Organizer</h1>
    </div>

    @if(isset($organizerData))
        <!-- Edit Form -->
        <form action="{{ route('organizer.update', $organizerData->id) }}" method="POST" class="inline">
            @csrf
            @method('PUT')
            <p class="mb-2">Organizer Name:</p>
            <input type="text" name="name" value="{{ $organizerData->name }}" class="input input-bordered input-info w-full max-w-xs" />
            <p class="mb-2">Website:</p>
            <input type="text" name="name" value="{{ $organizerData->website }}" class="input input-bordered input-info w-full max-w-xs" />
            <p class="mb-2">About:</p>
            <div class="flex space-x-2 mt-4">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('organizer.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    @else
        <!-- Create Form -->
        <form action="{{ route('organizer.store') }}" method="POST" class="inline">
            @csrf
            <p class="mb-2">Organizer Name:</p>
            <input type="text" name="name" value="" class="input input-bordered input-info w-full max-w-xs" />

            <div class="grid grid-cols-4 gap-4 mt-2">
                <div>
                    <p class="mb-2">Facebook:</p>
                    <input type="text" name="name" value="" class="input input-bordered input-info w-full max-w-xs" />
                </div>
                <div><p class="mb-2">X:</p>
                    <input type="text" name="name" value="" class="input input-bordered input-info w-full max-w-xs" />
                </div>
            </div>

            <p class="mb-2 mt-2">Website:</p>
            <input type="text" name="name" value="" class="input input-bordered input-info w-full max-w-xs" />

            <p class="mb-2 mt-2">About:</p>
            <textarea class="editor" name="article">{{ isset($article) ? $article->article : "Hello, World !" }}</textarea>

            <div class="flex space-x-2 mt-4">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('organizer.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    @endif
    
    
    
</div>

@endsection


@section('library-js')

@endsection