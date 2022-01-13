@extends('layouts.admin.app')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Edit Category</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Categories</a></li>
                            <li class="breadcrumb-item">{{ $category->name }}</li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                    <h4 class="card-title">Form Category</h4>
                </div>
    
                <div class="card-body">
                    <div class="row">
                        <form method="POST" action="{{ route('admin.categories.update', $category->id) }}">
                            {{ csrf_field() }}
                            @method('PUT')
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="basicInput" class="input-name">Name</label>
                                    <input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" 
                                    id="input-name" value="{{ old('name', $category->name) }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="input-slug" class="form-label">Slug</label>
                                    <input type="text" name="slug" id="input-slug" class="form-control {{ $errors->has('slug') ? ' is-invalid' : '' }}" 
                                    id="input-name" value="{{ old('slug', $category->slug) }}" readonly>
                                    @error('slug')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
        
                                <div class="form-group mb-3">
                                    <label for="text-area-description" class="form-label">Description</label>
                                    <textarea class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" id="text-area-description" rows="3" required>{{ old('description', $category->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-success w-100">Save</button>
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
        $('#input-name').change(function(e){
            $.get('{{ route('admin.categories.checkSlug') }}',
            { 'name': $(this).val() },
            function( data ){
                $('#input-slug').val(data.slug)
            }
            );
        });
    </script>
@endpush