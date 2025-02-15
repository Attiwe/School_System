<?php

namespace App\Trait;

use Jubaer\Zoom\Facades\Zoom;

trait MeetingZoomTrait
{
    public function createMeeting($request)
    {
        $meeting = Zoom::createMeeting([
            "topic" => $request->topic,
            "duration" => $request->duration,
            "password" => $request->password,
            "start_time" => $request->start_time,
            "timezone" => 'Africa/Cairo',
           
            "settings" => [
                'join_before_host' => false,
                'host_video' => false,
                'participant_video' => false,
                'mute_upon_entry' => true,
                'waiting_room' => true,
                'audio' => 'both',
                'auto_recording' => 'none',
                'approval_type' => 0,
            ],
        ]);
 
        return $meeting;
    }


}
