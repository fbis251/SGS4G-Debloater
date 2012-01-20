$(function () {
/* Select/unselect all the checkboxes */
  $('#checkAll').click(function () {
    $(this).parents('form:eq(0)').find(':checkbox').attr('checked', this.checked);
    /* Deselect all the essential packages */
    $(this).parents('form:eq(0)').find('.warningCheckbox').attr('checked', false);
    
    /* Check to see if we should toggle the background */
    $('.apkRow').each(function(){
      if($(this).find(':checkbox').attr('checked')) {
        $(this).addClass('selected');
      } else {
        $(this).removeClass('selected');
      }
    });
  });
  
  $('#checkAllText').click(function () {
    $('#checkAll').parents('form:eq(0)').find(':checkbox').attr('checked', !$('#checkAll').is(':checked'));
    /* Deselect all the essential packages */
    $('#checkAll').parents('form:eq(0)').find('.warningCheckbox').attr('checked', false);
    
    /* Check to see if we should toggle the background */
    $('.apkRow').each(function(){
      if($(this).find(':checkbox').attr('checked')) {
        $(this).addClass('selected');
      } else {
        $(this).removeClass('selected');
      }
    });
  });
  
  /* Check a checkbox when the text is clicked */
  $('#apkTable .apkRow').filter(':has(:checkbox:checked)').addClass('selected').end().click(function(event) {
    $(this).toggleClass('selected');
    if (event.target.type !== 'checkbox') {
    $(':checkbox', this).attr('checked', function() {
      return !this.checked;
    });
    }
  });
  
  $("form").submit(function () {
    /* The user selected some essential APKs */
    if($(".warningCheckbox:checked").length > 0) {
      return confirm('You have selected some essential APKs. Are you sure you want to continue?');
    } else {
      return true;
    }
  });
});
