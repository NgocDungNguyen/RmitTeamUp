<!doctype html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <title>CRM Rmit</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="Trang đăng nhập - Tạp Chí Hội Tâm Lý Học Việt Nam">
   <link rel="shortcut icon" href="<?= base_url('public/img/lg.png'); ?>">
   <script src="<?= base_url('public/backend/'); ?>assets/js/layout.js"></script>
   <link href="<?= base_url('public/backend/'); ?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
   <link href="<?= base_url('public/backend/'); ?>assets/css/icons.min.css" rel="stylesheet" type="text/css">
   <link href="<?= base_url('public/backend/'); ?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">
</head>
<body>
   <div class="auth-maintenance d-flex align-items-center min-vh-100">
      <div class="bg-overlay"></div>
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-md-10">
               <div class="auth-full-page-content d-flex min-vh-100 py-sm-5 py-4">
                  <div class="w-100">
                     <div class="d-flex flex-column h-100 py-0 py-xl-3">
                       
                        <div class="card my-auto overflow-hidden" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                           <div class="row g-0">
                              <div class="col-lg-6">
                                 <div class="bg-overlay bg-primary"></div>
                                 <div class="h-100 bg-auth align-items-end">
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="p-lg-5 p-4">
                                    <div>
                                       <div class="text-center mt-1">
                                          <img src="<?= base_url('public/frontent/assets/img/logo.png'); ?>" alt="Rmit" width="130px">
                                          <h2 class="mt-2">RMIT UNIVERCITY</h2>
                                          <p>Đăng nhập để tiếp tục đến trang quản trị.</p>
                                       </div>
                                       <form action="<?= base_url('login-admin'); ?>" class="auth-input" method="post">
                                          <?php if($this->session->flashdata('success')){ ?>
                                             <div class="alert alert-success"><?= $this->session->flashdata('messenger') ?></div>
                                          <?php } ?>
                                          <?php if($this->session->flashdata('error')){ ?>
                                             <div class="alert alert-danger"><?= $this->session->flashdata('messenger') ?></div>
                                          <?php } ?>
                                          <div class="mb-2">
                                             <label for="username" class="form-label">Tên đăng nhập</label>
                                             <input type="text" class="form-control" placeholder="Tên đăng nhập" name="username" required>
                                          </div>
                                          <div class="mb-3">
                                             <label class="form-label" for="password-input">Mật khẩu</label>
                                             <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu của bạn" required>
                                          </div>
                                          <div class="form-check">
                                             <input class="form-check-input" type="checkbox" value="" id="auth-remember-check">
                                             <label class="form-check-label" for="auth-remember-check">Nhớ mật khẩu</label>
                                          </div>
                                          <div class="mt-3">
                                             <button class="btn btn-primary w-100" type="submit" name="login">Đăng nhập</button>
                                          </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script src="<?= base_url('public/backend/'); ?>assets/libs/jquery/jquery.min.js"></script>
<script src="<?= base_url('public/backend/'); ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('public/backend/'); ?>assets/libs/metismenu/metisMenu.min.js"></script>
<script src="<?= base_url('public/backend/'); ?>assets/libs/simplebar/simplebar.min.js"></script>
<script src="<?= base_url('public/backend/'); ?>assets/libs/node-waves/waves.min.js"></script>
<script src="public/backend/release/v2.0.1/script/monochrome/bundle.js"></script>
<script src="<?= base_url('public/backend/'); ?>assets/js/app.js"></script>
</body>
</html>