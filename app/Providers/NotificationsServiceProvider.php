<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('nav', function ($view) {
            $user = Auth::user();
            $unreadNotificationsCount = 0;
            $notifications = [];

            if ($user) {
                $unreadNotificationsCount = Notification::where('user_id', $user->id)
                    ->where('read_at', false)
                    ->count();

                $notifications = Notification::where('user_id', $user->id)
                    ->with('causedByUser')
                    ->latest()
                    ->limit(5)
                    ->get();
            }

            $view->with('unreadNotificationsCount', $unreadNotificationsCount)
                ->with('notifications', $notifications)
                ->with('user', $user);
        });
    }
}
