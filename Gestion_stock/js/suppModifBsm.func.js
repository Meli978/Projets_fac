function cocher(id){

  var cases  = document.getElementsByClassName("checkClass_"+id);
  var cocher = document.getElementById("checkAll_"+id);

//la case tout cocher est décoche
  if(cocher.checked == true){
    for(i=0; i<cases.length ; i++){

      if(cases[i].checked == false){
        console.log("faux");
        cases[i].checked = true;

      }

    }
  }
  else{
    for(i=0; i<cases.length ; i++){
      if(cases[i].checked == true){
        cases[i].checked = false;

      }
    }
  }

}
