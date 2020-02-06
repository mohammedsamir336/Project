<?php
namespace App\Http\Controllers\Admin;
use App\events;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
class FullCalendarController extends Controller
{


  public function index()
   {

      //  $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
      //  $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');
        $Events = events::orderBy('start','asc')->where('checked',0)->get();
        //return Response::json($data);

       return view('admin.Plans.AddPlans',['Events' => $Events,]);
   }


   public function create(Request $request)
   {
       $insertArr = [ 'title' => request('title'),
                      'start' => request('start'),
                      'end'   => request('end'),
                   ];
       $event = events::create($insertArr);
       return Response::json($event);
   }


   public function update(Request $request)
   {
       //$where = array('id' => $request->id);
      // $updateArr = ['title' => $request->title,'start' => $request->start, 'end' => $request->end];
       $event  = events::where('id',request('id'))->update(['title' => request('title'),
                      'start' => request('start'),
                      'end'   => request('end'),
                    ]);

       return Response::json($event);
   }


   public function destroy(Request $request)
   {
       $event = events::where('id',request('id'))->delete();

       return Response::json($event);
   }



   public function MyPlans(Request $request)
   {
       $events = events::orderBy('start','asc')->get();

       return view('admin.Plans.MyPlans',['events' => $events]);
   }



   public function check(Request $request)
   {
     /*hide and delete events*/
       $events = events::where('id', request('id'))->first();
       if ($events->checked) {
          $events->update(['checked' => 0]);
       }else {
          $events->update(['checked' => 1]);
       }

       return back();
   }


   public function restore()
   {

     $events = events::where('id', request('id'))->update(['checked' => 0]);

   }


}
