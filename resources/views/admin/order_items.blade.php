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
                    <h5 class="title">Order Item</h5>
                    @include('home.message')

                </div>
                <div class="card-body">

                    <div style="width:2500px; height: 600px;">
                        <form action="{{route('admin_order_update',['id'=>$data->id])}}" method="post" enctype="multipart/form-data">
                            @csrf


                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-light">
                                    <th>Id</th>
                                    <th>User</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Total</th>
                                    <th>IP</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Note</th>
                                    <th>Status</th>

                                    </thead>


                                    <tbody>
                                    <tr>
                                        <td>
                                            {{$data->id}}
                                        </td>
                                        <td>
                                            {{$data->user->name}}
                                        </td>
                                        <td>
                                            {{$data->email}}
                                        </td>
                                        <td>
                                            {{$data->address}}
                                        </td>
                                        <td>
                                            {{$data->phone}}
                                        </td>
                                        <td>
                                            {{$data->total}}₺
                                        </td>
                                        <td>
                                            {{$data->IP}}
                                        </td>
                                        <td>
                                            {{$data->created_at}}
                                        </td>
                                        <td>
                                            {{$data->updated_at}}
                                        </td>
                                        <td>
                                            Admin Note:<textarea name="note" rows="3" cols="15">{{$data->note}}</textarea>
                                        </td>

                                        <td>
                                            <select name="status">
                                                <option selected>{{$data->status}}</option>
                                                <option>Accepted</option>
                                                <option>Shipping</option>
                                                <option>Completed</option>
                                                <option>Cancelled</option>
                                            </select>
                                        </td>

                                    </tr>

                                    </tbody>

                                </table>
                                <button type="submit">Güncelle</button>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                            <tr>
                                <th>Product</th>
                                <th></th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Note</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $total=0;
                            @endphp
                            @foreach($datalist as $rs)
                                <tr>
                                    <td>
                                        @if($rs->product->image)
                                            <img src="{{Storage::url($rs->product->image)}}" height="30">
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('product',['id'=>$rs->product->id,'slug'=>$rs->product->slug])}}">{{$rs->product->title}}</a>
                                    </td>
                                    <td>{{$rs->product->price}}</td>
                                    <td>{{$rs->quantity}}</td>
                                    <form action="{{route('admin_order_item_update',['id'=>$rs->id])}}" method="post">
                                        @csrf
                                        <td><select name="status">
                                                <option selected>{{$rs->status}}</option>
                                                <option>Accepted</option>

                                                <option>Cancelled</option>
                                            </select></td>

                                        <td>Admin Note:<textarea name="note" rows="3" cols="15">{{$rs->note}}</textarea></td>
                                </tr>

                            @endforeach
                            <button type="submit">Ürünü Güncelle</button>
                            </form>

                            </tbody>
                            <tfoot>
                            <th colspan="2">SUBTOTAL</th>
                            <th>{{$rs->order->total}}₺</th>

                            </tfoot>

                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
