<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Zoyo Management Login</title>
    <style>
       body{
    height: 100vh;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(0, 0, 0, 0.1);
}

.login-form{
    border: 1px solid rgba(0, 0, 0, 0.1);
    align-items: center;
    text-align: center;
    padding: 5% 0;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    background: #fff;
}

.login-form a{
    margin-top: 15px;
    margin-left: 5px;
    margin-right: 5px;
    background: rgb(253, 55, 88);
    color: white;
}

.login-form a:hover{
    color: rgb(253, 55, 88);
    background: rgb(0, 0, 0);
}

.login-form .heading h2{
font-size: 28px;
font-weight: 600;
color: rgb(253, 55, 88);
}
    </style>
  </head>
  <body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-12">
                <div class="login-form">
                  <div class="heading mb-4">
                    <h2>Zoyo Management Login</h2>
                  </div>
                    <div class="form-group">
                      <a href="login.php?admin=superadmin" class="btn">Super Admin</a>
                      <a href="login.php?admin=graphic" class="btn">Graphic Designer</a>
                      <a href="login.php?admin=assistant" class="btn">Asst. Graphic Designer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>