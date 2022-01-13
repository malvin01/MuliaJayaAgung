@extends('layouts.admin.app')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Create Product</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Products</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Form Product</h4>
                </div>
    
                <div class="card-body">
                    <div class="row">
                        <form method="POST" action="{{ route('admin.products.store') }}">
                            {{ csrf_field() }}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="input-name" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" 
                                    id="input-name" value="{{ old('name') }}" autofocus required>
                                    @error('name')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
        
                                <div class="form-group mb-3">
                                    <label for="text-area-description" class="form-label">Description</label>
                                    <textarea class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" id="text-area-description" rows="3" required>{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="input-sku" class="form-label">SKU</label>
                                    <input type="text" name="sku" class="form-control {{ $errors->has('sku') ? ' is-invalid' : '' }}" 
                                    id="input-sku" value="{{ old('sku') }}" required>
                                    @error('sku')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="select-status" class="form-label">Category</label>
                                    <select class="form-control {{ $errors->has('category_id') ? ' is-invalid' : '' }} select2" name="category_id" required>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                                        @endforeach
                                      </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="input-discount-percent" class="form-label">Price</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                                        <input type="text" maxlength="" class="form-control {{ $errors->has('price') ? ' is-invalid' : '' }}" 
                                        name="price" value="{{ old('discount_percent') }}" 
                                        aria-describedby="basic-addon1" required>
                                        @error('price')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="input-quantity" class="form-label">Quantity</label>
                                    <input type="text" maxlength="11" name="quantity" class="form-control {{ $errors->has('quantity') ? ' is-invalid' : '' }}" 
                                    id="input-quantity" value="{{ old('quantity') }}" required>
                                    @error('quantity')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="select-status" class="form-label">Category</label>
                                    <select class="form-control {{ $errors->has('discount_id') ? ' is-invalid' : '' }} select2" name="discount_id ">
                                        
                                        @foreach ($discounts as $discount)
                                            <option value="{{ $discount->name }}">{{ $discount->name }}</option>
                                        @endforeach
                                      </select>
                                    @error('discount_id ')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="input-product-photos" class="form-label">Photos</label>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control {{ $errors->has('product_photos') ? ' is-invalid' : '' }}" 
                                        name="product_photos" multiple required>
                                        @error('product_photos')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
        
                                <button type="submit" class="btn btn-success w-100 mt-5">Save</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('js')
    <script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.select2').select2();
    });
    </script>
@endpush