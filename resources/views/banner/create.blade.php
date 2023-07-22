@extends('dashboard.dashboard_master')

//<base href="/public">

@section('content')

<div class="">
    <div class="row">
        <div class="col-lg-10 m-auto">
            <div class="card">
                <div class="card-header">
                    <h2>Banner add form</h2>
                    
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

                    <form action="{{ route('banner.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <lebel class="form-lebel text-uppercase">banner title</lebel>
                            <input type="text" class = "form-control" name= "banner_title" placeholder="Enter banner title">
                            @error ('banner_title')
                                <small class="text-danger">{{ $message }}</small>

                            @enderror
                        </div>
                        <lebel class="form-lebel text-uppercase">banner image</lebel>
                            <input type="file" class = "form-control" name= "banner_image">
                            @error ('banner_image')
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