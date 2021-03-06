@include('layouts.index.home_header')
<!-- give postsComposer variable user= Auth::user()-->
<title>{{$user->email}}</title>
<link rel="stylesheet" type="text/css" href="{{asset('css/addons/datatables.min.css')}}">
<link rel="stylesheet" href="{{asset('css/addons/datatables-select.min.css')}}">

<div class="px-4 m-t-61">

  <h5 class="my-4 dark-grey-text font-weight-bold m-l-20 "><u> <a class="hov-cl10" href="#">All comments: {{count($user_comments)}}</a></u></h5>
            <div class="table-responsive">
              <!-- Table -->
              <table class="table table-hover mb-0">

                <!-- Table head -->
                <thead>
                  <tr>
                    <th>

            <strong class="form-check-label th-lg " for="checkbox"><a>checkbox<i class="fas fa-sort ml-1"></i></a></strong>
                    </th>
                    <th class="th-lg"><a>Name<i class="fas fa-sort ml-1"></i></a></th>
                    <th class="th-lg"><a>Email<i class="fas fa-sort ml-1"></i></a></th>
                    <th class="th-lg"><a >Comments<i class="fas fa-sort ml-1"></i></a></th>
                    <th class="th-lg"><a >posts header<i class="fas fa-sort ml-1"></i></a></th>
                    <th class="th-lg"><a >Replies On Comment<i class="fas fa-sort ml-1"></i></a></th>
                    <th class="th-lg"><a >Action<i class="fas fa-sort ml-1"></i></a></th>
                  </tr>
                </thead>
                <!-- Table head -->

                <!-- Table body -->
                <tbody>
                  <form  method="get" action="{{url('del_comment')}}" >

              @foreach ($user_comments as $comm)
                  <tr>
                    <th scope="row">
                      <input class="form-check-input" type="checkbox" name="id[]" value="{{$comm->id}}" id="checkbox{{$comm->id}}">
                      <label class="form-check-label" for="checkbox{{$comm->id}}"></label>
                    </th>
                      <!-- if isset image in file -->
                @if ( file_exists('img/users_img/'.$user->img))
                    <td><img class="card-img-50 z-depth-1 rounded-circle"  src="{{asset('img/users_img/'.$user->img)}}" alt="user" width="30" height="30">
                      {{$comm->name_comments}}</td>
                    @else
                  <td><img class="card-img-50 z-depth-1 rounded-circle" src="{{$user->img}}" alt="user" width="30" height="30">
                      {{$comm->name_comments}}</td>
                  @endif
                    <td>{{$comm->email_comments}}</td>
                    <td>{{$comm->text_comments}}</td>
          <td><a href="read = {{$comm->posts_id()->first()->header}}">{{$comm->posts_id()->first()->header}}</a></td>

            <td>{{$user_reply_count}}</td>

                  <td>
               <span class="table-remove"><a href="{{ url('del_comment'.$comm->id) }} "
                   class="btn btn-danger btn-rounded btn-sm my-0">Remove</a></span>
               </td>
                  </tr>

              @endforeach

                </tbody>
                <!-- Table body -->
              </table>
              <!-- Table -->


            </div>

            <hr class="my-0">

            <!-- Bottom Table UI -->
            <div class="d-flex justify-content-between">

              <div class="m-t-20">
            <button type="submit" class="btn btn-danger btn-rounded btn-sm my-0" name="del" >Delete check</button>
              </div>
              </form>
              <!-- Pagination -->

              <nav class="d-flex justify-content-center mt-5">
                  <ul class="pagination pagination-circle pg-teal mb-0">
              {{$user_comments->links()}}
              </ul>
                </nav>
              <!-- /Pagination -->

            </div>
            <!-- Bottom Table UI -->

          </div>
          <div class="m-t-40">

        
        <script type="text/javascript" src="{{asset('js/addons/datatables.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('addons/datatables-select.min.js')}}"></script>
        @include('layouts.index.home_footer')
  </div>
