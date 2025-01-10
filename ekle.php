<?php
include("baglanti.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isbn = trim($_POST["isbn"]);
    $kitap_adi = trim($_POST["kitap_adi"]);
    $basim_yili = trim($_POST["basim_yili"]);
    $yazar = trim($_POST["yazar"]);
    $kategori = trim($_POST["kategori"]);

    $sql = "INSERT INTO kitaplar (isbn, kitap_adi, basim_yili, yazar, kategori) VALUES (?, ?, ?, ?, ?)";
    $stmt = $baglanti->prepare($sql);
    $stmt->bind_param("ssiss", $isbn, $kitap_adi, $basim_yili, $yazar, $kategori);

    if ($stmt->execute()) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Hata: " . $baglanti->error;
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kitap Ekle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container mt-5">
        <h1>Yeni Kitap Ekle</h1>
        <form method="POST">
            <div class="mb-3">
                <label for="isbn" class="form-label">ISBN</label>
                <input type="text" class="form-control" id="isbn" name="isbn" required>
            </div>
            <div class="mb-3">
                <label for="kitap_adi" class="form-label">Kitap Adı</label>
                <input type="text" class="form-control" id="kitap_adi" name="kitap_adi" required>
            </div>
            <div class="mb-3">
                <label for="basim_yili" class="form-label">Baskı Yılı</label>
                <input type="number" class="form-control" id="basim_yili" name="basim_yili" required>
            </div>
            <div class="mb-3">
                <label for="yazar" class="form-label">Yazar</label>
                <input type="text" class="form-control" id="yazar" name="yazar" required>
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <input type="text" class="form-control" id="kategori" name="kategori" required>
            </div>
            <button type="submit" class="btn btn-primary">Kaydet</button>
            <a href="admin.php" class="btn btn-secondary">İptal</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>