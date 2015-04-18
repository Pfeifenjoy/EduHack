
function addQuestionResult() {
    var destination = $('#searchQuestions');
    if(destination) {

        var name = "Test";
        var description = "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.";

        var tag = '<div class="col-md-6">'
           + '<div class="thumbnail">'
           + '<img src="">'
           + '<div class="caption">'
           + '<h3>' + name + '</h3>'
           + '<p>' + description + '</p>'
           + '<p><a class="btn btn-primary" role="button">Kontaktieren</a> <a class="btn btn-danger delete-btn" role="button">Löschen</a></p>'
           + '</div>'
           + '</div>'
           + '</div> ';
        destination.append(tag);
    }
}
function addContactsResult(){

    var destination = $('#searchContacts');
    if(destination) {

        var name = "Test";
        var description = "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.";

        var tag = '<div class="col-md-12">'
           + '<div class="thumbnail">'
           + '<img src="">'
           + '<div class="caption">'
           + '<h3>' + name + '</h3>'
           + '<p>' + description + '</p>'
           + '<p><a class="btn btn-primary" role="button">Kontaktieren</a> <a class="btn btn-danger delete-btn" role="button">Löschen</a></p>'
           + '</div>'
           + '</div>'
           + '</div> ';
        destination.append(tag);
    }
}
$(document).delegate("input", "keydown",  function() {
    addContactsResult();
    addQuestionResult(); 
});

$(document).delegate(".delete-btn", "click", function() {
    $(this).parent().parent().parent().parent().remove();
});
