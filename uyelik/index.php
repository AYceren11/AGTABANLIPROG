<?php
include("baglanti.php");

// Yorum gönderme işlemi
if (isset($_POST["kayit"])) {
    $name = $_POST["kullanici_adi"];
    $email = $_POST["email"];
    $comment = $_POST["yorum"];

    $ekle = "INSERT INTO kullanicilar (kullanici_adi, email, yorum) VALUES ('$name', '$email', '$comment')";
    $calistirekle = mysqli_query($baglanti, $ekle);

    if ($calistirekle) {
        echo '<div class="alert alert-success" role="alert">
        YORUMUN BAŞARILI BİR ŞEKİLDE KAYDEDİLDİ!
        </div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">
        HATA! YORUMUN KAYDEDİLEMEDİ!
        </div>';
    }
}

// Yorumları çekmek için SQL sorgusu
$yorumlari_cek = "SELECT kullanici_adi, yorum, email FROM kullanicilar ORDER BY id DESC";
$yorum_sonuc = mysqli_query($baglanti, $yorumlari_cek);
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>CERENS BLOG-Anasayfa</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header class="adim">
        <div class="title-container">
            <h1 class="title">Ayşe Ceren Şenel</h1>
        </div>
        <nav class="navigation">
            <button onclick="location.href='index.php'">Anasayfa</button>
            <button onclick="location.href='önceki.html'">Önceki Yazılar</button>
            <button onclick="location.href='hayatım.html'">Hayatım</button>
            <button onclick="location.href='müzik.html'">Müzik</button>
            <button onclick="location.href='ara.html'">Ara</button>
        </nav>
    </header>

    <main class="content">
        <section class="left">
            <h2 class="posts-title">Sıcaklar</h2>
            <div class="posts">
                <a href="yazı1.html" class="post-link">
                <div class="post">
                    <img src="lindy.jpg">
                    <h3>Başlık 1</h3>
                    <p>Bu yazının ilk üç cümlesi buraya gelir. Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                    <span>5.11.2024</span>
                </div>
                </a>
                <a href="yazı2.html" class="post-link">
                <div class="post">
                    <img src="latin.jpg">
                    <h3>Başlık 2</h3>
                    <p>Bu yazının ilk üç cümlesi buraya gelir. Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                    <span>4.11.2024</span>
                </div>
                </a>
                <a href="yazı3.html" class="post-link">
                <div class="post">
                    <img src="books.jpg">
                    <h3>Başlık 3</h3>
                    <p>Bu yazının ilk üç cümlesi buraya gelir. Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                    <span>3.11.2024</span>
                </div>
                </a>
            </div>
        </section>

        <section class="right">
            <img src="ben.jpeg" class="profile-pic">
            <h3>Hakkımda</h3>
            <br>
            <p><b>İletişim bilgileri<b/></p>
            <ul class="contact-info">
                <li><strong>Telefon:</strong> +90 538 676 08 16</li>
                <br>
                <li><strong>Mail:</strong> drayceren@gmail.com</li></a>
                <br>
                <li><strong>Instagram:</strong> @ay_ceren_11</li>
            </ul>
        </section>
    </main>
    <section class="comments-section">
        <h2 class="comments-title">YORUMLAR</h2>
        <?php
        if (mysqli_num_rows($yorum_sonuc) > 0) {
            while ($satir = mysqli_fetch_assoc($yorum_sonuc)) {
                echo '<div class="comment">';
                echo '<div class="comment-content">';
                echo '<h3>' . $satir["kullanici_adi"] . '</h3>';
                echo '<p>' . $satir["yorum"] . '</p>';
                echo '</div>';
                echo '</div>';
            }
        } 
        ?>
        <form action="index.php" method="POST" class="form-section">
            <h2>Yorum Yap</h2>
            <label for="name">İsim:</label>
            <input type="text" id="name" name="kullanici_adi" placeholder="İsminizi girin" required>
            <br>
            <label for="email">E-posta:</label>
            <input type="email" id="email" name="email" placeholder="E-posta adresinizi girin" required>
            <br>
            <label for="comment">Yorumunuz:</label>
            <textarea id="comment" name="yorum" rows="3" placeholder="Yorumunuzu yazın" required></textarea>
            <br>
            <button type="submit" name="kayit">GÖNDER</button>
        </form>
    </section>
</body>
</html>

<?php
// Bağlantıyu kapat
mysqli_close($baglanti);
?>
