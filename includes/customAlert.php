<?php
$loginError = "";

if (isset($_GET['login']) && $_GET['login'] === 'required') {
    $loginError = "⚠️ Kindly login to continue.";
}
?>

<?php if (!empty($loginError)): ?>
    <div class="custom-alert" id="customAlert">
        <span><?= $loginError ?></span>
        <span class="close-alert" onclick="document.getElementById('customAlert').style.display='none';">&times;</span>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("customAlert").style.display = "block";
        });
    </script>
<?php endif; ?>