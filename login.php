<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css?v=3.2.0">
    
</head>

<body class="hold-transition login-page">
    <div class="login-box">
       

        <div class="card">
        <div class="login-logo mt-3">
            <img class="profile-user-img img-fluid img-circle" src="http://www.dockyard.navy.mi.th/rtnd/assets/images/logo.png" alt="logo">
        </div>          
            <div class="card-body login-card-body">
                <p class="login-box-msg">login เข้าใช้งานระบบครุภัณฑ์ อร.</p>
                
                
                <form action="login_check.php" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <?php 
                    if(isset($_SESSION["Error"])){
                        echo "<div class='text-danger' >";
                        echo $_SESSION["Error"];
                        echo "</div>";
                    }
                    ?>
                    <div class="row">
                        
                        <div class="col-12">
                            <button type="submit" name="submit" class="btn btn-primary btn-block">เข้าสู่ระบบ</button>
                        </div>

                    </div>
                </form>
                
               
            </div>

        </div>
    </div>


    <script src="assets/plugins/jquery/jquery.min.js"></script>

    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/dist/js/adminlte.min.js?v=3.2.0"></script>
</body>

</html>