@extends('base.index')

@section('library-css')

@endsection


@section('content')
<div class="container mx-auto px-4 mt-5">
    <div class="flex items-center">
        <h1 class="text-2xl font-bold">Event Category</h1>
        <a href="{{ route('event_category.create') }}" class="btn btn-primary ml-4">+ Create</a>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success mt-4">
            {{ session('success') }}
        </div>
    @endif
</div>

<div class="container mx-auto px-4 mt-5">
    <div class="overflow-x-auto"> 
        <table class="bg-neutral rounded-lg stripe hover cell-border"  id="categoryEvent">
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
                        <a href="{{ route('event_category.edit', $category->id) }}" class="btn btn-warning">edit</a>
                        <form action="{{ route('event_category.destroy', $category->id) }}" method="POST" class="delete-form" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-error delete-btn">Delete</button>
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
        $('#categoryEvent').DataTable({
            language: {
                searchPlaceholder: "Cari kategori", 
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