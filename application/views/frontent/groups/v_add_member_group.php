<?php $member_group = json_decode($view_group['member_group']); ?>
<?php $user = $this->session->userdata('UserFrontent'); ?>
<?php $view_user = $this->db->select('*')->from('rmit_user')->where('id',$user['iduser'])->get()->row_array(); ?>
<?php $friend_group = json_decode($view_user['friend_group']); ?>

<style>
   #customers {
   font-family: Arial, Helvetica, sans-serif;
   border-collapse: collapse;
   width: 100%;
   }
   #customers td, #customers th {
   border: 1px solid #ddd;
   padding: 8px;
   }
   #customers tr:nth-child(even){background-color: #f2f2f2;}
   #customers tr:hover {background-color: #ddd;}
   #customers th {
   padding-top: 12px;
   padding-bottom: 12px;
   text-align: left;
   background-color: #0284C7;
   color: white;
   }
</style>
<div class="lg:flex 2xl:gap-12 gap-10 2xl:max-w-[1220px] max-w-[1065px] mx-auto" id="js-oversized">
   <div class="flex-1">
      <div class="lg:max-w- w-full">
         <div class="box relative rounded-lg shadow-md">
            <!-- nav tabs -->
            <div class="relative border-b" tabindex="-1" uk-slider="finite: true">
               <nav class="uk-slider-container overflow-hidden nav__underline px-6 p-0 border-transparent -mb-px">
                  <ul class="uk-slider-items w-[calc(100%+10px)] !overflow-hidden" uk-switcher="connect: #setting_tab ; animation: uk-animation-slide-right-medium, uk-animation-slide-left-medium">
                     <li class="w-auto pr-2.5"> <a href="#"> Add members to the group "<?= $view_group['name_group']; ?>" </a> </li>
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
                     <form method="post" action="<?= base_url('groups-add-member-check?codegroup='.$view_group['code_group']); ?>" class="space-y-7 text-sm text-black font-medium dark:text-white" uk-scrollspy="target: > *; cls: uk-animation-scale-up; delay: 100 ;repeat: true" enctype="multipart/form-data">
                        <div class="md:flex items-center gap-10">
                           <label class="md:w-32 text-right"> List Friends </label>
                           <div class="flex-1 max-md:mt-4">
                              <select class="!border-0 !rounded-md w-full js-example-basic-single" name="member_group" style="width: 100%;" required>
                                 <?php foreach ($friend_group as $value_friend_group): ?>
                                    <?php if(!in_array($value_friend_group,$member_group)){ ?>
                                    <?php $view_user = $this->db->select('*')->from('rmit_user')->where('id',$value_friend_group)->get()->row_array(); ?>
                                    <option value="<?= $view_user['id']; ?>" disable><?= $view_user['username']; ?> - <?= $view_user['msv']; ?></option>
                                    <?php } ?>
                               <?php endforeach ?>
                            </select>
                           </div>
                        </div>
                        <div class="flex items-center gap-4 mt-16 lg:pl-[10.5rem]">
                           <button type="submit" class="button lg:px-10 bg-primary text-white max-md:flex-1" name="save"> Add Group <span class="ripple-overlay"></span></button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
