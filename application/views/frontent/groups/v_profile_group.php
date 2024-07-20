<?php $member_group = json_decode($view_group['member_group']); ?>
<?php $avatar_group = base_url('uploads/'.$view_group['images_group']); ?>
<?php $user = $this->session->userdata('UserFrontent'); ?>
<div class="max-w-[1065px] mx-auto mt-16">
   <!-- cover  -->
   <div class="bg-white shadow lg:rounded-b-2xl lg:-mt-10 dark:bg-dark2">
      <!-- cover -->
      <div class="relative overflow-hidden w-full lg:h-72 h-36">
         <img src="<?php get_img($avatar_group); ?>" alt="" class="h-full w-full object-cover inset-0">
         <!-- overly -->
         <?php if(in_array($user['iduser'],$member_group)){ ?>
            <div class="w-full bottom-0 absolute left-0 bg-gradient-to-t from -black/60 pt-10 z-10"></div>
            <div class="absolute bottom-0 right-0 m-4 z-20">
               <div class="flex items-center gap-3">
                  <a href="<?= base_url('group-change-avatar?codegroup='.$view_group['code_group']); ?>">
                     <button class="button bg-black/10 text-white flex items-center gap-2 backdrop-blur-small">Edit Avatar</button>
                  </a>
               </div>
            </div>
         <?php } ?>
      </div>
      <div class="lg:px-10 md:p-5 p-3">
         <div class="flex flex-col justify-center">
            <div class="flex lg:items-center justify-between max-md:flex-col">
               <div class="flex-1">
                  <h3 class="md:text-2xl text-base font-bold text-black dark:text-white"> <?= $view_group['name_group']; ?> </h3>
                  <p class=" font-normal text-gray-500 mt-2 flex gap-2 flex-wrap dark:text-white/80">
                     <span> <b class="font-medium text-black dark:text-white"><?= number_format(count($member_group)); ?></b> Member </span>
                  </p>
               </div>
               <div>
                  <div class="flex items-center gap-2 mt-1">
                     <div class="flex -space-x-4 mr-3">
                        <?php foreach ($member_group as $key => $value_member_group): ?>
                           <?php if($key < 6){ ?>
                              <?php $view_user = $this->db->select('*')->from('rmit_user')->where('id',$value_member_group)->get()->row_array(); ?>
                              <?php $avatar = base_url('uploads/'.$view_user['user_avatar']); ?>
                              <img src="<?php get_img($avatar); ?>" alt="" class="w-10 rounded-full border-4 border-white dark:border-slate-800">
                           <?php } ?>
                        <?php endforeach ?>
                     </div>
                     <?php if(in_array($user['iduser'],$member_group)){ ?>
                        <a href="<?= base_url('groups-add-member?codegroup='.$view_group['code_group']); ?>">
                           <button class="button bg-primary flex items-center gap-1 text-white py-2 px-3.5 shadow ml-auto">
                              <ion-icon name="add-outline" class="text-xl"></ion-icon>
                              <span class="text-sm"> Add members  </span>
                           </button>
                        </a>
                        <a href="<?= base_url('groups-end?codegroup='.$view_group['code_group']); ?>" onclick="return confirm('Are you sure you want to end the group. Recommended to wait for members to confirm!')">
                           <button class="button bg-danger flex items-center gap-1 text-white py-2 px-3.5 shadow ml-auto">
                              <ion-icon name="add-outline" class="text-xl"></ion-icon>
                              <span class="text-sm"> End Group  </span>
                           </button>
                        </a>
                     <?php } ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="flex 2xl:gap-12 gap-10 mt-8 max-lg:flex-col" id="js-oversized">
      <!-- feed story -->
      <?php if(in_array($user['iduser'],$member_group)){ ?>
         <div class="flex-1 xl:space-y-6 space-y-3">
            <?php if($view_group['status'] == 1){ ?>
               <?php
            // Kiểm tra số người đồng ý và không đồng ý
               $check_agree = array(
                'code_group' => $view_group['code_group'],
                'status' => 1,
             );
               $list_agree = $this->db->select('*')->from('rmit_groups_end')->where($check_agree)->get()->result_array();
               $check_disagree = array(
                'code_group' => $view_group['code_group'],
                'status' => 0,
             );
               $list_disagree = $this->db->select('*')->from('rmit_groups_end')->where($check_disagree)->get()->result_array();
               $percentage = number_format((count($list_agree)/count($member_group))*100);
               ?>
               <div class="lg:space-y-4 lg:pb-8 max-lg:grid sm:grid-cols-2 max-lg:gap-6" uk-sticky="media: 1024; end: #js-oversized; offset: 80">
                  <!-- group info -->
                  <div class="box p-5 px-6">
                     <div class="flex items-ce justify-between text-black dark:text-white">
                        <h3 class="font-bold text-lg"> Proposal to disband the group</h3>
                        <br>
                     </div>
                     <div>
                        <p>If the number of people is more than 60%, the group will be deleted.</p>
                     </div>
                     <div style="text-align: center;" class="mt-5 mb-3">
                        <a href="<?= base_url('groups-end-status?codegroup='.$view_group['code_group'].'&status=1'); ?>" onclick="return confirm('Are you sure you want to exit the group? If you voluntarily leave the group, points will be deducted. Low scores will not allow you to join groups?')">
                           <button type="button" class="button bg-access text-white">Agree</button>
                        </a>
                        <a href="<?= base_url('groups-end-status?codegroup='.$view_group['code_group'].'&status=0'); ?>" onclick="return confirm('Are you sure you want to exit the group? If you voluntarily leave the group, points will be deducted. Low scores will not allow you to join groups?')">
                           <button type="button" class="button bg-danger text-white">Disagree</button>
                        </a>
                     </div>
                     <h4 class="card-title text-sm" style="padding: 5px 0px;text-align: center;font-size: 18px;">Percentage: <?= $percentage; ?>%</h4>
                     <h4 class="card-title text-sm" style="padding: 5px 0px;font-size: 15px;">Agree: <?= count($list_agree); ?>/<?= count($member_group); ?> People</h4>
                     <h4 class="card-title text-sm" style="padding: 5px 0px;font-size: 15px;">Disagree: <?= count($list_disagree); ?>/<?= count($member_group); ?> People</h4>
                  </div>
               </div>
            <?php } ?>

            <!-- Đánh giá thành viên trong nhóm -->
            <?php if($view_group['status'] == 2){ ?>
               <?php $newdelete = strtotime ('+7 day' , $view_group['date_end']) ; ?>
               <h2 style="text-align: center;color: #ccc;font-weight: bold;">The group will be automatically deleted on: <?= date('d-m-Y H:i:s', $newdelete); ?></h2>
               <div class="lg:space-y-4 lg:pb-8 max-lg:grid sm:grid-cols-2 max-lg:gap-6" uk-sticky="media: 1024; end: #js-oversized; offset: 80">
                  <!-- group info -->
                  <div class="box p-5 px-6">
                     <div>
                        <h3 class="font-bold text-lg" style="text-align: center;"> Evaluate member activities</h3>
                        <p style="text-align: center;">You give assessment scores and content about members participating in group activities.</p>
                        <?php foreach ($member_group as $value_member_group): ?>
                           <?php $view_user = $this->db->select('*')->from('rmit_user')->where('id',$value_member_group)->get()->row_array(); ?>
                           <?php $avatar = base_url('uploads/'.$view_user['user_avatar']); ?>
                           <?php
                           $list_check_evaluate = array(
                              'code_group' => $view_group['code_group'],
                              'id_user_evaluate' => $user['iduser'],
                              'id_user_get_evaluate' => $view_user['id'],
                           ); 
                           ?>
                           <?php $view_evaluate = $this->db->select('*')->from('rmit_groups_evaluate')->where($list_check_evaluate)->get()->row_array(); ?>
                           <?php if($user['iduser'] != $value_member_group): ?>
                              <div class="grid md:grid-cols-1 md:gap-2 gap-3">
                                 <div class="flex md:items-center space-x-4 p-4 rounded-md box">
                                    <div class="sm:w-20 w-14 sm:h-20 h-14 flex-shrink-0 rounded-lg relative"> 
                                       <img src="<?php get_img($avatar); ?>" class="absolute w-full h-full inset-0 rounded-md object-cover shadow-sm" alt="">
                                    </div>
                                    <div class="flex-1">
                                       <p class="md:text-lg text-base font-semibold capitalize text-black dark:text-white" style="font-size: 16px"><?= $view_user['username']; ?> - <?= $view_user['msv']; ?> </p>
                                       <div class="mt-2">
                                          <h4 class="card-title text-sm" style="padding: 0px 0px;font-size: 14px;">Point: <?php if(isset($view_evaluate)){ echo $view_evaluate['point']; } ?></h4>
                                          <h4 class="card-title text-sm" style="padding: 0px 0px;font-size: 14px;">Evaluate: <?php if(isset($view_evaluate)){ echo $view_evaluate['content_evaluate']; } ?></h4>
                                       </div>
                                    </div>
                                    <?php if(isset($view_evaluate)){ ?>
                                       <a href="<?= base_url('groups-evaluate-edit?codegroup='.$view_group['code_group'].'&code_user_group='.$view_user['msv']); ?>">  
                                          <button type="button" class="button bg-danger text-white">
                                             <ion-icon name="add-circle" class="text-xl -ml-1"></ion-icon>
                                             Edit
                                          </button>
                                       </a> 
                                    <?php }else{ ?>
                                       <a href="<?= base_url('groups-evaluate?codegroup='.$view_group['code_group'].'&code_user_group='.$view_user['msv']); ?>">  
                                          <button type="button" class="button bg-primary-soft text-primary dark:text-white gap-1 max-md:hidden">
                                             <ion-icon name="add-circle" class="text-xl -ml-1"></ion-icon>
                                             Evaluate
                                          </button>
                                       </a> 
                                    <?php } ?>
                                 </div>
                              </div>
                           <?php endif ?>
                        <?php endforeach ?>
                     </div>
                  </div>
               </div>
            <?php } ?>


            <!-- add story -->
            <?php if(isset($template_sub)){ ?>
               <?php $this->load->view($template_sub); ?>
            <?php } ?>
            <!-- post text-->

         </div>
      <?php }else{ ?>
         <div class="flex-1 xl:space-y-6 space-y-3" style="text-align: center;">
            <a href="<?= base_url('groups-member-agree?codegroup='.$view_group['code_group']); ?>" onclick="return confirm('Are you sure you want to join the group?')">
               <button class="button bg-primary items-center text-white py-2 px-3.5 shadow ml-auto">
                  <ion-icon name="add-outline" class="text-xl"></ion-icon>
                  <span class="text-sm"> Agree to join the group  </span>
               </button>
            </a>
            <a href="<?= base_url('groups-member-disagree?codegroup='.$view_group['code_group']); ?>" onclick="return confirm('Are you sure you don not want to join the group?')">
               <button class="button bg-danger  items-center text-white py-2 px-3.5 shadow ml-auto">
                  <ion-icon name="add-outline" class="text-xl"></ion-icon>
                  <span class="text-sm"> Do not agree to join the group  </span>
               </button>
            </a>
         </div>
      <?php } ?>
      <div class="lg:w-[400px]">
         <div class="lg:space-y-4 lg:pb-8 max-lg:grid sm:grid-cols-2 max-lg:gap-6" uk-sticky="media: 1024; end: #js-oversized; offset: 80">
            <!-- group info -->
            <div class="box p-5 px-6">
               <div class="flex items-ce justify-between text-black dark:text-white">
                  <h3 class="font-bold text-lg"> About   </h3>
                  <?php if(in_array($user['iduser'],$member_group)){ ?>
                     <a href="<?= base_url('groups-edit?codegroup='.$view_group['code_group']); ?>" class="text-sm text-blue-500">Edit</a>
                  <?php } ?>
               </div>
               <ul class="text-gray-700 space-y-4 mt-2 mb-1 text-sm dark:text-white">
                  <li> <?= $view_group['content_group'] ?></li>
               </ul>
               <?php if(in_array($user['iduser'],$member_group)){ ?>
                  <div style="text-align: center;margin-top: 20px;">
                     <a href="<?= base_url('groups-exit-member?codegroup='.$view_group['code_group']); ?>" onclick="return confirm('Are you sure you want to exit the group? If you voluntarily leave the group, points will be deducted. Low scores will not allow you to join groups?')">
                        <button type="button" class="button bg-danger text-white">Exit group</button>
                     </a>
                  </div>
               <?php } ?>
            </div>
         </div>
      </div>
   </div>
</div>