<?php
session_start();
if ($_SESSION['toGoods'] == session_id()) {
    include "./include/dbconnect.php";
    $fetchite = "SELECT * FROM `tbl_items` WHERE `items_status`!=0";
    $fetchiteReuslt = mysqli_query($connect, $fetchite);
?>
    <!DOCTYPE html>
    <html>

    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />
        <link rel="stylesheet" href="./assets/css/main.css" />
    </head>

    <body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">In2Goods</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="./home.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./sell.php">Sell</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./liked.php">Favorites</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./myads.php">My Ads</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" />
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                        Search
                    </button>
                    <a class="btn btn-danger mx-2 my-2 my-sm-0" href="logout.php">
                        Logout
                    </a>
                </form>
            </div>
        </nav>

        <div class="container">

            <form method="post" enctype="multipart/form-data">
                <!-- Post Your ad start -->
                <fieldset class="border border-gary p-4 mb-5">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3>Post Your ad</h3>
                        </div>
                        <div class="col-lg-6">
                            <h6 class="font-weight-bold pt-4 pb-1">Title Of Ad:</h6>
                            <input type="text" onfocusout="function adNameValidate(){
                                if(!document.getElementById('titleOfAd').value.match(/^[a-zA-Z\s]*$/)){
                                    alert('Incorrect format');
                                    document.getElementById('titleOfAd').value='';
                                }
                            };adNameValidate()" name="titleOfAd" id="titleOfAd" class="border w-100 p-2 bg-white text-capitalize" placeholder="Ad title go There">
                            <h6 class="font-weight-bold pt-4 pb-1">Car:</h6>
                            <input type="text" onfocusout="function carNameValidation(){
                                if(!document.getElementById('carName').value.match(/^[a-zA-Z0-9\-_]{0,40}$/)){
                                    alert('Incorrect format');
                                    document.getElementById('carName').value='';
                                }
                            };carNameValidation()" name="itemName" id="carName" class="border w-100 p-2 bg-white text-capitalize" placeholder="Enter Your Car">
                            <?php
                            $sql1 = "SELECT * FROM `car_company`";
                            $result1 = mysqli_query($connect, $sql1);
                            ?>
                            <h6 class="font-weight-bold pt-4 pb-1">Company</h6>
                            <select name="company_id" id="inputGroupSelect" class="w-100">
                                <option value="1">Select category</option>
                                <?php while ($row1 =  mysqli_fetch_array($result1)) {
                                ?>
                                    <option value="<?php echo $row1['company_id']; ?>"><?php echo $row1['company_name']; ?></option>
                                <?php } ?>
                            </select>

                            <h6 class="font-weight-bold pt-4 pb-1">Ad Type:</h6>
                            <div class="row px-3">
                                <div class="col-lg-4 mr-lg-4 my-2 rounded bg-white">
                                    <input type="radio" name="adType" value="personal" id="personal">
                                    <label for="personal" class="py-2">Personal</label>
                                </div>
                                <div class="col-lg-4 mr-lg-4 my-2 rounded bg-white ">
                                    <input type="radio" name="adType" value="business" id="business">
                                    <label for="business" class="py-2">Business</label>
                                </div>
                            </div>
                            <h6 class="font-weight-bold pt-4 pb-1">Description:</h6>
                            <textarea name="desc" id="" class="border p-3 w-100" rows="7" placeholder="Write details about your product"></textarea>
                        </div>
                        <div class="col-lg-6">
                            <?php
                            $sql1 = "select * from car_category";
                            $result1 = mysqli_query($connect, $sql1);
                            ?>
                            <h6 class="font-weight-bold pt-4 pb-1">Select Ad Category:</h6>
                            <select name="item_category" id="inputGroupSelect" class="w-100">
                                <option value="1">Select category</option>
                                <?php while ($row1 =  mysqli_fetch_array($result1)) {
                                    $id = $row1['company_id'];
                                    $fetch = "SELECT * from car_company where company_id='$id'";
                                    $fetchResult = mysqli_query($connect, $fetch);
                                    $row2 = mysqli_fetch_array($fetchResult);
                                ?>
                                    <option value="<?php echo $row1['car_type']; ?>"><?php echo $row1['car_type']; ?></option>
                                <?php } ?>
                            </select>
                            <div class="price">
                                <h6 class="font-weight-bold pt-4 pb-1">Item Price:</h6>
                                <div class="row px-3">
                                    <div class="col-lg-4 mr-lg-4 rounded bg-white my-2 ">
                                        <input type="number" name="price" class="border-0 py-2 w-100 price" placeholder="Price" id="price">
                                    </div>
                                    <div class="col-lg-4 mrx-4 rounded bg-white my-2 ">
                                        <input type="checkbox" name="negotiable" value="1" id="Negotiable">
                                        <label for="Negotiable" class="py-2">Negotiable</label>
                                    </div>
                                </div>
                            </div>
                            <div class="choose-file text-center my-4 py-4 rounded">
                                <label for="file-upload">
                                    <span class="d-block font-weight-bold text-dark">Drop files anywhere to upload</span>
                                    <span class="d-block">or</span>
                                    <span class="d-block btn bg-primary text-white my-3 select-files">Select files</span>
                                    <span class="d-block">Maximum upload file size: 500 KB</span>
                                    <input type="file" accept="image/jpeg, image/png" class="form-control-file d-none" id="file-upload" name="fileToUpload">
                                </label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <!-- Post Your ad end -->

                <!-- seller-information start -->
                <fieldset class="border p-4 my-5 seller-information bg-gray">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3>Seller Information</h3>
                        </div>
                        <div class="col-lg-6">
                            <h6 class="font-weight-bold pt-4 pb-1">Contact Name:</h6>
                            <input type="text" placeholder="Contact name" name='contact_name' class="border w-100 p-2">
                            <h6 class="font-weight-bold pt-4 pb-1">Contact Number:</h6>
                            <input type="number" placeholder="Contact Number" name='contact_no' class="border w-100 p-2">
                        </div>
                        <div class="col-lg-6">
                            <h6 class="font-weight-bold pt-4 pb-1">Contact email:</h6>
                            <input type="email" placeholder="name@yourmail.com" name='contact_email' class="border w-100 p-2">
                            <h6 class="font-weight-bold pt-4 pb-1">Contact Address:</h6>
                            <input type="text" placeholder="Your address" name='contact_address' class="border w-100 p-2">
                        </div>
                    </div>
                </fieldset>
                <!-- seller-information end-->

                <!-- ad-feature start -->

                <!-- submit button -->
                <div class="checkbox d-inline-flex">
                    <input type="checkbox" id="terms-&-condition" class="mt-1">
                    <label for="terms-&-condition" class="ml-2">By click you must agree with our
                        <span> <a class="text-success">Terms & Condition and Posting Rules.</a></span>
                    </label>
                </div>
                <button type="submit" name="submitAdd" class="btn btn-primary d-block mt-2">Post Your Ad</button>
            </form>
        </div>



        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    </body>

    </html>
<?php
} else {
    header("Location: index.php");
}

if (isset($_POST['submitAdd'])) {
    extract($_POST);
    $userId = $_SESSION['userId'];

    $target_dir = "assets/images/";
    $file_exp = pathinfo($_FILES['fileToUpload']['name'], PATHINFO_EXTENSION);
    $target_file = $target_dir . time() . "." . $file_exp;
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    if ($negotiable == 1) {
        $insert = "INSERT INTO `tbl_items`(`user_id`,`ad_title`, `items_name`,`company_id`, `ad_type`, `negotible`, `contact_name`, `contact_number`, `contact_email`, `contact_address`, `items_img`, `items_category`, `items_price`, `items_desc`)
            VALUES ('$userId','$titleOfAd','$itemName','$company_id','$adType','$negotiable','$contact_name','$contact_no','$contact_email','$contact_address','$target_file','$item_category','$price','$desc')";
    } else {
        $insert = "INSERT INTO `tbl_items`(`user_id`,`ad_title`, `items_name`,`company_id`, `ad_type`, `contact_name`, `contact_number`, `contact_email`, `contact_address`, `items_img`, `items_category`, `items_price`, `items_desc`)
            VALUES ('$userId','$titleOfAd','$itemName','$company_id','$adType','$contact_name','$contact_no','$contact_email','$contact_address','$target_file','$item_category','$price','$desc')";
    }
    if (mysqli_query($connect, $insert)) {
        echo "<script>alert('Ad posted')</script>";
    } else {
        echo "<script>alert('Error')</script>";
    }
}
?>