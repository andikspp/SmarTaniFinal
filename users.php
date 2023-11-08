<!DOCTYPE html>
<html>
<head>
    <title>Data Pengguna</title>
    <style>
        h1 {
            text-align: center;
        }

        /* Gaya untuk judul tabel */
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Gaya untuk tombol Insert */
        .insert-button {
            display: block;
            width: 120px;
            margin: 10px 0; /* Mengatur margin atas dan bawah menjadi 10px, menghilangkan margin kiri dan kanan */
            padding: 10px;
            text-align: center;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .insert-button:hover {
            background-color: #0056b3;
        }

        /* Gaya untuk tombol Edit */
        .edit-button {
            display: inline-block; 
            padding: 10px;
            text-align: center;
            background-color: #28a745; 
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 5px; 
        }

        .edit-button:hover {
            background-color: #1e7e34; /* Warna hijau yang lebih gelap saat hover */
        }

         /* Gaya untuk tombol Delete */
         .delete-button {
            display: inline-block;
            padding: 10px;
            text-align: center;
            background-color: #dc3545; /* Warna merah untuk tombol Delete */
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .delete-button:hover {
            background-color: #c82333; /* Warna merah yang lebih gelap saat hover */
        }

        
    </style>
</head>
<body>
    <h1>Data Pengguna SmarTani</h1>

    <?php
    // Mengatur koneksi ke database MySQL
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "smartani"; 

    // Membuat koneksi
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Memeriksa koneksi
    if ($conn->connect_error) {
        die("Koneksi database gagal: " . $conn->connect_error);
    }

    // Query untuk mengambil data dari tabel users
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Nama Pengguna</th>
                    <th>Email</th>
                    <th>Kota</th>
                    <th>Aksi</th>
                </tr>";
        // Output data dari setiap baris hasil query
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["username"] . "</td>
                    <td>" . $row["nama_pengguna"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["kota"] . "</td>
                    <td>
                        <a class='edit-button' href='edit.php?id=" . $row["id"] . "'>Edit</a>
                        <a class='delete-button' href='delete.php?id=" . $row["id"] . "'>Delete</a>
                    </td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "Tidak ada data dalam tabel.";
    }

    // Menutup koneksi database
    $conn->close();
    ?>
    <a class="insert-button" href="formInsert.php">Insert</a>
</body>
</html>
