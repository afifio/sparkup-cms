<h2 class="page-header">Users</h2>
<?php if($this->session->flashdata('success')) :?>
  <?php echo '<div class="alert alert-success">'.$this->session->flashdata('success').'</div>' ?>
<?php endif ?>
<?php if($this->session->flashdata('error')) :?>
  <?php echo '<div class="alert alert-danger">'.$this->session->flashdata('success').'</div>' ?>
<?php endif ?>

<?php if($users) :?>
<table class="table table-striped">
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Username</th>
    <th>Email</th>
    <th>Date Created</th>
    <th></th>
  </tr>
  <?php foreach($users as $user) :?>
  <?php $date = strtotime($user->create_date) ?>
  <?php $formatted_date = date('F j, Y, g:i a ', $date) ?>
  <tr>
    <td><?php echo $user->id ?></td>
    <td><?php echo $user->first_name.' '.$user->last_name ?></td>
    <td><?php echo $user->username ?></td>
    <td><?php echo $user->email ?></td>
    <td><?php echo $formatted_date ?></td>
    <td>
      <?php echo anchor('admin/users/edit/'.$user->id.'', 'Edit', 'class="btn btn-default"') ?>
      <?php echo anchor('admin/users/delete/'.$user->id.'', 'Delete', 'class="btn btn-danger"') ?>
    </td>
  </tr>
<?php endforeach ?>
</table>
<?php else: ?>
  <p>No User</p>
<?php endif ?>
