// importScripts('https://www.gstatic.com/firebasejs/4.9.1/firebase.js');

importScripts("https://www.gstatic.com/firebasejs/7.6.1/firebase-app.js");
importScripts("https://www.gstatic.com/firebasejs/7.6.1/firebase-messaging.js");
importScripts("https://www.gstatic.com/firebasejs/7.6.1/firebase-analytics.js");
importScripts("https://www.gstatic.com/firebasejs/7.6.1/firebase-auth.js");
importScripts("https://www.gstatic.com/firebasejs/7.6.1/firebase-firestore.js");

// Initialize Firebase
firebase.initializeApp({
    apiKey: "AIzaSyC-gnnyJOKlmhqJtVN9_yUAWbuiEkoZtAw",
    authDomain: "overtime-c23fb.firebaseapp.com",
    projectId: "overtime-c23fb",
    storageBucket: "overtime-c23fb.appspot.com",
    messagingSenderId: "20136263801",
    appId: "1:20136263801:web:0b7748bf675732813b54a8",
    measurementId: "G-TV355YTV0X"
});

const messaging = firebase.messaging();

messaging.setBackgroundMessageHandler(function(payload) {
    console.log('[firebase-messaging-sw.js] Received background message ', payload);
    // Customize notification here
    const notificationTitle = payload.data.title;
    const notificationOptions = {
        title: payload.data.title,
        body: payload.data.body_ar,
    };

    return self.registration.showNotification(notificationTitle,
        notificationOptions);
});
