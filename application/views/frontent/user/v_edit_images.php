<?php 
$user = $this->session->userdata('UserFrontent');
$view_user = $this->db->select('*')->from('rmit_user')->where('id',$user['iduser'])->get()->row_array();
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- Favicon -->
   <link href="<?= base_url('images/logo.ico'); ?>" rel="icon" type="image/ico">
   <!-- title and description-->
   <title>Active Profile Rmit Team Finding</title>
   <meta name="description" content="Rmit Team Finding">
   <!-- css files -->
   <link rel="stylesheet" href="<?= base_url('public/frontent/'); ?>assets/css/tailwind.css">
   <link rel="stylesheet" href="<?= base_url('public/frontent/'); ?>assets/css/style.css">
   <!-- google font -->
   <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
   <div id="wrapper">
      <!-- header -->
      <header class="z-[100] h-[--m-top] fixed top-0 left-0 w-full flex items-center bg-white/80 sky-50 backdrop-blur-xl border-b border-slate-200 dark:bg-dark2 dark:border-slate-800">
         <div class="flex items-center w-full xl:px-6 px-2 max-lg:gap-10">
            <div class="2xl:w-[--w-side] lg:w-[--w-side-sm]">
               <!-- left -->
               <div class="flex items-center gap-1">
                  <!-- icon menu -->
                  <button uk-toggle="target: #site__sidebar ; cls :!-translate-x-0" class="flex items-center justify-center w-8 h-8 text-xl rounded-full hover:bg-gray-100 xl:hidden dark:hover:bg-slate-600 group">
                     <ion-icon name="menu-outline" class="text-2xl group-aria-expanded:hidden"></ion-icon>
                     <ion-icon name="close-outline" class="hidden text-2xl group-aria-expanded:block"></ion-icon>
                  </button>
                  <div id="logo">
                     <a href="<?= base_url(); ?>"> 
                        <img src="<?= base_url('public/frontent/'); ?>assets/img/logo.png" alt="" class="w-28 md:block hidden dark:!hidden">
                     </a>
                  </div>
               </div>
            </div>
            <div class="flex-1 relative">

            </div>
         </div>
      </header>
      <!-- sidebar -->
      <div id="site__sidebar" class="fixed top-0 left-0 z-[99] pt-[--m-top] overflow-hidden transition-transform xl:duration-500 max-xl:w-full max-xl:-translate-x-full">
         <!-- sidebar inner -->
         <div class="p-2 max-xl:bg-white shadow-sm 2xl:w-72 sm:w-64 w-[80%] h-[calc(100vh-64px)] relative z-30 max-lg:border-r dark:max-xl:!bg-slate-700 dark:border-slate-700">
            <div class="pr-4" data-simplebar="">
               <nav id="side">
                  <ul>
                     <li class="active">
                        <a href="<?= base_url('profile-active') ?>">
                           <img src="<?= base_url('public/frontent/'); ?>assets/images/icons/home.png" alt="feeds" class="w-6">
                           <span>Xác minh danh tính</span> 
                        </a>
                     </li>
                  </ul>
               </nav>
            </div>
         </div>
         <!-- sidebar overly -->
         <div id="site__sidebar__overly" class="absolute top-0 left-0 z-20 w-screen h-screen xl:hidden backdrop-blur-sm" uk-toggle="target: #site__sidebar ; cls :!-translate-x-0"> 
         </div>
      </div>
      <!-- main contents -->
      <main id="site__main" class="2xl:ml-[--w-side]  xl:ml-[--w-side-sm] p-2.5 h-[calc(100vh-var(--m-top))] mt-[--m-top]">
         <div class="max-w-3xl mx-auto">
            <div class="box relative rounded-lg shadow-md">
               <div class="flex md:gap-8 gap-4 items-center md:p-8 p-6 md:pb-4">
                  <div class="relative md:w-20 md:h-20 w-12 h-12 shrink-0">
                     <label for="file" class="cursor-pointer">
                        <img id="img" src="<?= base_url('images/no-avatar.jpg'); ?>" class="object-cover w-full h-full rounded-full" alt="">
                     </label>
                  </div>
                  <div class="flex-1">
                     <h3 class="md:text-xl text-base font-semibold text-black dark:text-white">  <?= $view_user['username']; ?></h3>
                     <p class="text-sm text-blue-600 mt-1 font-normal">@<?= $view_user['msv']; ?></p>
                  </div>
               </div>
               <!-- nav tabs -->
               <div class="relative border-b" tabindex="-1" uk-slider="finite: true">
                  <nav class="uk-slider-container overflow-hidden nav__underline px-6 p-0 border-transparent -mb-px">
                     <ul class="uk-slider-items w-[calc(100%+10px)] !overflow-hidden" uk-switcher="connect: #setting_tab ; animation: uk-animation-slide-right-medium, uk-animation-slide-left-medium">
                        <li class="w-auto pr-2.5"> <a href="#"> Chỉnh sửa ảnh thẻ sinh viên </a> </li>
                     </ul>
                  </nav>
                  <a class="absolute -translate-y-1/2 top-1/2 left-0 flex items-center w-20 h-full p-2 py-1 justify-start bg-gradient-to-r from-white via-white dark:from-slate-800 dark:via-slate-800" href="#" uk-slider-item="previous">
                     <ion-icon name="chevron-back" class="text-2xl ml-1"></ion-icon>
                  </a>
                  <a class="absolute right-0 -translate-y-1/2 top-1/2 flex items-center w-20 h-full p-2 py-1 justify-end bg-gradient-to-l from-white via-white dark:from-slate-800 dark:via-slate-800" href="#" uk-slider-item="next">
                     <ion-icon name="chevron-forward" class="text-2xl mr-1"></ion-icon>
                  </a>
               </div>
               <div id="setting_tab" class="uk-switcher md:py-12 md:px-20 p-6 overflow-hidden text-black text-sm">
                  <!-- tab user basic info -->
                  <div>
               <div class="mt-5">
                  <form method="post" action="<?= base_url('profile-edit-images-check'); ?>" class="space-y-7 text-sm text-black font-medium dark:text-white" uk-scrollspy="target: > *; cls: uk-animation-scale-up; delay: 100 ;repeat: true" enctype="multipart/form-data">
                     <div class="">
                     <p class="mb-2">Thẻ sinh viên:</p>
                     <img src="<?= base_url('uploads/'.$view_user['images_check']); ?>" alt="">
                  </div>
                  <div class="space-y-6">
                     <div class="md:flex items-center gap-10">
                        <label class="md:w-32 text-right"> Thẻ sinh viên</label>
                        <div class="flex-1 max-md:mt-4">
                           <input type="file" class="lg:w-1/2 w-full" name="images_check" required>
                        </div>
                     </div>
                  </div>
                  <div class="flex items-center gap-4 mt-16 lg:pl-[10.5rem]">
                     <button type="submit" class="button lg:px-10 bg-primary text-white max-md:flex-1" name="save"> Save <span class="ripple-overlay"></span></button>
                  </div>
               </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</main>
</div>
<!-- open chat box -->

<!-- Javascript  -->
<script src="<?= base_url('public/frontent/'); ?>assets/js/uikit.min.js"></script>
<script src="<?= base_url('public/frontent/'); ?>assets/js/simplebar.js"></script>
<script src="<?= base_url('public/frontent/'); ?>assets/js/script.js"></script>
<!-- Ion icon -->
<script type="module" src="../ionicons%405.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule="" src="../ionicons%405.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>