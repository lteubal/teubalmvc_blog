<?php $this->view('partials/header'); ?>

<div class="row justify-content-md-center" >

    <form action="http://leonardoteubal.com/teubalmvc_blog/public/users/index" method="post">
        <?php if(isset($_SESSION['error'])) : ?>
            <div class="form-group">
                <div class="alert alert-danger" role="alert">
                  <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                  ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="form-group">
            <h3>LOGIN</h3>
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
        </div>
        <div class="card" style="width: 20rem;">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <br><br>
        <div class="form-group">
                <div class="alert alert-info" role="alert">
                    <strong>To test the admin area use:</strong><br><br>
                    <strong>Email:</strong> <em>demo@demo.com</em> <br>
                    <strong>Password:</strong> <em>demo</em><br>
                </div>
            </div>
    </form>

</div>

<?php $this->view('partials/footer'); ?>
