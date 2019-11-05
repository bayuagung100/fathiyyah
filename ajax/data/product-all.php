<?php
if(isset($_POST["limit"], $_POST["start"])){
    include "../../admin/config.php";
    echo '<div class="row">';

    $query = mysqli_query($mysqli, "SELECT * FROM product ORDER BY id DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]." ");
    while ($data = $query->fetch_array()) {
        $ip = $data['id'];
        $np = $data['nama_product'];
        $gp = $data['gambar'];
        $dp = $data['deskripsi'];
        $hp = $data['harga'];

        if ($gp) {
            $pic = "../media/source/" . $gp;
        } else {
            $pic = "../img/noimage.jpg";
        }

        echo '
        <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link"  href="' . $ip . '/detail/">
                <div class="portfolio-hover">
                    <div class="portfolio-hover-content">
                        <i class="fas fa-eye fa-3x"></i>
                    </div>
                </div>
                <img class="img-product-home" src="' . $pic . '" alt="' . $np . '">
            </a>
            <div class="portfolio-caption">
                <a href="' . $ip . '/detail/"><h3>' . $np . '</h3></a>
                <h6>' . rupiah($hp) . '</h6>
                <p class="text-muted">' . limit_words($dp, 10) . '</p>
            </div>
        </div>
        ';
    }

    echo '</div>';
}

?>