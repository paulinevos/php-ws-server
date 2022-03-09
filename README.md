## Simple PHP websocket server

Just a simple Ratchet websocket server you can run to send messages back and forth to 
active connections. A message sent from one connection will be received by all other active
connections.

### Installation and usage
Either build and run through docker:
```shell
docker build . 
docker run -p 8080:80 [image ID]
```

or plain PHP:
```shell
composer install
php ./start.php
```

The port defaults to 80. You may change the port by setting the `PHP_WS_SERVER_PORT` env var.

Now you can try it out by connecting in two different windows:
```shell
telnet localhost 80     // or your specified port
```

Type a message in one window and it should arrive in the other. 
