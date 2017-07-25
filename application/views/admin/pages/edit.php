<h2 class="page-header">Edit Page</h2>
<?php echo validation_errors('<p class="alert alert-danger">'); ?>

<?php echo form_open('admin/pages/edit/'.$item->id) ?>
  <div class="form-group">
    <?php echo form_label('Page Title', 'title') ?>
    <?php
      $data = array(
        'name'      => 'title',
        'id'        => 'title',
        'maxlength' => '100',
        'class'     => 'form-control',
        'value'     => $item->title
      );
    ?>
    <?php echo form_input($data) ?>
  </div>

  <!-- Page Subject -->
  <div class="form-group">
    <?php echo form_label('Subject', 'subject_id') ?>
    <?php echo form_dropdown('subject_id', $subject_options, $item->subject_id, array('class' => 'form-control')) ?>
  </div>

  <!-- Page body -->
  <div class="form-group">
    <?php echo form_label('Body', 'body') ?>
    <?php $data = array(
      'name'    => 'body',
      'id'      => 'body',
      'class'   => 'form-control',
      'value'   => $item->body
    ); ?>
    <?php echo form_textarea($data) ?>
  </div>

  <?php

  if ($item->is_published == 1) {
    $yes = true;
    $no = false;
  } else {
    $yes = false;
    $no = true;
  }

  ?>

  <!-- Page options -->
  <div class="form-group">
    <?php echo form_label('Published', 'is_published') ?>
    <?php echo form_radio('is_published', 1, $yes) ?>Yes
    <?php echo form_radio('is_published', 0, $no) ?>No
  </div>

  <?php

  if ($item->is_featured == 1) {
    $yes = true;
    $no = false;
  } else {
    $yes = false;
    $no = true;
  }

  ?>

  <div class="form-group">
    <?php echo form_label('Featured', 'is_featured') ?>
    <?php echo form_radio('is_featured', 1, $yes) ?>Yes
    <?php echo form_radio('is_featured', 0, $no) ?>No
  </div>

  <?php

  if ($item->in_menu == 1) {
    $yes = true;
    $no = false;
  } else {
    $yes = false;
    $no = true;
  }

  ?>

  <div class="form-group">
    <?php echo form_label('In Menu', 'in_menu') ?>
    <?php echo form_radio('in_menu', 1, $yes) ?>Yes
    <?php echo form_radio('in_menu', 0, $no) ?>No
  </div>

  <!-- Order -->
  <div class="form-grout">
    <?php echo form_label('Order', 'order') ?>
    <input id="order" type="number" name="order" value="<?php echo $item->order?>" class="form-control">
  </div>
  <?php echo form_submit('mysubmit', 'Update Page', array('class' => "btn btn-primary")) ?>
<?php echo form_close() ?>
