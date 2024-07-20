<?php 
$user = $this->session->userdata('UserFrontent');
$view_user = $this->db->select('*')->from('rmit_user')->where('id',$user['iduser'])->get()->row_array();
$avatar = base_url('uploads/'.$view_user['user_avatar']);
?>
<div class="max-w-3xl mx-auto">
   <div class="box relative rounded-lg shadow-md">
      <div class="flex md:gap-8 gap-4 items-center md:p-8 p-6 md:pb-4">
         <div class="relative md:w-20 md:h-20 w-12 h-12 shrink-0">
            <label for="file" class="cursor-pointer">
            <img id="img" src="<?php get_img($avatar); ?>" class="object-cover w-full h-full rounded-full" alt="">
            </label>
            <a href="<?= base_url('change-avatar'); ?>">
            <label for="file" class="md:p-1 p-0.5 rounded-full bg-slate-600 md:border-4 border-white absolute -bottom-2 -right-2 cursor-pointer dark:border-slate-700">
               <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor" class="md:w-4 md:h-4 w-3 h-3 fill-white">
                  <path d="M12 9a3.75 3.75 0 100 7.5A3.75 3.75 0 0012 9z"></path>
                  <path fill-rule="evenodd" d="M9.344 3.071a49.52 49.52 0 015.312 0c.967.052 1.83.585 2.332 1.39l.821 1.317c.24.383.645.643 1.11.71.386.054.77.113 1.152.177 1.432.239 2.429 1.493 2.429 2.909V18a3 3 0 01-3 3h-15a3 3 0 01-3-3V9.574c0-1.416.997-2.67 2.429-2.909.382-.064.766-.123 1.151-.178a1.56 1.56 0 001.11-.71l.822-1.315a2.942 2.942 0 012.332-1.39zM6.75 12.75a5.25 5.25 0 1110.5 0 5.25 5.25 0 01-10.5 0zm12-1.5a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd"></path>
               </svg>
            </label>
            </a>
         </div>
         <div class="flex-1">
            <h3 class="md:text-xl text-base font-semibold text-black dark:text-white"><?= $view_user['username']; ?></h3>
            <p class="text-sm text-blue-600 mt-1 font-normal">@<?= $view_user['msv']; ?></p>
         </div>
         <a href="<?= base_url('change-password'); ?>">
         <button class="inline-flex items-center gap-1 py-1 pl-2.5 pr-3 rounded-full bg-slate-50 border-2 border-slate-100 dark:text-white dark:bg-slate-700" type="button" aria-haspopup="true" aria-expanded="false">
            <ion-icon name="flash-outline" class="text-base duration-500 group-aria-expanded:rotate-180 md hydrated" role="img" aria-label="chevron down outline"></ion-icon>
            <span class="font-medium text-sm"> Đổi Mật Khẩu  </span> 
         </button>
         </a>
      </div>
      <!-- nav tabs -->
      <div class="relative border-b" tabindex="-1" uk-slider="finite: true">
         <nav class="uk-slider-container overflow-hidden nav__underline px-6 p-0 border-transparent -mb-px">
            <ul class="uk-slider-items w-[calc(100%+10px)] !overflow-hidden" uk-switcher="connect: #setting_tab ; animation: uk-animation-slide-right-medium, uk-animation-slide-left-medium">
               <li class="w-auto pr-2.5"> <a href="#"> Mô tả </a> </li>
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
                  <form method="post" action="<?= base_url('setting-edit-info-check'); ?>" class="space-y-7 text-sm text-black font-medium dark:text-white" uk-scrollspy="target: > *; cls: uk-animation-scale-up; delay: 100 ;repeat: true" enctype="multipart/form-data">
                     <div class="md:flex items-center gap-10">
                        <label class="md:w-32 text-right"> Tên hiển thị </label>
                        <div class="flex-1 max-md:mt-4">
                           <input type="text" name="nameuser" value="<?= $view_user['username']; ?>" class="lg:w-1/2 w-full" required>
                        </div>
                     </div>
                     <div class="md:flex items-center gap-10">
                        <label class="md:w-32 text-right"> Email(<span style="color:red">*</span>) </label>
                        <div class="flex-1 max-md:mt-4">
                           <input type="text" name="email" value="<?= $view_user['email']; ?>" required class="w-full">
                        </div>
                     </div>
                     <div class="md:flex items-start gap-10">
                        <label class="md:w-32 text-right"> Giới thiệu </label>
                        <div class="flex-1 max-md:mt-4">
                           <textarea class="w-full" rows="5" name="userbio"><?= $view_user['userbio']; ?></textarea>
                        </div>
                     </div>
                     <div class="md:flex items-center gap-10">
                        <label class="md:w-32 text-right"> Giới tính </label>
                        <div class="flex-1 max-md:mt-4">
                           <select name="usersex" class="!border-0 !rounded-md lg:w-1/2 w-full">
                              <option value="0"<?php if($view_user['usersex'] == 0){ echo ' selected'; } ?>>Chưa xác định</option>
                              <option value="1"<?php if($view_user['usersex'] == 1){ echo ' selected'; } ?>>Nam</option>
                              <option value="2"<?php if($view_user['usersex'] == 2){ echo ' selected'; } ?>>Nữ</option>
                           </select>
                        </div>
                     </div>
                     <div class="md:flex items-center gap-10">
                        <label class="md:w-32 text-right"> Relationship </label>
                        <div class="flex-1 max-md:mt-4">
                           <select name="relationship" class="!border-0 !rounded-md lg:w-1/2 w-full">
                              <option value="0"<?php if($view_user['relationship'] == 0){ echo ' selected'; } ?>>None</option>
                              <option value="1"<?php if($view_user['relationship'] == 1){ echo ' selected'; } ?>>Single</option>
                              <option value="2"<?php if($view_user['relationship'] == 2){ echo ' selected'; } ?>>In a relationship</option>
                              <option value="3"<?php if($view_user['relationship'] == 3){ echo ' selected'; } ?>>Married</option>
                              <option value="4"<?php if($view_user['relationship'] == 4){ echo ' selected'; } ?>>Engaged</option>
                           </select>
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