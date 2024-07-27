require("./bootstrap");
import Vue from 'vue/dist/vue.js';
// window.Vue = Vue;

// var Lang = localStorage.getItem("lang") != null ? localStorage.getItem("lang") : "ar";
// window.Lang = Lang;

// moment
// import VueMoment from 'vue-moment'
// import moment from 'moment-timezone'
// // Lang == "ar" ? moment.locale("ar") : moment.locale("en");
// Vue.use(require("vue-moment"), {
//     moment,
// })

// window.Origin = window.location.origin;

// vue resource
import VueResource from 'vue-resource';
Vue.use(VueResource);
Vue.http.headers.common["X-CSRF-TOKEN"] = document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute("content");

// sweet alert
// import VueSweetalert2 from "vue-sweetalert2";
// import "sweetalert2/dist/sweetalert2.min.css";
// var options = {
//     //confirmButtonColor: 'blue',
//     //cancelButtonColor: '#ff7674'
// };
// Vue.use(VueSweetalert2, options);

// loader
// import Loading from "vue-loading-overlay";
// import "vue-loading-overlay/dist/vue-loading.css";
// window.Loading = Loading;

// Buefy
import Buefy from 'buefy'
import 'buefy/dist/buefy.css'
Vue.use(Buefy)


// mdi icone 
import "mdi-icons/css/materialdesignicons.min.css";


// chat scroll
import VueChatScroll from 'vue-chat-scroll'
Vue.use(VueChatScroll)

///////////////////// socket /////////////////////////
var NODE_HOST = $("meta[name=NODE_HOST]").attr("content");
var APP_URL = $("meta[name=APP_URL]").attr("content");
var NODE_PORT = $("meta[name=NODE_PORT]").attr("content");
var NODE_MODE = $("meta[name=NODE_MODE]").attr("content");
var USER_ID = Number($("meta[name=user_id]").attr("content"));
var USER_TYPE = $("meta[name=user_type]").attr("content");
var USER_NAME = $("meta[name=user_name]").attr("content");
var USER_AVATAR = $("meta[name=user_avatar]").attr("content");
window.USER_ID = USER_ID;
window.USER_TYPE = USER_TYPE;
window.USER_NAME = USER_NAME;
window.USER_AVATAR = USER_AVATAR;
//socket connection
import VueSocketIO from 'vue-socket.io';

var url = NODE_MODE == 'test'? NODE_HOST : APP_URL;
url+=':'+NODE_PORT;
Vue.use(new VueSocketIO({
    debug: true,
    connection: url,
    options: { } //Optional options
}));


// components
const files = require.context("./", true, /\.vue$/i);
files.keys().map(key =>Vue.component(key.split("/").pop().split(".")[0],files(key).default));

const app = new Vue({
    el: "#app",
    sockets: {
        connect: function () {
            console.log('socket connected')
        }
    },

});

