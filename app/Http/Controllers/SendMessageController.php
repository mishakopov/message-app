<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\MicroService\MessageMicroService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SendMessageController extends Controller
{
    protected $messageMicroService;

    public function __construct(MessageMicroService $messageMicroService)
    {
        $this->messageMicroService = $messageMicroService;
    }

    public function sendSave(MessageRequest $request)
    {
        try {
            $this->messageMicroService->messageCreate($request);

            $this->messageMicroService->messageSend($request);

            Session::flash('success', 'Message sent successfully');

        } catch (\Exception $e) {

            Session::flash('error', 'Something went wrong.');
        }

        return back();
    }

    public function sendMessage(MessageRequest $request)
    {
        try {
            $this->messageMicroService->sendMessage($request);

            return response()->json('success', 200);
        } catch (\Exception $e) {

            return response()->json($e->getMessage(), 500);
        }

    }
}
