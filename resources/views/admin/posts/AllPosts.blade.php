@include('admin.layout.header')
<!-- if new message toggle title  -->
<span id="page_name" style="display:none">All Posts</span>
<title id="title">All Posts </title>

<link rel="stylesheet" type="text/css" href="{{ asset('adminfolder/assets/extra-libs/multicheck/multicheck.css') }}">
<link href="{{ asset('adminfolder/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">


<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">

            @if (session('success'))
            <div class="alert alert-success" role="alert">
                <h3>
                    <!-- {{trans('message.success')}} -->{{ session('success') }} </h3>

            </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><u>All posts</u> ({{$count}})</h5>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Author</th>
                                    <th>Header</th>
                                    <th>category</th>
                                    <th>
                                        <nobr>View</nobr>
                                    </th>
                                    <th>
                                        <nobr>Video</nobr>
                                    </th>
                                    <th>Comments</th>
                                    <th>Add By</th>
                                    <th>created_at</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $data)
                                <tr>
                                    <td>{{$data->id}}</td>


                                    <td>
                                        <nobr>{{$data->author}}</nobr>
                                    </td>


                                    <td>
                                        <nobr><a href="{{url('read = '.$data->header)}}" class="text-info" target="_blank">{{$data->header}}</a></nobr>
                                    </td>

                                    <td>{{$data->cat}}</td>

                                    <td>{{$data->view_count}}</td>

                                    @if ($data->videos_id)
                                    <td>Yes</td>
                                    @else
                                    <td>NO</td>
                                    @endif

                                    <!-- count comments -->
                                    @php
                                    $count = \App\comments::where('posts_id',$data->id)->count();
                                    echo "<td>{$count}</td>"
                                    @endphp

                                    <td>
                                        @if ( file_exists('img/admin_img/'.$data->admins_id()->first()->img))
                                        <nobr><a href="{{url('admin/profile  '.$data->admins_id()->first()->id)}}">
                                                <img class="card-img-50 z-depth-1 rounded-circle" src="{{asset('img/admin_img/'.$data->admins_id()->first()->img)}}" alt="admin" width="30" height="30">
                                                {{$data->admins_id()->first()->name}}</a></nobr>
                                        @else
                                        <nobr><a href="{{url('admin/profile  '.$data->admins_id()->first()->id)}}">
                                                <img class="card-img-50 z-depth-1 rounded-circle" src="{{$data->admins_id()->first()->img}}" alt="admin" width="30" height="30">
                                                {{$data->admins_id()->first()->name}}</a></nobr>
                                        @endif

                                    </td>

                                    <td>
                                        <nobr>{{$data->created_at->diffForHumans(null,true)}}</nobr>
                                    </td>

                                    <td>
                                        <nobr> <span class="table-remove"><a href="{{ url('admin/edit  '.$data->header) }}" class="btn btn-warning btn-rounded btn-sm my-0" target="_blank">edit post</a></span>

                                            <span class="table-remove"><a href="{{ url('admin/del'.$data->id.'del'.$data->videos_id) }}" class="btn btn-danger btn-rounded btn-sm my-0" style="margin-left:10px;">
                                                    Delete post</a></span>
                                        </nobr>
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>


        </div>
    </div>
    <br>
    <br>
    @include('admin.layout.footer')
