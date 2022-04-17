<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class NotificationController extends Controller
{
    public function notificationsMarkAsSeen(Request $request): Response
    {
        $validator = Validator::make($request = $request->toArray(), [
            'notifications' => 'required|array',
            'notifications.*' => 'required|exists:notifications,id'
        ]);

        if ($validator->fails()) {
            return response([], SymfonyResponse::HTTP_UNPROCESSABLE_ENTITY);
        }

        $notifications = $request['notifications'];

        // validate by user notifications
        // $userNotifications = collect(auth()
        //     ->user
        //     ->notifications()
        //     ->notifications->toArray())
        //     ->pluck('id');

        // $notValidated = collect($notifications)
        //     ->reject(fn($id) => $userNotifications->where('id', $id)->isNotEmpty());

        // if ($notValidated->isNotEmpty()) {
        //     return response([], SymfonyResponse::HTTP_UNPROCESSABLE_ENTITY);
        // }

        // update
        foreach ($notifications as $notificationId) {
            $notification = Notification::find($notificationId);

            if ($notification->exists()) {
                $notification->update(['read_at' => now()]);
            }
        }

        return response([]);
    }
}
