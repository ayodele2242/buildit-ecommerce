<?php
include("header.php");
?>
<style>
body, html{
    background:  #00ACEE;
}
</style>

<!-- App Capsule -->
<div id="appCapsule">

<div class="section mt-5 text-center">
    <h1>Log in</h1>
    <h4>Fill the form to log in</h4>
</div>
<div class="section mb-5 p-2">

    <form >
        <div class="cards">
            <div class="card-body pb-1">
                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="email1">E-mail</label>
                        <input type="email" class="form-control" id="email1" placeholder="Your e-mail">
                        <i class="clear-input"><ion-icon name="close-circle"></ion-icon></i>
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="password1">Password</label>
                        <input type="password" class="form-control" id="password1" placeholder="Your password">
                        <i class="clear-input"><ion-icon name="close-circle"></ion-icon></i>
                    </div>
                </div>
            </div>
        </div>


        <div class="form-links mt-2">
            <div>
                <a href="app-register.html">Register Now</a>
            </div>
            <div><a href="app-forgot-password.html" class="text-muted">Forgot Password?</a></div>
        </div>

        <div class="form-button-group  transparent">
            <button type="submit" class="btn btn-primary btn-block btn-lg">Log in</button>
        </div>

    </form>
</div>

</div>
<!-- * App Capsule -->


<?php
include("footer.php");
?>