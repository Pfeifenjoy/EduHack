
function addThumbnail(destination) {
   var name = "Test";
   var description = "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.";
   
   var tag = '<div class="col-sm-6 col-md-4">'
       + '<div class="thumbnail">'
       + '<img src="" alt="Blob">'
       + '<div class="caption">'
       + '<h3>' + name + '</h3>'
       + '<p>' + description + '</p>'
       + '<p><a class="btn btn-primary" role="button">Kontaktieren</a> <a class="btn btn-danger delete-btn" role="button">Löschen</a></p>'
       + '</div>'
       + '</div>'
       + '</div> ';
   destination.append(tag);
}

$(document).delegate("input", "keydown",  function() {
    var resultDisplay = $('#searchResults');
    if(resultDisplay){
        addThumbnail(resultDisplay);
    }
});

$(document).delegate(".delete-btn", "click", function() {
    $(this).parent().parent().parent().parent().remove();
});
