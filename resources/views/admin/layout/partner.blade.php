<!-- card -->
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Super Admins ({{count($super_admins)-1}})</h4>
    </div>
    <div class="comment-widgets scrollable" style="max-height: 130px;">
        @foreach ($super_admins as $data)
        <!-- for hidden super admin 1 -->
        @if ($data->id != 1 )
        <!-- Comment Row -->
        <div class="d-flex flex-row comment-row m-t-0">
            @if ( file_exists('img/admin_img/'.$data->img))
            <div class="p-2"><img src="{{asset('img/admin_img/'.$data->img)}}" alt="admin" width="50" class="rounded-circle"></div>

            @else
            <div class="p-2"><img src="{{$data->img}}" alt="admin" width="50" class="rounded-circle"></div>

            @endif

            <div class="comment-text w-100">
                <a href="{{url('admin/profile  '.$data->id)}}">
                    <h6 class="font-medium">{{$data->name}}</h6>
                </a>
                <span class="m-b-15 d-block">{{$data->email}} </span>
                <div class="comment-footer">
                    @if ( !$data->online_at)
                    <h6 class=" online-status status-available font-weight-bold blue-text mb-4 text-primary">online</h6>
                    @else
                    <i class="fas fa-circle text-danger"> Offline</i>
                    @endif

                </div>
            </div>
        </div>
        @endif
        @endforeach

    </div>
</div>
