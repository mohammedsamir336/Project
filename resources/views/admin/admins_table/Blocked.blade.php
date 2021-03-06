@include('admin.layout.header')
<!-- if new message toggle title  -->
<span id="page_name" style="display:none">Blocked Admins</span>
<title id="title">Blocked Admins</title>

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

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><u>Admins Blocked</u> ({{$count}})</h5>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                          <thead>
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th><nobr>Email verified</nobr></th>
                                <th>Phone</th>
                                <th>Profile</th>
                                <th>AddBy</th>
                                <th>Time</th>
                                <th>Active</th>
                            </tr>
                          </thead>
                          <tbody>
                    @foreach ($admins as $data)
                      @if ($data->blocked_date)
                              <tr>
                              <td>{{$data->id}}</td>

                              <td>
                                @if ( file_exists('img/admin_img/'.$data->img))
                                <nobr><img class="card-img-50 z-depth-1 rounded-circle"  src="{{asset('img/admin_img/'.$data->img)}}" alt="admin" width="30" height="30">
                                  {{$data->name}}</nobr>
                                 @else
                                 <nobr><img class="card-img-50 z-depth-1 rounded-circle"  src="{{$data->img}}" alt="admin" width="30" height="30">
                                   {{$data->name}}</nobr>
                                 @endif

                                </td>


                                  <td>{{$data->email}}</td>

                            @if ($data->email_verified_at)
                                <td>Yes</td>
                            @else
                                <td>No</td>
                            @endif

                        <td>{{$data->phone}}</td>



                      <!--profile-->
                  <td> <span class="table-remove"><a href="{{ url('admin/profile  '.$data->id) }}"
                       class="btn btn-warning btn-rounded btn-sm my-0" target="_blank">profile</a></span></td>

               <!--AddBY-->
                    <td>
                @if ($add_by = App\Admin::where('id',$data->add_by)->first())
                      @if ( file_exists('img/admin_img/'.$add_by->img))
                      <nobr><a href="{{url('admin/profile  '.$add_by->id)}}"><img class="card-img-50 z-depth-1 rounded-circle"  src="{{asset('img/admin_img/'.$add_by->img)}}" alt="admin" width="30" height="30">
                          {{$add_by->name}}</a></nobr>
                      @else
                      <nobr><a href="{{url('admin/profile  '.$add_by->id)}}"><img class="card-img-50 z-depth-1 rounded-circle"  src="{{$add_by->img}}" alt="admin" width="30" height="30">
                          {{$add_by->name}}</a></nobr>
                      @endif

                @endif
                   </td>
                <!--Time-->
                <td><nobr>{{now()->diffForHumans($data->blocked_date)}} Unblocked</nobr></td>



                <!--check if super admins-->
                       @if (Auth::guard('admin')->user()->superadmin )
                       <!--actives admins-->
                    <td>
                      <form class="" action="{{ url('/admin/adminsactive') }}{{$data->id}}" method="post">
                         @csrf
                          <div >
                            <button class="btn btn-success btn-rounded btn-sm my-0" type="submit" id="MaterialButton-addon{{$data->id}}">active</button>
                            </div>
                         </form>
                     </td>
                       @else
                       <!-- if  not super admins-->
                  <td><strong class="text-danger">Not allowed!</strong></td>
                             @endif
                     <!--end if super admins-->
                           </tr>
                     @endif
                  @endforeach
                          </tbody>
                        </table>

                    </div>

                </div>
            </div>


        </div>
    </div>

  @include('admin.layout.footer')
