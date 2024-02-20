<?php
    require("../include/essentials.php");
    require("../include/database.php");
    adminLogin();

    if(isset($_POST['add_feature'])){
        $filter_data = filteration($_POST);

        $query = "INSERT INTO `features`(`name`) VALUES (?)";
        $values = [$filter_data['name']];
        $result = insert($query, $values, 's');
        echo $result;
    }

    if(isset($_POST['getFeatures'])){
        $result = selectAll('features');
        $i = 1;
        while($data = mysqli_fetch_assoc($result)){
            echo <<<data
                <tr>
                    <td>$i</td>
                    <td>$data[name]</td>
                    <td>
                        <button type="button" onclick="deleteFeature($data[id])" class="btn btn-danger btn-sm shadow-none">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </td>
                </tr>
            data;
            $i++;
        }
    }

    if(isset($_POST['deleteFeature'])){
        $filter_data = filteration($_POST);

        $values = [$filter_data['deleteFeature']];

        $checkQuery = "SELECT * FROM `room_features` WHERE `features_id`=?";
        $checkValues = [$filter_data['deleteFeature']];
        $check = select($checkQuery, $checkValues, "i");

        if(mysqli_num_rows($check) == 0){
            $query = "DELETE FROM `features` WHERE `id`=?";
            $result = delete($query, $values, "i");
            echo $result;
        }else{
            echo "room_added";
        }
    }

    if(isset($_POST['addFacility'])){
        $filter_data = filteration($_POST);

        $img_r = uploadSVG($_FILES['icon'], FEATURES_FOLDER);
        if($img_r == 'inv_img'){
            echo $img_r;
        }else if($img_r == 'inv_size'){
            echo $img_r;
        }else if($img_r == 'uploadFailed'){
            echo $img_r;
        }else{
            $query = "INSERT INTO `facilities` (`name`, `icon`, `description`) VALUES (?,?,?)";
            $values = [$filter_data['name'], $img_r, $filter_data['desc']];
            $result = insert($query, $values, 'sss');
            echo $result;
        }
    }

    if(isset($_POST['getFacilities'])){
        $result = selectAll('facilities');
        $i = 1;
        $path = FEATURES_IMG_PATH;
        while($data = mysqli_fetch_assoc($result)){
            echo <<<data
                <tr class="align-middle">
                    <td>$i</td>
                    <td>$data[name]</td>
                    <td><img src="$path$data[icon]" width="40px"></td>
                    <td>$data[description]</td>
                    <td>
                        <button type="button" onclick="deleteFacility($data[id])" class="btn btn-danger btn-sm shadow-none">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </td>
                </tr>
            data;
            $i++;
        }
    }

    if(isset($_POST['deleteFacility'])){
        $filter_data = filteration($_POST);
        $values = [$filter_data['deleteFacility']];

        $checkQuery = "SELECT * FROM `room_facilities` WHERE `facilities_id`=?";
        $checkValues = [$filter_data['deleteFacility']];
        $check = select($checkQuery, $checkValues, "i");

        if(mysqli_num_rows($check) == 0){
            $preQurey = "SELECT * FROM `facilities` WHERE `id`=?";
            $result = select($preQurey, $values, "i");
            $image = mysqli_fetch_assoc($result);
    
            if(deleteImage($image['icon'], FEATURES_FOLDER)){
                $query = "DELETE FROM `facilities` WHERE `id`=?";
                $result = delete($query, $values, "i");
                echo $result;
            }else{
                echo 0;
            }
        }else{
            echo "room_added";
        }
    }
?>