<?php $user = $this->session->userdata('UserFrontent'); ?>
<?php $view_user = $this->db->select('*')->from('rmit_user')->where('id',$user['iduser'])->get()->row_array(); ?>
<?php $member = json_decode($view_user['friend_group']); ?>
<div class="max-w-3xl mx-auto">
   <div class="box relative rounded-lg shadow-md">

      <!-- nav tabs -->
      <div class="relative border-b" tabindex="-1" uk-slider="finite: true">
         <nav class="uk-slider-container overflow-hidden nav__underline px-6 p-0 border-transparent -mb-px">
            <ul class="uk-slider-items w-[calc(100%+10px)] !overflow-hidden" uk-switcher="connect: #setting_tab ; animation: uk-animation-slide-right-medium, uk-animation-slide-left-medium">
               <li class="w-auto pr-2.5"> <a href="#"> Create New Group</a> </li>
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
            <form action="<?= base_url('group_add'); ?>" method="post">
            <div>
               <div class="space-y-6">
                  <div class="md:flex items-start gap-10">
                     <label class="md:w-32 text-right"> Name Group </label>
                     <div class="flex-1 max-md:mt-4">
                        <textarea class="w-full" rows="5" placeholder="Name Group" name="name_group" required></textarea>
                     </div>
                  </div>
                  <div class="md:flex items-center gap-10">
                     <label class="md:w-32 text-right"> Member </label>
                     <div class="flex-1 max-md:mt-4">
                        <select class="!border-0 !rounded-md w-full js-example-basic-multiple" name="member_group[]" required style="width: 100%;" multiple="multiple">
                         <option value="<?= $view_user['id']; ?>" selected><?= $view_user['username']; ?> - <?= $view_user['msv']; ?></option>
                         <?php foreach ($member as $value): ?>
                           <?php $view_user = $this->db->select('*')->from('rmit_user')->where('id',$value)->get()->row_array(); ?>

                            <option value="<?= $view_user['id']; ?>"><?= $view_user['username']; ?> - <?= $view_user['msv']; ?></option>
                         <?php endforeach ?>
                      </select>
                   </div>
                </div>
             </div>
             <div class="flex items-center gap-4 mt-10 lg:pl-[10.5rem]">
               <button type="submit" class="button lg:px-10 bg-primary text-white max-md:flex-1" name="group" value="creat"> Save <span class="ripple-overlay"></span></button>
            </div>
         </div>
         </form>
      </div>
   </div>
</div>
</div>
<script>
   $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>