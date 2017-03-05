/**
 * Created by yangs0 on 16-10-10.
 */
var http = require('http').Server();
var io  = require('socket.io')(http);
var Redis = require('ioredis');
var redis = new Redis();

redis.subscribe('chatRoom');

redis.on('message',function (channel, message) {
    console.log(message);
    message = JSON.parse(message);
    io.emit("test-channel:a", message.data);//channel+ ':' + message.event
});
io.on('disconnect', function(){
    console.log('user disconnected');
});
/*io.on('connection', function (socket) {
 socket.on('disconnect', function(){
 console.log('user disconnected');
 });
 });*/


http.listen(3000, function () {
    console.log('connect start');
});