@extends('dashboard.dashboard_master')

<base href="/public">

@section('content')

<div class="">
    <div class="row">
        <div class="col-lg-10 m-auto">
            <div class="card">
                <div class="card-header">
                    <h2>Product Edit form</h2>
                    
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

                    <form action="{{ route('product.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <lebel class="form-lebel text-uppercase">Product name</lebel>
                            <input type="hidden" name="id" value="{{ $product_info->id }}">
                            <input type="text" class = "form-control" name= "product_name" placeholder="Enter product name" value="{{ $product_info->product_name }}">
                            @error ('product_name')
                                <small class="text-danger">{{ $message }}</small>

                            @enderror
                        </div>
                        <div class="mb-3">
                            <lebel class="form-lebel text-uppercase">Old price</lebel>
                            <input type="text" class = "form-control" name= "old_price" placeholder="Enter product name" value="{{ $product_info->old_price }}">
                            @error ('old_price')
                                <small class="text-danger">{{ $message }}</small>

                            @enderror
                        </div>
                        <div class="mb-3">
                            <lebel class="form-lebel text-uppercase">new price</lebel>
                            <input type="text" class = "form-control" name= "new_price" placeholder="Enter product name" value="{{ $product_info->new_price }}">
                            @error ('new_price')
                                <small class="text-danger">{{ $message }}</small>

                            @enderror
                        </div> 
                        <lebel class="form-lebel text-uppercase">product image</lebel>
                            <input type="file" class = "form-control" name= "product_image" placeholder="Enter product name">
                            @error ('product_image')
                                <small class="text-danger">{{ $message }}</small>

                            @enderror
                        </div>
                        <div class="mb-3">
                            <img src="{{ asset('/uploads/product_photo') }}/{{ $product_info->product_image }}" alt="" width="100">
                        </div>
                        <div class="mb-3">
                           <button type="submit" class = "btn btn-info">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- to create search function -->
@section('footer_script')
<script type="text/javascript">
    $(document).ready(function(){
        $('#catid',).select2();
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#subcatid',).select2();
    });
</script>
@endsection