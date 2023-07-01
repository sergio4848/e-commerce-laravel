@extends('layouts.admin')

@section('title','Kullanıcı Düzenle')


@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">Kullanıcı Düzenle</h5>
                    </div>
                    <div class="card-body">

                        <div style="width:200px; height: 1000px;">
                            <form action="{{route('admin_user_update',['id'=>$data->id])}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <table>

                                    <tr><h4>Name:</h4><input style="width: 600px" id="name" value="{{$data->name}}" type="text" name="name" placeholder="Name"/></tr>
                                    <tr><h4>Email:</h4> <input style="width: 600px" id="email" value="{{$data->email}}" type="text" name="email" placeholder="Email"/></tr>
                                    <tr><h4>Phone: </h4><input style="width: 600px" id="phone" value="{{$data->phone}}" type="text" name="phone" placeholder="Phone"/></tr>
                                    <tr><h4>Address: </h4><input style="width: 600px" id="address" value="{{$data->address}}" type="text" name="address" placeholder="Address"/></tr>
                                    <tr><h4>Image: </h4><input type="file" name="image">

                                        @if($data->profile_photo_path)
                                            <img src="{{Storage::url($data->profile_photo_path)}}" height="200" style="border-radius: 10px">
                                        @endif
                                    </tr>

                                    <tr><button type="submit" style="color:#95999c; background-color: #4a5568; width: 150px;">Düzenle</button></tr>
                                </table>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
