$(document).ready(function($) {
  $('*[data-href]').on('click', function() {
    window.open($(this).data("href"));
  });

  $('select').formSelect();
});