<?php $this->view('partials/header'); ?>
        <?php if(isset($_SESSION['message'])) : ?>
                <div class="alert alert-success" role="alert">                 
                    <?php  
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);    
                    ?>
                </div>
                
            <?php endif; ?>
         <div class="card" style="width: 100%;">
            <div class="card-body">
                <h4 class="card-title float-left">Posts </h4>
                <p class="float-right"><a href="<?php echo URL ?>/posts/new"><button type="button" class="btn btn-outline-primary">Add Post</button></a></p> 
                  <br><br><br>
                 <ul class="list-group ">
                    <?php foreach ($datas as $data): ?>
                        <li class="list-group-item"><?php echo $data->title; ?>
                            
                                <form action="<?php echo URL; ?>/posts/<?php echo $data->id; ?>" method="POST">
                                    <input type="hidden" name="method" value="DELETE">
                                    <input type="submit" class="btn btn-outline-danger btn-sm float-right " value="Delete">
                                </form> 
                           
                            <p class="float-right .ml-1"><a href="<?php echo URL ?>/posts/<?php echo $data->id; ?>/edit"><button type="button" class="btn btn-outline-dark btn-sm">Edit</button></a></p> 
                            <p class="float-right .ml-1"><a href="<?php echo URL ?>/posts/<?php echo $data->id; ?>"><button type="button" class="btn btn-outline-secondary btn-sm">View</button></a></p> 
                        </li>                     
                    <?php endforeach; ?>
                 </ul>
            </div>
               
        </div>

<?php $this->view('partials/footer'); ?>

 