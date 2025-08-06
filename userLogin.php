<?php include_once("includes/config.php"); ?>

<div class="blur-form-background" id="user-login-form">

    <div class="blur-close-btn">
        <i class="ri-close-line" style="background-color: #0A2342; padding:5px; border-radius:50%;"></i>
    </div>

    <div class="blur-wrapper">
        <form class="blur-form-container">
            <h2>Login</h2>

            <!-- Sucess msg from register form -->
            <?php if (!empty($success)): ?>
                <div style="color: green; text-align: center; margin-bottom: 10px;">
                    <?= $success ?>
                </div>
            <?php endif; ?>


            <div class="blur-input-group">
                <i class="ri-mail-line"></i>
                <input type="email" placeholder="Your Email" name="userloginmail" required />
            </div>

            <div class="blur-input-group">
                <i class="ri-lock-2-line"></i>
                <input type="password" placeholder="Your Password" name="userloginpassword" required />
            </div>

            <input type="submit" value="Login" class="blur-btn" name="btnUserLogin" />

            <p style="text-align: center; margin-top: 15px; font-size: 0.95rem;">
                Don't have an account?
                <a href="#" style="color: gold; text-decoration: underline; font-weight: 500;" id="" class="userRegister">Register Now</a>
            </p>
        </form>
    </div>
</div>