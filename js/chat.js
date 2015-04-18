
function addMessage(message) {
    var container = $('#messageDisplay');
    if(container) {
        var newMessage = '<div class="col-md-12 post clear">'
            + '<div class="col-md-2">'
            + '<div class="user1 user-data">'
            + '<img src="img/login_bild.png" alt="" />'
            + '<a href="">Username</a>'
            + '</div></div></div>';
        container.append(newMessage);
    }
}
$(document).delegate("button#chatSend", "click", function() {
    var message = $('#chatMessage').val();
    var userId = $('#sessionId').val();
    var toId = $('#toID').val();
    var chatId = /id=([0-9]+)/.exec(window.location + "");
    var chatId = chatId[1];
    
    $.ajax({
        url: 'http://127.0.0.1/EduHack/EduHack/websocketclient/sender.php?to='+toId+'&from='+userId+'&message='+message+'&chatID='+chatId,
        success: function(result) {
            // append
        }
    })

});
