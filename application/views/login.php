<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
     <!-- Owl-Carousel -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />

    <!-- Font Awesome CDN -->
    <script src="https://kit.fontawesome.com/23412c6a8d.js"></script>
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css"
    rel="stylesheet"
/>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/apexbpm.png">
    <title>HR System</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?php echo base_url(); ?>assets/css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');
    body{
        height: 100%;
        width:100%;
    }
    .login-block {
	background: #DE6262;
	/* fallback for old browsers */
	background: -webkit-linear-gradient(to left, #56CCF2, #2F80ED);
	/* Chrome 10-25, Safari 5.1-6 */
	background: linear-gradient(to left, #56CCF2, #2F80ED);
	/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
	float: left;
	width: 100%;
	padding: 50px 0;
    min-height: 100vh;
}

.banner-sec {
	/* background: url(https://static.pexels.com/photos/33972/pexels-photo.jpg) no-repeat left bottom; */
	background-size: cover;
	min-height: 500px;
	border-radius: 0 10px 10px 0;
	padding: 0;
}

.container {
	background: #fff;
	border-radius: 10px;
	box-shadow: 15px 20px 0px rgba(0, 0, 0, 0.1);
}

.carousel-inner {
	border-radius: 0 10px 10px 0;
}

.carousel-caption {
	text-align: left;
	left: 5%;
}

.login-sec {
	padding: 50px 30px;
	position: relative;
}

.login-sec .copy-text {
	position: absolute;
	width: 82%;
	bottom: 10px;
	font-size: 13px;
	text-align: center;
}

.login-sec .copy-text{
	color: #808080;
    font-weight: 500;
    font-family: 'poppins'
}

.login-sec .copy-text a {
	color: #303030;
    font-weight: 700;
    font-family: 'poppins'
}

.login-sec h2 {
	margin-bottom: 30px;
	font-weight: 800;
	font-size: 30px;
	color: #DE6262;
}

.login-sec h2:after {
	content: " ";
	width: 100px;
	height: 5px;
	background: #FEB58A;
	display: block;
	margin-top: 20px;
	border-radius: 3px;
	margin-left: auto;
	margin-right: auto
}



.banner-text {
	width: 70%;
	position: absolute;
	bottom: 40px;
	padding-left: 20px;
}

.banner-text h2 {
	color: #000;
	font-weight: 600;
}

.banner-text h2:after {
	content: " ";
	width: 100px;
	height: 5px;
	background: #FFF;
	display: block;
	margin-top: 20px;
	border-radius: 3px;
}

.banner-text p {
	color: #000;
}
.input-container {
    position: relative;
    }
    
    .ri-eye-line, .ri-eye-off-line{
        display: none;
        cursor: pointer;
    }
    .ri-lock-line{
        display:block;
    }
    .input-container input {
    padding-left: 30px; /* Adjust this value to match the size of your icon */
    margin-top: -50px;
    font-family: 'poppins';
    }

    .input-container i {
        position: absolute;
        top: 50%;
        right: 10px; /* Adjust this value to adjust the distance of the icon from the left edge */
        transform: translateY(-50%);
        }
      i{
            color: #aaa
        }
        .logo-login{
            margin-top: 140px;
             }
             .log{
                background-color:#3d9cdb;
                border:none;
                font-family: 'poppins';
                border-radius: 12px;
             }
             .log:hover{
                background-color:#247bec;
                border:none;
             }
             .log i{
               position: absolute; 
               right: 10px;
               color: #fff;
               font-size: 20px;
             }
             .demo{
                display:flex;
                justify-content:center;
             }
    </style>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
  
    <section class="login-block">
    <div class="container">
	<div class="row">
		<div class="col-md-4 login-sec">
		    <!-- <h2 class="text-center">Login Now</h2> -->
		    <form class="form-horizontal form-material" method="post" id="loginform" action="login/Login_Auth" style="margin-top:-220px;">
                    <a href="javascript:void(0)" class="text-center db" ><br/><img src="<?php echo base_url(); ?>assets/images/mh.png" width="170px" alt="Home" class="logo-login"/></a>
                    <div class="form-group m-t-10">
                    <div class="input-container">
                        <input class="form-control" name="email" value="<?php if(isset($_COOKIE['email'])) { echo $_COOKIE['email']; } ?>" type="text" required placeholder="Email">
                        <i class="ri-user-line"></i>
                    </div>


                    </div>
                    <div class="form-group m-t-10">
                        <div class="input-container">
                            <input class="form-control" type= "password" name="password" value="<?php if(isset($_COOKIE['password'])) { echo $_COOKIE['password']; } ?>" type="password" required placeholder="Password">
                            <i class="ri-lock-line"></i>
                            <i class="ri-eye-line"></i>
                        </div>
                    </div>                   
                    <div class="form-group text-center m-t-40">
                        <div class="col-xs-12">
                            <button class="btn btn-success btn-login btn-block text-uppercase waves-effect waves-light log" type="submit">Log In<i class="ri-arrow-right-line"></i></button>
                        </div>
                    </div>
                    <a class="demo" href="https://docs.google.com/document/d/1OpnHJl-fYI-Eoe52WnLECL30XJEBDr788nu853spnG4/edit?usp=drive_link" target='_blank'><p>Click here to know more</p></i></a>
                </form>
<div class="copy-text">© 2024 | Developed  
 By <a href="https://www.mountainhighsolutions.com/">MountainHigh Solutions</a></div>
		</div>
		<div class="col-md-8 banner-sec">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                 <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
            <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <img class="d-block img-fluid" src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <div class="banner-text">
            <h2>This is First Slide</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
        </div>	
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" src="https://images.pexels.com/photos/7097/people-coffee-tea-meeting.jpg" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
        <div class="banner-text">
            <h2>This is Second Slide</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
        </div>	
    </div>
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" src="https://static.pexels.com/photos/33972/pexels-photo.jpg" alt="Third slide">
      <div class="carousel-caption d-none d-md-block">
        <div class="banner-text">
            <h2>This is Heaven</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
        </div>	
    </div>
  </div>
            </div>	   
		    
		</div>
	</div>
</div>
</section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha256-pTxD+DSzIwmwhOqTFN+DB+nHjO4iAsbgfyFq5K5bcE0=" crossorigin="anonymous"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url(); ?>assets/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url(); ?>assets/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url(); ?>assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url(); ?>assets/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url(); ?>assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <script>
        $(document).ready(function () {

            $('.owl-carousel').owlCarousel({
                loop: true,
                autoplay: true,
                autoplayTimeout: 2000,
                autoplayHoverPause: true,
                items: 1
            });
        });

        $(document).ready(function() {
    // Listen for input event on the email input field
    $('input[name="email"]').on('input', function() {
        // Get the value of the email input field
        var emailValue = $(this).val();
        
        // Check if the email input field is not empty
        if (emailValue.trim() !== '') {
            // Change the color of the user icon and display the eye icon
            $('.ri-user-line').css('color', '#3d9cdb');
            
        } else {
            // If the email input field is empty, revert the color of the user icon and hide the eye icon
            $('.ri-user-line').css('color', '#ccc');
            $('.ri-eye-line').css('display', 'none');
        }
    });

    // Listen for input event on the password input field
    $('input[name="password"]').on('input', function() {
        // Get the value of the password input field
        var passwordValue = $(this).val();
        
        // Check if the password input field is not empty
        if (passwordValue.trim() !== '') {
            // Display the lock icon
            $('.ri-lock-line').css('display', 'none');
            $('.ri-eye-line').css('display', 'block');
            $('.ri-eye-line').css('color', '#3d9cdb');
        } else {
            // If the password input field is empty, hide the lock icon
            $('.ri-lock-line').css('display', 'block');
            $('.ri-eye-line').css('display', 'none');
        }
    });

    // Toggle password visibility when eye icon is clicked
    $('.ri-eye-line').on('click', function() {
        var passwordInput = $('input[name="password"]');
        var currentType = passwordInput.attr('type');
        var newType = currentType === 'password' ? 'text' : 'password';
        passwordInput.attr('type', newType);
        
        // Toggle eye icon class to change the icon
        if (newType === 'password') {
            $(this).removeClass('ri-eye-off-line');
            $(this).addClass('ri-eye-line');
        } else {
            $(this).removeClass('ri-eye-line');
            $(this).addClass('ri-eye-off-line');
        }
    });
});


       
    </script>
</body>


</html>
