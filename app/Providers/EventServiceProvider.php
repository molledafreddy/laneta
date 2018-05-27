<?php

namespace LaNeta\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
	/**
	 * The event listener mappings for the application.
	 *
	 * @var array
	 */
	protected $listen = [
		'LaNeta\Events\CommentCreated' => ['LaNeta\Listeners\CommentCreatedListener'],
		'LaNeta\Events\PostCreated' => ['LaNeta\Listeners\PostCreatedListener'],
		'LaNeta\Events\FriendFollowed' => ['LaNeta\Listeners\FriendFollowedListener'],
		'LaNeta\Events\SharedInSocial' => ['LaNeta\Listeners\SharedInSocialListener'],
		'LaNeta\Events\SharedLink' => ['LaNeta\Listeners\SharedLinkListener'],
		'LaNeta\Events\SharedByMail' => ['LaNeta\Listeners\SharedByMailListener'],
		'LaNeta\Events\LikeGiven' => ['LaNeta\Listeners\LikeGivenListener']
	];

	/**
	 * Register any events for your application.
	 *
	 * @return void
	 */
	public function boot()
	{
		parent::boot();

		//
	}
}
