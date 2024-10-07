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
        </form>
    @else
        <!-- Create Form -->
        <form action="{{ route('organizer.store') }}" method="POST" class="inline">
            @csrf
            <div class="mt-2">
                <p>Organizer Name:</p>
                <input type="text" name="name" value="" class="input input-bordered input-info w-full max-w-xs" />
            </div>

            <div class="grid grid-cols-4 gap-4 mt-2">
                <div>
                    <p>Facebook:</p>
                    <input type="text" name="facebook_link" value="" class="input input-bordered input-info w-full max-w-xs" />
                </div>
                <div>
                    <p>X:</p>
                    <input type="text" name="x_link" value="" class="input input-bordered input-info w-full max-w-xs" />
                </div>
            </div>

            <div class="mb-2 mt-2">
                <p>Website:</p>
                <input type="text" name="website_link" value="" class="input input-bordered input-info w-full max-w-xs" />
            </div>

            <div class="mb-2 mt-2">
                <p>Description:</p>
                <textarea class="editor" name="description">Add Your Description</textarea>
            </div>

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