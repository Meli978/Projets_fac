  $(document).ready(function() {
    recupMessage();

    $('#send').click(function(){
      
        var message = $('#message').val();
        if(message != ''){

            $.post('ajax/post.php',{message:message},function(){
                recupMessage();
                $('#message').val('');
            });
        }
    });

    function recupMessage(){
        $.post('ajax/recup.php',function(data){
            $('.messages-box').html(data);
          });
    }

    setInterval(recupMessage,1000);

});
