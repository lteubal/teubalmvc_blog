<?php $this->view('partials/header'); ?>
    

<p class="float-right"><a href="<?php echo URL ?>/posts/"><button type="button" class="btn btn-outline-dark btn-sm"><< Back to Posts</button></a></p>
<div class="card" style="width: 100%;">
  <div class="card-body">
      <h4 class="card-title float-left">Edit Post </h4>
      <form action="<?php echo URL; ?>/posts/<?php echo $datas->id; ?>" method="POST">   
          <div class="form-group">
              <input type="text" class="form-control"   name="title" id="title" placeholder="Title" value="<?php echo $datas->title; ?>">
          </div>
          <div class="form-group">
              <textarea rows="10" class="form-control"   name="text" id="text" placeholder="Text"><?php echo $datas->text; ?></textarea>
          </div>
          <div class="form-group">
              <input type="text" class="form-control"   name="author" id="author" placeholder="Author" value="<?php echo $datas->author; ?>"> 
          </div>
          <div class="form-group">
            <input type="submit" value="Update" class="btn btn-primary">
          </div>    
          <input type="hidden" name="method" value="PATCH">
          <input type="hidden" name="id" value="<?php echo $datas->id; ?>">
      </form>
  </div>
</div>

<?php $this->view('partials/footer'); ?>