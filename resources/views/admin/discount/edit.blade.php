@extends('layouts.admin.app')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Create Discount</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.discounts.index') }}">Discounts</a></li>
                            <li class="breadcrumb-item">{{ $discount->name }}</li>
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
                    <h4 class="card-title">Form Discount</h4>
                </div>
    
                <div class="card-body">
                    <div class="row">
                        <form method="POST" action="{{ route('admin.discounts.update', $discount->id) }}">
                            {{ csrf_field() }}
                            @method('PUT')
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="input-name" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" 
                                    id="input-name" value="{{ old('name', $discount->name) }}" autofocus required>
                                    @error('name')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
        
                                <div class="form-group mb-3">
                                    <label for="text-area-description" class="form-label">Description</label>
                                    <textarea class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" id="text-area-description" rows="3" required>{{ old('description',  $discount->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="input-discount-percent" class="form-label">Discount Percent</label>
                                    <div class="input-group mb-3">
                                        <input type="text" maxlength="3" class="form-control {{ $errors->has('discount_percent') ? ' is-invalid' : '' }}" name="discount_percent" value="{{ old('discount_percent', $discount->discount_percent) }}" aria-describedby="basic-addon2" required>
                                        <span class="input-group-text" id="basic-addon2">%</span>
                                        @error('discount_percent')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="select-status" class="form-label">Status</label>
                                    <select class="form-select" name="is_active" id="select-status">
                                        <option selected>Choose Status...</option>
                                        <option value="0" {{ old('is_active', $discount->is_active) == 0 ? "selected" : "" }}>Inactive</option>
                                        <option value="1" {{ old('is_active', $discount->is_active) == 1 ? "selected" : "" }}>Active</option>
                                    </select>
                                    @error('is_active')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
        
                                <button type="submit" class="btn btn-success w-100 mt-5">Save Changes</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection