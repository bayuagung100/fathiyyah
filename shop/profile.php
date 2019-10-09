<?php
session_start();
include '../admin/config.php';
include '../website/header.php';
?>

<section class="bg-light page-section" id="category">
    <div class="container">

        <div class="row" style="padding: 20px">
            <div class="col-md-12 text-center" style="padding: 20px">
                <ul class="breadcrumb">
                    <li><a href="<?php echo $set["url"]; ?>">Home</a></li>
                    <li class="active">Profile</li>
                </ul>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6" style="margin-bottom: 10px">
                        <div class="card">
                            <h3>Profile Information</h3>
                            <hr>
                            <?php
                            if(isset($_POST['update'])){
                            $username = $_POST['username'];
                            $nama = $_POST['nama'];
                            $email = $_POST['email'];
                            $hp = $_POST['hp'];
                            $city = $_POST['city'];
                            $pos = $_POST['pos'];
                            $alamat = $_POST['alamat'];

                                    $upuser = mysqli_query($mysqli, " UPDATE user_shop SET
                                    username='$username',
                                    nama='$nama',
                                    email='$email',
                                    hp='$hp',
                                    city='$city',
                                    pos='$pos',
                                    alamat='$alamat'
                                    WHERE id='$_SESSION[id]' 
                                    ");

                                    $_SESSION['user']     = $username;
                                    $_SESSION['nama']     = $nama;
                                    $_SESSION['email']       = $email;
                                    $_SESSION['hp']    = $hp;
                                    $_SESSION['city']    = $city;
                                    $_SESSION['pos']    = $pos;
                                    $_SESSION['alamat']    = $alamat;
                                    if ($upuser) {
                                        echo"<script>window.alert('Update Profile Success')</script>";
                                    }else {
                                        echo"<script>window.alert('Update Profile Gagal')</script>";
                                    }
                            }
                            ?>
                            <form method="post" class="container" action="" enctype="multipart/form-data">
                                <?php 
                                    $query = $mysqli->query("SELECT * FROM user_shop WHERE id='$_SESSION[id]' ");
                                    $data=$query->fetch_array();
                                ?>
                                <label for="username"><b>Username</b></label>
                                <input type="text" id="username" name="username" value="<?php echo $data['username'];?>" required>
                                <br>
                                <label for="nama"><b>Nama</b></label>
                                <input type="text" id="nama" name="nama" value="<?php echo $data['nama'];?>" required>
                                <br>
                                <label for="email"><b>Email</b></label>
                                <input type="text" id="email" name="email" value="<?php echo $data['email'];?>" required>
                                <br>
                                <label for="hp"><b>Phone</b></label>
                                <input type="text" id="hp" name="hp" value="<?php echo $data['hp'];?>" required>
                                <br>
                                <label for="city"><b>Kota</b></label>
                                <input type="text" id="city" name="city" value="<?php echo $data['city'];?>" required>
                                <label for="pos"><b>Kode Pos</b></label>
                                <input type="text" id="pos" name="pos" value="<?php echo $data['pos'];?>" required>
                                <br>
                                <label for="alamat"><b>Alamat</b></label>
                                <textarea id="alamat" name="alamat" style="height:200px" required><?php echo $data['alamat'];?></textarea>
                                <br>
                                <br>
                                <button type="submit" name="update" class="btn btn-cart">Update Profile</button>
                                <br>
                                <br>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <h3>Change Password</h3>
                            <hr>
                            <?php
                            if(isset($_POST['change'])){
                            $newpassword = $_POST['new-password'];
                            $confirmpassword = $_POST['confirm-password'];
                            $passwordmd5 = md5($_POST['new-password']);
                                if ($confirmpassword != $newpassword) {
                                    echo'<div class="alert alert-danger" role="alert"><b>Sorry!</b> Password tidak sama.</div>';
                                }else {
                                    $insuser = mysqli_query($mysqli, " UPDATE user_shop SET
                                    password='$passwordmd5'
                                    WHERE id='$_SESSION[id]' 
                                    ");
                                    $_SESSION['pass']  = $passwordmd5;
                                    if ($insuser) {
                                        echo"<script>window.alert('Change Password Success')</script>";
                                    }else {
                                        echo"<script>window.alert('Change Password Gagal')</script>";
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
                                <button type="submit" name="change" class="btn btn-cart">Change Password</button>
                                <br>
                                <br>
                            </form>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</section>
<?php
include '../website/footer.php';
?>