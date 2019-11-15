$('#file').on("change",function() {
      var file = $('#file')[0].files[0].name;
      $('#file_label').html(file);
});
$('#delete').on("click", function(){
    $('#overlay').css('display', 'block');
});
$('#cancel').on("click", function(){
    $('#overlay').css('display', 'none');
});
$('#close').on("click", function(){
    $("#notice").remove();
});   
