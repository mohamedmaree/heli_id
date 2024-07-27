'user strict';

/**
 * fcm helper functions
 */
const path             = require('path'),
      DB               = require('./db'),
      i18n_module      = require('i18n-nodejs'),
      {FCM_SERVER_KEY} = require("./constVariables"),
      config           = {
        "lang"         : '',
        "langFile"     : "../../locale.json"
      },
     i18n_ar           = new i18n_module(config.lang = "ar", config.langFile),
     i18n_en           = new i18n_module(config.lang = "en", config.langFile);



class FCM_HELPER {
    
    send(data) {
        console.log("sendNotification")
        console.log(data)
        //send fcm notification
        var FCM        = require('fcm-node');
        var serverKey  = FCM_SERVER_KEY;
        var fcm        = new FCM(serverKey);

        var sendername = data.sender_name;
        var message_ar = '';
        var message_en = '';
        DB.query("SELECT * From devices Where ? ",{morph_id:data.receiver_id}).then((results,error) =>{
            results.forEach((row) => {
                if(data.type == 'text') {
                    message_ar = data.body;
                    message_en = data.body;
                }else{
                    message_ar = i18n_ar.__(data.type);
                    message_en = i18n_en.__(data.type);
                }
                if(row.device_type      == 'ios'){
                    var message         = {
                        to              : row.device_id,
                        notification    : {
                            title       : sendername,
                            body        : message_ar,
                            sound       : "default"
                        },
                        data: {
                            title       : sendername,
                            body_ar     : message_ar,
                            body_en     : message_en,
                            room_id     : data.room_id,
                            sender_id   : data.sender_id,
                            receiver_id : data.receiver_id,
                            type        : data.type,
                            sender_name : data.sender_name,
                            avater      : data.avater,
                            key         : 'new_message'
                        }
                    };
                }else{
                    var message         = {
                        to              : row.device_id,
                        notification    : null,
                        data            : {
                            title       : sendername,
                            body_ar     : message_ar,
                            body_en     : message_en,
                            room_id     : data.room_id,
                            sender_id   : data.sender_id,
                            receiver_id : data.receiver_id,
                            type        : data.type,
                            sender_name : data.sender_name,
                            avater      : data.avater,
                            key         : 'new_message'
                        }
                    };
                }
                fcm.send(message, function(err, response){
                    if (err) {
                        console.log("Something has gone wrong!"+err);
                    } else {
                        console.log("Successfully sent with response: ");
                    }
                });
            }); 
        });
        //end send fcm
    }
}

module.exports = new FCM_HELPER();