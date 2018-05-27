<?php

namespace LaNeta\Http\Controllers\Auth;
use Illuminate\Http\Request;
use LaNeta\Http\Controllers\Controller;
use LaNeta\Http\Assets\ResourceFunctions;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Auth;
use LaNeta\User;
use LaNeta\Message;
use LaNeta\Chat;
use LaNeta\UserChat;


class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        
        // Fix: revisar por qué son dos argumentos... (tabla user_profile eliminada)
        return view('auth.messages.index')->with([
            'transmitter' => User::where('id', Auth::id())->first(),
            'receivers'=> User::where('id', '!=', Auth::id())->get(),
        ]);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Log::info("ingreso al controlador MessageController@create: user: ".Auth::user()->name);
        
        return view('auth.messages.create')->with('users', User::where('id', '!=', Auth::id())->get() );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        Log::info("ingreso al controlador MessageController@store: user: ".Auth::user()->name);

        return ['message' => request()->]
        try {  
            DB::beginTransaction();
            $flag=0;
            if (empty(request()->chat_id)) {
                $result_transmitter = UserChat::with('user')->where('user_id', Auth::id())->get();
                $result_receiver = UserChat::with('user')->where('user_id', request()->target_id )->get();
                //dd($result_receiver[0]->user->username);
                $chat = ResourceFunctions::searchChat($result_transmitter, $result_receiver);


                if ( $chat == 0) {
                    
                    $chat = Chat::create([
                        'topic' => $result_transmitter[0]->user->username.' & '.$result_receiver[0]->user->username
                    ]);
                    
                
                    $request -> request -> add(['user_id' => Auth::id()]);
                    $request -> request -> add(['chat_id' => $chat->id]);
                    $message = Message::create($request -> all());

                    UserChat::create([
                        'user_id' => Auth::id(),
                        'chat_id' => $chat->id
                    ]);

                    UserChat::create([
                        'user_id' => request()->target_id,
                        'chat_id' => $chat->id
                    ]);

                    $flag=$chat->id;

                    //Notification::create([]);
                }else{
                    $request -> request -> add(['user_id' => Auth::id()]);
                    $request -> request -> add(['chat_id' => $chat->id]);
                    $message = Message::create($request -> all());
                    $flag=$chat->id;
                    //Notification::create([]);
                }
                
            }else{

                $request -> request -> add(['user_id' => Auth::id()]);
                $request -> request -> add(['chat_id' => $request->chat]);
                $message = Message::create($request -> all());
                $flag=$request->chat;

                    //Notification::create([]);
            }

            DB::commit();
            flash('Message creado exitosamente', 'success');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Ah ocurrido un error en MessageController@store: ' . $e );
            flash('No se pudo creado el registro', 'error'); 
            dd($e);
        }
        //dd(Message::with('user')->where('chat_id',$flag)->get());
        return view('auth.messages.create')->with([
            'users'=> User::where('id', '!=', Auth::id())->get(),
            'chat' => Message::with('user')->where('chat_id',$flag)->get()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('username', $request->username)->first();
        
        // Fix: revisar por qué son dos argumentos... (tabla user_profile eliminada)
        return view('auth.message.show')->with([
            'users'=> User::where('id', '!=', Auth::id())->get(),
            'chat' => Message::with('user')->where('chat_id',$flag)->get()
        ]);   
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
