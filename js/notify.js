function notify(text) {
    var notifyArea = $('#notificationArea');
    if(notifyArea) {

        var notification = '<div class="alert alert-info" role="alert">' + text
            + '<br />'
            + '<button class="btn btn-success accept-btn">Anzeigen</button>'
            + '<button class="btn btn-danger ignore-btn">Ignorieren</button>'
           + '</div>';
        notifyArea.append(notification);
    }
}

$(document).delegate(".ignore-btn", "click", function() {
    $(this).parent().remove();
});

notify("Test");
