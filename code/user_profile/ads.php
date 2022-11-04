<?php
include '../db_con.php';
 include '../session.php';
$logid= $_SESSION['login_id'];
?>
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>My-ads</title>
    <link rel="stylesheet" href="userstyle.css">
    <!-- Boxicons CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
    <img src="images/logo.png" class="logo" alt="" height="60px" width="60px"></a>
    </div>
      <ul class="nav-links start-0 m-0 p-0">
        <li>
          <a href="userprofile.php">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">My profile</span>
          </a>
        </li>
        <li>
          <a href="ads.php" class="active">
            <i class='bx bx-box' ></i>
            <span class="links_name">My ads</span>
          </a>
        </li>
        <li>
          <a href="add_ads.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Add ads</span>
          </a>
        </li>
        <!-- <li>
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
        </li>
        <li>
          <a href="admin_changepass.php">
            <i class='bx bx-cog' ></i>
            <span class="links_name">Change Password</span>
          </a>
        </li> -->
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
        <span class="dashboard">My ads</span>
      </div>
      <!-- <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div> -->
      <div class="profile-details">
        <!-- <img src="images/profile.jpg" alt=""> -->
        <!-- <img src="images/profile.jpg" alt=""> -->
        <?php $name = "SELECT * FROM tbl_login as a, tbl_users as b WHERE a.login_id=b.login_id and b.login_id='$logid'";
$name_check = mysqli_query($conn,$name);
$raw = mysqli_fetch_array($name_check);
?>
        <i class="fas fa-user"></i>
        <span class="admin_name"><?php echo $raw['user_fname']." ".$raw['user_lname']; ?></span>
      </div>
    </nav>

    <div class="home-content">
     

      <div class="card w-auto m-5 p-5">
      <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
        <div class="card-header">
        <h4>My ads</h4>
        <!-- <button type="button" class="btn btn-success" style="float: right;" data-bs-toggle="modal" data-bs-target="#studentAddModal">
                        <i class="fa fa-plus"></i>&nbsp; Add ads
              </button> -->
</div>
<div class="card-body">

        <table id="myTable" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Sl.No.</th>
                          <th>Ads image</th>
                          <th>Product</th>
                          <th>Discription</th>
                          <th>Category</th>
                          <th>Sub-Catogery</th>
                          <th>Year of purchase</th>
                          <th>Price</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        

                        $view = "SELECT * FROM tbl_product where login_id=$logid";
                        $query_run = mysqli_query($conn, $view);
                        $i = 1;
                        while ($prod = mysqli_fetch_array($query_run)) {
                              $sid=$prod['subcat_id'];
                              $sub="SELECT * FROM tbl_subcat where sub_id=$sid";
                              $sub_run = mysqli_query($conn, $sub);
                              $s = mysqli_fetch_array($sub_run);
                              $c=$s['cat_id'];
                              $cat="SELECT * FROM tbl_categories where cat_id=$c";
                              $cat_run = mysqli_query($conn, $cat);
                              $cc = mysqli_fetch_array($cat_run);

                        ?>
                          <tr>
                            <td><?php echo $i; ?></td>
                            <td><img src="images/<?php echo $prod['p_image']; ?>" style="width: 200px; height: 200px;" alt="poster"></td>
                            <td><?= $prod['p_name'] ?></td>
                            <td><?= $prod['p_description'] ?></td>
                           
                            <td><?= $cc['category'] ?></td>
                            <td><?= $s['subcat'] ?></td>
                            <td><?= $prod['year'] ?></td>
                            <td><?= $prod['price'] ?></td>
                            <td>
                              <a href="#">
                                <i class="fa fa-edit"></i>
                              </a>
                              &ensp;
                              <a href="#trash-o">
                                <i class="fa fa-trash"></i></a>
                            </td>
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
          </div>

        
        
  </section>

  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>
   <script>
                        function Validstr() 
                        {
                        var val = document.getElementById('name').value;
                        if (!val.match(/^[a-zA-Z ]*$/)) 
                        {
                          document.getElementById('msg1').innerHTML="Start with a Capital letter & Only alphabets are allowed";
                                document.getElementById('name').value = "";
                                  return false;
                        }
                          document.getElementById('msg1').innerHTML=" ";
                         return true;
                        }


                        function chek()
                        {
                            jQuery.ajax({
                                url:"get_subcat.php",
                                type:"post",
                                data:"cid="+$("#cid").val(),
                                success: function(dataResult){
					$("#sid").html(dataResult);
                                }
                            });
                        }
                   </script>
 <script>
$(document).ready(function() {
	$('#cid').on('change', function() {
			var cid = this.value;
			$.ajax({
				url: "get_subcat.php",
				type: "POST",
				data: {
					cid: cid
				},
				cache: false,
				success: function(dataResult){
					$("#sid").html(dataResult);
				}
			});
		
		
	});
});
</script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
