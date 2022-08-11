<?php

// menyambungkan/menghubungkan index dengan controller customer
require_once '../Barang/model/customersModel.php';

// mnencetak informasi objek customer 
$customerObj = new CustomersModel();

// jika objek edit customer tersedia makan akan di validasi melalui variabel editid dan dicetak lewat objek customer 
if (isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $customer = $customerObj->displyaRecordById($editId);
}

// jika objek customer tersedia maka akan diupdate
if (isset($_POST['update'])) {
    $customerObj->updateRecord($_POST);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Latihan OOP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
</head>

<body>

    <div class="card text-center" style="padding:15px;">
        <h4>Update Data</h4>
    </div><br>

    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <div class="card">
                    <div class="card-header bg-white">
                        <h4 class="text-dark">Update Datanya DEK</h4>
                    </div>
                    <div class="card-body bg-light">
                        <form action="edit.php" method="POST">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" name="name" value="<?php echo $customer['name']; ?>" required="">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" value="<?php echo $customer['email']; ?>" required="">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat:</label>
                                <input type="text" class="form-control" name="alamat" value="<?php echo $customer['alamat']; ?>" required="">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?php echo $customer['id']; ?>">
                                <input type="submit" name="update" class="btn btn-primary" style="float:right;" value="Update">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>