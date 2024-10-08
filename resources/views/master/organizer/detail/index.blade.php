@extends('base.index')

@section('library-css')
@endsection


@section('content')
<div class="container mx-auto px-4 mt-5">
    <div class="grid grid-rows-3 grid-flow-col gap-4">
        <div class="">
            <h1 class="text-2xl font-bold">{{ $organizerData->name }}</h1>
        </div>
        <div class="inline-flex gap-2">
            <a href="{{ route('organizer.edit', $organizerData->id) }}" class="btn btn-warning">
                <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24"><path fill="currentColor" d="M3 17.46v3.04c0 .28.22.5.5.5h3.04c.13 0 .26-.05.35-.15L17.81 9.94l-3.75-3.75L3.15 17.1q-.15.15-.15.36M20.71 7.04a.996.996 0 0 0 0-1.41l-2.34-2.34a.996.996 0 0 0-1.41 0l-1.83 1.83l3.75 3.75z"/></svg>
            </a>
            
            <form action="{{ route('organizer.destroy', $organizerData->id) }}" method="POST" class="delete-form" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-error delete-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24"><path fill="currentColor" d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6zM19 4h-3.5l-1-1h-5l-1 1H5v2h14z"/></svg>
                </button>
            </form>
        </div>
        <div class="flex justify-end row-span-3">
            <a href="{{ route('organizer.index') }}" class="btn btn-info">Back</a>
        </div>
        
    </div>

    {{-- <div class="grid grid-rows-3 mt-3">
        <div class="flex items-center mt-3 gap-3">
            <h1 class="text-2xl font-bold">Facebook</h1>
            <h1 class="text-lg">{{ $organizerData->facebook_link }}</h1>
        </div>
        <div  class="flex items-center mt-3 gap-3">
            <h1 class="text-2xl font-bold">X</h1>
            <h1 class="text-lg">{{ $organizerData->x_link }}</h1>
        </div>
        <div  class="flex items-center mt-3 gap-3">
            <h1 class="text-2xl font-bold">Website</h1>
            <h1 class="text-lg">{{ $organizerData->website_link }}</h1>
        </div>
    </div> --}}

    <div class="mt-5 space-y-3">
        <div class="flex items-center">
            <div class="text-xl font-bold w-32">Facebook</div>
            <div class="text-md">{{ $organizerData->facebook_link }}</div>
        </div>

        <div class="flex items-center">
            <div class="text-xl font-bold w-32">X</div>
            <div class="text-md">{{ $organizerData->x_link }}</div>
        </div>

        <div class="flex items-center">
            <div class="text-xl font-bold w-32">Website</div>
            <div class="text-md">{{ $organizerData->website_link }}</div>
        </div>

        <div class="">
            <div class="text-xl font-bold w-32">Description</div>
            <div class="text-md mt-1">{{ $organizerData->description }}</div>
        </div>
    </div>
</div>

@endsection




@section('library-js')
<script>
    $(document).ready(function() {
        // SweetAlert for Delete Confirmation
        $('.delete-form').on('submit', function(event) {
            event.preventDefault(); 
            let form = $(this);

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.off('submit').submit(); 
                }
            });
        });
    });

    
</script>
@endsection