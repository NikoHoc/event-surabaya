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
            <a href="{{ route('organizer.edit', $organizerData->id) }}" class="btn btn-warning">edit</a>
            
            <form action="{{ route('organizer.destroy', $organizerData->id) }}" method="POST" class="delete-form" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-error delete-btn">Delete</button>
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