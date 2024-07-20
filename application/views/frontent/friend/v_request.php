<?php $user = $this->session->userdata('UserFrontent'); ?>
<?php 
  $friend_request = array(
    'id_to' => $user['iduser'],
    'status' => 0,
  );
?>
<?php $list_request = $this->db->select('*')->from('rmit_friend')->where($friend_request)->get()->result_array(); ?>
<div class="mt-5">
  <?php if(count($list_request) == 0){ ?>
   <h1 class="text-center"><b>No friend requests!</b></h1>
 <?php }else{ ?>
  <h1 style="margin-top: 20px; margin-bottom: 20px;"><b>Friend request</b></h1>
  <div class="grid lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-3 grid-cols-2 gap-4" uk-scrollspy="target: > div; cls: uk-animation-scale-up; delay: 100 ;repeat: true">
    <?php foreach ($list_request as $value): ?>
      <?php $view_user = $this->db->select('*')->from('rmit_user')->where('id',$value['id_from'])->get()->row_array(); ?>
      <?php $avatar = base_url('uploads/'.$view_user['user_avatar']); ?>
      <div class="card uk-scrollspy-inview " style="">
        <a href="<?= base_url('profile?id='.$view_user['msv']); ?>">
          <div class="card-media sm:aspect-[2/1.7] h-40">
            <img src="<?php get_img($avatar); ?>" alt="">
            <div class="card-overly"></div>
          </div>
        </a>
        <div class="card-body">
          <a href="<?= base_url('profile?id='.$view_user['msv']); ?>"> <h4 class="card-title"> <?= $view_user['username']; ?> </h4> </a>
          <h4 class="card-title text-sm" style="padding: 10px 0px;font-size: 14px;">Overall GPA: <?= $view_user['user_gpa']; ?></h4>
          <div class="grid lg:grid-cols-6 md:grid-cols-6 sm:grid-cols-2 gap-2.5 mt-4">
            <a href="<?= base_url('friend-add?code='.$view_user['msv']); ?>" onclick="return confirm('Bạn có chắc chắn muốn kết bạn với <?= $view_user['username']; ?>?')">
             <button type="button" class="button bg-primary text-white">Kết bạn</button>
           </a>
           <a href="<?= base_url('friend-delete?code='.$view_user['msv']); ?>" onclick="return confirm('Bạn có chắc chắn muốn hủy kết bạn với <?= $view_user['username']; ?>?')">
             <button type="button" class="button bg-danger text-white">Hủy kết bạn</button>
           </a>
         </div>
       </div>
     </div>
   <?php endforeach ?>
 </div>
<?php } ?>
</div>