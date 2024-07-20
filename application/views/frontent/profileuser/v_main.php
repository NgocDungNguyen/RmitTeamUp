<?php $user = $this->session->userdata('UserFrontent'); ?>
<?php $view_user = $this->db->select('*')->from('rmit_user')->where('msv',$msv)->get()->row_array(); ?>
<?php $avatar = base_url('uploads/'.$view_user['user_avatar']); ?>
<?php $list_subject_user = $this->db->select('*')->from('rmit_user_subject')->where('user_id',$view_user['id'])->get()->result_array(); ?>
<?php
// Kiểm tra xem đã gửi lời kết bạn chưa
$check_friend_from = array(
   'id_from' => $user['iduser'],
   'id_to' => $view_user['id'],
);
$view_add_friend_from = $this->db->select('*')->from('rmit_friend')->where($check_friend_from)->get()->row_array();
$check_friend_to = array(
   'id_from' => $view_user['id'],
   'id_to' => $user['iduser'],
);
$view_add_friend_to = $this->db->select('*')->from('rmit_friend')->where($check_friend_to)->get()->row_array();
if(isset($view_add_friend_from)){
   $view_add_friend = $this->db->select('*')->from('rmit_friend')->where($check_friend_from)->get()->row_array();
}
if(isset($view_add_friend_to)){
   $view_add_friend = $this->db->select('*')->from('rmit_friend')->where($check_friend_to)->get()->row_array();
}
?>
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
<div class="max-w-[1065px] mx-auto max-lg:-m-2.5" style="margin-top: 70px;">
   <!-- cover  -->
   <div class="bg-white shadow lg:rounded-b-2xl lg:-mt-10 dark:bg-dark2">
      <!-- cover -->
      <div class="relative overflow-hidden w-full lg:h-72 h-48">
         <img src="<?= base_url('public/frontent/assets/images/avatars/profile-cover.jpg'); ?>" alt="" class="h-full w-full object-cover inset-0">
      </div>
      <!-- user info -->
      <div class="p-3">
         <div class="flex flex-col justify-center md:items-center lg:-mt-48 -mt-28">
            <div class="relative lg:h-48 lg:w-48 w-28 h-28 mb-4 z-10">
               <div class="relative overflow-hidden rounded-full md:border-[6px] border-gray-100 shrink-0 dark:border-slate-900 shadow">
                  <img src="<?= $avatar; ?>" alt="" class="h-full w-full object-cover inset-0">                           
               </div>
               <button type="button" class="absolute -bottom-3 left-1/2 -translate-x-1/2 bg-white shadow p-1.5 rounded-full sm:flex hidden">
                  <ion-icon name="camera" class="text-2xl md hydrated" role="img" aria-label="camera"></ion-icon>
               </button>
            </div>
            <h3 class="md:text-3xl text-base font-bold text-black dark:text-white"> <?= $view_user['username']; ?> </h3>
            <?php if(isset($view_add_friend)){ ?>
               <?php if(isset($subject_id) || isset($scores)){ ?>
                  <a class="mt-3" href="<?= base_url('cancel-friend-request?code='.$view_user['msv'].'&subject_id='.$subject_id.'&scores='.$scores); ?>"   onclick="return confirm('Bạn có chắc chắn muốn hủy kết bạn với <?= $view_user['username']; ?>?')">
                    <button type="button" class="button bg-danger text-white">Hủy kết bạn</button>
                 </a>
              <?php }else{ ?>
               <a class="mt-3" href="<?= base_url('friend-delete?code='.$view_user['msv']); ?>"   onclick="return confirm('Bạn có chắc chắn muốn hủy kết bạn với <?= $view_user['username']; ?>?')">
                <button type="button" class="button bg-danger text-white">Hủy kết bạn</button>
             </a>
          <?php } ?>
       <?php }else{ ?>
         <?php if(isset($subject_id) || isset($scores)){ ?>
          <a class="mt-3" href="<?= base_url('add-friend?code='.$view_user['msv'].'&subject_id='.$subject_id.'&scores='.$scores); ?>" onclick="return confirm('Bạn có chắc chắn muốn kết bạn với <?= $view_user['username']; ?>?')">
           <button type="button" class="button bg-primary text-white">Add Friend</button>
        </a>
     <?php }else{ ?>
      <a class="mt-3" href="<?= base_url('friend-add?code='.$view_user['msv']); ?>" onclick="return confirm('Bạn có chắc chắn muốn kết bạn với <?= $view_user['username']; ?>?')">
        <button type="button" class="button bg-primary text-white">Add Friend</button>
     </a>
  <?php } ?>
<?php } ?>
</div>
</div>
</div>
<div class="flex 2xl:gap-12 gap-10 mt-8 max-lg:flex-col" id="js-oversized">
   <!-- feed story -->
   <div class="flex-1 xl:space-y-6 space-y-3">
      <!--  post image-->

      <div class="bg-white rounded-xl shadow-sm text-sm font-medium border1 dark:bg-dark2">
        <div class="mt-5" style="padding: 10px 15px;">
         <h1 class="mb-3"><b>Overall GPA: <?= $view_user['user_gpa'] ?></b></h1>
         <table id="customers">
            <tr>
               <th>COURSE CODE</th>
               <th>COURSE TITLE</th>
               <th>CREDIT POINTS</th>
               <th>SCORES</th>
            </tr>
            <?php foreach ($list_subject_user as $value): ?>
             <?php $view_subject = $this->db->select('*')->from('rmit_subject')->where('id',$value['subject_id'])->get()->row_array(); ?>
             <tr>
                <td><?= $view_subject['code_subject']; ?></td>
                <td><?= $view_subject['name_subject']; ?></td>
                <td><?= $view_subject['credit_points']; ?></td>
                <td><?= $value['scores']; ?></td>
             </tr>  
          <?php endforeach ?>
       </table>
    </div>
 </div>

</div>
<!-- sidebar -->
<div class="lg:w-[400px]">
   <div class="lg:space-y-4 lg:pb-8 max-lg:grid sm:grid-cols-2 max-lg:gap-6" uk-sticky="media: 1024; end: #js-oversized; offset: 80">
      <div class="box p-5 px-6">
         <div class="flex items-ce justify-between text-black dark:text-white">
            <h3 class="font-bold text-lg"> Introduce yourself   </h3>
         </div>
         <ul class="text-gray-700 space-y-4 mt-4 text-sm dark:text-white/80">
            <li class="flex items-center gap-3">
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"></path>
                  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"></path>
               </svg>
               <div>  Name <span class="font-semibold text-black dark:text-white"> <?= $view_user['username']; ?>  </span> </div>
            </li>
            <li class="flex items-center gap-3">
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5"></path>
               </svg>
               <div> Student code <span class="font-semibold text-black dark:text-white"> <?= $view_user['msv']; ?>  </span> </div>
            </li>
            <li class="flex items-center gap-3">
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z"></path>
               </svg>
               <div>  Email <span class="font-semibold text-black dark:text-white"> <?= $view_user['email']; ?></span> </div>
            </li>
            <li class="flex items-center gap-3">
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"></path>
               </svg>
               <div> <span class="font-semibold text-black dark:text-white">
                <?php 
                if($view_user['relationship'] == 0){ echo 'None'; }
                if($view_user['relationship'] == 1){ echo 'Single'; }
                if($view_user['relationship'] == 2){ echo 'In a relationship'; }
                if($view_user['relationship'] == 3){ echo 'Married'; }
                if($view_user['relationship'] == 4){ echo 'Engaged'; }
                ?>
             </span></div>
          </li>
       </ul>

    </div>
 </div>
</div>
</div>
</div>