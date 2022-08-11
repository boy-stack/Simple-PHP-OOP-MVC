<?php
// class berguna untuk mendeklarasikan isi objeck data customer / menyederhanakannya
class CustomersModel
{
    private $hostname = "localhost";
    private $username   = "root";
    private $password   = "";
    private $database   = "php_oop";
    public  $kon;

    // method yang otomatis berjalan saat objek dibuat -> koneksi ke database php oop  
    public function __construct()
    {
        $this->kon = new mysqli($this->hostname, $this->username, $this->password, $this->database);
        if (mysqli_connect_error()) {
            trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
        } else {
            return $this->kon;
        }
    }



    // Menginput Data Ke Tabel Customer dan Menyimpan Objeck nama, email dan alamat
    public function insertData($post)
    {
        $name = $this->kon->real_escape_string($_POST['name']);
        $email = $this->kon->real_escape_string($_POST['email']);
        $alamat = $this->kon->real_escape_string($_POST['alamat']);
        $query = "INSERT INTO customers(name,email,alamat) VALUES('$name','$email','$alamat')";
        $sql = $this->kon->query($query);
        if ($sql == true) {
            header("Location:index.php?msg1=insert");
        } else {
            echo "Masukan Data Gagal Coba Ulangi Lagi";
        }
    }
    // Memperoleh Informasi Data Customer
    public function displayData()
    {
        $query = "SELECT * FROM customers";
        $result = $this->kon->query($query);
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            echo "Data Tidak Ditemukan";
        }
    }
    // Memperoleh/Mencari Informasi Data Customer Melalui id Customer 
    public function displyaRecordById($id)
    {
        $query = "SELECT * FROM customers WHERE id = '$id'";
        $result = $this->kon->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        } else {
            echo "Data Tidak Di temukan";
        }
    }
    // Menyimpan Informasi Objeck Update Data Customer
    public function updateRecord($postData)
    {
        $name = $this->kon->real_escape_string($_POST['name']);
        $email = $this->kon->real_escape_string($_POST['email']);
        $alamat = $this->kon->real_escape_string($_POST['alamat']);
        $id = $this->kon->real_escape_string($_POST['id']);
        if (!empty($id) && !empty($postData)) {
            $query = "UPDATE customers SET name  = '$name', email = '$email', alamat = '$alamat' WHERE id = '$id'";
            $sql = $this->kon->query($query);
            if ($sql == true) {
                header("Location:index.php?msg2=update");
            } else {
                echo "Registrasi Gagal Coba Lagi";
            }
        }
    }
    // Menghapus Data Customer Melalui id Customer
    public function deleteRecord($id)
    {
        $query = "DELETE FROM customers WHERE id = '$id'";
        $sql = $this->kon->query($query);
        if ($sql == true) {
            header("Location:index.php?msg3=delete");
        } else {
            echo "Data Tidak Berhasil Di Hapus";
        }
    }
}
