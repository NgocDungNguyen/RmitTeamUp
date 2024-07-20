<?php 
$user = $this->session->userdata('UserFrontent');
$view_user = $this->db->select('*')->from('rmit_user')->where('id',$user['iduser'])->get()->row_array();
$avatar = base_url('uploads/'.$view_user['user_avatar']);
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
   <title>Rmit Team Finding</title>
   <meta name="description" content="Rmit Team Finding">
   <!-- css files -->
   <link rel="stylesheet" href="<?= base_url('public/frontent/'); ?>assets/css/tailwind.css">
   <link rel="stylesheet" href="<?= base_url('public/frontent/'); ?>assets/css/style.css">
   <!-- google font -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="<?= base_url(); ?>public/frontent/toast/css/jquery.toast.css">
   <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
   <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
   <script>
     $(document).ready(function(){
      $("#load_num_noti_head").load("<?= base_url('load-num-noti-head'); ?>");
   });
     $(document).ready(function(){
      $("#load_num_mess").load("<?= base_url('load-num-mess'); ?>");
   });
     function load_num_noti(){
        $("#load_num_noti_head").load("<?= base_url('load-num-noti-head'); ?>");
     }
     function load_num_mess(){
        $("#load_num_mess").load("<?= base_url('load-num-mess'); ?>");
     }
     init_reload_time();
     function init_reload_time(){
        setInterval( function() {
         load_num_noti().reload();
         load_num_mess().reload();
      },25000);
     }
  </script>
  <script>
// In your Javascript (external .js resource or <script> tag)
   $(document).ready(function() {
     $('.js-example-basic-single').select2();
  });

</script>

<?php $this->load->view('frontent/layout/v_noti');?>

</head>
<body <?php if($this->session->flashdata('access') == 'ok'){?>onload="thanhcong()"<?php } ?><?php if($this->session->flashdata('error') == 'ok'){?>onload="thatbai()"<?php } ?>>
   <div id="wrapper">
      <!-- header -->
      <header class="z-[100] h-[--m-top] fixed top-0 left-0 w-full flex items-center bg-white/80 sky-50 backdrop-blur-xl border-b border-slate-200 dark:bg-dark2 dark:border-slate-800">
         <div class="flex items-center w-full xl:px-6 px-2 max-lg:gap-10">
            <div class="2xl:w-[--w-side] lg:w-[--w-side-sm]">
               <!-- left -->
               <div class="flex items-center gap-1">
                  <!-- icon menu -->
                  <button uk-toggle="target: #site__sidebar ; cls :!-translate-x-0" class="flex items-center justify-center w-8 h-8 text-xl rounded-full hover:bg-gray-100 xl:hidden dark:hover:bg-slate-600 group">
                     <ion-icon name="menu-outline" class="text-2xl group-aria-expanded:hidden"><i class="fa-solid fa-bars"></i></ion-icon>
                     <ion-icon name="close-outline" class="hidden text-2xl group-aria-expanded:block"><i class="fa-solid fa-xmark"></i></ion-icon>
                  </button>
                  <div id="logo">
                     <a href="<?= base_url(); ?>"> 
                        <img src="<?= base_url('public/frontent/'); ?>assets/img/logo.png" alt="" class="w-28 md:block hidden dark:!hidden">
                                <img src="<?= base_url('public/frontent/'); ?>assets/img/logo.png" alt="" class="dark:md:block hidden">
                                <img src="<?= base_url('public/frontent/'); ?>assets/img/logo.png" class="hidden max-md:block w-20 dark:!hidden" alt="">
                                <img src="<?= base_url('public/frontent/'); ?>assets/img/logo.png" class="hidden dark:max-md:block w-20" alt="">
                     </a>
                  </div>
               </div>
            </div>
            <div class="flex-1 relative">
               <div class="max-w-[1220px] mx-auto flex items-center">
                  <!-- search -->
                  <div id="search--box" class="xl:w-[680px] sm:w-96 sm:relative rounded-xl overflow-hidden z-20 bg-secondery max-md:hidden w-screen left-0 max-sm:fixed max-sm:top-2 dark:!bg-white/5">
                     <ion-icon name="search" class="absolute left-4 top-1/2 -translate-y-1/2"></ion-icon>
                     <input type="text" placeholder="Search Friends, videos .." class="w-full !pl-10 !font-normal !bg-transparent h-12 !text-sm">
                  </div>
                  <!-- search dropdown-->
                  <div class="hidden uk- open z-10" uk-drop="pos: bottom-center ; animation: uk-animation-slide-bottom-small;mode:click ">
                     <div class="xl:w-[694px] sm:w-96 bg-white dark:bg-dark3 w-screen p-2 rounded-lg shadow-lg -mt-14 pt-14">
                        <div class="flex justify-between px-2 py-2.5 text-sm font-medium">
                           <div class=" text-black dark:text-white">Recent</div>
                           <button type="button" class="text-blue-500">Clear</button>
                        </div>
                        <nav class="text-sm font-medium text-black dark:text-white">
                           <a href="#" class=" relative px-3 py-1.5 flex items-center gap-4 hover:bg-secondery rounded-lg dark:hover:bg-white/10">
                              <img src="<?= base_url('public/frontent/'); ?>assets/images/avatars/avatar-2.jpg" class="w-9 h-9 rounded-full"> 
                              <div>
                                 <div> Jesse Steeve </div>
                                 <div class="text-xs text-blue-500 font-medium mt-0.5">  Friend </div>
                              </div>
                              <ion-icon name="close" class="text-base absolute right-3 top-1/2 -translate-y-1/2 "></ion-icon>
                           </a>
                           <a href="#" class=" relative px-3 py-1.5 flex items-center gap-4 hover:bg-secondery rounded-lg dark:hover:bg-white/10">
                              <img src="<?= base_url('public/frontent/'); ?>assets/images/avatars/avatar-2.jpg" class="w-9 h-9 rounded-full"> 
                              <div>
                                 <div>  Martin Gray </div>
                                 <div class="text-xs text-blue-500 font-medium mt-0.5">  Friend </div>
                              </div>
                              <ion-icon name="close" class="text-base absolute right-3 top-1/2 -translate-y-1/2 "></ion-icon>
                           </a>
                           <a href="#" class=" relative px-3 py-1.5 flex items-center gap-4 hover:bg-secondery rounded-lg dark:hover:bg-white/10">
                              <img src="<?= base_url('public/frontent/'); ?>assets/images/group/group-2.jpg" class="w-9 h-9 rounded-full"> 
                              <div>
                                 <div>  Delicious Foods  </div>
                                 <div class="text-xs text-rose-500 font-medium mt-0.5">  Group </div>
                              </div>
                              <ion-icon name="close" class="text-base absolute right-3 top-1/2 -translate-y-1/2 "></ion-icon>
                           </a>
                           <a href="#" class=" relative px-3 py-1.5 flex items-center gap-4 hover:bg-secondery rounded-lg dark:hover:bg-white/10">
                              <img src="<?= base_url('public/frontent/'); ?>assets/images/group/group-1.jpg" class="w-9 h-9 rounded-full"> 
                              <div>
                                 <div> Delicious Foods  </div>
                                 <div class="text-xs text-yellow-500 font-medium mt-0.5">  Page </div>
                              </div>
                              <ion-icon name="close" class="text-base absolute right-3 top-1/2 -translate-y-1/2 "></ion-icon>
                           </a>
                           <a href="#" class=" relative px-3 py-1.5 flex items-center gap-4 hover:bg-secondery rounded-lg dark:hover:bg-white/10">
                              <img src="<?= base_url('public/frontent/'); ?>assets/images/avatars/avatar-6.jpg" class="w-9 h-9 rounded-full"> 
                              <div>
                                 <div>  John Welim </div>
                                 <div class="text-xs text-blue-500 font-medium mt-0.5">  Friend </div>
                              </div>
                              <ion-icon name="close" class="text-base absolute right-3 top-1/2 -translate-y-1/2 "></ion-icon>
                           </a>
                           <a href="#" class="hidden relative  px-3 py-1.5 flex items-center gap-4 hover:bg-secondery rounded-lg dark:hover:bg-white/10">
                              <ion-icon class="text-2xl" name="search-outline"></ion-icon>
                              Creative ideas about Business  
                           </a>
                           <a href="#" class="hidden relative  px-3 py-1.5 flex items-center gap-4 hover:bg-secondery rounded-lg dark:hover:bg-white/10">
                              <ion-icon class="text-2xl" name="search-outline"></ion-icon>
                              8 Facts About Writting  
                           </a>
                        </nav>
                        <hr class="-mx-2 mt-2 hidden">
                        <div class="flex justify-end pr-2 text-sm font-medium text-red-500 hidden">
                           <a href="#" class="flex hover:bg-red-50 dark:hover:bg-slate-700 p-1.5 rounded">
                              <ion-icon name="trash" class="mr-2 text-lg"></ion-icon>
                              Clear your history
                           </a>
                        </div>
                     </div>
                  </div>
                  <!-- header icons -->
                  <div class="flex items-center sm:gap-4 gap-2 absolute right-5 top-1/2 -translate-y-1/2 text-black">
                     <span id="load_num_noti_head"></span>
                     <!-- messages -->
                     <a href="<?= base_url('messages'); ?>">
                        <button type="button" class="sm:p-2 p-1 rounded-full relative sm:bg-secondery dark:text-white" uk-tooltip="title: Messages; pos: bottom; offset:6">
                           <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor" class="w-6 h-6 max-sm:hidden">
                              <path fill-rule="evenodd" d="M4.848 2.771A49.144 49.144 0 0112 2.25c2.43 0 4.817.178 7.152.52 1.978.292 3.348 2.024 3.348 3.97v6.02c0 1.946-1.37 3.678-3.348 3.97a48.901 48.901 0 01-3.476.383.39.39 0 00-.297.17l-2.755 4.133a.75.75 0 01-1.248 0l-2.755-4.133a.39.39 0 00-.297-.17 48.9 48.9 0 01-3.476-.384c-1.978-.29-3.348-2.024-3.348-3.97V6.741c0-1.946 1.37-3.68 3.348-3.97zM6.75 8.25a.75.75 0 01.75-.75h9a.75.75 0 010 1.5h-9a.75.75 0 01-.75-.75zm.75 2.25a.75.75 0 000 1.5H12a.75.75 0 000-1.5H7.5z" clip-rule="evenodd"></path>
                           </svg>
                           <div class="absolute top-0 right-0 -m-1 bg-red-600 text-white text-xs px-1 rounded-full"><span id="load_num_mess_head"></span></div>
                           <ion-icon name="notifications-outline" class="sm:hidden text-2xl"><i class="fa-regular fa-message" style="font-size: 22px;"></i></ion-icon>
                        </button>
                     </a>
                     <!-- profile -->
                     <div class="rounded-full relative bg-secondery cursor-pointer shrink-0">
                        <img src="<?php get_img($avatar); ?>" alt="" class="sm:w-9 sm:h-9 w-7 h-7 rounded-full shadow shrink-0"> 
                     </div>
                     <div class="hidden bg-white rounded-lg drop-shadow-xl dark:bg-slate-700 w-64 border2" uk-drop="offset:6;pos: bottom-right;animate-out: true; animation: uk-animation-scale-up uk-transform-origin-top-right ">
                        <a href="<?= base_url('profile_user?id='.$view_user['msv']); ?>">
                           <div class="p-4 py-5 flex items-center gap-4">
                              <img src="<?php get_img($avatar); ?>" alt="" class="w-10 h-10 rounded-full shadow">
                              <div class="flex-1">
                                 <h4 class="text-sm font-medium text-black"><?= $user['username']; ?></h4>
                                 <div class="text-sm mt-1 text-blue-600 font-light dark:text-white/70">@<?= $user['msv']; ?></div>
                              </div>
                           </div>
                        </a>
                        <hr class="dark:border-gray-600/60">
                        <nav class="p-2 text-sm text-black font-normal dark:text-white">
                           <a href="<?= base_url('service_pack'); ?>">
                              <div class="flex items-center gap-2.5 hover:bg-secondery p-2 px-2.5 rounded-md dark:hover:bg-white/10">
                                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z"></path>
                                 </svg>
                                 Service pack
                              </div>
                           </a>
                           <a href="<?= base_url('setting'); ?>">
                              <div class="flex items-center gap-2.5 hover:bg-secondery p-2 px-2.5 rounded-md dark:hover:bg-white/10">
                                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                 </svg>
                                 My Account
                              </div>
                           </a>
                           <hr class="-mx-2 my-2 dark:border-gray-600/60">
                           <a href="<?= base_url('logout'); ?>">
                              <div class="flex items-center gap-2.5 hover:bg-secondery p-2 px-2.5 rounded-md dark:hover:bg-white/10">
                                 <svg class="w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                 </svg>
                                 Log Out 
                              </div>
                           </a>
                        </nav>
                     </div>
                     <div class="flex items-center gap-2 hidden">
                        <img src="<?= base_url('public/frontent/'); ?>assets/images/avatars/avatar-2.jpg" alt="" class="w-9 h-9 rounded-full shadow">
                        <div class="w-20 font-semibold text-gray-600"> Hamse </div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                           <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"></path>
                        </svg>
                     </div>
                  </div>
               </div>
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
                        <a href="index.php">
                           <img src="<?= base_url('public/frontent/'); ?>assets/images/icons/home.png" alt="feeds" class="w-6">
                           <span> Home </span> 
                        </a>
                     </li>
                     <li class="uk-animation-fade" id="show__more">
                      <a href="<?= base_url('friend-request'); ?>">
                        <img src="<?= base_url('public/frontent/'); ?>assets/images/icons/group-2.png" alt="groups" class="w-6">
                        <span> Friend request </span> 
                     </a>
                  </li>
                  <li>
                     <a href="messages">
                        <img src="<?= base_url('public/frontent/'); ?>assets/images/icons/message.png" alt="messages" class="w-5">
                        <span> messages </span> 
                     </a>
                  </li>
                  <li>
                     <a href="<?= base_url('find-teammate'); ?>">
                        <img src="<?= base_url('public/frontent/'); ?>assets/images/icons/group.png" alt="groups" class="w-6">
                        <span> Find Teammate </span> 
                     </a>
                  </li>
                  <li>
                     <a href="<?= base_url('groups'); ?>">
                        <img src="<?= base_url('public/frontent/'); ?>assets/images/icons/market.png" alt="market" class="w-7 -ml-1">
                        <span> Groups </span> 
                     </a>
                  </li>
                  <li>
                     <a href="<?= base_url('groups-request'); ?>">
                        <img src="<?= base_url('public/frontent/'); ?>assets/images/icons/blog-2.png" alt="market" class="w-7 -ml-1">
                        <span> Groups request </span> 
                     </a>
                  </li>
               </ul>
            </nav>
            <nav id="side" class="font-medium text-sm text-black border-t pt-3 mt-2 dark:text-white dark:border-slate-800">
               <div class="px-3 pb-2 text-sm font-medium">
                  <div class="text-black dark:text-white">Setting</div>
               </div>
               <ul class="mt-2 -space-y-2" uk-nav="multiple: true">
                  <li>
                     <a href="<?= base_url('setting'); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                           <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z"></path>
                           <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span> Setting </span>                  
                     </a>
                  </li>
                  <li>
                     <a href="<?= base_url('subject'); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                           <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z"></path>
                        </svg>
                        <span> Subject </span>                  
                     </a>
                  </li>
                  <li>
                    <a href="<?= base_url('service_pack'); ?>"> 
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z"></path>
                   </svg>
                   <span> Service pack </span>                  
                </a>
             </li>
             <li>
               <a href="<?= base_url('logout'); ?>">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9"></path>
                  </svg>
                  <span>   Log out   </span>                  
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
  <!-- text -->
  <?php
  $user_info = $this->session->userdata('UserFrontent');
  $user_id = $user_info['iduser'];
  $view_user = $this->db->select('*')->from('rmit_user')->where('id',$user_id)->get()->row_array();
  $newdate = strtotime ('+3 day' , $view_user['date_creat']) ;
  $newday = date('d-m-Y' , $newdate );
  $newhouse = date('H:i:s' , $newdate );

  $day_expired = strtotime('-3 day' , $view_user['expiration_date']);
  $today = strtotime(date('d-m-Y h:i:s'));
  ?>
  <?php if($view_user['service_pack'] == 1){ ?>
   <div uk-alert="" class="uk-alert mb-3">
      <div class="p-2 border bg-yellow-50 border-yellow-500/30 rounded-xl dark:bg-slate-700">
        <div class="flex items-center justify-between gap-6">
         <div class="text-base text-yellow-700" style="text-align: center;"> Bạn đang dùng phiên bản dùng thử. Vui lòng mua gói để được trải nghiệm toàn bộ dịch vụ. Hết hạn ngày: <?= $newday; ?> lúc <?= $newhouse; ?><a href="" style="background: #ffd4a8;padding: 4px 10px;margin-left: 15px;">Mua gói</a> </div>
      </div>
   </div>
</div>
<?php } ?>
<?php if($today > $day_expired && $today < $view_user['expiration_date']){ ?>
   <div uk-alert="" class="uk-alert mb-3">
      <div class="p-2 border bg-yellow-50 border-yellow-500/30 rounded-xl dark:bg-slate-700">
        <div class="flex items-center justify-between gap-6">
         <div class="text-base text-yellow-700" style="text-align: center;"> Phiên bản sẽ hết hạn ngày: <?= date('d-m-Y',$view_user['expiration_date']); ?> lúc <?= date('h:i:s',$view_user['expiration_date']); ?> Vui lòng <a href="" style="background: #ffd4a8;padding: 4px 10px;">Mua gói</a> để tiếp tục dịch vụ. </div>
      </div>
   </div>
</div>
<?php } ?>
