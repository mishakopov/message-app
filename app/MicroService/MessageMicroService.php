<?php


namespace App\MicroService;


use App\Models\Message;
use Illuminate\Support\Facades\Mail;
use \App\Mail\SendMessage;

class MessageMicroService
{
    public function messageCreate($data)
    {
        Message::create([
            'name' => $data->name,
            'email' => $data->email,
            'message' => $data->message,
            'widget_id' => $data->widget_id
        ]);
    }

    public function messageSend($data)
    {
        Mail::to($data->email)->send(new SendMessage($data->message));
    }
}
