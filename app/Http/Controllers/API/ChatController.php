<?php

namespace LaNeta\Http\Controllers\API;

use Illuminate\Http\Request;
use LaNeta\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use LaNeta\Http\Assets\ResourceFunctions;
use LaNeta\Mail\DiretMessage;
use Mail;
use Auth;
use LaNeta\User;
use LaNeta\Message;
use LaNeta\Chat;
use LaNeta\UserChat;

class ChatController extends Controller
{
   
    public function list()
    {
       Log::info("ingreso al controlador ChatController@list: user: ");
        
       return User::where('id', '!=', Auth::id())->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function listChat()
    {
        Log::info("ingreso al controlador ChatController@listChat: user: ");
        
        //$contacts[];
        $chat_user = UserChat::select('chat_id')->where('user_id', Auth::id())->get()->toArray();
        $chat_all =  UserChat::with('user')->where('user_id', '!=', Auth::id())->get();
        $contacts=[];
        $i = 0;
        try {
            foreach ($chat_all as $key => $value) {
                if ( in_array($value->chat_id, array_column($chat_user, 'chat_id') ) ) {

                   $contacts[$i]=[
                    'id'=> $value->user_id,
                    'name' => $value->user->first_name.' '.$value->user->second_name,
                    'image' => $value->user->image,
                   ];  
                         
                }
                $i++;

            }
            
        } catch (Exception $e) {
            Log::error('Ah ocurrido un error en ChatController@list: ' . $e ); 
        }

        return ['contacts' => $contacts];
    }

    public  function directMessage(Request $request)
    {
        $chat_id =0;

        Log::info("ingreso al controlador ChatController@DirectMessage: user: ".Auth::user()->username);

        try {  
            DB::beginTransaction();
            $chat_id = ResourceFunctions::searchChat(Auth::id(), request()->id);
           
            if ($chat_id==0) {
                
                $chat = Chat::create([
                    'topic' => 'chat nuevo'
                ]);
                if ($chat) {
                    $request -> request -> add(['user_id' => Auth::id()]);
                    $request -> request -> add(['subject' => 'nuevo mensaje']);
                    $request -> request -> add(['chat_id' => $chat->id]);
                    $message = Message::create($request -> all());

                    UserChat::create([
                        'user_id' => Auth::id(),
                        'chat_id' => $chat->id
                    ]);

                     UserChat::create([
                        'user_id' => $request->receive_id,
                        'chat_id' => $chat->id
                    ]);
                    if ($message) {
                        Log::info("se chequeo el chat y se envio el mensaje: ".$chat->id);
                        $data_receiver = User::where('id', $request->receive_id)->first();
                        Mail::to($data_receiver->email)->send(new DiretMessage(Auth::user()->first_name, Auth::user()->last_name));                    
                    }
                }
                
            }else{
                dd($chat_id);
                Log::info("ya tiene chat, se envio el mensaje: ".$chat_id);
                $request -> request -> add(['user_id' => Auth::id()]);
                $request -> request -> add(['subject' => 'nuevo mensaje']);
                $request -> request -> add(['chat_id' => $chat_id]);
                $message = Message::create($request -> all());
                
                if ($message) {
                    $data_receiver = User::where('id', $request->receive_id)->first();
                    Mail::to($data_receiver->email)->send(new DiretMessage(Auth::user()->first_name, Auth::user()->last_name));                    
                }

            }
            
            DB::commit();
            flash('Mensaje enviado exitosamente', 'success');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Ah ocurrido un error en ChatController@directMessage: ' . $e );
            flash('No se pudo enviar el mensaje', 'error'); 
            
        }

        return redirect()->back();


        
    }


    public function userChat()
    {
        try {
            Log::info("ingreso al controlador ChatController@userChat: user: ".request()->id);
            $chat =0;
            $chat_id =0;

            $chat_id = ResourceFunctions::searchChat(Auth::id(), request()->id);
            
            if (  $chat_id !=0) {
                $chat = Message::with('user')->where('chat_id', $chat_id)->get();
            }
            
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Ah ocurrido un error en MessageController@store: ' . $e );
            flash('No se pudo creado el registro', 'error');             
        }

        return [
            'chat' =>$chat,
            'receiver' => User::where('id',request()->id)->get()
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::info("ingreso al ChatController@store: user: ".Auth::user()->username);
        try {  
            DB::beginTransaction();
            if (request()->chat_id==0) {
                
                $chat = Chat::create([
                    'topic' => 'chat nuevo'
                ]);
                
                if ($chat) {
                    $request -> request -> add(['user_id' => Auth::id()]);
                    $request -> request -> add(['subject' => 'nuevo mensaje']);
                    $request -> request -> add(['chat_id' => $chat->id]);
                    $message = Message::create($request -> all());

                    UserChat::create([
                        'user_id' => Auth::id(),
                        'chat_id' => $chat->id
                    ]);

                     UserChat::create([
                        'user_id' => $request->receive_id,
                        'chat_id' => $chat->id
                    ]);
                    if ($message) {
                        Log::info("se cheo el chat y se envio el mensaje: ".$chat->id);
                        $data_receiver = User::where('id', $request->receive_id)->first();
                        Mail::to($data_receiver->email)->send(new DiretMessage(Auth::user()->first_name, Auth::user()->last_name));                    
                    }
                }
                
            }else{
                    Log::info("ya tiene chat, se envio el mensaje: ".$request->chat_id);
                    $request -> request -> add(['user_id' => Auth::id()]);
                    $request -> request -> add(['subject' => 'nuevo mensaje']);
                    $request -> request -> add(['chat_id' => $request->chat_id]);
                    $message = Message::create($request -> all());
                    
                    if ($message) {
                        $data_receiver = User::where('id', $request->receive_id)->first();
                        Mail::to($data_receiver->email)->send(new DiretMessage(Auth::user()->first_name, Auth::user()->last_name));                    
                    }

                }
            
            DB::commit();
            flash('Message creado exitosamente', 'success');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Ah ocurrido un error en ChatController@store: ' . $e );
            flash('No se pudo creado el registro', 'error'); 
            return ['message'=> 'No se pudo enviar el mensaje'];
        }

        return  ['message'=>'Elmensaje se envio con exíto'];
    }

}
