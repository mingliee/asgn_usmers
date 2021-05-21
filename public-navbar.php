<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<nav class="navbar navbar-expand-lg fixed-top scrolling-navbar">
<div class="container">

<div class="navbar-header">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
<span class="lni-menu"></span>
<span class="lni-menu"></span>
<span class="lni-menu"></span>
</button>
<a href="welcome.php" class="navbar-brand"><img src="img/logo.png" id="usmers-logo" class="usmers-logo" alt="usmers-logo"></a>
</div>

<div class="collapse navbar-collapse" id="main-navbar">
<ul class="navbar-nav mr-auto">
<li class="nav-item">
<a class="nav-link" href="welcome/about.php">
About Us
</a>
</li>
<li class="nav-item">
<a class="nav-link" href="welcome/contact-us.php">
Contact Us
</a>
</li>
</ul>
</div>

<div  class="myAcc">
<ul class="sign-in">
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="lni-user"></i> My Account</a>
<div class="dropdown-menu">
<a class="dropdown-item " href="login.php"><i class="lni-lock"></i> Log In</a>
<a class="dropdown-item" href="signup.php"><i class="lni-user"></i> Signup</a>
<a class="dropdown-item " href="welcome/about.php"><i class="lni-home"></i> About</a>
<a class="dropdown-item " href="welcome/contact-us.php"><i class="lni-phone"></i> Contact Us</a>

</div>
</li>
</ul>
</div>

</div>
</div>
</nav>

<script>
$(function () { 
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) { 
            $('.navbar-header .navbar-brand img').attr('src','img/logo-p.png');
        }
        if ($(this).scrollTop() < 100) { 
            $('.navbar-header .navbar-brand img').attr('src','img/logo.png');
        }
    })
});

</script>