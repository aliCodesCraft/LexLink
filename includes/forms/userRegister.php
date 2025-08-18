<!-- Register Form Logic Included -->
 
<?php 
include_once("includes/config/config.php");
include_once("includes/handlers/registerForm_handler.php"); ?>
<!-- Register Form Logic Included -->


<!-- Form Container Modal -->
<div class="blur-form-background" id="user-register-form">
    <div class="blur-close-btn">
        <i class="ri-close-line" style="background-color: #0A2342; padding:5px; border-radius:50%;"></i>
    </div>

    <div class="blur-wrapper">

        <form class="blur-form-container" method="POST">
            <h2>Register</h2>

            <!-- Error Messege -->
            <?php if (!empty($error)): ?>
                <div style="color: red; text-align:center; margin-bottom: 10px;">
                    <?= $error ?>
                </div>
            <?php endif; ?>

            <!-- Success Messege -->
            <?php if (!empty($success)): ?>
                <div style="color: green; text-align:center; margin-bottom: 10px;">
                    <?= $success ?>
                </div>
            <?php endif; ?>

            <div class="blur-input-group">
                <i class="ri-user-line"></i>
                <input type="text" placeholder="Your Name" required name="name" />
            </div>

            <div class="blur-input-group">
                <i class="ri-mail-line"></i>
                <input type="email" placeholder="Your Email" required name="email" />
            </div>

            <div class="blur-input-group">
                <i class="ri-lock-2-line"></i>
                <input type="password" placeholder="Your Password" required name="password" />
            </div>

            <div class="blur-input-group">
                <i class="ri-lock-2-line"></i>
                <input type="password" placeholder="Confirm Password" required name="confirmpassword" />
            </div>

            <input type="submit" value="Register" class="blur-btn" name="btnUserRegister" />

            <p style="text-align: center; margin-top: 15px; font-size: 0.95rem;">
                Already have an account?
                <a href="#" style="color: gold; text-decoration: underline; font-weight: 500;" class="userLogin">Login Now</a>
            </p>
        </form>
    </div>
</div>


<!-- Show Form Modal On Error -->
<?php if (!empty($error)): ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('user-register-form').style.display = 'block';
        });
    </script>
<?php endif; ?>

<!-- Show Form Modal On Sucess -->
<?php if (isset($showLogin) && $showLogin === true): ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('user-register-form').style.display = 'block';

            // Switch Register Modal to Login Modal After Sucess
            setTimeout(function() {
                document.getElementById('user-register-form').style.display = 'none';
                document.getElementById('user-login-form').style.display = 'block';
            }, 1500);
        });
    </script>
<?php endif; ?>