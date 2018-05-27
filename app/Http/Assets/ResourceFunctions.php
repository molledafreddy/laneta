<?php

namespace LaNeta\Http\Assets;

use Illuminate\Support\Facades\Auth;
use LaNeta\Http\Controllers\Controller;
use LaNeta\UserChat;
use Carbon\Carbon;

class ResourceFunctions extends Controller
{

    
    public static function checksSeleccionados($todos, $particulares, $id_particular, $columan_name)
    {
        $final = array();
        if(count($particulares)>0) {

            $i=0; $b=0;
            foreach ($todos as $value) {
                foreach ($particulares as $particular ) {
                    if ($value['id'] == $particular[$id_particular]) {
                        $final[$i] = ['id' => $value['id'], 'name' => $value[$columan_name], 'module_check'=>'on'];
                        $i++;
                    }
                }
            }

            $cont=0;$j=0;
            $id_encontrados = array();
            foreach ($todos as $value ) {
                foreach ($final as $dato) {
                    if ($value[$columan_name] == $dato['name']) {
                        $cont++;
                        $id_encontrados[$j] = $j;
                        break;
                    }else{
                        $id_encontrados[$j] = -1;
                    }
                }
                $j++;
            }

            for ($i=0; $i < count($todos); $i++) {
                if (($id_encontrados[$i]==-1)) {
                    $final[$cont]=['id'=>$todos[$i]['id'], 'name'=>$todos[$i][$columan_name], 'module_check'=>'off'];
                    $cont++;
                }
            }
        }

        return $final;
    }
    /**
     * [searchChat description:seeks the existence of a chat related to the sender and receiver]
     * @param  [type] $transmitter   [description: id receiver]
     * @param  [type] $receiver [description:id transmitter]
     * @return [type]           [description]
     */
    public static function searchChat($transmitter_id, $receiver_id)
    {
        $chat=0;

        $result_transmitter = UserChat::with('user')->where('user_id', $transmitter_id)->get();
        $result_receiver = UserChat::with('user')->where('user_id', $receiver_id )->get();
        if ((count($result_transmitter)>0) || (count($result_receiver)>0) ) {
            
            foreach ($result_transmitter as $key => $valueTransmitter) {
                foreach ($result_receiver as $key => $valueReceiver) {
                    
                    if ( $valueTransmitter->chat_id == $valueReceiver->chat_id ) {
                        $chat = $valueReceiver->chat_id;
                        break;
                    }
                }

            }
        }
        return $chat;
    }

    /**
     * [topPostUser description:calculate the top of users with post in the week]
     * @param  [type] $posts [description: array winth post]
     * @return [type]        [description: array winth top users]
     */
    public static function topPostUser($posts)
    {
        $container_posts=[];
        $count=[];
        $order=[];
        $i=0;
        $points=0;
        $ranking=[];
        
        foreach ($posts as $key => $value) {

            if ( !(in_array($value->user_id, array_column($container_posts, 'user_id'))) ) {

                foreach ($posts as $key => $value2) {
                    if ($value2->user_id=== $value->user_id) {
                        $points++; 
                    }
                }

                $container_posts[$i] = [
                    'name' => $value->user->first_name.' '.$value->user->first_name,
                    'username' =>$value->user->username,
                    'user_id' => $value->user_id,
                    'count' => $points  
                ];
                $i++;
                $points=0;
            }

            if ($i==10) {
                break;
            }
        }
        foreach ($container_posts as $key => $row) {
            $order[$key] = $row['count'];
        }
       
        $ranking = array_multisort($order, SORT_DESC, $container_posts);
       
        return $container_posts;
    }


    /**
     * [rangeDate description:allows you to calculate the percentage ]
     * @return [type] [description:int]
     */
    public static function percentage($quantity, $total_quantity)
    {
        if ($total_quantity==0) {
            return 0;
        }else{
            return round(($quantity/$total_quantity) * 100);
        }
    }

    

}
