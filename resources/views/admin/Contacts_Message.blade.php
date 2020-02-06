@include('admin.layout.header')
<!-- if new message toggle title  -->
<span id="page_name" style="display:none">All Message</span>
<title id="title">All Message</title>

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
        <h3> <!-- {{trans('message.success')}} -->{{ session('success') }} </h3>

         </div>
            @endif
      <form  method="get" action="{{url('admin/message/delete')}}" >
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><u>All Message</u> ({{$count}})</h5>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th><strong class="form-check-label th-lg " for="checkbox"><a>checkbox</i></a></strong>
                              </th>
                                <th>id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subtitles</th>
                                <th><nobr>Add By<nobr></th>
                                <th>Status</th>
                                <th>Time</th>
                                <th>Action</th>

                            </tr>
                          </thead>
                          <tbody>

              @foreach ($contact as $data)
              <tr>
              <th>
                <label class="customcheckbox" for="checkbox{{$data->id}}">
                <input type="checkbox" name="id[]" class="listCheckbox" value="{{$data->id}}" id="checkbox{{$data->id}}">
                <span class="checkmark"></span>
                </label>
            </th>


         <td>{{$data->id}}</td>
         <td>{{$data->name}}</td>


        <td>
          <!-- if users -->
        @if ( $data->users_id )
         @if ( file_exists('img/users_img/'.$data->users_id()->first()->img))
         <nobr><a href="{{url('p  '.$data->email)}}" target="_blank">
          <img class="card-img-50 z-depth-1 rounded-circle"  src="{{asset('img/users_img/'.$data->users_id()->first()->img)}}" alt="img" width="30" height="30">
           {{$data->email}}</a></nobr>
           @else
           <!-- if img users from socialite -->
           <nobr><a href="{{url('p  '.$data->email)}}" target="_blank">
            <img class="card-img-50 z-depth-1 rounded-circle"  src="{{$data->users_id()->first()->img}}" alt="img" width="30" height="30">
             {{$data->email}}</a></nobr>
           @endif
      <!-- if Not users -->
           @else
           <nobr><a>
            <img class="card-img-50 z-depth-1 rounded-circle"  src="{{asset('img/m.png')}}" alt="img" width="30" height="30">
             {{$data->email}}</a></nobr>

           @endif
         </td>

            <td><nobr><a href="{{url('admin/message/read '.$data->id)}}"  target="_blank">{{$data->sub}}</a></nobr></td>

            <!-- if users -->
          @if ( $data->users_id )
            <td class="text-success">User</td>
            @else
            <td>guest</td>
             @endif

             <!-- status -->
             @if ( $data->status  )
             <td class="text-success"><nobr>It is read</nobr></td>
             @else
             <td class="text-danger"><nobr><a href="{{url('admin/message/AsRead'.$data->id)}}" class="btn btn-danger btn-rounded btn-sm my-0" >Mark as read</a></nobr></td>
             @endif


           <td><nobr>{{$data->created_at->longAbsoluteDiffForHumans()}}</nobr></td>

           <td> <nobr><span class="table-remove"><a href="{{url('admin/message/delete'.$data->id)}}"
                   class="btn btn-danger btn-rounded btn-sm my-0"  style="margin-left:10px;">Force Delete </a></span>
                  </nobr>
              </td>
           </tr>
            @endforeach
                          </tbody>
                        </table>

                    </div>

                </div>
            </div>

       <button type="submit" class="btn btn-danger btn-rounded btn-sm my-0" name="AllDel"  >Delete all</button>
       <button type="submit" class="btn btn-danger btn-rounded btn-sm my-0"  name="del">Delete check</button>
       </div>
       </form>

        </div>
    </div>
<br>
<br>
  @include('admin.layout.footer')
