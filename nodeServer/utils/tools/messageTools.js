const date                = require('date-and-time'),
     {typesMessage,timeZone} = require("../constVariables"),
     {morph,APP_URL,addressMedia}      = require("../constVariables");
// export message => type
exports.getMessageType    = (type)=>{
    let index             = typesMessage.indexOf(type);
    return index;
}
// set morph
exports.getMorphRelation  = (sender_type)=>{
    let morphValue        = morph.filter(obj => {
        return obj.key == sender_type
    });
    return morphValue[0].value;
}

// export message ==> time
exports.getTimeMessage    = ()=>{
    let now               = new Date();
    var formatDate        = date.format(now, 'hh:mm A');
    return formatDate;
}
exports.objInsertMessage  = (data)=>{
    let obj               = {
        room_id           : data.room_id,
        senderable_id     : data.sender_id,
        senderable_type   : this.getMorphRelation(data.sender_type),
       // type            : this.getMessageType(data.type),
        type              : data.type,
        body              : data.body,
        duration          : (data.duration == undefined)?0:data.duration,// sound
        name              : (data.name == undefined)?"":data.name,  //file
        created_at        : (data.created_at == undefined)?new Date():data.created_at, 
    }
    return obj;
}

// export message ==> res recieve
exports.resRecieveMessage = (data,id)=>{
    let obj               = {
        id                : id,
        sender_id         : data.sender_id,
        receiver_id       : data.receiver_id,
        room_id           : data.room_id,
        body              : (data.type == "text")?data.body:APP_URL+addressMedia+data.room_id+"/"+data.body,
        type              : data.type,
        duration          : (data.duration == undefined)?0:data.duration,
        avatar            : (data.avatar == undefined)?"":data.avatar,
        is_sender         : 0,
        name              : data.sender_name,
        created_at        : this.getTimeMessage(),
    }
    console.log("obj",obj)
    return obj;
}


// export obj Fcm
exports.objFcm            = (data)=>{
    let obj               = {
        sender_id         : data.sender_id,
        receiver_id       : data.receiver_id,
        senderable_type   : this.getMorphRelation(data.sender_type),
        receiver_type     : this.getMorphRelation(data.receiver_type),
        room_id           : data.room_id,
        body              : (data.type == "text")?data.body:APP_URL+addressMedia+data.body,
        type              : data.type,
        duration          : (data.duration   == undefined)?0  : data.duration,
        avatar            : (data.avatar     == undefined)?"" : data.avatar,
        sender_name       : (data.sender_name == undefined)?"" : data.sender_name,
        is_sender         : data.is_sender,
        time              : this.getTimeMessage(),
    }
    return obj;
}