@extends('layouts.admin')

@section('title','FAQ Listesi')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <a href="{{route('admin_faq_add')}}" style="position: absolute; right: 25px;"><strong>FAQ EKLE</strong></a>
                            @include('home.message')
                            <h5 class="title">FAQ</h5>

                            <p class="category">Sıkça Sorulan Sorular</p>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th><b>Id</b></th>
                                    <th><b>Position</b></th>
                                    <th><b>Question</b></th>
                                    <th><b>Answer</b></th>
                                    <th><b>Status</b></th>
                                    <th><b>Edit</b></th>
                                    <th><b>Delete</b></th>

                                    </thead>


                                    <tbody>
                                    @foreach($datalist as $rs)
                                        <tr>
                                            <td>
                                                {{$rs->id}}
                                            </td>
                                            <td>
                                                {{$rs->position}}
                                            </td>
                                            <td>
                                                {{$rs->question}}
                                            </td>
                                            <td>
                                                {!! $rs->answer !!}
                                            </td>
                                            <td>
                                                {{$rs->status}}
                                            </td>
                                            <td>
                                                <a href="{{route('admin_faq_edit',['id'=>$rs->id])}}"><img src="{{asset('assets/admin/images')}}/edit.png" height="30"></a>
                                            </td>
                                            <td>
                                                <a href="{{route('admin_faq_delete',['id'=>$rs->id])}}" onclick="return confirm('Delete ! Are you sure?')"><img src="{{asset('assets/admin/images')}}/delete.png" height="30"></a>
                                            </td>
                                        </tr>

                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
@endsection
