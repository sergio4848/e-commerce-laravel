@extends('layouts.admin')

@section('title','Ürünler Listesi')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <a href="{{route('admin_product_add')}}" class="btn btn-secondary" style="position: absolute; right: 25px;">Ürün Ekle</a>
                            <h4 class="card-title ">Ürünler</h4>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>Id</th>
                                    <th>Category</th>
                                    <th>Title</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Image Gallery</th>
                                    <th>Status</th>
                                    <th style="width:200px" colspan="2">Actions</th>
                                    </thead>
                                    <tbody>
                                    @foreach($datalist as $rs)
                                        <tr>
                                            <td>{{$rs->id}}</td>
                                            <td>{{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($rs->category,$rs->category->title) }}</td>
                                            <td><a href="#" target="_blank">{{$rs->title}}</a></td>
                                            <td>{{$rs->quantity}}</td>
                                            <td>{{$rs->price}}₺</td>
                                            <td>
                                                @if ($rs->image)
                                                    <img src="{{Storage::url($rs->image)}}" height="30" alt="">
                                                @endif
                                            </td>
                                            <td><a href="{{route('admin_image_add', ['product_id' =>$rs->id])}}" onclick="return !window.open(this.href, '','top=50, left=100, width=1100, height=700')">
                                                    <img src="{{asset('assets')}}/admin/images/gallery.png" height="25"></a></td>
                                            <td>{{$rs->status}}</td>
                                            <td><a href="{{route('admin_product_edit', ['id' =>$rs->id])}}"><img src="{{asset('assets')}}/admin/images/edit.png" height="25"></a></td>
                                            <td><a href="{{route('admin_product_delete', ['id' =>$rs->id])}}" onclick="return confirm('Delete! Are you sure ?')"><img src="{{asset('assets')}}/admin/images/delete.png" height="25"></a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
