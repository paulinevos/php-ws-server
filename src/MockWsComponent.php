<?php

namespace Vos\PhpWsServer;

use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;

final class MockWsComponent implements MessageComponentInterface
{
    protected $clients;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
    }

    function onOpen(ConnectionInterface $conn)
    {
        $this->clients->attach($conn);
        echo "Number of connections: " . $this->clients->count() . "\n";
    }

    function onClose(ConnectionInterface $conn)
    {
        $this->clients->detach($conn);
    }

    function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }

    function onMessage(ConnectionInterface $from, $msg)
    {
        echo "Message received: ${msg}\n";
        foreach ($this->clients as $client) {
            if ($from !== $client) {
                $client->send($msg);
            }
        }
    }
}