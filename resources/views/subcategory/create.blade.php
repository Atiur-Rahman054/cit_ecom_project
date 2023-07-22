@extends('dashboard.dashboard_master')

<base href="/public">

@section('content')

<div class="">
    <div class="row">
        <div class="col-lg-10 m-auto">
            <div class="card">
                <div class="card-header">
                    <h2>Subcategory add form</h2>
                    
                </div>
                <div class="card-body">

                @if(session('inserr'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{ session('inserr') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if(session('insdone'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('insdone') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                    <form action="{{ route('subcategory.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <select class="form-select form-control" name="category_id">
                                <option value="">Select a category</option>
                                @foreach($all_categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                            @error ('category_id')
                                <small class="text-danger">{{ $message }}</small>

                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="text" class = "form-control" name= "subcategory_name" placeholder="Enter subcategory name">
                            @error ('subcategory_name')
                                <small class="text-danger">{{ $message }}</small>

                            @enderror
                        </div>
                        <div class="mb-3">
                           <button type="submit" class = "btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection