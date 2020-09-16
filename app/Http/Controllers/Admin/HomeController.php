<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use DB;
use App\Admin;
use App\User;
use App\posts;
use App\videos;
use App\Visitors;
use App\contact;
use App\events;
use App\News;
use Carbon\Carbon;

class HomeController extends Controller
{
    protected $redirectTo = '/admin/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {      //Admin Verify middleware in route admin home
        $this->middleware('admin.auth:admin');
    }

    /**
     * Show the Admin dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $chart_options = [
            'chart_title'     => 'Users by months',
            'report_type'     => 'group_by_date',
            'model'           => 'App\User',
            'group_by_field'  => 'created_at',
            'group_by_period' => 'month',
            'chart_type'      => 'bar',
            //'filter_field'    => 'created_at',
            'filter_days'     => 30, // show only last 30 days

        ];

        $chart1 = new LaravelChart($chart_options);

        //for visitors
        $chart_options = [
       'chart_title'        => 'Visitors number',
       'report_type'        => 'group_by_date',
       'model'              => 'App\Visitors',
       'group_by_field'     => 'visit_at',
       'group_by_period'    => 'day',
       'chart_type'         => 'line',
       'aggregate_function' => 'sum', //مجموع الكولوم اللي هيظهر
        'aggregate_field'   => 'visitors', // الكولوم التاني اللي هيظهر مع التاريخ
       //'filter_field'       => 'visit_at',
       'filter_days'       => 30, // show only last 30 days
   ];

   $chart2 = new LaravelChart($chart_options);

        /*whereMonth('created_at', '12')
     ->whereDay('created_at', '31')
        ->whereTime('created_at', '=', '11:20:45')*/
        $Today         = today()->toDateString();
        $total_users   = User::whereNull('blocked_date')->count();
        $New_users     = User::whereDate('created_at', $Today)->whereNull('blocked_date')->count();
        $online_users  = User::whereNull('online_at')->count();
        $total_Admins  = Admin::whereNull('blocked_date')->count();
        $New_admins    = Admin::whereDate('created_at', $Today)->whereNull('blocked_date')->count();
        $online_Admins = Admin::whereNull('online_at')->count();
        $total_posts   = posts::count();
        $total_videos  = videos::count();
        $Visitors      = Visitors::where('visit_at',today()->toDateString())->first();
        $posts_today   = posts::whereDate('created_at', $Today)->count();
        $videos_today  = videos::whereDate('created_at', $Today)->count();
        $Projects_count =   $videos_today + $posts_today;


        //Latest posts
        $latest_posts = posts::orderBy('id', 'desc')->limit(4)->get();

        //super admins
        $super_admins = Admin::orderBy('id', 'desc')
                            ->whereNull('blocked_date')
                            ->where('superadmin', '!=', 0)->get();
        //to Do List
        $events = events::orderBy('start', 'asc')->get();
        //news
        $news =   News::orderBy('id', 'desc')->get();

        return view('admin.home', [
          'total_users'   =>   $total_users,
          'New_users'     =>   $New_users,
          'online_users'  =>   $online_users,
          'total_Admins'  =>   $total_Admins,
          'New_admins'    =>   $New_admins,
          'online_Admins' =>   $online_Admins,
          'total_posts'   =>   $total_posts,
          'total_videos'  =>   $total_videos,
          'Visitors'      =>   $Visitors,
          'Projects_count'=>   $Projects_count,
          'chart1'        =>   $chart1,
          'chart2'        =>   $chart2,
          'latest_posts'  =>   $latest_posts,
          'super_admins'  =>   $super_admins,
          'events'        =>   $events,
          'news'          =>   $news,
        ]);
    }
}
