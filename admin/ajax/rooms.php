<?php
    require("../include/essentials.php");
    require("../include/database.php");
    adminLogin();

    if(isset($_POST['addRoom'])){
        $features = filteration(json_decode($_POST['features']));
        $facilities = filteration(json_decode($_POST['facilities']));
        $filter_data = filteration($_POST);
        $flag = 0;

        $query1 = "INSERT INTO `rooms`(`name`, `area`, `price`, `quantity`, `adult`, `children`, `description`) VALUES (?,?,?,?,?,?,?)";
        $values = [$filter_data['name'], $filter_data['area'], $filter_data['price'], $filter_data['quantity'], $filter_data['adult'], $filter_data['children'], $filter_data['desc']];

        if(insert($query1, $values, "siiiiis")){
            $flag = 1;
        }

        $room_id = mysqli_insert_id($connect);
        $query2 = "INSERT INTO `room_facilities`(`room_id`, `facilities_id`) VALUES (?,?)";
        
        if($stmt = mysqli_prepare($connect, $query2)){
            foreach($facilities as $f){
                mysqli_stmt_bind_param($stmt, "ii", $room_id, $f);
                mysqli_stmt_execute($stmt);
            }
            mysqli_stmt_close($stmt);
        }else{
            $flag = 0;
            die("Query cannot be Prepared - Insert");
        }

        $query3 = "INSERT INTO `room_features`(`room_id`, `features_id`) VALUES (?,?)";
        
        if($stmt = mysqli_prepare($connect, $query3)){
            foreach($features as $f){
                mysqli_stmt_bind_param($stmt, "ii", $room_id, $f);
                mysqli_stmt_execute($stmt);
            }
            mysqli_stmt_close($stmt);
        }else{
            $flag = 0;
            die("Query cannot be Prepared - Insert");
        }

        if($flag){
            echo 1;
        }else{
            echo 0;
        }
    }

    if(isset($_POST['getAllRooms'])){
        $result = select("SELECT * FROM `rooms` WHERE `removed`=?", [0], "i");
        $i = 1;
        $data = "";

        while($row = mysqli_fetch_assoc($result)){
            if($row['status'] == 1){
                $status = "<button onclick='toggleStatus($row[id], 0)' class='btn btn-dark btn-sm shadow-none'>Active</button>";
            }else{
                $status = "<button onclick='toggleStatus($row[id], 1)' class='btn btn-warning btn-sm shadow-none'>Inactive</button>";
            }
            $data .= "
                <tr class='align-middle'>
                    <td>$i</td>
                    <td>$row[name]</td>
                    <td>$row[area] Sqft</td>
                    <td>
                        <span class='badge rounded-pill bg-light text-dark'>
                            Adult: $row[adult]
                        </span><br>
                        <span class='badge rounded-pill bg-light text-dark'>
                            Children: $row[children]
                        </span>
                    </td>
                    <td>$$row[price]</td>
                    <td>$row[quantity]</td>
                    <td>$status</td>
                    <td>
                        <button type='button' onclick='editDetails($row[id])' class='btn btn-primary shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#edit-room'>
                            <i class='bi bi-pencil-square'></i>
                        </button>
                        <button type='button' onclick=\"roomImages($row[id], '$row[name]')\" class='btn btn-info shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#room-images'>
                            <i class='bi bi-images'></i>
                        </button>
                        <button type='button' onclick='removeRoom($row[id])' class='btn btn-danger shadow-none btn-sm'>
                            <i class='bi bi-trash'></i>
                        </button>
                    </td>
                </tr>
            ";
            $i++;
        }
        echo $data;
    }

    if(isset($_POST['toggleStatus'])){
        $filter_data = filteration($_POST);
        $query = "UPDATE `rooms` SET `status`=? WHERE `id`=?";
        $values = [$filter_data['value'], $filter_data['toggleStatus']];

        if(update($query, $values, "ii")){
            echo 1;
        }else{
            echo 0;
        }
    }

    if(isset($_POST['getRoom'])){
        $filter_data = filteration($_POST);

        $query1 = "SELECT * FROM `rooms` WHERE `id`=?";
        $values1 = [$filter_data['getRoom']];
        $result1 = select($query1, $values1, "i");

        $query2 = "SELECT * FROM `room_features` WHERE `room_id`=?";
        $values2 = [$filter_data['getRoom']];
        $result2 = select($query2, $values2, "i");

        $query3 = "SELECT * FROM `room_facilities` WHERE `room_id`=?";
        $values3 = [$filter_data['getRoom']];
        $result3 = select($query3, $values3, "i");
    
        $roomdata = mysqli_fetch_assoc($result1);
        $features = [];
        $facilities = [];
        if(mysqli_num_rows($result2) > 0){
            while($row = mysqli_fetch_assoc($result2)){
                array_push($features, $row['features_id']);
            }
        }

        if(mysqli_num_rows($result3) > 0){
            while($row = mysqli_fetch_assoc($result3)){
                array_push($facilities, $row['facilities_id']);
            }
        }
        $data = ["roomdata" => $roomdata, "features" => $features, "facilities" => $facilities];
        $data = json_encode($data);
        echo $data;
    }

    if(isset($_POST['editRoom'])){
        $features = filteration(json_decode($_POST['features']));
        $facilities = filteration(json_decode($_POST['facilities']));
        $filter_data = filteration($_POST);
        $flag = 0;

        $query1 = "UPDATE `rooms` SET `name`=?,`area`=?,`price`=?,`quantity`=?,`adult`=?,`children`=?,`description`=? WHERE `id`=?";
        $values = [$filter_data['name'], $filter_data['area'], $filter_data['price'], $filter_data['quantity'], $filter_data['adult'], $filter_data['children'], $filter_data['desc'], $filter_data['room_id']];

        if(update($query1, $values, "siiiiisi")){
            $flag = 1;
        }

        $deleteQuery1 = "DELETE FROM `room_features` WHERE `room_id`=?";
        $deleteValue1 = [$filter_data['room_id']]; 
        $deleteFeature = delete($deleteQuery1, $deleteValue1, "i");

        $deleteQuery2 = "DELETE FROM `room_facilities` WHERE `room_id`=?";
        $deleteValue2 = [$filter_data['room_id']]; 
        $deleteFacility = delete($deleteQuery2, $deleteValue2, "i");

        if(!($deleteFacility && $deleteFeature)){
            $flag = 0;
        }

        $query2 = "INSERT INTO `room_facilities`(`room_id`, `facilities_id`) VALUES (?,?)";
        
        if($stmt = mysqli_prepare($connect, $query2)){
            foreach($facilities as $f){
                mysqli_stmt_bind_param($stmt, "ii", $filter_data['room_id'], $f);
                mysqli_stmt_execute($stmt);
            }
            $flag = 1;
            mysqli_stmt_close($stmt);
        }else{
            $flag = 0;
            die("Query cannot be Prepared - Insert");
        }

        $query3 = "INSERT INTO `room_features`(`room_id`, `features_id`) VALUES (?,?)";
        
        if($stmt = mysqli_prepare($connect, $query3)){
            foreach($features as $f){
                mysqli_stmt_bind_param($stmt, "ii", $filter_data['room_id'], $f);
                mysqli_stmt_execute($stmt);
            }
            $flag = 1;
            mysqli_stmt_close($stmt);
        }else{
            $flag = 0;
            die("Query cannot be Prepared - Insert");
        }

        if($flag){
            echo 1;
        }else{
            echo 0;
        }
    }

    if(isset($_POST['addImage'])){
        $filter_data = filteration($_POST);

        $img_r = uploadImage($_FILES['image'], ROOM_FOLDER);
        if($img_r == 'inv_img'){
            echo $img_r;
        }else if($img_r == 'inv_size'){
            echo $img_r;
        }else if($img_r == 'uploadFailed'){
            echo $img_r;
        }else{
            $query = "INSERT INTO `room_image`(`room_id`, `image`) VALUES (?,?)";
            $values = [$filter_data['room_id'], $img_r];
            $result = insert($query, $values, 'is');
            echo $result;
        }
    }

    if(isset($_POST['getRoomImages'])){
        $filter_data = filteration($_POST);

        $query = "SELECT * FROM `room_image` WHERE `room_id`=?";
        $values = [$filter_data['getRoomImages']];
        $result = select($query, $values, "i");
        $path = ROOM_IMG_PATH;

        while($data = mysqli_fetch_assoc($result)){
            if($data['thumbnail'] == 1){
                $thumbButton = "<i class='bi bi-check-lg text-light bg-success px-2 py-1 rounded fs-5'></i>";
            }else{
                $thumbButton = "<button type='button' onclick='thumbImage($data[sr_no], $data[room_id])' class='btn btn-secondary shadow-none'>
                                    <i class='bi bi-check-lg'></i>
                                </button>";
            }
            echo<<<data
                <tr class='align-middle'>
                    <td><img src='$path$data[image]' class='img-fluid'></td>
                    <td>$thumbButton</td>
                    <td>
                        <button type='button' onclick='removeImage($data[sr_no], $data[room_id])' class='btn btn-danger shadow-none'>
                            <i class='bi bi-trash'></i>
                        </button>
                    </td>
                </tr>
            data;
        }
    }

    if(isset($_POST['removeImage'])){
        $filter_data = filteration($_POST);

        $values = [$filter_data['image_id'], $filter_data['room_id']];
        $preQurey = "SELECT * FROM `room_image` WHERE `sr_no`=? AND `room_id`=?";
        $result = select($preQurey, $values, "ii");
        $image = mysqli_fetch_assoc($result);

        if(deleteImage($image['image'], ROOM_FOLDER)){
            $query = "DELETE FROM `room_image` WHERE `sr_no`=? AND `room_id`=?";
            $result = delete($query, $values, "ii");
            echo $result;
        }else{
            echo 0;
        }
    }

    if(isset($_POST['thumbImage'])){
        $filter_data = filteration($_POST);

        $preQuery = "UPDATE `room_image` SET `thumbnail`=? WHERE `room_id`=?";
        $preValue = [0, $filter_data['room_id']];
        $preResult = update($preQuery, $preValue, "ii");

        $query = "UPDATE `room_image` SET `thumbnail`=? WHERE `sr_no`=? AND `room_id`=?";
        $value = [1, $filter_data['image_id'], $filter_data['room_id']];
        $result = update($query, $value, "iii");

        echo $result;
    }

    if(isset($_POST['removeRoom'])){
        $filter_data = filteration($_POST);

        $result1 = select("SELECT * FROM `room_image` WHERE `room_id`=?", [$filter_data['room_id']], "i");
        while($data = mysqli_fetch_assoc($result1)){
            deleteImage($data['image'], ROOM_FOLDER);
        }

        $result2 = delete("DELETE FROM `room_image` WHERE `room_id`=?", [$filter_data['room_id']], "i");
        $result3 = delete("DELETE FROM `room_features` WHERE `room_id`=?", [$filter_data['room_id']], "i");
        $result4 = delete("DELETE FROM `room_facilities` WHERE `room_id`=?", [$filter_data['room_id']], "i");
        $result5 = update("UPDATE `rooms` SET `removed`=? WHERE `id`=?", [1, $filter_data['room_id']], "ii");

        if($result2 || $result3 || $result4 || $result5){
            echo 1;
        }else{
            echo 0;
        }
    }
?>