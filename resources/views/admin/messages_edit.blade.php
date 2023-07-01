<html>
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets')}}/admin/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{asset('assets')}}/admin/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        @yield('title')
    </title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="{{asset('assets')}}/admin/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{asset('assets')}}/admin/demo/demo.css" rel="stylesheet" />

</head>

</html>
<body>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                    <p class="place">Mesaj Düzenleme Sayfası</p>
                </div>
                <div class="card-body">

                    <div style="width:200px; height: 600px;">
                        @include('home.message')
                        <form action="{{route('admin_message_update',['id'=>$data->id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <table>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class=" text-primary">
                                            <tr><th><b>Id</b></th><td>{{$data->id}}</td></tr>
                                            <tr><th><b>Name</b></th><td>{{$data->name}}</td></tr>
                                            <tr><th><b>Email</b></th><td>{{$data->email}}</td></tr>
                                            <tr><th><b>Phone</b></th><td>{{$data->phone}}</td></tr>
                                            <tr><th><b>Subject</b></th><td>{{$data->subject}}</td></tr>
                                            <tr><th><b>Message</b></th><td>{{$data->message}}</td></tr>
                                            <tr><th><b>Admin Note</b></th><td><textarea id="note" name="note">{{$data->note}}</textarea></td></tr>
                                            <tr><th><b>Status</b></th><td>{{$data->status}}</td></tr>
                                            <tr><th><button type="submit" class="btn btn-dark">Update Message</button></th></tr>
                                            </thead>


                                        </table>
                                    </div>
                                </div>
                            </table>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
