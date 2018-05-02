<!DOCTYPE html>
<html>
<head>
    <title></title>

    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style.css">

    <script type = 'text/javascript' src = "<?php echo base_url(); ?> js/load.js"></script>
    
    <script type="text/javascript" src="js/load.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://v4-alpha.getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

</head>
<body>
    
<!-- Include the above in your HEAD tag -->
    <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">GudangKompi</a>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href='<?php echo base_url('welcome/')?>'>Home <span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
    </nav>
<!--
    you can substitue the span of reauth email for a input with the email and
    include the remember me checkbox
    -->
    <div class="container">
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <h2 class="forgot-password" style="text-align: center;">Login Admin</h2>
            <br>
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="email" id="inputEmail" class="form-control" placeholder="Username" required autofocus>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
            </form><!-- /form -->
            <a href='<?php echo base_url('welcome/index')?>' class="forgot-password">
                Login sebagai User
            </a>
        </div><!-- /card-container -->
    </div><!-- /container -->
</body>
</html>