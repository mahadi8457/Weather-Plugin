jQuery(document).ready(function( $ ) {
	
	// $ Works! You can test it with next line if you like
	// console.log($);
  $('.Unique_id').on('keyup', function() {
  var uniqueId = $(this).val();
  $('.shortcode').val("["+uniqueId+"]");
});

});
