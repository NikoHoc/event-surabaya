@extends('base.index')

@section('library-css')

@endsection


@section('content')
<div class="container mx-auto px-4 mt-5">
    <div class="flex items-center">
        <h1 class="text-2xl font-bold">Event Category</h1>
        <a href="{{ route('event_category.create') }}" class="btn btn-primary ml-4">+ Create</a>
    </div>
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
        <table class="bg-neutral rounded-lg stripe hover"  id="categoryEventTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Event Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($eventCategoryData as $category)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('event_category.edit', $category->id) }}" class="btn btn-warning">
                            <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24"><path fill="currentColor" d="M3 17.46v3.04c0 .28.22.5.5.5h3.04c.13 0 .26-.05.35-.15L17.81 9.94l-3.75-3.75L3.15 17.1q-.15.15-.15.36M20.71 7.04a.996.996 0 0 0 0-1.41l-2.34-2.34a.996.996 0 0 0-1.41 0l-1.83 1.83l3.75 3.75z"/></svg>
                        </a>
                        <form action="{{ route('event_category.destroy', $category->id) }}" method="POST" class="delete-form" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-error delete-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24"><path fill="currentColor" d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6zM19 4h-3.5l-1-1h-5l-1 1H5v2h14z"/></svg>
                            </button>
                        </form>
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
        $('#categoryEventTable').DataTable({
            language: {
                searchPlaceholder: "Cari kategori", 
            }
        });

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