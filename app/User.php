<?php

namespace LaNeta;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use LaNeta\Message;
use LaNeta\UserChat;
use LaNeta\Notification;
use LaNeta\Connection;
use Illuminate\Support\Facades\Log;

class User extends Authenticatable
{
	use Notifiable;

	const USUARIO_VERIFICADO = '1';
	const USUARIO_NO_VERIFICADO = '0';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'first_name',
		'second_name',
		'last_name',
		'biography',
		'image',
		'username',
		'password',
		'email',
		'gender',
		'hits',
		'phone',
		'city',
		'location',
		'status',
		'job',
		'title',
		'school',
		'hobbie',
		'website',
		'facebook',
		'instagram',
		'twitter'
    ];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 
		'remember_token',
		'varfication_token'
	];
	public function posts ()
    {
        return $this->hasMany(Post::class);
    }

	public function User_chats ()
    {
        return $this->hasMany(UserChat::class);
    }

    public function messages ()
    {
        return $this->hasMany(Message::class);
    }

	public function esVerificado()
	{
		return $this->verified == User::USUARIO_VERIFICADO;
	}

	public static function generarVerificationToken()
	{
		return str_random(40);
	} 

	public function notifications ()
    {
        return $this->hasMany(Notification::class);
    }

    public function scopeSearch($query, $search, $customer_id)
    {
        if ($search != '') {
           $query->where('first_name', 'like', "%$search%")
                  ->orWhere('second_name', 'like', "%$search%")
                  ->orWhere('username', 'like', "%$search%")   
                 ;
        }

        if ($customer_id != '') {
           Log::info("Valor de customer_id: $customer_id");
           $userIds = CustomerUser::where('customer_id', $customer_id)->pluck('user_id');
           Log::info("Valor de customer_id: " . count($userIds));
           return $query->whereIn('customer_id', $userIds);
        }
    }


}





















