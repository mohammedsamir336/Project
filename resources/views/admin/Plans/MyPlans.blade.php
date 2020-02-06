@include('admin.layout.header')
<!-- if new message toggle title  -->
<span id="page_name" style="display:none">My Plans</span>
<title id="title">My Plans</title>

<style media="screen">
  .ff{

    color: red;
    text-decoration: line-through;
  };
</style>
<!-- Card -->
<div class=" col-lg-12">
<div class="card">
    <div class="card-body">
        <h4 class="card-title">To Do List</h4>
        <div class="todo-widget scrollable" style="height:450px;">
            <ul class="list-task todo-list list-group m-b-0" data-role="tasklist">

              @foreach ( $events as $data)

                @if ($data->checked)
                <li class="list-group-item todo-item" data-role="task" id="Checked{{$data->id}}">
                    <div class="custom-control custom-checkbox">
                        <span class="ff todo-desc" style="position:relative;right:17px;">{{$data->title}}</span>
                                 <!-- today-->
                          @if ($data->start->toDateString() == today()->toDateString())
                           <span class="ff badge badge-pill badge-danger float-right">today</span>
                                <!-- tomorrow-->
                           @elseif ($data->start->toDateString() == now()->tomorrow()->toDateString())
                            <span class="ff badge badge-pill badge-primary float-right">Tomorrow</span>
                                <!-- yesterday-->
                            @elseif ($data->start->toDateString() == now()->yesterday()->toDateString())
                             <span class="ff badge badge-pill badge-info float-right">Yesterday</span>
                               <!-- date with ago-->
                            @elseif ($data->start->toDateString() < now()->toDateString())
                            <span class="ff badge badge-pill badge-danger float-right">{{$data->start->diffForHumans()}}</span>
                            @else
                             <!-- date without ago-->
                            <span class="ff badge badge-pill badge-warning float-right">{{$data->start->diffForHumans(null,true)}}</span>
                            @endif

                        </label>
                    </div>
               <div class="ff item-date"> Start In: {{$data->start->format('dD  m, Y')}}.<br>End In: {{$data->end->format('dD  m, Y')}}.</div>
               <div>
                 <button type="submit" data-id="{{$data->id}}" class="btn btn-success btn-rounded btn-sm my-0" name="res"  >Restore</button>
                 <button type="submit" onclick="$('#Checked{{$data->id}}').toggle();" del-id="{{$data->id}}" class="btn btn-danger btn-rounded btn-sm my-0"  name="del"> Delete </button>
               </div>
                </li>
      @else
      <!-- when UnCheckedbox-->
        <li class="list-group-item todo-item" data-role="task" id="UnChecked{{$data->id}}" >
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input"  id="customCheck{{$data->id}}" >
                <label class="custom-control-label todo-label" data-id="{{$data->id}}" for="customCheck{{$data->id}}" >

                <span class="todo-desc">{{$data->title}}</span>
                         <!-- today-->
                  @if ($data->start->toDateString() == today()->toDateString())
                   <span class="badge badge-pill badge-danger float-right">today</span>
                        <!-- tomorrow-->
                   @elseif ($data->start->toDateString() == now()->tomorrow()->toDateString())
                    <span class="badge badge-pill badge-primary float-right">Tomorrow</span>
                        <!-- yesterday-->
                    @elseif ($data->start->toDateString() == now()->yesterday()->toDateString())
                     <span class="badge badge-pill badge-info float-right">Yesterday</span>
                       <!-- date with ago-->
                    @elseif ($data->start->toDateString() < now()->toDateString())
                    <span class="badge badge-pill badge-danger float-right">{{$data->start->diffForHumans()}}</span>
                    @else
                     <!-- date without ago-->
                    <span class="badge badge-pill badge-warning float-right">{{$data->start->diffForHumans(null,true)}}</span>
                    @endif

                </label>
            </div>
       <div class="item-date"> Start In: {{$data->start->format('dD  m, Y')}}.<br>End In: {{$data->end->format('dD  m, Y')}}.</div>

        </li>
        @endif
    @endforeach
            </ul>
        </div>
    </div>
</div>
</div>
<br>
<br>

 <!-- script in footer-->
@include('admin.layout.footer')
