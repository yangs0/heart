/**
 * Created by yangs0 on 16-10-10.
 */
var http = require('http').Server();
var io  = require('socket.io')(http);
var Redis = require('ioredis');
var redis = new Redis();

var numUsers = 0;
var user = {};
var online_num = 0;
var online_user = {};
var room_user = {};

redis.subscribe('noServer');
redis.on('message',function (channel, message) {
    message = JSON.parse(message);
    if (message.type == 'letter'){
        if (online_user[message.toUser]){
            var target = online_user[message.toUser];
            target.emit('letters', '您有一封新的私信!')
        }
    }else{

        io.emit(message.event, message.data);//channel+ ':' + message.event
    }
});

io.on('connection', function (socket) {

    //console.log('connected');

   //  = socket;
    //console.log(socket.id);
    socket.on('setUser', function (user) {
        socket.user = user;
        online_user[user.id] = socket;
    });

    socket.on('joinRoom', function (user) {
        socket.room = user.room;
        if (room_user[user.room] == undefined){
            room_user[user.room] = {};
        }
        room_user[user.room][socket.id] = user;
        io.emit('system:'+socket.room, user.name+" 加入了房间");
        io.emit('onlineUser:'+user.room, room_user[user.room])
    });

     socket.on('disconnect', function () {
         //console.log(socket.user)
         if (socket.room !== undefined){
             io.emit('system:'+socket.room, room_user[socket.room][socket.id]['name']+" 悄悄离开了房间");
             delete room_user[socket.room][socket.id];
             io.emit('onlineUser:'+user.room, room_user[user.room])
         }
         if(socket.user !== undefined){
             delete online_user[socket.user.id];
         }
    });
});



http.listen(3000, function () {
    console.log('connect start');
});