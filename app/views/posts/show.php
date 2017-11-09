<?php $this->view('partials/header'); ?>
 
<p class="float-right"><a href="<?php echo URL ?>/posts/"><button type="button" class="btn btn-outline-dark btn-sm"><< Back to Posts</button></a></p>
<p class="float-right"><a href="<?php echo URL ?>/posts/<?php echo $datas->id; ?>/edit"><button type="button" class="btn btn-outline-secondary btn-sm">Edit Post</button></a></p>
<div class="card" style="width: 100%;">
  <div class="card-body">
     <main role="main" class="container">
        <div class="row">
        <div class="col-sm-8 blog-main">
                <div class="blog-post">
                    <h2 class="blog-post-title"><?php echo $datas->title; ?></h2>
                    <p class="blog-post-meta">created on <?php echo $datas->created_at; ?> by <a href="#"><?php echo $datas->author; ?></a></p>
                    <p><?php echo $datas->text; ?></p>
                </div><!-- /.blog-post -->
        </div><!-- /.blog-main -->
        </div><!-- /.row -->
    </main><!-- /.container -->    
  </div>
</div>

<?php $this->view('partials/footer'); ?>