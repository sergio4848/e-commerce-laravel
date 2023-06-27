@extends('layouts.admin')

@section('title','Ayarları Düzenle')

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
                            <h4 class="card-title ">Ayaları Düzenle</h4>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="{{route('admin_setting_update')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <table>

                                        <tr><h4></h4> <input style="width: 600px" id="id" value="{{$data->id}}" type="hidden" name="id" placeholder="Id"/></tr>
                                        <tr><h4>Title:</h4> <input style="width: 600px" id="title" value="{{$data->title}}" type="text" name="title" placeholder="Title"/></tr>
                                        <tr><h4>Keywords: </h4><input style="width: 600px" id="keywords" value="{{$data->keywords}}" type="text" name="keywords" placeholder="Keywords"/></tr>
                                        <tr><h4>Description: </h4><input style="width: 600px" id="description" value="{{$data->description}}" type="text" name="description" placeholder="Description"/></tr>
                                        <tr><h4>Company: </h4><input style="width: 600px" id="company" value="{{$data->company}}" type="text" name="company" placeholder="company"/></tr>
                                        <tr><h4>Address: </h4><input style="width: 600px" id="address" value="{{$data->address}}" type="text" name="address" placeholder="address"/></tr>
                                        <tr><h4>Phone: </h4><input style="width: 600px" id="phone" value="{{$data->phone}}" type="number" name="phone" placeholder="phone"/></tr>
                                        <tr><h4>Facebook: </h4><input style="width: 600px" id="facebook" value="{{$data->facebook}}" type="text" name="facebook" placeholder="facebook"/></tr>
                                        <tr><h4>Twitter: </h4><input style="width: 600px" id="twitter" value="{{$data->twitter}}" type="text" name="twitter" placeholder="twitter"/></tr>
                                        <tr><h4>Instagram: </h4><input style="width: 600px" id="instagram" value="{{$data->instagram}}" type="text" name="instagram" placeholder="instagram"/></tr>
                                        <tr><h4>Youtube: </h4><input style="width: 600px" id="youtube" value="{{$data->youtube}}" type="text" name="youtube" placeholder="youtube"/></tr>
                                        <tr><h4>About Us: </h4><textarea id="aboutus"  name="aboutus" >{{$data->aboutus}}</textarea></tr>
                                        <tr><h4>Contact: </h4><textarea  id="contact"  name="contact" >{{$data->contact}}</textarea></tr>
                                        <tr><h4>References: </h4><textarea id="references"  name="references" >{{$data->references}}</textarea></tr>
                                        <script>
                                            window.onload = function () {
                                                CKEDITOR.replace('references', {
                                                    filebrowserBrowseUrl: filemanager.ckBrowseUrl,
                                                });
                                                CKEDITOR.replace('aboutus', {
                                                    filebrowserBrowseUrl: filemanager.ckBrowseUrl,
                                                });
                                                CKEDITOR.replace('contact', {
                                                    filebrowserBrowseUrl: filemanager.ckBrowseUrl,
                                                });
                                            }

                                        </script><br>
                                        <tr><label for="status"><h4>Status:</h4></label><br>

                                            <select name="status" id="status" style="width: 600px">
                                                <option selected="selected">{{$data->status}}</option>
                                                <option value="true">True</option>
                                                <option value="false">False</option>

                                            </select></tr><br><br>
                                        <tr><button type="submit" style="width: 150px;" class="btn btn-primary">Edit Settings</button></tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
