<template>
  <div class="message">
    <div class="container">
      <div class="messages">
        <div class="top-message">
          <div class="img-name">
            <img :src="otherMember.memberable.image" alt="" />
            <audio
              src="/sound/in.mp3"
              ref="soundIn"
              controls
              style="display: none"
              allow="autoplay"
            ></audio>
            <div class="txt">
              <h2 class="font14 bold p-0 m-0 color-dark">
                {{ otherMember.memberable.name }}
              </h2>
            </div>
          </div>
        </div>
        <div class="message-content">
          <div v-chat-scroll="{ smooth: true }" class="msg-container">
            <div v-for="(message, index) in allMsgs" :key="index">
              <div
                :class="{ send: message.is_sender, recive: !message.is_sender }"
              >
                <p v-if="message.original_message.type == 'text'">
                  {{ message.original_message.body }}
                </p>
                <img
                  v-else-if="message.original_message.type == 'file'"
                  :src="message.original_message.body"
                  @click="openImgPreview(message.original_message.body)"
                />
                <span>{{new Date(message.created_at).toLocaleString()}}</span>
              </div>
            </div>
          </div>
          <Transition name="slide-fade">
              <div @click.self="closeImgPreview" v-if="showImg" class="img-preview">
                  <img :src="targetImg" class="" />
                  <i @click="closeImgPreview" class="close fa fa-times"></i>

              </div>
          </Transition>
        </div>
        <div class="message-send">
          <form id="form" action="" class="d-flex align-items-center">
            <div class="my-img">
              <img :src="avatar" alt="" />
            </div>

            <div class="btn-msg-bar">
              <div class="msg-input">
                <span
                  v-show="fileChosen != ''"
                  class="delete-file cp"
                  @click="clearInput"
                >
                  <b-icon icon="close" size="is-small"> </b-icon>
                </span>
                <textarea
                  aria-setsize="none"
                  cols="30"
                  rows="2"
                  class="form-control"
                  placeholder="اكتب الرسالة"
                  v-model="message"
                  @keyup.enter.exact="addMessage"
                  @keydown.enter.shift.exact="newline"
                  :readonly="fileChosen != ''"
                >
                </textarea>
              </div>
              <div class="form-buttons">
                <div class="upload-input">
                  <b-icon icon="link-variant" size="is-medium"> </b-icon>
                  <input
                    type="file"
                    id="file"
                    ref="file"
                    @change="handleFileUpload()"
                    accept="image/jpeg, image/gif, image/png, application/pdf, image/jpg"
                  />
                </div>
                <button
                  class="btn site-btn"
                  id="myBtn"
                  type="submit"
                  @click.prevent="addMessage"
                >
                  إرسال
                  <b-icon icon="send" size="is-small"> </b-icon>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      origin: window.location.origin,
      message: "",
      typing: false,
      timeout: "",
      socket: "",
      allMsgs: [],
      otherMember: [],
      fileChosen: "",
      otherRoomUsers: [],
      room_id: null,
      avatar: "",
      showImg:false,
      targetImg:''
    };
  },
  props: ["messages", "room", "members"],
  sockets: {
    sendMessageRes: function (data) {
      var date = new Date();
      date.toLocaleString('en-US', { timeZone: 'Asia/Riyadh' });
      this.allMsgs.push({
        created_at: date,
        is_sender: 0,
        original_message: { body: data.body, type: data.type },
      });

      this.$refs.soundIn.play();
    },
  },
  methods: {
    clearInput() {
      this.fileChosen = "";
      this.message = "";
      this.$refs.file.value = "";
    },
    newline() {
      this.value = `${this.value}\n`;
    },
    handleFileUpload() {
      this.fileChosen = this.$refs.file.files[0];
      this.message = this.$refs.file.files[0].name;
    },
    addMessage() {
      if (this.fileChosen != "") {
        // validate file size
        if (this.fileChosen.size > 10000000) {
          // this.$swal({
          //     title: "max file size 10M ",
          //     type: "error"
          // });
          this.fileChosen = "";
          this.message = "";
          return false;
        }

        // upload file
        let formData = new FormData();
        formData.append("file", this.fileChosen);
        formData.append("room_id", this.room.id);

        //console.log(formData);
        this.uploadFile(formData);
      } else if (this.message.trim() == "") {
        return false;
      } else {
        // send text message
        this.sendMessage(this.message, "text");
      }
    },
    uploadFile(formData) {
      // POST /someUrl
      this.$http
        .post("/upload-chat-file", formData, {
          headers: {
            "Content-Type": "multipart/form-data",
          },
        })
        .then((response) => {
          if (response.body.key == "success") {
            this.fileChosen = "";

            // send message here
            this.sendMessage(
              response.body.data.file_name,
              "file",
              response.body.data.file_url
            );
          }
        });
    },
    sendMessage($msg, $type = "text", $file_url = null) {
      this.$socket.emit("sendMessage", {
        sender_id: window.USER_ID,
        sender_type: window.USER_TYPE,
        sender_name: window.USER_NAME,
        avater: window.USER_AVATAR,
        receiver_id: this.otherMember.memberable.id,
        receiver_type: this.otherMember.memberable_type.slice(11),
        room_id: this.room.id,
        type: $type,
        body: $msg,
      });

      var body = $msg;
      if ($file_url != null) {
        body = $file_url;
      }
      var date = new Date();
      date.toLocaleString('en-US', { timeZone: 'Asia/Riyadh' });
      this.allMsgs.push({
        created_at: date,
        is_sender: 1,
        original_message: { body: body, type: $type },
      });

      this.message = "";
    },
    onCancel() {
      // for loader
      console.log("User cancelled the loader.");
    },
    openImgPreview(src) {
        this.showImg = true;
        this.targetImg = src;
    },
    closeImgPreview() {
        this.showImg = false;
    }  
  },
  created() {
    console.log(this.avatar);
    this.avatar = window.USER_AVATAR;
    this.allMsgs = this.messages;
    this.allMsgs = this.allMsgs.reverse();
    this.otherMember = this.members[0];
    console.log(this.otherMember);
    this.$socket.emit("enterChat", {
      user_id: window.USER_ID,
      user_type: window.USER_TYPE,
      room_id: this.room.id,
    });

  },
  mounted() {
    console.log("Component mounted.");
  },
};
</script>
<style scoped>
* {
  box-sizing: border-box;
  padding: 0;
  margin: 0;
}
.message .top-message .img-name img,
.message-content img {
  max-width: 50% !important;
  width: auto;
  height: auto;
  border-radius: 20px;
  border: 1px solid #00000044;
  cursor: pointer;
}
.message-content li {
  padding: 20px 30px;
}
input[type="file"] {
  height: auto;
}
.p-0 {
  padding: 0 !important;
}
.m-0 {
  margin: 0 !important;
}
.message {
  background: linear-gradient(to right, #91eae4, #86a8e7, #7f7fd5);
}
.top-message {
  background: #fff;
  padding: 20px;
  border-bottom: 1px solid #ccc;
  background-color: rgba(0, 0, 0, 0.3);
}
.msg-container {
  list-style: none;
  background: transparent;
  box-shadow: 0px 3px 10px #ccc;
  padding: 30px;
  max-height: 600px;
  min-height: 400px;
  overflow-y: auto;
}
.send,
.recive {
  margin: 5px;
  padding: 15px;
  width: auto;
  max-width: 500px;
  border-radius: 15px;
  word-break: break-all;
}
.send {
  background: #00b2ff;
  margin-inline-start: auto;
  text-align: end;
  color: #fff;
}

.recive {
  background: #e9ebee;
  color: #000;
  text-align: start;
  margin-inline-end: auto;
}
.send .time {
  text-align: start;
  display: block;
}
.recive .time {
  text-align: end;
  display: block;
}
.txt h2 {
  font-size: 1.4rem !important;
  color: #fff;
}
/* Send Bar */
.message-send {
  padding: 20px;
  border: 1px solid #eee;
}
form {
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 10px;
}
.btn-msg-bar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 10px;
  background: #fff;
  width: 95%;
  border-radius: 5px;
}
#myBtn {
  background-color: #00b2ff;
  color: #fff;
  padding: 10px;
  border-radius: 5px;
  border: 0;
  outline: none;
  font-weight: bold;
  flex-shrink: 0;
  font-size: 18px;
  cursor: pointer;
  font-weight: bold;
  margin-right:10px;
}
.form-buttons {
  display: flex;
  justify-content: space-evenly;
  align-items: center;
}
.upload-input {
  position: relative;
  min-width: 50px;
  color: #00b2ff;
  cursor: pointer;
}
#file {
  opacity: 0;
  position: absolute;
  z-index: 2;
  width: 100%;
  height: 100%;
  left: 0;
  top: 0;
  flex-grow: 1;
  font-size: 0;
  cursor: pointer;
}
.img-name {
  display: flex;
  gap: 10px;
  align-items: center;
}
.img-name img {
  width: 50px !important;
  height: 50px !important;
  border-radius: 50%;
  border: 1px solid #fff;
  padding: 2px;
}
.cp {
  cursor: pointer;
}
.msg-input {
  position: relative;
  width: 90%;
  line-height: 0;
}
textarea {
  resize: none;
}
textarea:read-only {
  background-color: #ccc !important;
}
textarea:read-only .msg-input {
  background-color: #ccc !important;
}
.delete-file {
  position: absolute;
  top: 0px;
  right: 0px;
  color: #fff;
  font-size: 20px;
  font-weight: bold;
  background: rgb(199, 19, 19);
  width: 48px;
  height: 56px;
  border-radius: 4px;
  display: flex;
  justify-content: center;
  align-items: center;
  font-weight: bold;
}
.form-control {
  border: 0px solid #00b2ff;
  border-radius: 5px;
  width: 100%;
  outline: none;
  font-size: 15px;
  font-weight: bold;
  padding: 10px;
}

.my-img {
  width: 50px;
  height: 50px;
  border: 1px solid #fff;
  padding: 2px;
  object-fit: cover;
  flex-shrink: 0;
  border-radius: 50%;
}
.my-img img {
  width: 100%;
  height: 100%;
  border-radius: 50%;
}

.img-preview {
  width: 100%;
  height: 100vh;
  position: fixed;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: #211f1fc9;
  z-index: 1000;
  top: 0;
  left: 0;
  text-align: center;
}
.img-preview img {
  width: 450px;
  height: 450px;
  object-fit: cover;
  display: block;
  border-radius: 0!important;
}
.img-preview .close {
  position: absolute;
  color: #fff;
  top: 50px;
  left: 50px;
  cursor: pointer;
}
.message-content li.send p{
        word-break: break-word;

}

@media (max-width: 991px) {
  .msg-input {
    width: 70%;
  }
}
</style>
