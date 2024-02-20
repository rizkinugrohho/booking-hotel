<?php
    require("./include/database.php");
    require("./include/essentials.php");
    adminLogin();

    if(isset($_GET['seen'])){
        $filter_data = filteration($_GET);

        if($filter_data['seen'] == 'all'){
            $query = "UPDATE `user_queries` SET `seen`=?";
            $values = [1];
            if(update($query, $values, "i")){
                alert("success", "Messages Marked All as Read!");
            }else{
                alert("error", "Operation Failed!");
            }
        }else{
            $query = "UPDATE `user_queries` SET `seen`=? WHERE `sr_no`=?";
            $values = [1, $filter_data['seen']];
            if(update($query, $values, "ii")){
                alert("success", "Messages Marked as Read!");
            }else{
                alert("error", "Operation Failed!");
            }
        }
    }

    if(isset($_GET['del'])){
        $filter_data = filteration($_GET);

        if($filter_data['del'] == 'all'){
            $query = "DELETE FROM `user_queries`";
            if(mysqli_query($connect, $query)){
                alert("success", "All Messages Deleted!");
            }else{
                alert("error", "Operation Failed!");
            }
        }else{
            $query = "DELETE FROM `user_queries` WHERE `sr_no`=?";
            $values = [$filter_data['del']];
            if(delete($query, $values, "i")){
                alert("success", "Message Deleted!");
            }else{
                alert("error", "Operation Failed!");
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require("./include/links.php"); ?>
    <script src="./js/script.js" defer></script>
    <title>Admin Panel - User Queries</title>
</head>
<body class="bg-white">
    <?php require("./include/header.php"); ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">Customer Queries</h3>
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">

                        <div class="text-end mb-4">
                            <a href="?seen=all" class="btn btn-sm btn-dark rounded shadow-none">
                                <i class="bi bi-check-all"></i> Mark all Read
                            </a>
                            <a href="?del=all" class="btn btn-sm btn-danger rounded shadow-none">
                                <i class="bi bi-trash"></i> Delete All
                            </a>
                        </div>

                        <div class="table-responsive-md" style="height: 450px; overflow-y: scroll;">
                            <table class="table table-hover border">
                                <thead class="sticky-top">
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col" width="20%">Subject</th>
                                        <th scope="col" width="30%">Message</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $query = "SELECT * FROM `user_queries` ORDER BY `sr_no` DESC";
                                        $data = mysqli_query($connect, $query);
                                        $i = 1;

                                        while($row = mysqli_fetch_assoc($data)){
                                            $seen = "";
                                            if($row['seen'] != 1){
                                                $seen = "<a href='?seen=$row[sr_no]' class='btn btn-sm btn-primary rounded-pill'>Mark as Read</a>";
                                            }
                                            $seen.="<a href='?del=$row[sr_no]' class='btn btn-sm btn-danger mt-2 rounded-pill'>Delete</a>";
                                            echo<<<query
                                                    <tr>
                                                        <td>$i</td>
                                                        <td>$row[name]</td>
                                                        <td>$row[email]</td>
                                                        <td>$row[subject]</td>
                                                        <td>$row[message]</td>
                                                        <td>$row[date]</td>
                                                        <td>$seen</td>
                                                    </tr>
                                            query;
                                            $i++;
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>