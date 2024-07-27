let date = require('date-and-time'),
    fs = require('fs'),
    path = require('path'),
    dotenv = require('dotenv'),
    envFile = dotenv.config({ path: path.join(__dirname, '../../.env') }).parsed;
    console.log("envFile.NODE_MODE",envFile.NODE_MODE)
module.exports = {
    typesMessage: ['text', 'file', 'map', 'sound', 'image', "video"],
    addressMedia: '/storage/images/rooms/',
    timeZone: 'Asia/Riyadh',
    morph:[{ key: 'User', value: 'App\\Models\\User' },{ key: 'Admin', value: 'App\\Models\\Admin' },{ key: 'Captain', value: 'App\\Models\\Captain' }, { key: 'Provider', value: 'App\\Models\\Provider' }, { key: 'Delegate', value: 'App\\Models\\Delegate' }, { key: 'Merchant', value: 'App\\Models\\Merchant' }],
    credentials:(envFile.NODE_MODE == "live")? {
        key: fs.readFileSync(`/var/cpanel/ssl/apache_tls/${envFile.NODE_HOST}/combined`, 'utf8'),
        cert: fs.readFileSync(`/var/cpanel/ssl/apache_tls/${envFile.NODE_HOST}/certificates`, 'utf8'),
        ca: fs.readFileSync(`/var/cpanel/ssl/apache_tls/${envFile.NODE_HOST}/combined`, 'utf8'),
    }:{},
    NODE_HOST : envFile.NODE_HOST,
    NODE_PORT : envFile.NODE_PORT,
    APP_URL   : envFile.APP_URL,
    NODE_MODE : envFile.NODE_MODE,
    info: {
        DB_HOST    : envFile.DB_HOST,
        DB_USERNAME: envFile.DB_USERNAME,
        DB_PASSWORD: envFile.DB_PASSWORD,
        DB_DATABASE: envFile.DB_DATABASE
    },
    FCM_SERVER_KEY: envFile.FCM_SERVER_KEY,
};