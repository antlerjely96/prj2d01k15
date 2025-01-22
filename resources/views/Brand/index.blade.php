@extends('layouts.index')
@section('title')
    Brands
@endsection
@section('page_management')
    Brand Management
@endsection
@section('page_title')
    Brand list
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <a href="{{ route('brands.create') }}">Add a brand</a>
            <h1>Brand List</h1>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">DataTable with default features</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Country</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($brands as $brand)
                            <tr>
                                <td>
                                    {{ $brand->id }}
                                </td>
                                <td>
                                    {{ $brand->name }}
                                </td>
                                <td>
                                    {{ $brand->country }}
                                </td>
                                <td>
                                    <a href="{{ route('brands.edit', $brand->id) }}">
                                        Edit
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('brands.destroy', $brand->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button>Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <table id="example1" class="table table-bordered table-striped">


            </table>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": true,
                "paging": true,
                "ordering": true,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            // $('#example2').DataTable({
            //     "paging": true,
            //     "lengthChange": false,
            //     "searching": false,
            //     "ordering": true,
            //     "info": true,
            //     "autoWidth": false,
            //     "responsive": true,
            // });
        });
    </script>
@endpush
