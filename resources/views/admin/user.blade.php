@extends('layouts.admin')

@section('title','Kullanıcılar')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">Kullanıcılar</h4>
                </div>
                @include('home.message')
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th><b>Id</b></th>
                            <th><b></b></th>
                            <th><b>Name</b></th>
                            <th><b>Email</b></th>
                            <th><b>Phone</b></th>
                            <th><b>Address</b></th>
                            <th><b>Roles</b></th>
                            <th colspan="2"><b>Actions</b></th>


                            </thead>


                            <tbody>
                            @foreach($datalist as $rs)
                            <tr>
                                <td>
                                    {{$rs->id}}
                                </td>
                                <td>
                                    @if($rs->profile_photo_path)
                                        <img src="{{Storage::url($rs->profile_photo_path)}}" height="50" style="border-radius: 10px">
                                    @endif
                                </td>
                                <td>
                                    {{$rs->name}}
                                </td>
                                <td>
                                    {{$rs->email}}

                                </td>
                                <td>
                                    {{$rs->phone}}
                                </td>
                                <td>
                                    {{$rs->address}}
                                </td>
                                <td>
                                    @foreach($rs->roles as $row)
                                    {{$row->name}},
                                    @endforeach
                                    <a href="{{route('admin_user_roles',['id'=>$rs->id])}}" onclick="return !window.open(this.href,'','top=50 left=100 width=1100,height=700')"><i class="fa fa-plus-circle"></i></a>
                                </td>
                                <td>
                                    <a href="{{route('admin_user_edit',['id'=>$rs->id])}}"><img src="{{asset('assets/admin/images')}}/edit.png" height="30"></a>
                                </td>
                                <td>
                                    <a href="{{route('admin_user_delete',['id'=>$rs->id])}}" onclick="return confirm('Delete ! Are you sure?')"><img src="{{asset('assets/admin/images')}}/delete.png" height="30"></a>
                                </td>
                            </tr>

                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
