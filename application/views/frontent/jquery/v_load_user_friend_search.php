<?php if(strlen($_POST['ndsearch']) == 0){ ?>
<?php 
date_default_timezone_set('Asia/Ho_Chi_Minh');
$today = strtotime(date('d-m-Y'));
$user = $this->session->userdata('UserFrontent');
$view_user = $this->db->select('*')->from('rmit_user')->where('id',$user['iduser'])->get()->row_array();
$friend_group = json_decode($view_user['friend_group']);
$avatar = base_url('uploads/'.$view_user['user_avatar']);
?>

<?php foreach ($friend_group as $value_friend): ?>
   <?php $view_friend = $this->db->select('*')->from('rmit_user')->where('id',$value_friend)->get()->row_array(); ?>
   <?php $avatar_friend = base_url('uploads/'.$view_friend['user_avatar']); ?>
   <?php 
   // check xem 1 trong 2 đã tồn tại chưa
      $check_from = array(
         'id_user_from' => $this->user['iduser'],
         'id_user_to' => $value_friend,
         'father_group_mess' => 0,
      );
      $check_to = array(
         'id_user_from' => $value_friend,
         'id_user_to' => $this->user['iduser'],
         'father_group_mess' => 0,
      );

      $view_from = $this->db->select('*')->from('rmit_messenger_group')->where($check_from)->get()->row_array();
      $view_to = $this->db->select('*')->from('rmit_messenger_group')->where($check_to)->get()->row_array();
      if(isset($view_from)){
            $view_group_mess = $this->db->select('*')->from('rmit_messenger_group')->where($check_from)->get()->row_array();
         }
         if(isset($view_to)){
            $view_group_mess = $this->db->select('*')->from('rmit_messenger_group')->where($check_to)->get()->row_array();
         }
    ?>
   <a href="javascript:void(0)" onclick="chat_friend(<?= $value_friend; ?>)" class="relative flex items-center gap-4 p-2 duration-200 rounded-xl hover:bg-secondery">
      <div class="relative w-14 h-14 shrink-0">
         <img src="<?php get_img($avatar_friend); ?>" alt="" class="object-cover w-full h-full rounded-full">
         <div class="w-4 h-4 absolute bottom-0 right-0  bg-green-500 rounded-full border border-white dark:border-slate-800"></div>
      </div>
      <div class="flex-1 min-w-0">
         <div class="flex items-center gap-2 mb-1.5">
            <div class="mr-auto text-sm text-black dark:text-white font-medium"><?= $view_friend['username']; ?></div>
            <div class="text-xs font-light text-gray-500 dark:text-white/70"><?php if(isset($view_group_mess) && $today == $view_group_mess['date_creat']){ echo date('H:i',$view_group_mess['time_creat']); } ?><?php if(isset($view_group_mess) && $today != $view_group_mess['date_creat']){ echo date('H:i',$view_group_mess['date_creat']); } ?></div>
            <?php if(isset($view_group_mess)){ ?>
               <?php
                  $check_mess = array(
                     'code_group_mess' => $view_group_mess['code_mess'],
                     'id_user_from' => $value_friend,
                     'status' => 0,
                  );
                  $view_mess_ol = $this->db->select('*')->from('rmit_messenger')->where($check_mess)->get()->row_array();
               ?>
               <?php if(isset($view_mess_ol)): ?>
                  <div class="w-2.5 h-2.5 bg-blue-600 rounded-full dark:bg-slate-700"></div>
               <?php endif ?>
            <?php } ?>
         </div>
         <div class="font-medium overflow-hidden text-ellipsis text-sm whitespace-nowrap"><?php if(isset($view_group_mess)){ echo $view_group_mess['content_end'].' ...'; }else{ echo 'No messages'; } ?></div>
      </div>
   </a>
<?php endforeach ?>
<?php }else{ ?>
<?php $list_user = $this->db->select('*')->from('rmit_user')->like('username',$_POST['ndsearch'])->get()->result_array(); ?>
<?php foreach ($list_user as $value): ?>
	<?php echo $value['id']; ?>
<?php endforeach ?>
<?php } ?>