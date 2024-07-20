<?php $user = $this->session->userdata('UserFrontent'); ?>
<?php $view_user = $this->db->select('*')->from('rmit_user')->where('id',$user['iduser'])->get()->row_array(); ?>
<?php $friend_group = json_decode($view_user['friend_group']); ?>
<a href="<?= base_url('group_creat'); ?>">
   <button class="button bg-primary text-white mt-10">Create New Group</button>
</a>
<div class="sm:my-6 my-3 flex items-center justify-between lg:mt-10">
   <div>
      <h2 class="md:text-lg text-base font-semibold text-black"> List Groups </h2>
      <p class="font-normal text-sm text-gray-500 leading-6"> List of groups you belong to. </p>
   </div>
</div>
<div class="grid md:grid-cols-2 md:gap-2 gap-3">
   <?php foreach ($list_group as $value): ?>
      <?php $avatar_group = base_url('uploads/'.$value['images_group']); ?>
      <?php $member_group = json_decode($value['member_group']); ?>
      <?php if(in_array($user['iduser'],$member_group)){ ?>
      <?php $friends = 0; ?>
      <?php foreach ($member_group as $value_member_group): ?>
         <?php if(in_array($value_member_group, $friend_group)) {
            $friends += 1;
         } ?>
      <?php endforeach ?>
      <div class="flex md:items-center space-x-4 p-4 rounded-md box">
         <div class="sm:w-20 w-14 sm:h-20 h-14 flex-shrink-0 rounded-lg relative"> 
            <img src="<?php get_img($avatar_group); ?>" class="absolute w-full h-full inset-0 rounded-md object-cover shadow-sm" alt="">
         </div>
         <div class="flex-1">
            <a href="<?= base_url('groups-profile?codegroup='.$value['code_group']); ?>" class="md:text-lg text-base font-semibold capitalize text-black dark:text-white"> <?= $value['name_group']; ?></a>
            <div class="flex space-x-2 items-center text-sm font-normal">
               <div> <?= number_format(count($member_group)); ?> Members</div>
               <div>·</div>
               <div> 12 posts a week</div>
            </div>
            <div class="flex items-center mt-2">
               <img src="assets/images/avatars/avatar-2.jpg" class="w-6 rounded-full border-2 border-gray-200 -mr-2" alt="">
               <img src="assets/images/avatars/avatar-4.jpg" class="w-6 rounded-full border-2 border-gray-200" alt="">
               <div class="text-sm text-gray-500 ml-2"> <?= number_format($friends); ?> friends are members</div>
            </div>
         </div>
         <a href="<?= base_url('groups-profile?codegroup='.$value['code_group']); ?>">  
         <button type="button" class="button bg-primary-soft text-primary dark:text-white gap-1 max-md:hidden">
            <ion-icon name="add-circle" class="text-xl -ml-1"></ion-icon>
            View Group
         </button>
         </a> 
      </div>
      <?php } ?>
   <?php endforeach ?>
</div>