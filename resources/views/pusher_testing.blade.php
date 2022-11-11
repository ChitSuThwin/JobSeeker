<!DOCTYPE html>
<head>
  <title>Pusher Test</title>

  <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('9b1b86d68298b0de4ee3', {
      cluster: 'ap1'
    });

    var channel = pusher.subscribe('job_offer');
    channel.bind('job_offer', function(data) {
      alert(JSON.stringify(data));
    });
  </script>
</head>
<body>
  <h1>Pusher Test</h1>
  <p>
    Try publishing an event to channel <code>my-channel</code>
    with event name <code>my-event</code>.
  </p>
</body>