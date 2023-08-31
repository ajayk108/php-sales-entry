<?php
require_once('./config/checkSession.php');
require_once('./config/config.php');

$stmt = $conn->prepare("SELECT * FROM items");
$stmt->execute();
$result = $stmt->get_result();
$allData = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();

$id = $_GET['id'];

$stmt1 = $conn->prepare("SELECT * FROM items WHERE id=$id");
$stmt1->execute();
$result1 = $stmt1->get_result();
$allData1 = $result1->fetch_all(MYSQLI_ASSOC);
$stmt1->close();



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/sidebar.css">

  <title>Sales Entry</title>
</head>

<body id="body-pd" class="body-pd bg-light">
  <?php $page = 'addItems';
  include './common/sidebar.php'; ?>

  <div class="main p-3">

    <h3>Edit Items</h3>

    <div class="jumbotron jumbotron-fluid bg-white p-2">
      <div class="container">
        <h6 class="">Edit Entery</h6>
        <hr>
        <form action="./updateItem.php" method="post">
            <input type="hidden" value="<?php echo $id ?>" name="id">
            <?php
            foreach($allData1 as $row1){
            ?>
          <div class="row mt-4">
            <div class="col-4">
              <label for="item-code" class="mb-2">Item Code</label>
              <input type="text" class="form-control" name="itemCode" value="<?php echo $row1['code'] ?>">
            </div>
            <div class="col-4">
              <label for="item-name" class="mb-2">Item Name</label>
              <input type="text" class="form-control" name="itemName" value="<?php echo $row1['name'] ?>">
            </div>
            <div class="col-4">
              <label for="item-pirce" class="mb-2">Item Price</label>
              <input type="text" class="form-control" name="itemPrice" value="<?php echo $row1['price'] ?>">
            </div>
          </div>
          <div class="row mt-4">
            <div class="col-3 mb-3">
              <button class="btn btn-primary" name="btn-item" type="submit">Update Item</button>
            </div>
          </div>
          <?php
            }
            ?>
        </form>
        <a href="./addItems.php"><button class="btn btn-primary" >Go To AddItems</button></a> 
      </div>
    </div>

    <div class="jumbotron jumbotron-fluid bg-white p-2 mt-5">
      <div class="container">
        <h5>Data Table</h5>
        <hr>
        <table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" style="width:100%">
          <thead>
            <tr>
              <th>Sr.no</th>
              <th>Code</th>
              <th>Name</th>
              <th>Price</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
           <?php
           $count=0;
           foreach($allData as $row){
            $count++;
            ?>
            <tr>
              <td><?php echo $count; ?></td>
              <td><?php echo $row['code'];?></td>
              <td><?php echo $row['name'];?></td>
              <td><?php echo $row['price'];?></td>
              <td>
                <a href="./editItems.php?id=<?php echo $row['id']; ?>"><ion-icon name="create-outline"></ion-icon></a>
              </td>
           </tr>
            <?php
           }         
           ?>
          </tbody>
        </table>
      </div>
    </div>

  </div>




  <!-- ===== IONICONS ===== -->
  <script type="module" src="https://cdn.jsdelivr.net/npm/ionicons@5.5.3/dist/ionicons/ionicons.esm.js"></script>
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- DataTables CSS and JS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <!-- ===== MAIN JS ===== -->
  <script src="./js/home.js"></script>

  <script>
    $(document).ready(function() {
      $('#example').DataTable({
        pageLength: 10,
      });
    });
  </script>
</body>

</html>