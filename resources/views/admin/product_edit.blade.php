@extends('layouts.admin')

@section('title','Product Düzenle')

<head>
    @FilemanagerScript
</head>
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>



@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Ürün Düzenle</h4>

                        </div>
                        <div class="card-body">
                            <div style="width:1000px; height: 1500px;">
                                <form role="form" action="{{route('admin_product_update', ['id'=>$data->id])}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Parent</label>
                                        <select class="form-control select2" name="category_id" style="width: 100%;">
                                            @foreach($datalist as $rs)
                                                <option value="{{$rs->id}}" @if ($rs->id == $data->category_id) selected="selected" @endif >{{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($rs,$rs->title) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" id="title" name="title" value="{{$data->title}}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Keywords</label>
                                        <input type="text" name="keywords" value="{{$data->keywords}}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <input type="text" name="description" value="{{$data->description}}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="number" name="price" value="{{$data->price}}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Quantity</label>
                                        <input type="number" name="quantity" value="{{$data->quantity}}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Minquantity</label>
                                        <input type="number" name="minquantity" value="{{$data->minquantity}}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Detail</label>
                                        <textarea id="detail" name="detail">{{$data->detail}}</textarea>
                                        <script>
                                            window.onload = function () {
                                                CKEDITOR.replace('detail', {
                                                    filebrowserBrowseUrl: filemanager.ckBrowseUrl,
                                                });
                                            }
                                        </script>
                                    </div>
                                    <div class="form-group">
                                        <label>Slug</label>
                                        <input type="text" name="slug" value="{{$data->slug}}" class="form-control">
                                    </div>


                                        <input type="file" name="image" class="form-control">
                                        @if ($data->image)
                                            <img src="{{Storage::url($data->image)}}" height="60" alt="">
                                        @endif

                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control select2" name="status" style="width: 100%;">
                                            <option selected="selected">{{$data->status}}</option>
                                            <option>True</option>
                                            <option>False</option>
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Update Product</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
