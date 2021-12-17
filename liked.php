<?php
session_start();
if ($_SESSION['toGoods'] == session_id()) {
    include "./include/dbconnect.php";
?>
    <!DOCTYPE html>
    <html>

    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />
        <link rel="stylesheet" href="./assets/css/main.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
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
        <div class="row">
            <?php
            $userId = $_SESSION['userId'];
            $fetchAllSavedQuery = "SELECT * FROM `tbl_save` WHERE `user_id`= $userId";
            $fetchedAllSaved = mysqli_query($connect, $fetchAllSavedQuery);
            if (mysqli_num_rows($fetchedAllSaved) > 0) {
                while ($savedProductsData = mysqli_fetch_assoc($fetchedAllSaved)) {
                    $itemId = $savedProductsData['items_id'];
                    $fetchite = "SELECT * FROM `tbl_items` WHERE `items_id`='$itemId'";
                    $fetchiteReuslt = mysqli_query($connect, $fetchite);
                    while ($row = mysqli_fetch_assoc($fetchiteReuslt)) {
            ?>
                        <div class="card" style="width: 18rem;margin:5px;">
                            <img style="width: 100%; height: 180px;" src="<?php echo $row['items_img']; ?>" class="card-img-top" alt="...">
                            <div class="card-body">

                                <h5 class="card-title">
                                    <?php echo $row['items_name'] ?>
                                </h5>
                                <h6><?php echo $row['items_category'] ?></h6>
                                <p class="card-text" style="display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;"><?php echo $row['items_desc'] ?></p>
                                <p class="price-container">
                                    <span>Rs: <?php echo $row['items_price'] ?></span>
                                </p>
                                <div class="row">

                                    <?php
                                    $item_id = $row['items_id'];
                                    $userId = $_SESSION['userId'];
                                    $isSaved = "SELECT * FROM `tbl_save` WHERE `items_id`=$item_id AND `user_id`= $userId";
                                    $likedAd = mysqli_query($connect, $isSaved);
                                    if (mysqli_num_rows($likedAd) > 0) {
                                        $savedAds = mysqli_fetch_assoc($likedAd)
                                    ?>
                                        <form action="save.php" method="post">
                                            <button type="submit" class="btn btn-success col-10 m-2" value="<?php echo $savedAds['save_id'] ?>" name="unlikeButton">Unlike</button>
                                        </form>
                                    <?php
                                    } else {
                                    ?>
                                        <form action="save.php" method="post">
                                            <button type="submit" class="btn btn-primary col-10 m-2" value="<?php echo $row['items_id'] ?>" name="likeButton">Like</button>
                                        </form>
                                    <?php
                                    }
                                    ?>
                                    <a href="javascript:void(0);" class="btn btn-primary col m-2" data-toggle="modal" data-target="#<?php echo $row['items_name']; ?>Modal">More info</a>
                                </div>

                                <div class="modal fade" id="<?php echo $row['items_name']; ?>Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <form class="modal-content" action="#" method="post">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"><?php echo $row['items_name'] ?></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </butto </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <center><img class="img-fluid" src="<?php echo $row['items_img']; ?>" class="img-responsive" /></center>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Price</label>
                                                            <p><?php echo $row['items_name'] ?></p>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Car details</label>
                                                            <p><?php echo $row['items_desc'] ?></p>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Price</label>
                                                            <p><?php echo $row['items_price'] ?></p>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Contact Name</label>
                                                            <p><?php echo $row['contact_name'] ?></p>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Contact Address</label>
                                                            <p><?php echo $row['contact_address'] ?></p>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Item Category</label>
                                                            <p><?php echo $row['items_category'] ?></p>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Category email</label>
                                                            <p><?php echo $row['contact_email'] ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

            <?php
                    }
                }
            }
            ?>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    </body>

    </html>
<?php
} else {
    header("Location: index.php");
}
?>