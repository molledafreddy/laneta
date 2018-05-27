<?php 
namespace LaNeta\Http\ViewComposers;
 
use Illuminate\Contracts\View\View;
use LaNeta\Notification;
use Auth;
 
class ProfileComposer {
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with([
            'notifications' => Notification::where(['status'=>'new', 'user_id'=> Auth::id()])
                        ->orderby('created_at','DESC')->take(5)->get(), 
            'count_notifications' => Notification::where(['status'=>'new', 'user_id'=> Auth::id()])->count()
        ]);
    }
 
}