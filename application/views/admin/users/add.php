<h2 class="page-header">Add User</h2>
<?php echo validation_errors('<p class="alert alert-dismissable alert-danger">'); ?>
<?php echo form_open('admin/users/add') ?>

  <div class="form-group">
    <?php echo form_label('First Name', 'first_name') ?>
    <?php
      $data = array(
        'name'      => 'first_name',
        'id'        => 'first_name',
        'maxlength' => '50',
        'class'     => 'form-control',
        'value'     => set_value('first_name')
      );
    ?>
    <?php echo form_input($data) ?>
  </div>

  <div class="form-group">
    <?php echo form_label('Last Name', 'last_name') ?>
    <?php
      $data = array(
        'name'      => 'last_name',
        'id'        => 'last_name',
        'maxlength' => '50',
        'class'     => 'form-control',
        'value'     => set_value('last_name')
      );
    ?>
    <?php echo form_input($data) ?>
  </div>

  <div class="form-group">
    <?php echo form_label('Username', 'username') ?>
    <?php
      $data = array(
        'name'      => 'username',
        'id'        => 'username',
        'maxlength' => '20',
        'class'     => 'form-control',
        'value'     => set_value('username')
      );
    ?>
    <?php echo form_input($data) ?>
  </div>

  <div class="form-group">
    <?php echo form_label('Email', 'email') ?>
    <?php
      $data = array(
        'name'      => 'email',
        'id'        => 'email',
        'maxlength' => '150',
        'class'     => 'form-control',
        'value'     => set_value('email')
      );
    ?>
    <?php echo form_input($data) ?>
  </div>

  <div class="form-group">
    <?php echo form_label('Password', 'password') ?>
    <?php
      $data = array(
        'name'      => 'password',
        'id'        => 'password',
        'type'      => 'password',
        'maxlength' => '30',
        'class'     => 'form-control',
        'value'     => set_value('password')
      );
    ?>
    <?php echo form_password($data) ?>
  </div>

  <div class="form-group">
    <?php echo form_label('Confirm Password', 'password2') ?>
    <?php
      $data = array(
        'name'      => 'password2',
        'id'        => 'password2',
        'type'      => 'password',
        'maxlength' => '30',
        'class'     => 'form-control',
        'value'     => set_value('password2')
      );
    ?>
    <?php echo form_password($data) ?>
  </div>

  <?php echo form_submit('mysubmit', 'Add User', array('class' => "btn btn-primary")) ?>
<?php echo form_close() ?>
