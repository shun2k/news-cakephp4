$(function(){
  $('img[usemap]').rwdImageMaps();
});

$(function() {
  $('.toggle-btn').click(function() {
    $('#map').toggle('slow');
  })
})
