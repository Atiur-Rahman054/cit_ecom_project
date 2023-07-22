@extends('dashboard.dashboard_master')

<base href="/public"></a>

@section('content')

<div class="">
    <div class="row">
        <div class="col-lg-12 m-auto">
        <div class="card">
                <div class="card-header">
                    <h2>Product List</h2>
                </div>
                <div class="card-body">
                   <table class="table table-bordered">
                       <thead>
                            <th>Sl</th>
                            <th>product_name</th>
                            <th>old_price</th>
                            <th>new_price</th>
                            <th>product_image</th>
                            <th>created_at</th>
                            <th>Action</th>
                       </thead>
                       <tbody>
                            @forelse ($all_product as $product)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->old_price }}</td>
                                    <td>{{ $product->new_price }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/product_photo') }}/{{ $product->product_image }}" alt="Not found" width="100">
                                    </td>
                                    <td>{{ $product->created_at->format('d-M-Y') }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('product.edit',$product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="{{ route('product.delete',$product->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                        </div>
                                    </td>                                 
                                 </tr>
                                 @empty
                                 <td class="text-danger text-center" colspan="10">No data added yet</td>
                            @endforelse
                       </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection