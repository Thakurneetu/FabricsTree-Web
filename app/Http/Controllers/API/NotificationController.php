<?php

namespace App\Http\Controllers\API;

use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
      if($request->has('type') && $request->type == 'count') {
        $count = Notification::where('customer_id',$request->user()->id)->where('is_read',false)->count();
        return response()->json([
          'status' => true,
          'count' => $count
        ]);
      }
      $notifications = Notification::where('customer_id',$request->user()->id)->latest()->get();
      Notification::where('customer_id',$request->user()->id)->update(['is_read'=>true]);
      return response()->json([
        'status' => true,
        'notifications' => $notifications
      ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Notification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notification $notification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,$id)
    {
      if($id == 'clear'){
        Notification::where('customer_id',$request->user()->id)->delete();
        return response()->json([
          'status' => true,
          'message' => 'Notifications cleared successfully.'
        ]);
      }
      Notification::find($id)->delete();
      return response()->json([
        'status' => true,
        'message' => 'Notification deleted successfully.'
      ]);
    }
}
