<?php
session_start();
include "admin/config.php";
if (isset($_GET['register'])) {
    if (empty($_SESSION['user']) or empty($_SESSION['pass']) or $_SESSION['log'] == 0) {
        include 'website/header.php';
        ?>
        <section class="bg-light page-section">
            <div class="container">

                <div class="row" style="padding: 20px">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <h3 class="text-center"><b>Register</b></h3>
                            <hr>
                            <form method="post" action="<?php echo $set['url']; ?>auth/">
                                <input type="hidden" name="oauth" value="daftar">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="username">Username</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" id="username" name="username" placeholder="Username" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="password">Password</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="password" id="password" name="password" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="rpt-password">Repeat Password</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="password" id="rpt-password" name="rpt-password" placeholder="Repeat-Password" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="fullname">Name</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" id="fullname" name="fullname" placeholder="Full Name" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="email">Email</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" id="email" name="email" placeholder="name@example.com" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="hp">Phone</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" id="hp" name="hp" placeholder="08xxxxxxxxxx" required>
                                    </div>
                                </div>
                                <br>
                                <button type="submit" name="regist" class="btn btn-cart">Register</button>
                                <br>
                                <br>
                                <a href="<?php echo $set['url']; ?>auth/?login">Already have an account? Login! </a>
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
            include 'website/footer.php';
        } else {
            echo '
            <script>
                window.location = "' . $set['url'] . '";
            </script>
            ';
        }
        ?>
    <?php
    } elseif (isset($_GET['login'])) {
        if (empty($_SESSION['user']) or empty($_SESSION['pass']) or $_SESSION['log'] == 0) {
            include 'website/header.php'; ?>
        <section class="bg-light page-section">
            <div class="container">

                <div class="row" style="padding: 20px">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <h3 class="text-center"><b>Login</b></h3>
                            <hr>
                            <form action="<?php echo $set['url']; ?>auth/" method="post">
                                <input type="hidden" name="oauth" value="login">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="fullname">Username</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" id="username" name="username" placeholder="Username/Email" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="password">Password</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="password" id="password" name="password" placeholder="Password" required>
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-cart">Login</button>
                                <br>
                                <br>
                                <a href="<?php echo $set['url']; ?>forgot-password/">Forgot Password?</a>
                                |
                                <a href="<?php echo $set['url']; ?>auth/?register">Create an Account!</a>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-2">
                    </div>

                </div>

            </div>
        </section>
    <?php
            include 'website/footer.php';
        } else {
            echo '
            <script>
                window.location = "' . $set['url'] . '";
            </script>
            ';
        }
        ?>
<?php
} elseif (isset($_POST['oauth']) == "daftar") { } elseif (isset($_POST['oauth']) == "login") {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $cekuser = $mysqli->query("SELECT * FROM user_shop WHERE username='$username' OR email='$username' AND password='$password'");
    $jmluser = $cekuser->num_rows;
    $data = $cekuser->fetch_array();

    if ($jmluser > 0) {
        $_SESSION['id']       = $data['id'];
        $_SESSION['user']     = $data['username'];
        $_SESSION['pass']  = $data['password'];
        $_SESSION['nama']     = $data['nama'];
        $_SESSION['email']       = $data['email'];
        $_SESSION['hp']    = $data['hp'];
        $_SESSION['provinsi']    = $data['provinsi'];
        $_SESSION['city']    = $data['city'];
        $_SESSION['kecamatan']    = $data['kecamatan'];
        $_SESSION['pos']    = $data['pos'];
        $_SESSION['alamat']    = $data['alamat'];


        $_SESSION['log'] = 1;

        echo '
            <script>
            alert("Login Success"); 
            window.location = "' . $set['url'] . '";
            </script>
            ';
    } else {
        echo '
            <script>
            window.location = "' . $set['url'] . 'login/?pesan=gagal";
            </script>
            ';
    }
} else {
    echo '
		<script>
        window.location = "' . $set['url'] . 'auth/?login";
        </script>
        ';
}
?>