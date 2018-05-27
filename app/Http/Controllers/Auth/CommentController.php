<?php

namespace LaNeta\Http\Controllers\Auth;

use Illuminate\Http\Request;
use LaNeta\Http\Controllers\Controller;
use LaNeta\Mail\CommentPost;
use LaNeta\Comment;
use LaNeta\Like;
use LaNeta\Post;
use Mail;
use Auth;
use Log;
use DB;

class CommentController extends Controller
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
        $this->validate($request, [
            'comment' => 'required|Min:3|Max:100'
        ]);
        
        $request->request->add(['status'=>'A']);
        $request->request->add(['user_id'=>Auth::id()]);
        $comment =Comment::create($request->all());
        //dd(Auth::user()->last_name);
        if ($comment) {
            Mail::to(Auth::user()->email)->send( new CommentPost(Auth::user()->first_name,Auth::user()->last_name));
        }
        
        event(new CommentCreated($comment));
        
        return redirect()->route('portal.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
                Like::where('comment_id', $id)->delete();
                Comment::destroy($id);
                Log::info('Proceso exitoso en CommentController@destroy');
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();    
            Log::error('Error en CommentController@like: ' . $e);
            flash('Ah ocurrido un error al realizar la operación', 'danger');              
        }
        return back();
    }

    public function like(Request $request)
    {
        if ($request->ajax()) {
            return response()->json([
                "messaje"=> $request->all()
            ]);
        }
        
        Log::info('llego al metodo like'.$request->stage);
        try {
            DB::beginTransaction();
                if ($request -> stage == 'L') {  

                    $like = Like::where([
                        'user_id' => Auth::id(),
                        'post_id' => $request->post_id,
                        'comment_id' => $request -> comment_id,
                        'stage' => 'L'
                    ])->first();  
                    if ($like) {
                        Like::destroy($like -> id);
                    }else{
                        $request -> request -> add(['user_id' => Auth::id()]);
                        Like::create($request -> all());
                    }
                }else{

                    $like = Like::where([
                        'user_id' => Auth::id(),
                        'post_id' => $request->post_id,
                        'comment_id' => $request -> comment_id,                    
                        'stage' => 'D'
                    ])->first();  
                    if ($like) {
                        Like::destroy($like -> id);
                    }else{
                        $request -> request -> add(['user_id' => Auth::id()]);
                        Like::create($request -> all());
                    }
                }
            DB::commit();
            Log::info('Proceso exitoso en CommentController@like');
        } catch (Exception $e) {            
            DB::rollBack();    
            Log::error('Error en CommentController@like: ' . $e);
            flash('Ah ocurrido un error al realizar la operación', 'danger');   
        }
                
        return back();
    }
}
