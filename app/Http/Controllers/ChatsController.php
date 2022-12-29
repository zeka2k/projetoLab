<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;
use App\Models\User;

class ChatsController extends Controller
{
    private $currentUser;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show chats
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::with('user')->get();
        $this->currentUser = 'Zoey Casper';
        $uniqueUsers = [];

        foreach ($messages as $message) {
            if (!in_array($message->user->name, $uniqueUsers)) {
                array_push($uniqueUsers, $message->user->name);
            }
        }

        return view('chat', ['messages' => $messages, 'uniqueUsers' => $uniqueUsers, 'currentUser' => $this->currentUser]);
    }

    /**
     * Fetch all messages
     *
     * @return Message
     */
    public function fetchMessages()
    {
        //return Message::with('user')->get();
        return view('chat');
    }

    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return Response
     */
    public function sendMessage(Request $request)
    {
        // $user = Auth::user();

        // $message = $user->messages()->create(['message' => $request->input('message')
        // ]);

        // broadcast(new MessageSent($user, $message))->toOthers();

        // return ['status' => 'Message Sent!'];

        // $user = Auth::user();
        // $message = $user->messages()->create([
        //     'message' => $request->input('message'),
        //     'first_team_id' => request('team1'),
        //     'second_team_id' => request('team1')
        // ]);
    }
    public function changeCurrentUser(Request $request)
    {
        $this->currentUser = $request->input('uniqueUser');
        //$this->currentUser->changeCurrentUser($request->input('uniqueUser'));
        //$this->currentUser = $request->user()->name;
    }
}
