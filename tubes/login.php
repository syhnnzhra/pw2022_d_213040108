<?php 
    session_start();
    require 'functions.php';

    // cek cookie
    if(isset($_COOKIE['id_user']) && isset($_COOKIE['key']) ) {
        $id_user = $_COOKIE['id_user'];
        $key = $_COOKIE['key'];

        // ambil username berdasarkan id_user
        $result = mysqli_query($conn, "SELECT username FROM user WHERE id_user=$id_user");
        $row = mysqli_fetch_assoc($result);

        // cek cookie dan username
        if( $key === hash('sha256', $row['username']) ) {
            $_SESSION['login'] = true;
        }
    }

    if( isset($_SESSION["login"]) ) {
        header("Location: login.php");
        exit;
    }



    if(isset($_POST["login"]) ) {

        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

        // cek username 
        if( mysqli_num_rows($result) === 1 ){

            // cek password
            $row = mysqli_fetch_assoc($result);
            if( password_verify($password, $row["password"]) ) {
                //    set session
                $_SESSION["login"] = true;

                header("Location: dashboard.php");
                exit;
            }
        }

        $error = true;

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- mdbootstrap -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.1.0/mdb.min.css"
        rel="stylesheet"
    />
    <style>
        *{
            background-color: #F3F4F2;
        }
        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }
        .h-custom {
            height: calc(100% - 73px);
        }
        @media (max-width: 450px) {
        .h-custom {
            height: 100%;
        }
        }
    </style>
</head>
<body>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="img/doc-n-patient.png"
                class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form action="" method="POST">
                    <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                        <p class="lead fw-normal mb-0 me-3"> Raincoat Hospital</p>
                    </div>

                    <div class="divider d-flex align-items-center my-4">
                        <p class="text-center fw-bold mx-3 mb-0">Log In</p>
                    </div>

                    <?php if( isset($error)) : ?>
                        <p style="color: red; font-style: italic;">username / password salah</p>
                    <?php endif; ?>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="form3Example3" class="form-control form-control-lg"
                        placeholder="Enter a valid username" name="username" />
                        <label class="form-label" for="form3Example3">Username</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <input type="password" id="form3Example4" class="form-control form-control-lg"
                        placeholder="Enter password" name="password"/>
                        <label class="form-label" for="form3Example4">Password</label>
                    </div>

                    <!-- <div class="d-flex justify-content-between align-items-center"> -->
                        <!-- Checkbox -->
                        <!-- <div class="form-check mb-0">
                        <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                        <label class="form-check-label" for="form2Example3">
                            Remember me
                        </label>
                        </div>
                        <a href="#!" class="text-body">Forgot password?</a> -->
                    <!-- </div> -->

                    <div class="text-center mt-4 pt-2 login">
                        <button type="submit" class="btn btn-info btn-lg" name="login" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="register.php"
                            class="link-danger">Register</a></p>
                    </div>

                </form>
            </div>
            </div>
        </div>
        
    </section>
</body>
</html>