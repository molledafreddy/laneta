<?php

namespace LaNeta\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use LaNeta\Http\Controllers\Controller;
use LaNeta\Post;
use LaNeta\PostMedia;
use Auth;
use Log;
use DB;

class PostController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|Min:3|Max:100',
            'description' => 'required|Min:3',
            'location' => 'required|Min:3|Max:200',
        ]);

        try {
            $slug =  str_replace([' ','!','.',',','*','/','?','"', '\''], '-' ,$request->get('title'));

            $request->request->add(['status'=>'A']);
            $request->request->add(['user_id'=>Auth::id()]);
            $request->request->add(['slug'=>$slug]);

            $post = new Post();
            $post = Post::create($request->all());
            
            event(new PostCreated($post));

            if(Input::file('imagen') != null) {

                $files = Input::file('imagen');

                foreach($files AS $f) { 
                    $extension = strtolower($f->getClientOriginalExtension());    
                    $fileName = uniqid().'.'.$extension;

                    $f->move('img/media/', $fileName);
                        
                    // Guardar en la estructura requerida
                    $media = new PostMedia();
                    $media->post_id = $post->id;
                    $media->media   = $fileName;
                    $media->type    = 'P';
                    $media->status  = 'A';
                    $media->save();
                    
                }
            }

        } catch (\Exception $e) {
            Log::error('Ah ocurrido un error en PostController@store: ' . $e );
            flash('Ah ocurrido un error al realizar la operación', 'danger');
        }

       
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {        
        $post = Post::FindOrFail($id);
        return view('auth.posts.edit')->with(['post' => $post]);
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
            Post::FindOrFail($id)->delete();
            flash('Post eliminado exitosamente', 'success');
        } catch (\Exception $e) {
            Log::error('Ah ocurrido un error en PostController@destroy: ' . $e );
            flash('Ah ocurrido un error al realizar la operación', 'danger');
        }

        return redirect()->route('profile',[$username]);
    }
}
