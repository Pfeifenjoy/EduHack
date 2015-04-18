function WebSocketTest() {
     var ws = new WebSocket("ws://127.0.0.1:9999");
      
     ws.onopen = function()    {
        // Web Socket is connected, send data using send()
        console.log("connected");
         ws.send("ID:NzINCg==");
         console.log("Autoisierungskey gesendet");
     };
      
     ws.onmessage = function (msg)     { 
        var received_msg = msg.data;
        console.log("Message is received:" + msg.data);
         alert("message recieved");
     };
      
     ws.onclose = function()     { 
        // websocket is closed.
        console.log("connection closed");
     };
  }
 

