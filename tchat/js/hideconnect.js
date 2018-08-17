
  //hide or show password
  jQuery(document).ready(function($){
	$('.hide-password-login').on('click', function(){
var $this= $(this),
$password_field = $this.prev('input');
( 'password' == $password_field.attr('type') ) ? $password_field.attr('type', 'text') : $password_field.attr('type', 'password');
( 'Masquer' == $this.text() ) ? $this.text('Afficher') : $this.text('Masquer');
  });
  //hide or show password
  
	$('.hide-password-con').on('click', function(){
var $this= $(this),
$password_field = $this.prev('input');
( 'password' == $password_field.attr('type') ) ? $password_field.attr('type', 'text') : $password_field.attr('type', 'password');
( 'Masquer' == $this.text() ) ? $this.text('Afficher') : $this.text('Masquer');
  });
  
  
  
  
  });