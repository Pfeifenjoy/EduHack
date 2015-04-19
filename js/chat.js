
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

function appendMessage(text){
    var date = new Date();
    var dd = date.getDate();
    var mm = date.getMonth()+1; //January is 0!

    var yyyy = date.getFullYear();
    var h = date.getHours();
    var m = date.getMinutes();
    var lastMessage =  $('body .content p:last-child');
    lastMessage = lastMessage;
    var lastUser = lastMessage.parent().parent().last().children().first().children().first().children().last().text();
    var username = $('#username');
    var newText =  '<p>' + text + '<span class="rightTime">' + (dd < 10 ? "0" + dd : dd) + '.'
                + (mm < 10 ? "0" + mm : mm) + '.' + yyyy + ' - ' 
                + (h < 10 ? "0" + h : h) + ':' + (m < 10 ? "0" + m: m) + '</span></p>';
    if(lastUser == username.val()){
        lastMessage.parent().append(newText);
    } else{
        var newMessage = '<div class="col-md-12 post clear">'
            + '<div class="col-md-2">'
            + '<div class="user1 user-data">'
            + ' <img src="img/login_bild.png" alt="Benutzerbild" />'
            + '<a href="">' + username.val() + '</a>'
            + '</div></div>'
            + '<div class="col-md-10 content" id="chatFeed">'
            + newText
            + '</div></div></div>';  
        lastMessage.parent().parent().parent().append(newMessage);
    }
}

$(document).delegate("button#chatSend", "click", function() {
    var message = $('#chatMessage').val();
    var userId = $('#sessionId').val();
    var toId = $('#toID').val();
    var chatId = /id=([0-9]+)/.exec(window.location + "");
    var chatId = chatId[1];
    
    $.ajax({
        url: 'websocketclient/sender.php?to='+toId+'&from='+userId+'&message='+message+'&chatID='+chatId,
        success: function(result) {
            appendMessage(message);
        }
    });
    return false;

});
