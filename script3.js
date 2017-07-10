$('document').ready(function(){
//Delete anchor tag clicked
  $('a.deleteEntryAnchor').click(function(){
    var thisparam = $(this);
    thisparam.parent().parent().find('p').text('Please Wait...');
    $.ajax({
      type: 'GET';
      url: thisparam.attr('href'),
      success: function(results){
        thisparam.parent().parent().fadeOut('slow');
      }
    });
    return false;
  });
});