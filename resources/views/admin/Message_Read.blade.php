@include('admin.layout.header')
<!-- if new message toggle title  -->
<span id="page_name" style="display:none">Read Message</span>
<title id="title">Read Message</title>
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-md-12">
        <div class="card card-body printableArea">
            <h3><b>Message</b> <span class="pull-right"></span></h3>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="pull-left">
                        <address>
                            <h3> &nbsp;<b class="text-danger">{{$message->sub}}</b></h3>
                            <p class="text-muted m-l-5">{{$message->name}}
                                <br/>{{$message->email}}
                                @if ($message->users_id)
                                <br/><a href="{{url('p  '.$message->email)}}" class="text-success" target="_blank">User</a>
                                @else
                                <br/>guest
                                @endif
                            </p>
                        </address>
                    </div>
                    <div class="pull-right text-right">
                        <address>
                            <h3>Text</h3>
                            <p class="text-muted m-l-30">
                            {{$message->text}}
                              </p>
                            <p class="m-t-30"><b>Date :</b> <i class="fa fa-calendar"></i> {{$message->created_at->format('dD M Y')}}</p>
                        </address>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="table-responsive m-t-40" style="clear: both;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>email</th>
                                    <th class="text-right">Name</th>
                                    <th class="text-right">Subtitles</th>
                                    <th class="text-right">Add By</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">{{$message->id}}</td>
                                    <td>{{$message->email}}</td>
                                    <td class="text-right"> {{$message->name}}</td>
                                    <td class="text-right">{{$message->sub}}</td>
                                    @if ($message->users_id)
                                    <td class="text-right"><a href="{{url('p  '.$message->email)}}" class="text-success" target="_blank">User</a></td>
                                    @else
                                  <td class="text-right">guest</td>
                                    @endif

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="pull-right m-t-30 text-right">
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="text-right">
                      <form action="{{url('admin/message/delete'.$message->id)}}" method="get">
                        <button type="submit" name="From_ReadMessage" class="btn btn-danger"> Delete Message </button>
                      </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>

  @include('admin.layout.footer')
