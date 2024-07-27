<!-- FireBase -->
<!-- The core Firebase JS SDK is always required and must be listed first -->
{{-- <script src="https://www.gstatic.com/firebasejs/7.6.1/firebase.js"></script> --}}
<script src="https://www.gstatic.com/firebasejs/7.6.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.6.1/firebase-messaging.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.6.1/firebase-analytics.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.6.1/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.6.1/firebase-firestore.js"></script>


<script>
    // Your web app's Firebase configuration
    // TODO: change this configuration
    const firebaseConfig = {
        apiKey: "",
        authDomain: "",
        projectId: "",
        storageBucket: "",
        messagingSenderId: "",
        appId: "",
        measurementId: ""
    };

    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    //firebase.analytics();

    const messaging = firebase.messaging();
    window.fcmMessageing = messaging;

    //messaging.usePublicVapidKey("");

    Notification.requestPermission().then((permission) => {
        if (permission === 'granted') {
            console.log('Notification permission granted.');
        } else {
            console.log('Unable to get permission to notify.');
        }
    });

    messaging.getToken().then((currentToken) => {
        if (currentToken) {
            console.log(currentToken);
            localStorage.setItem('device_id', currentToken);
            $('#device_id').val(localStorage.getItem('device_id'));

        } else {
            console.log('No Instance ID token available. Request permission to generate one.');
        }
    }).catch((err) => {
        console.log('An error occurred while retrieving token. ', err);
    });

    messaging.onMessage(function(payload) {
        alert('لديك رسالة جديدة : ' + payload.data.body_ar, 'success');
        // $.notify('لديك رسالة جديدة : ' + payload.notification.body, 'success');
        console.log('Message received. ', payload);
    });
</script>
