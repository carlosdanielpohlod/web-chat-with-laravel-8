<?php

namespace App\Http\Controllers\webSocket;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;

class ChatServer extends Controller
{
    public function run(){
       

    

    $server = IoServer::factory(
        new HttpServer(
            new WsServer(
                new Chat()
            )
        ),
        8080
    );

    $server->run();
    }
}
