'use strict';

/** 
 * get host and port from .env file (NODE_HOST, NODE_PORT)
 * connect to server
 * use socket action file to config connector data
 */


const { NODE_HOST, NODE_PORT,APP_URL,NODE_MODE} = require("./utils/constVariables");
const path       = require('path'),
    fs           = require('fs'),
    utf8         = require('utf8'),
    express      = require('express'),
    socketio     = require('socket.io'),
    socketEvents = require('./utils/socket');
    // import action file

console.log("envFile.NODE_Mode",NODE_MODE)
if(NODE_MODE == "live"){
      // https with Certificates
    var {credentials} = require("./utils/constVariables"),
        http          = require('https');// for https connent 
}else{
    var http = require('http'); // for http connent 
}
class Server {
    constructor() {
        console.log('env NODE_PORT: ', NODE_PORT)
        console.log('env NODE_HOST: ', NODE_HOST)

        this.app = express();
        // Certificate for use https , update to real path
         this.http = (NODE_MODE == "live")?http.createServer(credentials, this.app):http.createServer(this.app); // test - live
        const url  = APP_URL;
        this.socket = socketio(this.http ,{
            allowEIO3: true,
            cors : {
                origin : url,
                methods: ["GET", "POST"],
                credentials: true,
            }
        });
    }

    appRun() {
        // set header of app
        this.app.use((req, res, next) => {
            res.header("Access-Control-Allow-Origin", `${NODE_HOST}`);
            res.header("Access-Control-Allow-Credentials", "*");
            res.header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");
            next();
        });

        this.app.get('/', (req, res) => {
            const data = {
                message: 'Ok',
                date: new Date()
              }
              res.status(200).send(data);
        });
        
        // use action file
        new socketEvents(this.socket).socketConfig();
        this.http.listen(NODE_PORT, NODE_HOST, () => {
            console.log(`Listening on ${NODE_HOST}:${NODE_PORT}`);
        });

    }
}

const app = new Server();
app.appRun();