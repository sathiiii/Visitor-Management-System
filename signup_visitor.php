<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="img/visitor_icon.png">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/signup_style_visitor.css">
        <script src="scripts/signup_visitor.js"></script>
        <script src="scripts/jquery.js"></script>
        <title>Sign up</title>
    </head>
    <body style="background-image: url(img/undraw_product_tour_blue.svg); background-size: 800px; background-repeat: no-repeat; background-position-y: 12vmax; background-position-x: 50px;">
        <header>
            <div class="navbar">
                <a href="#">About Us</a>
                <a href="login_guest.html" class="signin-btn" id="signin">Sign In</a>
                <a href="login_admin.html" id="admin-signin">Sign In as Administrator</a>
            </div>
        </header>
        <div class="container">
            <div class="logo-container">
                <p><b>Sign up</b> and be a</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="381.933" height="60.36" viewBox="0 0 381.933 60.36"><defs><style>.a{fill:#646d82;}</style></defs><path class="a" d="M37.991,38.971,60.473-19.378H46.3L30.205,25.5,14.022-19.378H-.15L22.42,38.971Zm49.076,0V-19.378H74.644V38.971Zm41.028,1.05c15.746,0,23.357-8.048,23.357-18.72,0-21.782-33.5-15.571-33.5-24.844,0-3.5,2.974-5.861,8.31-5.861a25.063,25.063,0,0,1,16.971,6.386l6.911-9.1c-5.774-5.336-13.472-8.136-22.744-8.136-13.734,0-22.132,8.048-22.132,17.758,0,21.957,33.592,14.871,33.592,25.194,0,3.324-3.324,6.473-10.148,6.473A25.582,25.582,0,0,1,110.161,21.3l-6.736,9.448C108.849,36.259,116.9,40.02,128.094,40.02Zm52.925-1.05V-19.378H168.6V38.971Zm46.276,0V-8.443h16.971V-19.378H197.727V-8.443h17.058V38.971Zm59.223,1.05c17.671,0,30.53-12.6,30.53-30.18s-12.859-30.18-30.53-30.18c-17.583,0-30.443,12.6-30.443,30.18S268.935,40.02,286.518,40.02Zm0-11.022c-10.76,0-17.671-8.31-17.671-19.158,0-10.935,6.911-19.158,17.671-19.158S304.276-1.095,304.276,9.84C304.276,20.688,297.278,29,286.518,29Zm95.264,9.973-13.122-22.22c6.3-1.487,12.772-7,12.772-17.321,0-10.847-7.436-18.808-19.6-18.808H334.544V38.971h12.422V18.238h9.1l11.46,20.732ZM360,7.3H346.966V-8.443H360c4.986,0,8.748,2.974,8.748,7.873S364.987,7.3,360,7.3Z" transform="translate(0.15 20.34)"/></svg>
            </div>
            <form id="signup-info" action="insert.php" method="POST">
                <div class="personal-info">
                    <p>Personal Information</p>
                    <div class="upload-profile-image">
                        <div class="text-center">
                            <div class="camera">
                                <svg class="camera-icon" enable-background="new 0 0 488.455 488.455" viewBox="0 0 488.455 488.455" width="512" xmlns="http://www.w3.org/2000/svg"><path d="m287.396 216.317c23.845 23.845 23.845 62.505 0 86.35s-62.505 23.845-86.35 0-23.845-62.505 0-86.35 62.505-23.845 86.35 0"/><path d="m427.397 91.581h-42.187l-30.544-61.059h-220.906l-30.515 61.089-42.127.075c-33.585.06-60.925 27.429-60.954 61.029l-.164 244.145c0 33.675 27.384 61.074 61.059 61.074h366.338c33.675 0 61.059-27.384 61.059-61.059v-244.236c-.001-33.674-27.385-61.058-61.059-61.058zm-183.177 290.029c-67.335 0-122.118-54.783-122.118-122.118s54.783-122.118 122.118-122.118 122.118 54.783 122.118 122.118-54.783 122.118-122.118 122.118z"/></svg>
                            </div>
                            <img id="profile-picture" src="img/profile_pic.svg" alt="" style="width: 150px; height: 150px;">
                            <small class="form-text">Choose Image</small>
                            <input type="file" class="form-control-file" name="profile-upload" id="upload-profile" accept="image/*" onchange="displayImage(this)">
                        </div>
                    </div>
                    <div class="info">
                        <div class="textbox firstname">
                            <input type="text" id="firstname" name="firstname" onkeyup="validate(this)" required>
                            <label for="firstname" class="label-name">
                                <span class="content-name">First Name</span>
                            </label>
                        </div>
                        <div class="textbox lastname">
                            <input type="text" id="lastname" name="lastname" onkeyup="validate(this)" required>
                            <label for="lastname" class="label-name">
                                <span class="content-name">Last Name</span>
                            </label>
                        </div>
                        <div class="textbox nic">
                            <input type="text" id="nic" name="nic" onkeyup="validate(this)" required>
                            <label for="nic" class="label-name">
                                <span class="content-name">National Identity Card</span>
                            </label>
                        </div>
                        <div class="textbox address">
                            <input type="text" id="address" name="address" onkeyup="validate(this)" required>
                            <label for="address" class="label-name">
                                <span class="content-name">Home Address</span>
                            </label>
                        </div>
                        <div class="email-container">
                            <div class="textbox email">
                                <input type="text" id="email" name="email" onkeyup="validate(this)" required>
                                <label for="email" class="label-name">
                                    <span class="content-name">Email</span>
                                </label>
                            </div>
                            <label id="email-availability"></label>
                        </div>
                        <div class="textbox phone">
                            <input type="text" id="phone" name="phone" onkeyup="validate(this)" required>
                            <label for="phone" class="label-name">
                                <span class="content-name">Phone</span>
                            </label>
                        </div>
                    </div>
                    <label id="warning-label"></label>
                    <a class="action-btn continue" href="#" id="continue" onclick="scrollUp()">Continue</a>
                </div>
                <div class="account">
                    <p>Account</p>
                    <div class="username-container">
                        <div class="textbox username">
                            <input type="text" id="username" onkeyup="check(this)" autocomplete="off" required>
                            <label for="username" class="label-name">
                                <span class="content-name">Username</span>
                            </label>
                        </div>
                        <label id="username-availability"></label>
                    </div>
                    <div class="password-confirmation">
                        <div class="textbox password">
                            <input type="password" id="password" onkeyup="validatePassword(this)" autocomplete="off" required>
                            <label for="password" class="label-name">
                                <span class="content-name">Password</span>
                            </label>
                        </div>
                        <div class="textbox password-confirm">
                            <input type="password" id="password-confirm" onkeyup="confirmPassword(this)" autocomplete="off" required>
                            <label for="password-confirm" class="label-name">
                                <span class="content-name">Confirm Password</span>
                            </label>
                        </div>
                    </div>
                    <a href="#" id="back" onclick="scrollDown()">&lt; Go Back</a>
                    <a class="action-btn signup-btn" href="#" id="signup-btn" onclick="submit()">Sign up</a>
                </div>
            </form>
        </div>
    </body>
</html>