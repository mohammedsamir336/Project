<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Str;
class LoadMoreController extends Controller
{
    function index()
    {
     return view('load_more');
    }

    function load_data(Request $request)
    {
     if($request->ajax())
     {
      if($request->id > 0)
      {
       $data = DB::table('posts')
          ->where('id', '<', $request->id)
          ->whereNull('deleted_at')
          ->orderBy('id', 'DESC')
          ->limit(5)
          ->get();
      }
      else
      {
       $data = DB::table('posts')
          ->whereNull('deleted_at')
          ->orderBy('id', 'DESC')
          ->limit(5)
          ->get();
      }
      $output = '';
      $last_id = '';

      if(!$data->isEmpty())
      {
       foreach($data as $latest)
       {

       $d=strtotime("$latest->created_at");

        $output .= '
          <div class="flex-wr-sb-s p-t-40 p-b-15 how-bor2">
           <div class="bg-img1 size-a-5 how1 pos-relative" style="background-image: url(indexfolder/images/'.$latest->img.');">
             <a href="read = '.$latest->header.'" class="dis-block how1-child1 trans-03"></a>

             <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
               <a href="'.$latest->cat.' = '.$latest->type.'" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                 '.$latest->type.'
               </a>

               <h3 class="how1-child2 m-t-14 m-b-10">
 								<a href="read = '.$latest->header.'" class="how-txt1 size-a-6 f1-l-1 cl0 hov-cl10 trans-03">
 									'.$latest->header.'
 								</a>
 							</h3>
            </div>
            </div>

  <div class="size-w-9 w-full-sr575 m-b-25">
    <div class="cl8 p-b-18">
      <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
        by '.$latest->author.'
      </a>

      <span class="f1-s-3 m-rl-3">
        -
      </span>

      <span class="f1-s-3">
        '.date("M d", $d ).' at: '.date("g:iA", $d ).'
      </span>
    </div>

    <div class="f1-s-1 cl6 p-b-24">
     <h5 class="p-b-5">
       <a href="read = '.$latest->header.'" class="f1-m-3 cl2 hov-cl10 trans-03">
          '.Str::words($latest->p1,4).'
       </a>
     </h5>
    </div>

    <a href="read = '.$latest->header.'" class="f1-s-1 cl9 hov-cl10 trans-03">
    <button type="button" class="btn btn-info btn-rounded">Read More  <i class="m-l-2 fa fa-long-arrow-alt-right"></i></button>
    </a>
     </div>
   </div>
        ';
        $last_id = $latest->id;
       }
       $output .= '
       <div id="load_more">
       <button type="button"  name="load_more_button" data-id="'.$last_id.'" class="flex-c-c size-a-13 bo-all-1 bocl11 f1-m-6 cl6 hov-btn1 trans-03" id="load_more_button">
         Load More
       </button>
       </div>
       ';
      }
      else
      {
       $output .= '
       <div id="load_more">
       <button type="button"  name="load_more_button" class="flex-c-c size-a-13 bo-all-1 bocl11 f1-m-6 cl6 hov-btn1 trans-03" >
          No Data Found
        </button>
       </div>
       ';
      }
    echo $output;
     }
    }
}
