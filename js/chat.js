
function appendMessage(text, otherone){
    otherone = otherone || false;
    var username;
    if(otherone) 
        username = $('#partnerName').val();
    else
        username = $('#username');
    if(!username) return;
    var date = new Date();
    var dd = date.getDate();
    var mm = date.getMonth()+1; //January is 0!

    var yyyy = date.getFullYear();
    var h = date.getHours();
    var m = date.getMinutes();
    var lastMessage =  $('body .content p:last-child');
    lastMessage = lastMessage;
    var lastUser = lastMessage.parent().parent().last().children().first().children().first().children().last().text();
    var newText =  '<p>' + text + '<span class="rightTime">' + (dd < 10 ? "0" + dd : dd) + '.'
                + (mm < 10 ? "0" + mm : mm) + '.' + yyyy + ' - ' 
                + (h < 10 ? "0" + h : h) + ':' + (m < 10 ? "0" + m: m) + '</span></p>';
    if(lastUser == username.val() && !otherone || lastUser != username.val() && otherone){
        
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
    val inMessage = $('#chatMessage');
    var submit-btn = $(this);
    var message = inMessage.val();
    var userId = $('#sessionId').val();
    var toId = $('#toID').val();
    var chatId = /id=([0-9]+)/.exec(window.location + "");
    var chatId = chatId[1];
    
    $.ajax({
        url: 'http://ne4y-dev/DEV/EduHack/EduHack/websocketclient/sender.php?to='+toId+'&from='+userId+'&message='+message+'&chatID='+chatId,
        success: function(result) {
            appendMessage(message);
            inMessage.empty();
            $('html, body').animate({scrollDown: ($(submit-btn).offset().bottom())}, "slow");
        }
    });
    return false;

});
