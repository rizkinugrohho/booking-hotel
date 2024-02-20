<?php
    require("../include/essentials.php");
    require("../include/database.php");
    adminLogin();

    if(isset($_POST['get_general'])){
        $query = "SELECT * FROM `settings` WHERE `sr_no`=?";
        $values = [1];
        $result = select($query, $values, "i");
        $data = mysqli_fetch_assoc($result);
        $json_data = json_encode($data);
        echo $json_data;
    }

    if(isset($_POST['updateGeneral'])){
        $filter_data = filteration($_POST);

        $query = "UPDATE `settings` SET `site_title`=?, `site_about`=? WHERE `sr_no`=?";
        $values = [$filter_data['site_title'], $filter_data['site_about'], 1];
        $result = update($query, $values, "ssi");
        echo $result;
    }

    if(isset($_POST['updateShutdown'])){
        $filter_data = ($_POST['updateShutdown'] == 0) ? 1 : 0;

        $query = "UPDATE `settings` SET `shutdown`=? WHERE `sr_no`=?";
        $values = [$filter_data, 1];
        $result = update($query, $values, "ii");
        echo $result;
    }

    if(isset($_POST['get_contacts'])){
        $query = "SELECT * FROM `contact_details` WHERE `sr_no`=?";
        $values = [1];
        $result = select($query, $values, "i");
        $data = mysqli_fetch_assoc($result);
        $json_data = json_encode($data);
        echo $json_data;
    }

    if(isset($_POST['updateContact'])){
        $filter_data = filteration($_POST);

        $query = "UPDATE `contact_details` SET `address`=?,`gmap`=?,`ph1`=?,`ph2`=?,`email`=?,`fb`=?,`insta`=?,`tw`=?,`iframe`=? WHERE `sr_no`=?";
        $values = [$filter_data['address'], $filter_data['gmap'], $filter_data['ph1'], $filter_data['ph2'], $filter_data['email'], $filter_data['fb'], $filter_data['insta'], $filter_data['tw'], $filter_data['iframe'], 1];
        $result = update($query, $values, "sssssssssi");
        echo $result;
    }

    if(isset($_POST['add_member'])){
        $filter_data = filteration($_POST);

        $img_r = uploadImage($_FILES['picture'], ABOUT_FOLDER);
        if($img_r == 'inv_img'){
            echo $img_r;
        }else if($img_r == 'inv_size'){
            echo $img_r;
        }else if($img_r == 'uploadFailed'){
            echo $img_r;
        }else{
            $query = "INSERT INTO `team_details` (`name`, `picture`) VALUES (?,?)";
            $values = [$filter_data['name'], $img_r];
            $result = insert($query, $values, 'ss');
            echo $result;
        }
    }

    if(isset($_POST['getMembers'])){
        $result = selectAll('team_details');

        while($data = mysqli_fetch_assoc($result)){
            $path = ABOUT_IMG_PATH;
            echo <<<data
                <div class="col-md-2 mb-3">
                    <div class="card bg-dark text-white">
                        <img src="$path$data[picture]" class="card-img">
                        <div class="card-img-overlay text-end">
                            <button type="button" onclick="deleteMember($data[sr_no])" class="btn btn-danger btn-sm shadow-none">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </div>
                        <p class="card-text text-center px-3 py-2">$data[name]</p>
                    </div>
                </div>
            data;
        }
    }

    if(isset($_POST['deleteMember'])){
        $filter_data = filteration($_POST);

        $values = [$filter_data['deleteMember']];
        $preQurey = "SELECT * FROM `team_details` WHERE `sr_no`=?";
        $result = select($preQurey, $values, "i");
        $image = mysqli_fetch_assoc($result);

        if(deleteImage($image['picture'], ABOUT_FOLDER)){
            $query = "DELETE FROM `team_details` WHERE `sr_no`=?";
            $result = delete($query, $values, "i");
            echo $result;
        }else{
            echo 0;
        }
    }
?>