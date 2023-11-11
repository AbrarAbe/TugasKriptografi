<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pengirim Pesan WA Terenkripsi Caesar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Form Pesan Enkripsi Caesar</h2>
  <form method="post">
   <div class="input-group mb-3">
    <span class="input-group-text">No. HP WA: </span>
    <input type="text" class="form-control">
   </div>
   <div class="input-group mb-3">
    <span class="input-group-text">Pesan yang akan dikirim : </span>
    <textarea class="form-control" rows="5" id="pesan" name="pesan"></textarea>
   </div>
   <button type="submit" class="btn btn-primary" name="bEncode">Ekripsi Pesannya</button>
  </form>

<?php
function caesarCipher($text, $shift) {
    $result = "";

    for ($i = 0; $i < strlen($text); $i++) {
        $char = $text[$i];

        if (ctype_alpha($char)) {
            $asciiStart = (ctype_upper($char)) ? 65 : 97;
            $result .= chr(($asciiStart + ord($char) + $shift) % 26 + $asciiStart);
        } else {
            $result .= $char;
        }
    }

    return $result;
}

if (isset($_POST['bEncode'])) {
    $pesan = $_POST['pesan'];
    $shift = 3; // Ganti sesuai dengan jumlah shift yang diinginkan

    $pesanEnkripsi = caesarCipher($pesan, $shift);

    echo $pesanEnkripsi;
    echo '<a href="https://api.whatsapp.com/send?text='.$pesanEnkripsi.'" class="btn btn-success">Kirim ke WA</a>';
}
?>

</div>
</body>
</html>
