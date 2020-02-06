@include('admin.layout.header')
<!-- if new message toggle title  -->
<span id="page_name" style="display:none">Blocked users </span>
<title id="title">Blocked users </title>

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
                    <h5 class="card-title"><u>Users Blocked</u> ({{$count}})</h5>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                          <thead>
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th><nobr>Email verified</nobr></th>
                                <th>Phone</th>
                                <th><nobr>Phone verified</nobr></th>
                                <th>Profile</th>
                                <th>Time</th>
                                <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                    @foreach ($users as $data)
                      @if ($data->blocked_date)
                              <tr>
                              <td>{{$data->id}}</td>

                                @if ( file_exists('img/users_img/'.$data->img))
                                    <td><nobr><img class="card-img-50 z-depth-1 rounded-circle"  src="{{asset('img/users_img/'.$data->img)}}" alt="user" width="30" height="30">
                                      {{$data->name}}</nobr></td>
                                    @else
                                  <td><nobr><img class="card-img-50 z-depth-1 rounded-circle" src="{{ asset('img/m.png') }}" alt="user" width="30" height="30">
                                      {{$data->name}}</nobr></td>
                                  @endif

                                  <td>{{$data->email}}</td>

                            @if ($data->email_verified_at)
                                <td>Yes</td>
                            @else
                                <td>No</td>
                            @endif

                        <td>{{$data->phone}}</td>

                          @if ($data->phone_verified_at)
                              <td>Yes</td>
                            @else
                              <td>No</td>
                            @endif

                  <td> <span class="table-remove"><a href="{{ url('p  '.$data->email) }}"
                       class="btn btn-warning btn-rounded btn-sm my-0" target="_blank">profile</a></span></td>

                <!--Time-->
                <td>{{now()->diffForHumans($data->blocked_date)}} Unblocked</td>

              <!--actives users-->
                         <td>
                           <form class="" action="{{ url('/admin/active') }}{{$data->id}}" method="post">
                              @csrf
                               <div >
                                 <button class="btn btn-success btn-rounded btn-sm my-0" type="submit" id="MaterialButton-addon{{$data->id}}">active</button>
                                    </div>
                              </form>
                          </td>
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
