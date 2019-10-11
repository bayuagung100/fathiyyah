<?php
session_start();
include '../admin/config.php';
if (isset($_GET['email'])) {
    include '../website/header.php';
    ?>
    <section class="bg-light page-section" id="category">
        <div class="container">
            <div class="row" style="padding: 20px">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <h3 class="text-center"><b>Change Password</b></h3>
                        <hr>
                        <?php
                            if (isset($_POST['new'])) {
                                $newpassword = $_POST['new-password'];
                                $confirmpassword = $_POST['confirm-password'];
                                $passwordmd5 = md5($_POST['new-password']);
                                if ($confirmpassword != $newpassword) {
                                    echo '<div class="alert alert-danger" role="alert"><b>Sorry!</b> Password tidak sama.</div>';
                                } else {
                                    $cekuser = $mysqli->query("SELECT * FROM user_shop WHERE email='$_GET[email]'");
                                    $jmluser = $cekuser->num_rows;
                                    $data = $cekuser->fetch_array();

                                    if ($jmluser > 0) {
                                        $insuser = mysqli_query($mysqli, " UPDATE user_shop SET
                                        password='$passwordmd5'
                                        WHERE email='$_GET[email]' 
                                        ");
                                        if ($insuser) {
                                            echo "<script>window.alert('Change Password Success');
		                                    window.location = '".$set['url']."';</script>";
                                        } else {
                                            echo '<script>window.alert("Link invalid/expired.\nSilahkan reset ulang password"); 
                                            window.location = "'.$set['url'].'";</script>';
                                        }
                                    }else {
                                        echo '<script>window.alert("Link invalid/expired.\nSilahkan reset ulang password"); 
                                        window.location = "'.$set['url'].'";</script>';
                                    }
                                    
                                }
                            }
                            ?>
                        <form method="post" class="container" action="" enctype="multipart/form-data">
                            <label for="new-password"><b>New Password</b></label>
                            <input type="password" id="new-password" name="new-password" required>
                            <span toggle="#new-password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            <br>
                            <label for="confirm-password"><b>Confirm Password</b></label>
                            <input type="password" id="confirm-password" name="confirm-password" required>
                            <span toggle="#confirm-password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            <br>

                            <br>
                            <br>
                            <button type="submit" name="new" class="btn btn-cart">Change Password</button>
                            <br>
                            <br>
                        </form>
                    </div>
                </div>
                <div class="col-md-2">
                </div>
            </div>

        </div>
        </div>
    </section>
<?php
    include '../website/footer.php';
} else {
    include '../website/header.php';
    ?>
    <section class="bg-light page-section" id="category">
        <div class="container">
            <div class="row" style="padding: 20px">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <h3 class="text-center"><b>Forgot Password</b></h3>
                        <hr>
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <i class='fas fa-lock' style='font-size:50px'></i>
                                    <h4>Forgot Your Password?</h4>
                                    <p>You can reset your password here.</p>
                                    <?php
                                        if (isset($_POST['forgot'])) {
                                            $email = $_POST['email'];
                                            $cekuser = $mysqli->query("SELECT * FROM user_shop WHERE email='$email' ");
                                            $jmluser = $cekuser->num_rows;
                                            $data = $cekuser->fetch_array();

                                            if ($jmluser > 0) {
                                                $email_address = strip_tags(htmlspecialchars($email));

                                                $to = $email;
                                                $email_subject = "Reset Password";
                                                $email_body = "Dear user,\n\n";
                                                $email_body .= "Click on the following link to reset your password.\n\n";
                                                $email_body .= "----------------------------------------------------------------------\n\n";
                                                $email_body .= "$set[url]forgot-password/?email=$email\n\n";
                                                $email_body .= "----------------------------------------------------------------------\n\n";
                                                $headers = "From: thefathiyyah@erolperkasamandiri.co.id\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                                                $headers .= "Reply-To: $email_address";
                                                mail($to, $email_subject, $email_body, $headers);
                                                echo '<div class="alert alert-success" role="alert">Silahkan cek email anda untuk reset password. pastikan cek di folder spam juga.</div>';
                                            } else {
                                                echo '<div class="alert alert-danger" role="alert"><b>Sorry!</b> Email yang anda masukkan belum terdaftar.</div>';
                                            }
                                        }
                                        ?>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" name="email" placeholder="Email" style="text-align:center" required>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" name="forgot" class="btn btn-cart">Reset My Password</button>
                                </div>
                                <div class="col-md-4">
                                </div>
                            </div>


                        </form>

                    </div>
                </div>
                <div class="col-md-2">
                </div>
            </div>

        </div>
        </div>
    </section>
<?php
    include '../website/footer.php';
}
?>