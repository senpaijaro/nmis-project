<?php  
    session_start();
    include '../functions/admin-functions.php';
    include '../functions/config.php';

    $id = $_SESSION['ids'];
    $query = $conn->query("SELECT * FROM user_accounts_tbl WHERE id= $id");
    $row   = $query->fetch_object();
    $id    = $row->id;
    $fname     = $row->firstname;
    $mname     = $row->middlename;
    $lname     = $row->lastname;
    $contact   = $row->contact;
    $email     = $row->email;

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>NMIS Project</title>

    <!-- Head links here -->
      <?php include 'head-links.php'; ?>
    <!-- // End of head links -->

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-user"></i> <span>NMIS Project</span></a>
            </div>

            <div class="clearfix"></div>

            

            <br />
          <!-- Sidebar here -->
            <?php include 'sidebar.php'; ?>
          <!-- // Sidebar end -->

          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

             
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
               <h2><i class="fa fa-user"></i> Admin Information</h2> 

              </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_content">
                     <?php modify_administrator(); ?>
                    <form class="form-horizontal form-label-left" method="post" novalidate>
                        <input type="hidden" name="id" value="<?php echo $id?>">
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">First Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="fname" required="required" value="<?php echo $fname?>" type="text">
                            </div>
                          </div>

                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Middle Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="mname" required="required" value="<?php echo $mname?>" type="text">
                            </div>
                          </div>

                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Last Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="lname" required="required" value="<?php echo $lname?>" type="text">
                            </div>
                          </div>


                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Contact # <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="cnumber" required="required" value="<?php echo $contact?>" type="text">
                            </div>
                          </div>  


                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Email <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="name" value="<?php echo $email?>" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="email" required="required" type="text">
                            </div>
                          </div>  

                          <div class="ln_solid"></div>
                          <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                              <button type="submit" name="btn-back" class="btn btn-primary"><i class="fa  fa-mail-reply"></i> Back</button>
                              <?php 
                                if(isset($_POST['btn-back'])){
                                  echo '<script>window.location.href="index.php"</script>';
                                }
                              ?>
                              <button type="submit" name="btn-update" class="btn btn-success"><i class="fa  fa-pencil"></i> Update</button>
                              <button type="submit" name="btn-add" class="btn btn-danger"><i class="fa  fa-trash"></i> Delete</button>
                            </div>
                          </div>
                      </form>


                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>


    <?php include 'scripts.php'; ?>

  </body>
</html>
