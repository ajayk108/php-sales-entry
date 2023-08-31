<?php
require_once('./config/checkSession.php');
require_once('./config/config.php');

$stmt = $conn->prepare("SELECT * FROM items");
$stmt->execute();
$result = $stmt->get_result();
$allData = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/sidebar.css">
  <style>
    a {
      text-decoration: none;
      color: black;
    }
  </style>

  <title>Sales Entry</title>
</head>

<body id="body-pd" class="body-pd bg-light">
  <?php $page = 'addItems';
  include './common/sidebar.php'; ?>
  <?php include './confirmModel.php'; ?>

  <div class="main p-3">

    <h3>Add Items</h3>

    <div class="jumbotron jumbotron-fluid bg-white p-2">
      <div class="container">
        <h6 class="">Item Entery</h6>
        <hr>
        <form action="./insertItems.php" method="post">
          <div class="row mt-4">
            <div class="col-4">
              <label for="code" class="mb-2">Item Code</label>
              <input type="text" id="code" class="form-control" name="itemCode" placeholder="code">
            </div>
            <div class="col-4">
              <label for="name" class="mb-2">Item Name</label>
              <input type="text" id="name" class="form-control" name="itemName" placeholder="name">
            </div>
            <div class="col-4">
              <label for="price" class="mb-2">Item Price</label>
              <input type="text" id="price" class="form-control" name="itemPrice" placeholder="price">
            </div>
          </div>
          <div class="row mt-4">
            <div class="col-3 mb-3">
              <button class="btn btn-primary" name="btn-item" type="submit">Submit</button>
            </div>
          </div>
        </form>
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
            $count = 0;
            foreach ($allData as $row) {
              $count++;
            ?>
              <tr>
                <td><?php echo $count; ?></td>
                <td><?php echo $row['code']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td>
                  <a href="./editItems.php?id=<?php echo $row['id']; ?>"><ion-icon name="create-outline"></ion-icon></a>
                  <a id=<?php echo $row['id']; ?> onclick="confirmDelete(this.id)"><ion-icon name="trash-outline"></ion-icon></a>
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




  
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>

  <!-- ===== IONICONS ===== -->
  <script type="module" src="https://cdn.jsdelivr.net/npm/ionicons@5.5.3/dist/ionicons/ionicons.esm.js"></script>
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

    let confirmId;

    function confirmDelete(id) {
      confirmId = id;
      $('#confirmModal').modal();
    }

    function deleteData(val){
      if(val == 'YES' && confirmId){
        $.ajax({
          url:"./deleteItem.php",
          method:"post",
          data:{id:confirmId},
          success:function(data){
            location.reload(true);
          }
        });
      }
    }

  </script>
</body>

</html>