@extends('layouts.admin.app')

@section('content')
    <div class="page-heading">
        <h3>Discounts</h3>
    </div>
    <div class="page-content">
        <section class="section">
            <div class="row" id="basic-table">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title">Discount List</h4>
                                <a href="{{ route('admin.discounts.create') }}" class="btn icon icon-left btn-primary">Add Discount</a>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <!-- Table with outer spacing -->
                                <div class="table-responsive">
                                    <table class="table table-lg" id="tbl_discount">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Discount Percent</th>
                                                <th>Status</th>
                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($discounts as $discount)
                                            <tr>
                                                   <td>{{ $discount->name }}</td>
                                                   <td>{{ $discount->discount_percent }}</td>
                                                   <td>@if ($discount->is_active == 0)
                                                        <span class="badge bg-danger">Inactive</span>
                                                       @else
                                                        <span class="badge bg-success">Acive</span>
                                                       @endif
                                                    </td>
                                                   <td>{{ Carbon\Carbon::parse($discount->created_at)->format('d F, Y H:i:s') }}
                                                        ({{ \Carbon\Carbon::parse($discount->created_at)->diffForHumans() }})</td>
                                                   <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('admin.discounts.edit', $discount->id) }}" class="btn btn-primary me-1 mb-1">Edit</a>
                                                        <form action="{{ route('admin.discounts.destroy', $discount->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger me-1 mb-1">Delete</button>
                                                        </form>
                                                       </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{-- <div class="d-flex justify-content-end p-4">
                                    {{ $categories->links() }}
                                </div> --}}
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>     
    </div>
@endsection
@push('js')
    <script>
        $(document).ready( function () {
            $('#tbl_discount').DataTable();
        });    
    </script>
@endpush