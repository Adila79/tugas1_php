<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Penilaian Ujian</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 50px; background-color: #f4f4f9; }
        .container { max-width: 400px; background: white; padding: 20px; border-radius: 8px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="email"], input[type="number"] { width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; }
        button { background-color: #4CAF50; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; width: 100%; }
        button:hover { background-color: #45a049; }
        .result { margin-top: 20px; padding: 15px; background: #e7f4e8; border: 1px solid #d4edda; border-radius: 4px; }
        .remedial { background: #f8d7da; border-color: #f5c6cb; }
    </style>
</head>
<body>

<div class="container">
    <h2>Form Penilaian Ujian Siswa</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>
        </div>
        
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        
        <div class="form-group">
            <label for="nilai">Nilai Ujian:</label>
            <input type="number" id="nilai" name="nilai" min="0" max="100" required>
        </div>
        
        <button type="submit" name="submit">Proses Data</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        // Form Processing: Mengambil data dari inputan form
        $nama = htmlspecialchars($_POST['nama']);
        $email = htmlspecialchars($_POST['email']);
        $nilai = floatval($_POST['nilai']);

        // Struktur Kendali untuk menentukan status kelulusan
        if ($nilai > 70) {
            $status = "Lulus";
            $class = "result";
        } elseif ($nilai < 70) {
            $status = "Remedial";
            $class = "result remedial";
        } else {
            // Opsional: untuk nilai persis 70 (jika diperlukan kebijakan tambahan)
            $status = "Remedial / Batas Minimum";
            $class = "result remedial";
        }

        // Menampilkan output ke dalam halaman browser
        echo "<div class='$class'>";
        echo "<h3>Hasil Penilaian:</h3>";
        echo "<p><strong>Nama:</strong> $nama</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>Nilai Ujian:</strong> $nilai</p>";
        echo "<p><strong>Status:</strong> $status</p>";
        echo "</div>";
    }
    ?>
</div>

</body>
</html>