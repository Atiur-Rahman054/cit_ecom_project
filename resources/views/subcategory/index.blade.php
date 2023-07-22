@extends('dashboard.dashboard_master')

<base href="/public"></a>

@section('content')

<div class="">
    <div class="row">
        <div class="col-lg-12 m-auto">
        <div class="card">
                <div class="card-header">
                    <h2>Subcategory List</h2>
                </div>
                <div class="card-body">
                   <table class="table table-bordered">
                       <thead>
                            <th>Sl</th>
                            <th>Category_id</th>
                            <th>Subcategory_name</th>
                            <th>Action</th>
                       </thead>
                       <tbody>
                            @forelse ($all_subcategories as $subcategories)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $subcategories->relationTocategory->category_name }}</td>
                                    <td>{{ $subcategories->subcategory_name }}</td>
           
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ url('subcategory/edit') }}/{{$subcategories->id}}" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="{{ url('subcategory/delete') }}/{{$subcategories->id}}" class="btn btn-danger btn-sm">Delete</a>
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