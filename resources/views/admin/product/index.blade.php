@extends('layouts.admin.app')

@section('content')
    <div class="page-heading">
        <h3>Products</h3>
    </div>
    <div class="page-content">
        <section class="section">
            <div class="row" id="basic-table">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title">Product List</h4>
                                <a href="{{ route('admin.products.create') }}" class="btn icon icon-left btn-primary">Add Product</a>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <!-- Table with outer spacing -->
                                <div class="table-responsive">
                                    <table class="table table-lg" id="tbl_category">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Price</th>
                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $product)
                                            <tr>                      
                                                   <td>{{ $product->name }}</td>
                                                   <td>{{ $product->category->name }}</td>
                                                   <td>Rp. {{ number_format($product->price,0, ',' , '.') }}</td>
                                                   <td>{{ Carbon\Carbon::parse($category->created_at)->format('d F, Y H:i:s') }}
                                                        ({{ \Carbon\Carbon::parse($category->created_at)->diffForHumans() }})</td>
                                                   <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('admin.products.edit', $category->id) }}" class="btn btn-primary me-1 mb-1">Edit</a>
                                                        <form action="{{ route('admin.products.destroy', $category->id) }}"
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
        $('#tbl_category').DataTable();
    } );    
    </script>
@endpush