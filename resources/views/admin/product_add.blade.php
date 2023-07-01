@extends('layouts.admin')

@section('title','Ürün Ekle')

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
                            <h4 class="card-title ">Ürün Ekle</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form role="form" action="{{route('admin_product_store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Parent</label>
                                        <select class="form-control select2" name="category_id" style="width: 100%;">
                                            @foreach($datalist as $rs)
                                                <option value="{{$rs->id}}">{{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($rs,$rs->title) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" id="title" name="title" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Keywords</label>
                                        <input type="text" name="keywords" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <input type="text" name="description" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="number" name="price" value="0" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Quantity</label>
                                        <input type="number" name="quantity" value="1" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Minquantity</label>
                                        <input type="number" name="minquantity" value="5" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Tax</label>
                                        <input type="text" name="tax" value="18" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Detail</label>
                                        <textarea id="detail" name="detail"></textarea>
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
                                        <input type="text" name="slug" class="form-control">
                                    </div>

                                        <label>Image</label>
                                        <input type="file" name="image" id="image" class="form-control">

                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control select2" name="status" style="width: 100%;">
                                            <option selected="selected">False</option>
                                            <option>True</option>
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Add Product</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
