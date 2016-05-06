<!--Login Open-->
<article class="card shadow-1 login">
 <fieldset>
    <legend>Log In</legend>
    <?php echo $this->Form->create('User', array('action' => 'login')); ?>
      <div class="margenesHorizontales">
        <div class="form-group">
          <label>User</label>
          <?php echo $this->Form->input("email" ,array('type'=> 'text', 'label' => false,'div'=>false, 'class' => 'form-control', 'placeholder' => "User"))?>
        </div>
        <div class="form-group">
          <label>Password</label>
          <?php echo $this->Form->input("password" ,array("type"=>"password",'label' => false,'div'=>false,'class'=>"form-control", 'placeholder' => "Password" ))?>
        </div>
        <!-- <div class="form-group">
          <a href="<?php echo $this->webroot.'forgotPassword';?>">Forgot my password</a>
        </div> -->
      </div>
      <hr>
      <div class="margenesHorizontales margenesVerticales" style="text-align:right;">
        <button type="submit" class="btn btn-primary">
          Log In
        </button>
      </div>
    <?php echo $this->Form->end();?>
  </fieldset>
</article>
<!--Login  Close-->
