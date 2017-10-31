

var server = require('http').createServer(),
//création server
    io = require('socket.io')(server),

    port = 8080;

//
io.on('connection', function (socket){

    console.log('Socket.io est connecté');

    socket.on('emitPHP', function (data) {

        console.log('Reception du message : ' + data.message);

    });

    socket.on('disconnect', function () {

        console.log('Socket.io déconnecté');

    });

});

server.listen(port);
