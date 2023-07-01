@extends('layouts.admin')

@section('title','FAQ Ekleme Sayfası')

@section('javascript')
    <head>
        @FilemanagerScript
    </head>
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

@endsection


@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h5 class="title">FAQ Ekle</h5>

                    </div>
                    <div class="card-body">

                        <div style="width:800px; height: 1000px;">
                            <form action="{{route('admin_faq_store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <table>
                                    <tr><h4>Position:</h4> <input style="width: 600px" id="position" type="number" name="position" value="0" placeholder="Position"/></tr>
                                    <tr><h4>Question:</h4> <input style="width: 600px" id="question" type="text" name="question" placeholder="question"/></tr>
                                    <tr><h4>Answer: </h4><textarea id="answer" name="answer"></textarea>
                                        <script>
                                            window.onload = function () {
                                                CKEDITOR.replace('answer', {
                                                    filebrowserBrowseUrl: filemanager.ckBrowseUrl,
                                                });
                                            }
                                        </script>
                                    <tr><label for="status"><h4>Status:</h4></label>

                                        <select name="status" id="status" style="width: 600px">
                                            <option value="true">True</option>
                                            <option value="false">False</option>

                                        </select></tr><br><br>
                                    <tr><button type="submit" style="color:#95999c; background-color: #4a5568; width: 150px;">Ekle</button></tr>
                                </table>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
