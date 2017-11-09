<?php $this->view('partials/header'); ?>
    

<p class="float-right"><a href="<?php echo URL ?>/posts"><button type="button" class="btn btn-outline-dark btn-sm"><< Back to Posts</button></a></p>
<div class="card" style="width: 100%;">
  <div class="card-body">
      <h4 class="card-title float-left">Add a Post </h4>
      <form action="<?php echo URL; ?>/posts" method="POST">   
          <div class="form-group">
              <input type="text" class="form-control"   name="title" id="title" placeholder="Title">
          </div>
          <div class="form-group">
              <textarea rows="10" class="form-control"   name="text" id="text" placeholder="Text"></textarea>
          </div>
          <div class="form-group">
              <input type="text" class="form-control"   name="author" id="author" placeholder="Author">
          </div>
          <div class="form-group">
            <input type="submit" value="Add" class="btn btn-primary">
          </div>    
      </form>
  </div>
</div>

<?php $this->view('partials/footer'); ?>