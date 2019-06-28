<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request) {
        // get data to be saved
        $data = $request->only(['name', 'email', 'description']);

        // save message and assign return value of created message to $message array
        $message = Message::create($data);

        // fire MessagePublished event after DB create
        event (new MessagePublished($message->name, $message->email));

        // return message as response, it will be automatically serialized to JSON
        return response($message, 201);
    }
}
