<?php
include 'admin-session.php';
include '../db_con.php';
?>
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <img src="images/logo.png" class="logo" alt="" height="60px" width="60px"></a>
        </div>
        <ul class="nav-links start-0 m-0 p-0">
            <li>
                <a href="index.php">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="category.php">
                    <i class='bx bx-box'></i>
                    <span class="links_name">Categories</span>
                </a>
            </li>
            <li>
                <a href="sub_cat.php">
                    <i class='bx bx-list-ul'></i>
                    <span class="links_name">Sub-Categories</span>
                </a>
            </li>

            <li>
                <a href="pro.php" class="active">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span class="links_name">Products</span>
                </a>
            </li>
            <li>
          <a href="payreport.php">
            <i class='bx bx-coin-stack'></i>
            <span class="links_name">Payment Report</span>
          </a>
        </li>
            <!-- <li>
          <a href="#">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Order list</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">Analytics</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-coin-stack' ></i>
            <span class="links_name">Stock</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name">Total order</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-user' ></i>
            <span class="links_name">Team</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-message' ></i>
            <span class="links_name">Messages</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-heart' ></i>
            <span class="links_name">Favrorites</span>
          </a>
        </li> -->
            <li>
                <a href="admin_changepass.php">
                    <i class='bx bx-cog'></i>
                    <span class="links_name">Change Password</span>
                </a>
            </li>
            <li class="log_out">
                <a href="../logout.php">
                    <i class='bx bx-log-out'></i>
                    <span class="links_name">Log out</span>
                </a>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class='bx bx-menu sidebarBtn'></i>
                <span class="dashboard">Products</span>
            </div>
            <!-- <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search'></i>
      </div> -->
            <div class="profile-details">
                <!-- <img src="images/profile.jpg" alt=""> -->
                <i class="fas fa-user"></i>
                <span class="admin_name">Admin</span>
                <!-- <i class='bx bx-chevron-down'></i> -->
            </div>
        </nav>

        <div class="home-content">

            <div class="card w-auto m-5 p-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Products:</h4>

                            </div>

                            <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sl.No.</th>
                                        <th>Product image</th>
                                        <th>Product name</th>
                                        <th>User name</th>
                                        <th>Contact no.</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>posted on</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php


                                    $view = "SELECT a.*, b.*,c.* from tbl_product a INNER JOIN tbl_login b INNER JOIN tbl_users c ON a.login_id=b.login_id and c.login_id=b.login_id Where a.delete_status='1'";
                                    $query_run = mysqli_query($conn, $view);
                                    $i = 1;
                                    while ($prod = mysqli_fetch_array($query_run)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><img src="../user_profile/images/<?php echo $prod['p_image'] ?>" height="200px" width="200px" alt=""></td>
                                            <td><?php echo $prod['p_name']; ?></td>
                                            <td><?php echo $prod['user_fname'] . " " . $prod['user_lname']; ?></td>
                                            <td><?php echo $prod['user_phone']; ?></td>
                                            <td><?php echo $prod['p_description']; ?></td>
                                            <td><?php echo $prod['price']; ?></td>
                                            <td><?php echo $prod['date']; ?></td>

                                            <!-- <td> -->
                                            <!-- <a href="editcate.php">
                              <input type="hidden" value="<?php echo $prod['cat_id']; ?>" name="cat_id">
                              <i class="fa fa-edit"></i>
                            </a>
                            &ensp;
                            <a href="#trash-o">
                              <i class="fa fa-trash"></i></a> -->
                                            <!-- <button type="button" value="<?php echo $prod['cat_id']; ?>" class="editBtn fa fa-edit"></button> &nbsp;
                                                    <button type="button" value="<?php echo $prod['cat_id']; ?>" class="deleteBtn fa fa-trash"></button> -->
                                            <!-- </td> -->
                                        </tr>
                                    <?php
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
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>