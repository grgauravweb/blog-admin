<?php
//"Header";
?>

<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
     <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
   
  </head>
  <body>
    <aside class="side-nav" id="show-side-navigation1">
      <i class="fa fa-bars close-aside hidden-sm hidden-md hidden-lg" data-close="show-side-navigation1"></i>
      <div class="heading">
        <img src="image/logo.png" alt="">
        <!--<div class="info">-->
        <!--  <h3><a href="#">iitlnimbus</a></h3>-->
          
        <!--</div>-->
      </div>
     
      <ul class="categories top-list">
        <li><i class="fa fa-home fa-fw" aria-hidden="true"></i><a href="/admin/dashboard">Dashboard</a></li>
        <li><i class="fa fa-User fa-fw"></i><a href="/admin/addblog">Add Blog</a></li>
        <li><i class="fa fa-users fa-fw"></i><a href="/admin/allblogs">All Blogs</a></li>
       
       
        </li>
       
      </ul>
    </aside>
    <section id="contents">
      <nav class="navbar navbar-default">
        <div class="container-fluid">
         <div class="navbar-header">
            
          <ul class="nav navbar-nav"> <li><a href="#"><i data-show="show-side-navigation1" class="fa fa-bars show-side-btn"></i></a></li></ul>
          </div>
          <div class=" navbar-collapse navbar-right">
            <ul class="nav navbar-nav">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My profile                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#"><i class="fa fa-user-o fw"></i> My account</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="/admin?action=logout"><i class="fa fa-sign-out"></i> Log out</a></li>
                </ul>
              </li>
             
             
            </ul>
          </div>
          
          
       
          </div>
          
        </div>
      </nav>


