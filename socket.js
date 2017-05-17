/**
 * Created by yangs0 on 16-10-10.
 */
var http = require('http').Server();
var io  = require('socket.io')(http);
var Redis = require('ioredis');
var redis = new Redis();

var numUsers = 0;
var user = {};
redis.subscribe('chatRoom');
redis.on('message',function (channel, message) {
    console.log(message);
    message = JSON.parse(message);
    io.emit(message.event, message.data);//channel+ ':' + message.event
});

io.on('connection', function (socket) {
    //console.log('connected');
    var addedUser= false;
    socket.on('add user', function (username) {
        if (addedUser) return;

        // we store the username in the socket session for this client
        socket.user = username;
        numUsers++;
        addedUser = true;
        user[username.id] = username;
        console.log(user);
        socket.emit('join', user);
    });

    socket.on('disconnect', function () {
        if (addedUser) {
            --numUsers;
            socket.emit('leave', user);
            delete user[socket.user.id];
            console.log(user);
        }
    });
 });


http.listen(3000, function () {
    console.log('connect start');
});