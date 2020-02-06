<div class="card">
    <div class="card-body">
        <h4 class="card-title">Latest Posts</h4>
    </div>
    <div class="comment-widgets scrollable">
        <!-- Comment Row -->
        @if ($latest_posts)
        @foreach ($latest_posts as $data)
        <div class="d-flex flex-row comment-row m-t-0">
            <div class="p-2"><img src="{{asset('indexfolder/images/'.$data->img)}}" alt="posts" width="50" class="rounded-circle"></div>
            <div class="comment-text w-100">
                <h6 class="font-medium">{{$data->header}}</h6>
                <span class="m-b-15 d-block">{{$data->p1}} </span>
                <div class="comment-footer">
                    <span class="text-muted float-right">{{$data->created_at->format('M d, Y')}}</span>
                    <a href="{{ url('admin/edit  '.$data->header) }}" class="btn btn-cyan btn-sm">Edit</a>
                    <a href="{{ url('read = '.$data->header) }}" class="btn btn-success btn-sm" target="_blank">Show</a>
                    <a href="{{ url('admin/del'.$data->id.'del'.$data->videos_id) }}" class="btn btn-danger btn-sm">Delete</a>
                </div>
            </div>
        </div>
          @endforeach
          @endif
      
    </div>
</div>
