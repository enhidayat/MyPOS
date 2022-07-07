 <!-- Content Header (Page header) -->
 <section class="content-header">
     <h1>
         Users
         <small>Pengguna</small>
     </h1>
     <ol class="breadcrumb">
         <li><a href="<?= site_url('user') ?>"><i class="fa fa-users"></i></a></li>
         <li class="active">Users</li>
     </ol>
 </section>

 <!-- Main content -->
 <section class="content">

     <div class="box">
         <div class="box-header">
             <h3 class="box-title">Update User </h3>
             <div class="pull-right">
                 <a href="<?= site_url('user/') ?>" class="btn btn-warning btn-flat">
                     <i class="fa fa-undo"></i>Back
                 </a>
             </div>
         </div>
         <!-- <?php echo validation_errors(); ?> -->
         <div class="box-body ">
             <div class="row">
                 <div class="col-md-4 col-md-offset-4">
                     <form action="" method="post">
                         <div class="form-group  <?= form_error('name') ? "has-error" : null ?> ">
                             <input type="hidden" name="user_id" value="<?= $users->user_id ?>">
                             <label for="name">Nama *</label>
                             <input type="text" class="form-control" name="name" value="<?= $this->input->post('name') ?? $users->name ?>" id="name">
                             <span class="help-block"><?= form_error('name') ?></span>
                         </div>
                         <div class="form-group"><label for="username">Usernama *</label>
                             <input type="text" class="form-control" name="username" value="<?= $this->input->post('username') ?? $users->username ?>" id="username">
                             <?= form_error('username') ?>
                         </div>
                         <div class="form-group"><label for="password">Password </label><small>(Biarkan koseong jika tidak diganti)</small>
                             <input type="password" class="form-control" name="password" value="<?= $this->input->post('password') ?>" id="password">
                             <?= form_error('password') ?>
                         </div>
                         <div class="form-group"><label for="passconf">Password Confirmation</label>
                             <input type="password" class="form-control" name="passconf" value="<?= $this->input->post('passconf') ?>" id="passconf">
                             <?= form_error('passconf') ?>
                         </div>

                         <div class="form-group"><label for="address">Address </label>
                             <textarea type="text" class="form-control" name="address" id="address"><?= $this->input->post('address') ?? $users->address ?></textarea>
                             <?= form_error('address') ?>
                         </div>
                         <div class="form-group"><label for="level">level </label>
                             <select type="text" class="form-control" name="level" id="level">
                                 <?php $level = $this->input->post('level') ? $this->input->post('level') : $users->level; ?>
                                 <option value="">Pilih</option>
                                 <option value="1" <?= $level == 1 ? "selected" : null ?>>Admin</option>
                                 <option value="2" <?= $level == 2 ? "selected" : null ?>>Kasir</option>
                             </select>
                             <?= form_error('level') ?>
                         </div>
                         <div class="form-group">
                             <button type="submit" class="btn btn-warning " btn-flat><i class="fa fa-paper-plane"></i>Update</button>
                             <button type="reset" class="btn " btn-flat>Reset</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>



 </section>
 <!-- /.content -->