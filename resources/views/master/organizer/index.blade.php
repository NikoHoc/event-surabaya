@extends('base.index')

@section('library-css')

@endsection


@section('content')
<div class="container mx-auto px-4 mt-5">
    <div class="flex items-center">
        <h1 class="text-2xl font-bold">Organizer</h1>
        <a href="{{ route('organizer.create') }}" class="btn btn-primary ml-4">+ Create</a>
    </div>

    {{-- <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success mt-4">
            {{ session('success') }}
        </div>
    @endif --}}
    @if (Session::has('message') && Session::get('alert-class') == 'success')
        <div class="alert alert-success mt-4"
            role="alert">
            {{ Session::get('message') }}
        </div>
    @elseif(Session::has('message') && Session::get('alert-class') == 'failed')
        <div class="alert alert-error mt-4"
            role="alert">
            {{ Session::get('message') }}
        </div>
    @endif
</div>

<div class="container mx-auto px-4 mt-5">
    <div class="overflow-x-auto"> 
        <table class="bg-neutral rounded-lg stripe hover"  id="organizerTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Organizer Name</th>
                    <th>About</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($organizerData as $organizer)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td class="whitespace-nowrap">
                        <a href="{{ route('organizer.show', $organizer->id) }}">{{ $organizer->name }}</a>
                    </td>
                    <td>{{ $organizer->description }}</td>
                    <td>
                        <div class="inline-flex gap-2">
                            <a href="{{ route('organizer.edit', $organizer->id) }}" class="btn btn-warning">edit</a>
                            <form action="{{ route('organizer.destroy', $organizer->id) }}" method="POST" class="delete-form" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-error delete-btn">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection




@section('library-js')
<script>
    $(document).ready(function() {
        $('#organizerTable').DataTable({
            language: {
                searchPlaceholder: "Cari Organizer", 
            }
        });

        // SweetAlert for Delete Confirmation
        $('.delete-form').on('submit', function(event) {
            event.preventDefault(); // Prevent the form from submitting immediately
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
                    form.off('submit').submit(); // Allow form submission
                }
            });
        });
    });

    
</script>

@endsection