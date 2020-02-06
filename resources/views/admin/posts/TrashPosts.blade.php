@include('admin.layout.header')
<!-- if new message toggle title  -->
<span id="page_name" style="display:none">Trashed Posts</span>
<title id="title">ATrashed Posts </title>

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
    <form  method="get" action="{{url('admin/forceDelforceDel')}}" >
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><u>Trashed posts</u> ({{$count}})</h5>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">

                          <thead>
                            <tr>
                            <th><strong class="form-check-label th-lg " for="checkbox"><a>checkbox</i></a></strong>
                            </th>
                                <th>Author</th>
                                <th>Header</th>
                                <th>category</th>
                                <th>View</th>
                                <th>Video</th>
                                <th>comments</th>
                                <th>Add By</th>
                                <th>deleted_at</th>
                                <th>Action</th>
                            </tr>
                          </thead>

                          <tbody>


              @foreach ($Trash as $data)
                              <tr>

                            <th>
                                <label class="customcheckbox" for="checkbox{{$data->id}}" onclick="if ($('#videocheckbox{{$data->id}}').prop( 'checked', false )){
                                  $('#videocheckbox{{$data->id}}').prop( 'checked', true )}else{$('#videocheckbox{{$data->id}}').prop( 'checked', false )};">
                                <input type="checkbox" name="id[]" class="listCheckbox" value="{{$data->id}}" id="checkbox{{$data->id}}">
                                <span class="checkmark"></span>
                                </label>
                                @if ( $data->videos_id)
                                <!--  pass video id to restore video  and i checked this box if admin check post checkbox in onClick-->
                                <label class="customcheckbox" for="videocheckbox{{$data->id}}" style="display:none;">
                                <input type="checkbox" name="videos_id[]" class="listCheckbox" value="{{$data->videos_id}}" id="videocheckbox{{$data->id}}">
                                <span class="checkmark"></span>
                                </label>
                                 @endif
                            </th>



                         <td>{{$data->author}}</td>


                      <td> <span class="text-lightgray">{{$data->header}}</span></td>

                            <td>{{$data->cat}}</td>

                            <td>{{$data->view_count}}</td>

                            @if ($data->videos_id)
                            <td class="text-success">Yes</td>
                            @else
                            <td class="text-danger">NO</td>
                             @endif

                             <!-- count comments -->
                             @php
                             $count = \App\comments::where('posts_id',$data->id)->count();
                             echo "<td>{$count}</td>"
                             @endphp

                         <td>
                           @if ( file_exists('img/admin_img/'.admins_id()->first()->img))
                           <nobr><a href="{{url('admin/profile  '.$data->admins_id()->first()->id)}}">
                           <img class="card-img-50 z-depth-1 rounded-circle"  src="{{asset('img/admin_img/'.$data->admins_id()->first()->img)}}" alt="admin" width="30" height="30">
                                {{$data->admins_id()->first()->name}}</a></nobr>
                            @else
                            <nobr><a href="{{url('admin/profile  '.$data->admins_id()->first()->id)}}">
                            <img class="card-img-50 z-depth-1 rounded-circle"  src="{{$data->admins_id()->first()->img}}" alt="admin" width="30" height="30">
                                 {{$data->admins_id()->first()->name}}</a></nobr>
                            @endif

                        </td>

                           <td><nobr>{{$data->deleted_at->longAbsoluteDiffForHumans()}}</nobr></td>

                           <td> <nobr> <span class="table-remove"><a href="{{ url('admin/restore'.$data->id.'restore'.$data->videos_id) }}"
                                class="btn btn-success btn-rounded btn-sm my-0" >restore post</a></span>

                            <span class="table-remove"><a href="{{ url('admin/forceDel'.$data->id.'forceDel'.$data->videos_id) }}"
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
            <div>
              <!-- send videos id -->

            <button type="submit" class="btn btn-success btn-rounded btn-sm my-0" name="res"  >Restore check</button>
            <button type="submit" class="btn btn-danger btn-rounded btn-sm my-0"  name="del">Delete check</button>
            </div>
            </form>

        </div>
    </div>
<br>
<br>
  @include('admin.layout.footer')
