<?php include '../lib/Session.php';
Session::checkSession();
?>
<?php include '../config/config.php'; ?>
<?php include '../lib/Database.php'; ?>
<?php include '../helpers/Format.php'; ?>
<?php
 $db = new Database();
 $fm = new Format();

 ?>
 <?php
     header("Cache-Control: no-cache, must-revalidate");
     header("Pragma: no-cache");
     header("Expires: Mon, 20 Aug 2018 13:40:00 GMT");
     header("Cache-Control: max-age=2592000");
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Адмниы хэсэг</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <link href="css/layout.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php">Веб сайт</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Эхлэл</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#SiteOption" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Site Option</span>
          </a>
          <ul class="sidenav-second-level collapse" id="SiteOption">
            <li>
              <a href="titleslogan.php">Title & Slogan</a>
            </li>
            <li>
              <a href="social.php">Social Media</a>
            </li>
            <li>
              <a href="copyright.php">Copyright</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#slideroption" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Slider Option</span>
          </a>
          <ul class="sidenav-second-level collapse" id="slideroption">
            <li>
              <a href="addslider.php">Add Slider</a>
            </li>
            <li>
              <a href="sliderlist.php">Slider List</a>
            </li>

          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#UpdatePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Pages</span>
          </a>
          <ul class="sidenav-second-level collapse" id="UpdatePages">
            <li>
              <a href="addpage.php">Add New Page</a>
            </li>
            <?php
               $query = "SELECT * FROM Page";
               $pages = $db->select($query);
               if($pages){
                 while($result = $pages->fetch_assoc()){

            ?>
            <li><a href="page.php?pageid=<?php echo $result['id']; ?>"><?php echo $result['name']; ?></a></li>
          <?php } } ?>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#CategoryOption" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Category Option</span>
          </a>
          <ul class="sidenav-second-level collapse" id="CategoryOption">
            <li>
              <a href="addcategory.php">Add Category</a>
            </li>
            <li>
              <a href="catlist.php">Category List</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#PostOption" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Post Option</span>
          </a>
          <ul class="sidenav-second-level collapse" id="PostOption">
            <li>
              <a href="addpost.php">Add Post</a>
            </li>
            <li>
              <a href="postlist.php">Post List</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#UserProfile" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">User Profile</span>
          </a>
          <ul class="sidenav-second-level collapse" id="UserProfile">
            <li>
              <a href="profile.php">User Profile</a>
            </li>
            <?php if (Session::get('userRole') == '3') { ?>
              <li>
                <a href="adduser.php">Add User</a>
              </li>
            <?php  } ?>

            <li>
              <a href="userlist.php">User List</a>
            </li>
            <li>
              <a href="index.php">Change Password</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="inbox.php">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Захидал</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="theme.php">
            <i class="fa fa-fw fa-gears"></i>
            <span class="nav-link-text">Theme Change</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="http://localhost/website">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Веб сайт</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-user-circle-o"></i>
               <?php echo Session::get('username'); ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="profile.php">
              <span class="text-info">
                <strong>
                  <i class="fa fa-user-circle-o fa-fw"></i>Хэрэглэгчийн мэдээлэл</strong>
              </span>
            </a>

            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-info">
                <strong>
                  <i class="fa fa-key fa-fw"></i>Нууц үг солих</strong>
              </span>
            </a>



          </div>
        </li>
        <li class="nav-item dropdown">

          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-envelope"></i>

              <?php
                   $query = "SELECT * FROM Contact WHERE status = '0' order by id DESC";
                   $msg = $db->select($query);
                   if ($msg) {
                     $count = mysqli_num_rows($msg);

                     echo "(".$count.")";
                   }else{
                     echo "(0)";
                   }
               ?>



          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">New Messages:</h6>
            <?php
            if ($msg) {

              while($result = $msg->fetch_assoc()){
             ?>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="viewmsg.php?msgid=<?php echo $result['id']; ?>">
              <strong><?php echo $result['firstname']; ?></strong>
              <span class="small float-right text-muted"><?php echo $result['date']; ?></span>
              <div class="dropdown-message small"><?php echo $result['body']; ?></div>
            </a>
          <?php } } ?>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="inbox.php">View all messages</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alerts
              <span class="badge badge-pill badge-warning">6 New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">New Alerts:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-danger">
                <strong>
                  <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all alerts</a>
          </div>
        </li>
        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Search for...">
              <span class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Гарах</a>
        </li>

      </ul>
    </div>
  </nav>
