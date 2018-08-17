<?php
    include 'functions/main-functions.php';
    include 'functions/ibi.func.php';

    $pages = scandir('pages/');

    if(isset($_GET['page']) && !empty($_GET['page']) && in_array($_GET['page'].'.php',$pages)){
        $page = $_GET['page'];
    }else{
        $page = 'signin';
    }

    $pages_functions = scandir('functions/');

    if(in_array($page.'.func.php',$pages_functions)){
        include 'functions/'.$page.'.func.php';
    }

?>


<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                   <link rel ="stylesheet" href = "./font-awesome-4.7.0\css\font-awesome.min.css">
              <link rel ="stylesheet" href = "./css/liste.css" >

        <title>Application web de tchat</title>
    </head>
    <body>



        <?php
        if($page!=='register' && $page!=='signin'){
          include 'body/topbar.php';
        }

        include 'pages/'.$page.'.php';

        ?>

        <script src="js/jquery.js"></script>
        <?php
            $pages_js = scandir('js/');
            if(in_array($page.'.func.js',$pages_js)){
                ?>
                    <script src="js/<?= $page ?>.func.js"></script>
                <?php
            }
  
      
        if($page!=='signin' && $page!=='register')
        {
         include 'body/footer.php'; 
          
        }         
       
        ?>

    </body>
</html>
