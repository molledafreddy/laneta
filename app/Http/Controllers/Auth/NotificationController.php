<?php

namespace LaNeta\Http\Controllers\Auth;

use LaNeta\Http\Controllers\Controller;
use Illuminate\Http\Request;
use LaNeta\Notification;
use LaNeta\User;
use Log;
use Auth;


class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \LaNeta\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function show(Notification $notification)
    {
        Log::info('Ingreso exitoso a NotificationController - show(), del usuario: '.Auth::user()->username);
        Notification::FindOrFail($notification->id)->update(['status'=> 'old']);   
        return view('auth.notifications.show')->with(['notification' => $notification]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \LaNeta\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function edit(Notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \LaNeta\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notification $notification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \LaNeta\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notification $notification)
    {
        //
    }
}
