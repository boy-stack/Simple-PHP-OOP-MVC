<?php

class benmodel
{

    public $hostname = "localhost";
    public $username = "root";
    public $password = "";
    public $database = "latihan";
    public $koneksi = "";


    public function __construct()
    {
        $this->koneksi = new mysqli($this->hostname, $this->username, $this->password, $this->database);
        if (mysqli_connect_error()) {
            trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
        } else {
            return $this->koneksi;
        }
    }



    public function insertdata($post)
    {

        $nama = $this->koneksi->real_escape_string($post['nama']);
        $email = $this->koneksi->real_escape_string($post['email']);
        $query = "INSERT INTO tabel(nama,email) VALUES('$nama','$email')";
        $sql = $this->koneksi->query($query);
        if ($sql == true) {
            header("location:index.php?msg1=insert");
        } else {
            echo "Masukan Data Gagal";
        }
    }


    public function displayData()
    {
        $query = "SELECT * FROM tabel";
        $result = $this->koneksi->query($query);
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            echo "Yakin Ketemu Datanya Dek?";
        }
    }


    public function displayRecordByid($id)
    {
        $query = "SELECT * FROM tabel WHERE id = '$id'";
        $result = $this->koneksi->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        } else {
            echo "Data Tidak Di Temukan";
        }
    }



    public function update($postData)
    {
        $nama = $this->koneksi->real_escape_string($_POST['nama']);
        $email = $this->koneksi->real_escape_string($_POST['email']);
        $id = $this->koneksi->real_escape_string($_POST['id']);

        if (!empty($id) && !empty($postData)) {
            $query = "UPDATE tabel SET nama = '$nama', email = '$email' WHERE id = '$id'";
            $sql = $this->koneksi->query($query);
            if ($sql == true) {
                header("location:index.php?msg2=update");
            } else {
                echo "Update Data Gagal";
            }
        }
    }


    public function delete($id)
    {
        $query = "DELETE FROM tabel WHERE id = '$id'";
        $sql = $this->koneksi->query($query);
        if ($sql == true) {
            header("location:index.php?msg3=delete");
        } else {
            echo "Data Tidak Berhasil Di Hapus";
        }
    }
}
