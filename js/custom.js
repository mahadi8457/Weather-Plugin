  jQuery('.Unique_id').on('keyup', function() {
  var uniqueId = jQuery(this).val();
  jQuery('.shortcode').val("["+uniqueId+"]");
});