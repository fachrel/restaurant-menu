@extends('layouts.app')

@php
    $title = "Create Kategori";
    $url = route('categories.store');
    if ($editMode) {
        $title = "Edit Kategori";
        $url = route('categories.update', $category->id);
    }
@endphp

@section('title', $title)
@section('content')
    <div class="card">
        <div class="card-header bg-secondary">
            <h4 class="card-title text-white ">{{ $title }}</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form class="form form-horizontal" method="POST" action="{{ $url }}">
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
                                            {{ $category->status == '1' ? 'checked' : '' }}
                                        @else
                                            checked
                                        @endif
                                        >
                                        <label for="status">Active</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Name</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="name" class="form-control" name="name" value="{{ $editMode ? $category->name : '' }}" placeholder="Name Kategori">
                            </div>
                            <div class="col-md-4">
                                <label>Description</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="username" id="username" class="form-control" value="{{ $editMode ? $category->description : '' }}" name="description" placeholder="Description">
                            </div>
                            
    
                            <div class="col-sm-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">{{ $editMode ? 'Update' : 'Submit' }}</button>
                                {{-- <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button> --}}
                                <a href="{{ route('categories.index') }}" type="button" class="btn btn-dark me-1 mb-1">Back</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
