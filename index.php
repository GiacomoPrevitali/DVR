<!doctype html>
    <html>
        <head>
            <meta charset='utf-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1'>
            <title>Login</title>
            <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
            <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>
            <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
            <link rel="stylesheet" href="style.css" />



</head>
<body className='snippet-body'>
    <div class="wrapper">
        <div class="logo">
            <img src="https://raja.scene7.com/is/image/Raja/products/durable-cartello-segnaletico-di-sicurezza-da-pavimento-adesivo-vietato-pedoni-p004-430-mm_73070.jpg?template=withpicto410&$image=asset7708221&$picto=NoPicto&hei=410&wid=410" alt="">
        </div>
        <div class="text-center mt-4 name">
            D.V.R.
        </div>
        <form class="p-3 mt-3" method="POST" action="index.php">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                    <input type="text" name="userName" id="userName" placeholder="Username">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="pwd" placeholder="Password">
            </div>
            <button class="btn mt-3">Login</button>
        </form>
        <div class="text-center fs-6">
            <!--<a href="#">Forget password?</a> or <a href="#">Sign up</a>-->
        </div>
    </div>
                               <!-- <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'></script>
                                <script type='text/javascript' src='#'></script>
                                <script type='text/javascript' src='#'></script>
                                <script type='text/javascript' src='#'></script>
                                <script type='text/javascript'>#</script>
                                <script type='text/javascript'>var myLink = document.querySelector('a[href="#"]');
                                myLink.addEventListener('click', function(e) {
                                  e.preventDefault();
                                });</script>-->
                                <?php
        if (isset($_POST['userName'])){
            $ip= '127.0.0.1';
            $username='root';
            $password='';
            $database='dvr';

            $connection=new mysqli($ip,$username,$password,$database);
            if ($connection->connect_error) {
                die('C\'è stato un errore: ' . $connection->connect_error);
            }
            $sql ='SELECT Nome FROM users WHERE Pass="'.md5($_POST['password']).'" AND Username="'.$_POST['userName'].'" ';
            $result =$connection->query($sql);

            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                
                  header("Location: Home.php");
                  
                }
              }else{
                echo '<div class="alert alert-danger my-4">Credenziali sbagliate</div>';
              }


        }

?>
</body>
</html>
