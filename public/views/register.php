<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./public/css/loginsites.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&family=Roboto:wght@100&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400&family=Roboto:wght@100&display=swap" rel="stylesheet">

        <title> Register </title>
    </head>

    <body>
        <div class="container">

            <div class="top-bar">
            </div>
            <div class="left-bar">
            </div>
            
            <div class="content">
                <div class="logo">
                    <img src="public/img/logo.svg">
                </div>
                <div class="welcome-text">
                    <h1>Register</h1>
                    <h5>Hello there! Please enter your details.</h5>
                </div>

                <div class="login-container">
                    <form action="login" method="POST">
                        <div class = "messages">
                            <?php
                                if(isset($messages)){
                                    foreach($messages as $message) {
                                        echo $message;
                                    }
                                }
                            ?>
                        </div>
                        <p>Username</p>
                        <input name="username" type="text" placeholder="Enter your username">
                        <p>Email</p>
                        <input name="email" type="text" placeholder="Enter your email">
                        <p>Password</p>
                        <input name="password" type="password" placeholder="**********">
                        <p>Repeat password</p>
                        <input name="confirmedPassword" type="password" placeholder="**********">
                        <button class="sign-up-button" type="submit">Sign up</button>
                    </form>
                </div>
            </div>
            
            <div class="bottom-bar">
            </div>

            </div>
        </div>
    </body>    
</html>