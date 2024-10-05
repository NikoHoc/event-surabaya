@extends('base.index')

@section('library-css')
<link href="https://cdn.datatables.net/v/dt/dt-2.1.8/datatables.min.css" rel="stylesheet">
@endsection


@section('content')
<div class="container mx-auto px-4 mt-5">
    <div class="flex items-center">
        <h1 class="text-2xl font-bold">Event Category</h1>
        <a href="" class="btn btn-primary ml-4">+ Create</a>
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
        <table class="table" id="categoryEvent">
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
                        <a href="{{ route('event_category.show', $category->id) }}" class="btn btn-warning">edit</a>
                        <form action="{{ route('event_category.destroy', $category->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this category?');" class="btn btn-error">Delete</button>
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
        $('#categoryTable').DataTable({
            // language: {
            //     searchPlaceholder: "Cari kategori", // Add placeholder to search box
            //     paginate: {
            //         previous: "<", // Use "<" for previous button
            //         next: ">" // Use ">" for next button
            //     }
            // }
        });
    });

    
</script>

@endsection