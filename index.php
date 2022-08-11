<?php

// menyambungkan/menghubungkan index dengan controller customer
require_once '../Barang/model/customersModel.php';

// mnencetak informasi objek customer 
$customerObj = new CustomersModel();

// jika id customer ada akan dihapus melalui id 
if (isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
    $deleteId = $_GET['deleteId'];
    $customerObj->deleteRecord($deleteId);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Latihan PHP OOP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
</head>

<body>
    <div class="card text-center" style="padding:15px;">
        <h4>Latihan OOP</h4>
    </div><br><br>
    <div class="container">
        <?php
        // pesan jika ada error atau regristrasi berhasil dan upadte juga delete
        if (isset($_GET['msg1']) == "insert") {
            echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>×</button>
              Registrasi Berhasil Mantab Sekali
            </div>";
        }
        if (isset($_GET['msg2']) == "update") {
            echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>×</button>
              Data Berhasil Di Update Mantabss voss
            </div>";
        }
        if (isset($_GET['msg3']) == "delete") {
            echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>×</button>
              Data Berhasil Di Hapus
            </div>";
        }
        ?>
        <h2>Latihan Saja<br>
            <a href="add.php" style="float:right;"><button class="btn btn-success"><i class="fas fa-plus"></i></button></a>
        </h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                // menampilkan objek data informasi customer
                $customers = $customerObj->displayData();
                foreach ($customers as $customer) {
                ?>
                    <tr>
                        <td><?php echo $customer['id'] ?></td>
                        <td><?php echo $customer['name'] ?></td>
                        <td><?php echo $customer['email'] ?></td>
                        <td><?php echo $customer['alamat'] ?></td>
                        <td>
                            <button class="btn btn-primary mr-2"><a href="edit.php?editId=<?php echo $customer['id'] ?>">
                                    <i class="fa fa-pencil text-white" aria-hidden="true"></i></a></button>
                            <button class="btn btn-danger"><a href="index.php?deleteId=<?php echo $customer['id'] ?>" onclick="return HapusData()">
                                    <i class="fa fa-trash text-white" aria-hidden="true"></i>
                                </a></button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script type="text/javascript">
        function HapusData() {
            var result = confirm("Yakin DEK?");
            if (result == true) {
                return true;
            } else {
                return false;
            }
        }
    </script>

</body>

</html>