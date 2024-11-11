@extends('layouts.app')

@php
    $title = "Create Menu";
    $url = route('menus.store');
    if ($editMode) {
        $title = "Edit Menu";
        $url = route('menus.update', $menu->id);
    }
@endphp

@section('title', $title)
@section('content')
    <div class="card">
        <div class="card-header bg-secondary">
            <h4 class="card-title text-white ">{{ $title }}</h4>
        </div>
        @error('name')
            <div class="alert-danger">{{ $message }}</div>
        @enderror
        <div class="card-content">
            <div class="card-body">
            <form class="form form-horizontal" method="POST" action="{{ $url }}" enctype="multipart/form-data">
                    @if ($editMode)
                        @method('PUT')
                    @endif
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12 form-group mb-3">
                                <div class="form-check">
                                    <div class="checkbox">
                                        <input type="checkbox" id="status" name="status" class="form-check-input" 
                                        @if ($editMode)
                                            {{ $menu->status == '1' ? 'checked' : '' }}
                                        @else
                                            checked
                                        @endif
                                        >
                                        <label for="status">Active</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Menu</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="name" class="form-control" name="name" value="{{ $editMode ? $menu->name : '' }}" placeholder="Name Menu">
                            </div>
                            <div class="col-md-4">
                                <label>Description</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="description" class="form-control" value="{{ $editMode ? $menu->description : '' }}" name="description" placeholder="Description">
                            </div>

                            <div class="col-md-4">
                                <label>Price</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <x-server.price-input :value="$editMode ? $menu->price : ''" />
                            </div>
                            <div class="col-md-4">
                                <label>Category</label>
                            </div>
                            <div class="col-md-8 form-group">    
                                <select class="choices form-select form-control multiple-remove" multiple="multiple" name="categories[]">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" 
                                            {{ $editMode && $menu->categories->pluck('id')->contains($category->id) ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                            
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label>Image</label>
                            </div>
                            <div class="col-md-8 form-group">    
                                <input class="form-control" type="file" id="image" name="image">
                                <small>disarankan untuk mengupload gambar dengan skala 1:1 dan memiliki background transparan.</small>
                            </div>
                            <div class="col-md-12">
                                @if ($editMode && $menu->image)
                                <small>Current image:</small><br>
                                <img src="{{ asset('storage/' . $menu->image) }}" alt="Current Image" width="100">
                            @endif
                            </div>    
                            <div class="col-sm-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">{{ $editMode ? 'Update' : 'Submit' }}</button>
                                {{-- <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button> --}}
                                <a href="{{ route('menus.index') }}" type="button" class="btn btn-dark me-1 mb-1">Back</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- FilePond Core Library -->
    {{-- <script src="https://unpkg.com/filepond/dist/filepond.js"></script>

    <!-- Required FilePond plugins -->
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.js"></script>

    <script>
        FilePond.registerPlugin(
            FilePondPluginFileValidateType,
            FilePondPluginImagePreview,
            FilePondPluginImageResize,
            FilePondPluginImageCrop
        );

        FilePond.create(document.querySelector('.filepond'), {
            allowImagePreview: true,
            allowImageResize: true,
            allowImageCrop: true,
            imageCropAspectRatio: '1:1',  // Enforce 1:1 aspect ratio
            imageResizeMode: 'cover',     // Make sure the image covers the crop area
            imageResizeTargetWidth: 200,  // Adjust size as needed
            imageResizeTargetHeight: 200, // Adjust size as needed
            acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg'],
        });

        filepondInstance.on('processfile', (error, file) => {
            if (!error) {
                document.getElementById('image-input').value = file.serverId; // Server response ID
            }
        });

    </script> --}}


    <script src="{{asset('mazer/assets/vendors/choices.js/choices.min.js')}}"></script>

    
@endsection
