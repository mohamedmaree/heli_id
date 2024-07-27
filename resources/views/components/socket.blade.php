<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.2.0/socket.io.js">
</script>
<script>
  $(document).ready(function() {
    var socket = io("{{ env('NODE_HOST') . ':' . env('NODE_PORT') }}", {
      query: "id=" + "1" + "&user_type=User",
    });

    socket.on("connect", function(data) {
      console.log('connected to socket from web')

      socket.emit('enterChat', {user_id:101,room_id:1})
      socket.emit('sendMessage', {sender_id:101,sender_type:'User',sender_name:'wahba',receiver_id:11,receiver_type:'User',room_id:1,'type':'text',body:'test new message'})

      socket.on('newMessage', (data)=>{
        console.log(data.body)
      })

    });

    socket.on('connect_error', function(err) {
      console.log('socket err', err)
      console.log('يرجى التواصل مع الدعم لتنشيط الاتصال');
      // toastr.error
      ('يرجى التواصل مع الدعم لتنشيط الاتصال');
    });

    socket.on('update-driver-location-res', function(res) {
      console.log('update-driver-location-res', res)
    });

    socket.on('get-driver-location-res', function(res) {
      console.log('get-driver-location-res', res)
    });
  });
</script>
