<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Favicon -->
      <link href="<?= base_url('images/logo.ico'); ?>" rel="icon" type="image/png">
      <!-- title and description-->
      <title>Rmit University</title>
      <meta name="description" content="Rmit University">
      <!-- css files -->
      <link rel="stylesheet" href="<?= base_url('public/frontent/'); ?>assets/css/tailwind.css">
      <link rel="stylesheet" href="<?= base_url('public/frontent/'); ?>assets/css/style.css">
      <!-- google font -->
      <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
   </head>
   <body>
      <div class="sm:flex">
         <div class="relative lg:w-[580px] md:w-96 w-full p-10 min-h-screen bg-white shadow-xl flex items-center pt-10 dark:bg-slate-900 z-10">
            <div class="w-full lg:max-w-sm mx-auto space-y-10" uk-scrollspy="target: > *; cls: uk-animation-scale-up; delay: 100 ;repeat: true">
               <!-- logo image-->
               <img src="<?= base_url('public/frontent/'); ?>assets/img/logo.png" class="w-28 absolute top-10 left-10 dark:hidden" alt="">
               <!-- logo icon optional -->
               <div class="hidden">
                  <img class="w-12" src="<?= base_url('public/frontent/'); ?>assets/images/logo-icon.png" alt="">
               </div>
               <!-- title -->
               <div>
                  <h2 class="text-2xl font-semibold mb-1.5"> Đăng ký để bắt đầu </h2>
                  <p class="text-sm text-gray-700 font-normal">Nếu bạn đã có tài khoản, <a href="login" class="text-blue-700">Đăng nhập tại đây!</a></p>
               </div>
               <!-- form -->
               <form method="post" action="<?= base_url('register-check'); ?>" class="space-y-7 text-sm text-black font-medium dark:text-white" uk-scrollspy="target: > *; cls: uk-animation-scale-up; delay: 100 ;repeat: true">
                  <div class="grid grid-cols-2 gap-4 gap-y-7">
                     <?php if($this->session->flashdata('success')){ ?>
                     <div class="alert alert-success"><?= $this->session->flashdata('messenger') ?></div>
                     <?php } ?>
                     <?php if($this->session->flashdata('error')){ ?>
                     <div uk-alert="" class="uk-alert col-span-2">
                        <div class="p-2 border bg-yellow-50 border-yellow-500/30 rounded-xl dark:bg-slate-700">
                           <div class="flex items-center justify-between gap-6">
                              <!-- icon -->
                              <div class="p-1 text-white bg-yellow-500 shadow rounded-xl shadow-yellow-300">
                                 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 01.67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 11-.671-1.34l.041-.022zM12 9a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd"></path>
                                 </svg>
                              </div>
                              <!-- text -->
                              <div class="text-base text-yellow-700"><?= $this->session->flashdata('messenger') ?></div>
                              <!-- icon close -->
                              <button type="button" class="flex p-1 text-gray-600 rounded-lg hover:bg-black/5 ml-auto uk-alert-close">
                                 <ion-icon name="close" class="text-xl"></ion-icon>
                              </button>
                           </div>
                        </div>
                     </div>
                     <?php } ?>
                     <!-- first name -->
                     <div class="col-span-2">
                        <label for="email" class="">Tên sinh viên <span style="color: red">(* Trùng tên thẻ sinh viên)</span></label>
                        <div class="mt-2.5">
                           <input id="text" name="username" type="text" autofocus="" placeholder="Tên sinh viên" required="" class="!w-full !rounded-lg !bg-transparent !shadow-sm !border-slate-200 dark:!border-slate-800 dark:!bg-white/5"> 
                        </div>
                     </div>
                     <!-- email -->
                     <div class="col-span-2">
                        <label for="email" class="">Mã sinh viên <span style="color: red">(* Trùng tên thẻ sinh viên)</label>
                        <div class="mt-2.5">
                           <input id="email" name="msv" type="text" placeholder="Mã sinh viên" required class="!w-full !rounded-lg !bg-transparent !shadow-sm !border-slate-200 dark:!border-slate-800 dark:!bg-white/5"> 
                        </div>
                     </div>
                     <!-- password -->
                     <div>
                        <label for="email" class="">Mật khẩu</label>
                        <div class="mt-2.5">
                           <input id="password" name="password" type="password" placeholder="***" required class="!w-full !rounded-lg !bg-transparent !shadow-sm !border-slate-200 dark:!border-slate-800 dark:!bg-white/5">  
                        </div>
                     </div>
                     <!-- Confirm Password -->
                     <div>
                        <label for="email" class="">Nhập lại mật khẩu</label>
                        <div class="mt-2.5">
                           <input id="password" name="repassword" type="password" placeholder="***" required class="!w-full !rounded-lg !bg-transparent !shadow-sm !border-slate-200 dark:!border-slate-800 dark:!bg-white/5">  
                        </div>
                     </div>
                     <!-- submit button -->
                     <div class="col-span-2">
                        <button type="submit" name="register" class="button bg-primary text-white w-full">Đăng Kí</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
         <!-- image slider -->
         <div class="flex-1 relative bg-primary max-md:hidden">
            <div class="relative w-full h-full" tabindex="-1" uk-slideshow="animation: slide; autoplay: true">
               <ul class="uk-slideshow-items w-full h-full">
                  <li class="w-full">
                     <img src="<?= base_url('images/team.jpg'); ?>" alt="" class="w-full h-full object-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-center-left">
                     <div class="w-full h-96 bg-gradient-to-t from-black absolute bottom-0 left-0"></div>
                  </li>
                  <li class="w-full">
                     <img src="<?= base_url('images/rmit.jpg'); ?>" alt="" class="w-full h-full object-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-center-left">
                     <div class="w-full h-96 bg-gradient-to-t from-black absolute bottom-0 left-0"></div>
                  </li>
               </ul>
               <!-- slide nav -->
               <div class="flex justify-center">
                  <ul class="inline-flex flex-wrap justify-center  absolute bottom-8 gap-1.5 uk-dotnav uk-slideshow-nav"> </ul>
               </div>
            </div>
         </div>
      </div>
      <script src="<?= base_url('public/frontent/'); ?>assets/js/uikit.min.js"></script>
      <script src="<?= base_url('public/frontent/'); ?>assets/js/script.js"></script>
   </body>
</html>