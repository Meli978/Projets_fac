// function printdiv(printpage)
// {
// var headstr = "<html><head><title></title></head><link href='css/gestion.css'><body>";
// var footstr = "</body>";
// var newstr = document.all.item(printpage).innerHTML;
// var element = document.getElementsByClassName('remove');
// newstr      = newstr.removeChild(element);
// var oldstr = document.body.innerHTML;
// document.body.innerHTML = headstr+newstr+footstr;
// window.print();
// document.body.innerHTML = oldstr;
// return false;
// }

$('#imprimer').click(function(e){

  $('body > :not(#divImprimer)').hide();
  $('#divImprimer').appendTo('body');
  $('#imprimer').hide();
  $('a').hide();
  window.print();
});
