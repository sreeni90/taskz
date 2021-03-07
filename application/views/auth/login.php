<?php $this->load->view('templates/header');?>
 <!-- container --> 
  <section class="showcase">
    <div class="container">
      <form action="<?php echo base_url();?>auth/checkLogin" class="pb-2 mt-4 mb-2"  method="post" accept-charset="utf-8" enctype="multipart/form-data">
      <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-6 pb-5">
    <div class="row"><?php echo validation_errors('<div class="col-12 col-md-12 col-lg-12"><div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>', '</div></div>'); ?></div>
        <!--Form with header-->
            <div class="card border-info rounded-0">
                <div class="card-header p-0">
                    <div class="bg-login-page text-center py-2">
                        <h3> <i class="fa fa-user"></i> Login </h3>
                    </div>
                </div>
                <div class="card-body p-3">                
                    <!--Body-->
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                            </div>
                            <input type="text" class="form-control" id="username" name="user_name" placeholder="User Name *" value="sreeni">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-key text-info" aria-hidden="true"></i></div>
                            </div>
                            <input type="password" class="form-control" id="rpassword" name="password" placeholder="Password *" value="admin">
                        </div>
                    </div>                                
                       
                    <div class="text-center">
                        <button type="submit" id="login-submit" class="btn btn-info btn-block rounded-0 py-2">Login</button>
                    </div>
                </div>
            </div> 
          </div>
        </div>
    </form>
    </div>
  </section>
 <?php $this->load->view('templates/footer');?>        