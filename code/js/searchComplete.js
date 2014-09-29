$(document).ready(function($) {
  $('.form-control').autocomplete({source:'http://byuidahoradio.org/wp-content/themes/Radio%20Template/getJSON.php',minLength:2});
  $('#search_box_top_input').autocomplete({source:'http://byuidahoradio.org/wp-content/themes/Radio%20Template/getJSON.php',minLength:2});
});