jQuery(document).ready(function($){
$('.hide-password-con').on('click', function(){
var $this= $(this);
$password_field = $this.prev('input');
( 'password' == $password_field.attr('type') ) ? $password_field.attr('type', 'text') : $password_field.attr('type', 'password');

});

$('#a').on('click', function(){
var $this= $(this);
$password_field = $this.prev('input');
( 'password' == $password_field.attr('type') ) ? $password_field.attr('type', 'text') : $password_field.attr('type', 'password');

});

});
