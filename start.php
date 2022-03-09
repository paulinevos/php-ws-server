<?php

use Ratchet\Server\IoServer;
use Vos\PhpWsServer\MockWsComponent;

require './vendor/autoload.php';

$port = $_SERVER['PHP_WS_SERVER_PORT'] ?? 80;

$server = IoServer::factory(
    new MockWsComponent(),
    $port,
);

echo "Starting mock websocket server on port ${port}\n";
$server->run();
