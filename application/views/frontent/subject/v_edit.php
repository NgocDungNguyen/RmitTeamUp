<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<?php $list_subject = $this->db->select('*')->from('rmit_subject')->get()->result_array(); ?>
<?php $user = $this->session->userdata('UserFrontent'); ?>
<?php $list_subject_user = $this->db->select('*')->from('rmit_user_subject')->where('user_id',$user['iduser'])->get()->result_array(); ?>
<div class="lg:flex 2xl:gap-12 gap-10 2xl:max-w-[1220px] max-w-[1065px] mx-auto" id="js-oversized">
   <div class="flex-1">
      <div class="lg:max-w- w-full">
         <div class="box relative rounded-lg shadow-md">
            <!-- nav tabs -->
            <div class="relative border-b" tabindex="-1" uk-slider="finite: true">
               <nav class="uk-slider-container overflow-hidden nav__underline px-6 p-0 border-transparent -mb-px">
                  <ul class="uk-slider-items w-[calc(100%+10px)] !overflow-hidden" uk-switcher="connect: #setting_tab ; animation: uk-animation-slide-right-medium, uk-animation-slide-left-medium">
                     <li class="w-auto pr-2.5"> <a href="#"> Chỉnh sửa điểm số môn học</a> </li>
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
                     <form method="post" action="<?= base_url('subject-update/'.$view_subject_user['id']); ?>" class="space-y-7 text-sm text-black font-medium dark:text-white" uk-scrollspy="target: > *; cls: uk-animation-scale-up; delay: 100 ;repeat: true" enctype="multipart/form-data">
                        <div class="md:flex items-center gap-10">
                           <label class="md:w-32 text-right"> Môn Học </label>
                           <div class="flex-1 max-md:mt-4">
                              <select name="subject_id" disabled class="!border-0 !rounded-md w-full">
                                 <?php foreach ($list_subject as $value): ?>
                                    <option value="<?= $value['id']; ?>"><?= $value['code_subject']; ?> - <?= $value['name_subject']; ?></option>
                                 <?php endforeach ?>
                              </select>
                           </div>
                        </div>
                        <div class="md:flex items-center gap-10">
                           <label class="md:w-32 text-right"> Điểm số(<span style="color:red">*</span>) </label>
                           <div class="flex-1 max-md:mt-4">
                              <select class="!border-0 !rounded-md w-full js-example-basic-single" name="scores">
                                 <option value="HD"<?php if($view_subject_user['scores'] == 'HD'){ echo ' selected'; } ?>>HD - 4</option>
                                 <option value="DI"<?php if($view_subject_user['scores'] == 'DI'){ echo ' selected'; } ?>>DI - 3</option>
                                 <option value="CR"<?php if($view_subject_user['scores'] == 'CR'){ echo ' selected'; } ?>>CR - 2</option>
                                 <option value="PA"<?php if($view_subject_user['scores'] == 'PA'){ echo ' selected'; } ?>>PA - 1</option>
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
   </div>
</div>