@extends('dashboard.dashboard_master')

<base href="/public">

@section('content')

<div class="">
    <div class="row">
        <div class="col-lg-10 m-auto">
            <div class="card">
                <div class="card-header">
                    <h2>Product add form</h2>
                    
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

                    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <lebel class="form-lebel text-uppercase">Product name</lebel>
                            <input type="text" class = "form-control" name= "product_name" placeholder="Enter product name">
                            @error ('product_name')
                                <small class="text-danger">{{ $message }}</small>

                            @enderror
                        </div>
                        <div class="mb-3">
                            <lebel class="form-lebel text-uppercase">Old price</lebel>
                            <input type="text" class = "form-control" name= "old_price" placeholder="Enter product name">
                            @error ('old_price')
                                <small class="text-danger">{{ $message }}</small>

                            @enderror
                        </div>
                        <div class="mb-3">
                            <lebel class="form-lebel text-uppercase">new price</lebel>
                            <input type="text" class = "form-control" name= "new_price" placeholder="Enter product name">
                            @error ('new_price')
                                <small class="text-danger">{{ $message }}</small>

                            @enderror
                        </div>
                        <div class="mb-3">
                            <lebel class="form-lebel text-uppercase">category</lebel>
                            <select name="category_id" class="custom-select" id="catid">
                                <option value="">select category</option>
                                @foreach($all_categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                            @error ('category_id')
                                <small class="text-danger">{{ $message }}</small>

                            @enderror
                        </div>
                        <div class="mb-3">
                            <lebel class="form-lebel text-uppercase">subcategory</lebel>
                            <select name="subcategory_id" class="custom-select" id="subcatid">
                                <option value="">select subcategory</option>
                                @foreach($all_subcategories as $subcategory)
                                    <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>
                                @endforeach
                            </select>
                            @error ('category_id')
                                <small class="text-danger">{{ $message }}</small>

                            @enderror
                        </div>
                        <div class="mb-3">
                            <lebel class="form-lebel text-uppercase">short description</lebel>
                            <textarea name="short_description" class="form-control"></textarea>
                            @error ('short_description')
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
                           <button type="submit" class = "btn btn-primary">Add</button>
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