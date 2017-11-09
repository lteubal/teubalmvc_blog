<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="http://leonardoteubal.com/teubalmvc_blog/css/style.css">

    <title><?php echo TITLE; ?></title>
</head>
<body>

<header>
<nav class="navbar navbar-expand-lg navbar-dark mb-3" >
  <div class="container">
    <a class="navbar-brand" href="http://leonardoteubal.com/teubalmvc_blog">Leonardo's Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
          <a class="nav-link" href="http://leonardoteubal.com/teubalmvc_blog">Home </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
                      <!-- <li class="nav-item ">
                  <a class="nav-link" href="http://leonardoteubal.com/teubalmvc_blog/users/register">Register </a>
                </li> -->

                    <?php if(!isset($_SESSION['id'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="http://leonardoteubal.com/teubalmvc_blog/users/login">Login</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="http://leonardoteubal.com/teubalmvc_blog/users/index">Dashboard</a>
                        </li
                        <li class="nav-item">
                            <a class="nav-link" href="http://leonardoteubal.com/teubalmvc_blog/users/logout">Logout</a>
                        </li>
                    <?php endif; ?>


            </ul>

    </div>
  </div>
</nav>


</header>

<div class="container">
