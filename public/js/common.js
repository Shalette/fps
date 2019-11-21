$('#delete').on("click", function(){
    $('#overlay').css('display', 'block');
});
$('#cancel').on("click", function(){
    $('#overlay').css('display', 'none');
});
$('#close').on("click", function(){
    $("#notice").remove();
});   
