<?php 
$user = $this->session->userdata('UserFrontent');
$view_user = $this->db->select('*')->from('rmit_user')->where('id',$user['iduser'])->get()->row_array();
$avatar = base_url('uploads/'.$view_user['user_avatar']);
?>
<div class="max-w-3xl mx-auto">
   <div class="box relative rounded-lg shadow-md">
      <!-- nav tabs -->
      <div class="relative border-b" tabindex="-1" uk-slider="finite: true">
         <nav class="uk-slider-container overflow-hidden nav__underline px-6 p-0 border-transparent -mb-px">
            <ul class="uk-slider-items w-[calc(100%+10px)] !overflow-hidden" uk-switcher="connect: #setting_tab ; animation: uk-animation-slide-right-medium, uk-animation-slide-left-medium">
               <li class="w-auto pr-2.5"> <a href="#"> Edit content to the group "<?= $view_group['name_group']; ?>"</a> </li>
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
               <form method="post" action="<?= base_url('groups-content-update?codegroup='.$view_group['code_group'].'&id_post='.$view_cloud['id']); ?>" class="space-y-7 text-sm text-black font-medium dark:text-white" uk-scrollspy="target: > *; cls: uk-animation-scale-up; delay: 100 ;repeat: true" enctype="multipart/form-data">

                  <div class="space-y-6">
                     <div class="md:flex items-start gap-10">
                        <label class="md:w-32 text-right"> Content </label>
                        <div class="flex-1 max-md:mt-4">
                           <textarea class="w-full" rows="5" name="content_group" placeholder="Nhập thông tin giới thiệu" required><?= $view_cloud['content_group']; ?></textarea>
                        </div>
                     </div>
                     <?php if(strlen($view_cloud['file_group']) > 0){ ?>
                     <div class="md:flex items-center gap-10">
                        <label class="md:w-32 text-right">
                           Attachments
                        </label>
                        <div class="flex-1 max-md:mt-4">
                           <?php if($view_cloud['type_content'] == 'images'){ ?>
                              <?php $images = base_url('uploads/'.$view_cloud['file_group']); ?>
                              <!-- post image -->
                              <div class="relative w-full lg:h-96 h-full sm:px-4" style="padding-bottom: 20px;">
                               <img src="<?php get_img($images); ?>" alt="" class="sm:rounded-lg w-full h-full object-cover">
                            </div>
                         <?php } ?>
                         <?php if($view_cloud['type_content'] == 'files'){ ?>
                           
                            <?php $link_files = base_url('uploads/'.$view_cloud['file_group']); ?>
                            <!-- post image -->
                            <div class="relative w-full h-full sm:px-4" style="padding-bottom: 20px;">
                             <a href="<?= $link_files; ?>" target="_blank">
                              <i class="fa-solid fa-file" style="color: #ff9d05;font-size: 20px;"></i>&nbsp;&nbsp; Attached files
                           </a>
                        </div>
                     <?php } ?>
                  <?php if(strlen($view_cloud['file_group']) > 0){ ?>
                     <a href="<?= base_url('groups-content-delete-attachments?codegroup='.$view_group['code_group'].'&id_post='.$view_cloud['id']); ?>" style="padding-left: 10px;font-size: 16px;color: red;" title="Delete Post" onclick="return confirm('You definitely want to delete the attached document. Please copy the content if edited because if you delete the content document, it will not be saved as a draft?')">
                        <i class="fa-regular fa-trash-can"></i> Delete Attachments
                     </a>
                  <?php } ?>
               </div>
            </div>
         <?php } ?>
            <?php if(strlen($view_cloud['file_group']) == 0){ ?>
            <div class="md:flex items-center gap-10">
               <label class="md:w-32 text-right"> Attachments</label>
               <div class="flex-1 max-md:mt-4">
                  <input type="file" class="lg:w-1/2 w-full" name="file_group">
               </div>
            </div>
         <?php } ?>
         </div>

         <div class="flex items-center gap-4 mt-16 lg:pl-[10.5rem]">
            <button type="submit" class="button lg:px-10 bg-primary text-white max-md:flex-1" name="update"> Save <span class="ripple-overlay"></span></button>
         </div>
      </form>
   </div>
</div>
</div>
</div>
</div>