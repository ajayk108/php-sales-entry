<?php
require_once('./config/checkSession.php');
require_once('./config/config.php');

$stmt = $conn->prepare("SELECT * FROM items");
$stmt->execute();
$res1 = $stmt->get_result();
$allItems = $res1->fetch_all(MYSQLI_ASSOC);
$stmt->close();



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="./css/sidebar.css">
    <title>Sales Entry</title>

</head>

<body id="body-pd" class="body-pd bg-light">
    <?php $page = 'sales';
    include './common/sidebar.php'; ?>

    <div class="main p-3">
        <h3>Sales Entry</h3>

        <div class="jumbotron jumbotron-fluid bg-white p-2">
            <div class="container">
                <h6 class="">Item Entery</h6>
                <hr>
                <div class="row">
                    <div class="col-4">
                        <label for="">Select Item</label>
                        <select class="form-control chosen-select" name="item_name" id="searchval" required="">
                            <option value="">--Select Product--</option>
                            <?php
                            foreach ($res1 as $row) {
                            ?>
                                <option value="<?php echo $row['id'] ?> "><?php echo $row['code'] . " " . $row['name'] . " " . $row['price']  ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-2">
                        <label for="">Enter Quantity</label>
                        <input type="number" class="form-control" id="quantity">
                    </div>
                    <div class="col-2 mt-3">
                        <button class="btn btn-primary form-control" onclick="add_item_data()">Add</button>
                    </div>
                    <div class="col-4 mt-3 mb-4">
                        <button class="btn btn-primary form-control">Clear Data</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="jumbotron jumbotron-fluid bg-white p-2 mt-5">
            <div class="container">
                <h6 class="">Data Table</h6>
                <hr>
                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                    <thead class="text-center">
                        <tr>
                            <th>Sr.no</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th style="width:13%;">Quantity</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="table_data" class="text-center">

                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
    <!-- ===== IONICONS ===== -->
    <script type="module" src="https://cdn.jsdelivr.net/npm/ionicons@5.5.3/dist/ionicons/ionicons.esm.js"></script>
    <!-- ===== MAIN JS ===== -->
    <script src="./js/home.js"></script>
    <script>
        $(".chosen-select").chosen();

        function loadTable() {
            $.ajax({
                url: "ajax_loadTable.php",
                method: "POST",
                success: function(data) {
                    $("#table_data").html(data);
                }
            });
        }
        loadTable();           

        function add_item_data() {
            let Item = document.getElementById('searchval').value;
            let ItemQty = document.getElementById('quantity').value;

            $.ajax({
                url: "insert_data.php",
                method: "POST",
                data: {
                    Item: Item,
                    ItemQty: ItemQty
                },
                success: function(data) {
                    loadTable();
                    // ttotal();
                }
            });
        }
    </script>
</body>

</html>