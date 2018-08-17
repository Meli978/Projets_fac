
    $(document).ready(function(){

      $('#checkAll').click(function(e) {
        var check = $('#checkAll').prop('checked');
        
        if(check){ // si 'checkAll' est coché

          $(".checkClass").prop('checked', true);
      }
      else{ // si on décoche 'checkAll'

        $(".checkClass").prop('checked', false);
      }



    });

  });
