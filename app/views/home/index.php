<?php  $this->view('partials/header'); ?>

<div class="blog-header">
 
    <h1 class="blog-title">Leonardo's Blog</h1>
    <p class="lead blog-description">An example of a basic mini-blog built with TeubalMVC PHP Framework.</p>
 
</div>

    <main role="main" class="container">

      <div class="row">

        <div class="col-sm-8 blog-main">

            <?php foreach ($datas as $data): ?>
                <div class="blog-post">
                    <h2 class="blog-post-title"><?php echo $data->title; ?></h2>
                    <p class="blog-post-meta">created on <?php echo $data->created_at; ?> by <a href="#"><?php echo $data->author; ?></a></p>
                    <p><?php echo $data->text; ?></p>
                </div><!-- /.blog-post -->
            <?php endforeach; ?>  

        </div><!-- /.blog-main -->

        <aside class="col-sm-3 ml-sm-auto blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div>
           
        </aside><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </main><!-- /.container -->

    <footer class="blog-footer">
       <p>
        <a href="#">Back to top</a>
      </p>
    </footer>

<?php $this->view('partials/footer'); ?>