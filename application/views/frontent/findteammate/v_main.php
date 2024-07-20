<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<?php $list_subject = $this->db->select('*')->from('rmit_subject')->get()->result_array(); ?>
<?php $user = $this->session->userdata('UserFrontent'); ?>
<?php $view_user = $this->db->select('*')->from('rmit_user')->where('id',$user['iduser'])->get()->row_array(); ?>
<?php $list_subject_user = $this->db->select('*')->from('rmit_user_subject')->where('user_id',$user['iduser'])->get()->result_array(); ?>

<?php $list_user = $this->db->select('*')->from('rmit_user')->order_by('user_gpa','desc')->get()->result_array(); ?>

<div class="lg:flex 2xl:gap-12 gap-10 2xl:max-w-[1220px] max-w-[1065px] mx-auto" id="js-oversized">
   <div class="flex-1">
      <div class="lg:max-w- w-full">
         <div class="box relative rounded-lg shadow-md">
            <!-- nav tabs -->
            <div class="relative border-b" tabindex="-1" uk-slider="finite: true">
               <nav class="uk-slider-container overflow-hidden nav__underline px-6 p-0 border-transparent -mb-px">
                  <ul class="uk-slider-items w-[calc(100%+10px)] !overflow-hidden" uk-switcher="connect: #setting_tab ; animation: uk-animation-slide-right-medium, uk-animation-slide-left-medium">
                     <li class="w-auto pr-2.5"> <a href="#"> Find Teammate </a> </li>
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
                     <form method="get" action="<?= base_url('find-teammate'); ?>" class="space-y-7 text-sm text-black font-medium dark:text-white" uk-scrollspy="target: > *; cls: uk-animation-scale-up; delay: 100 ;repeat: true" enctype="multipart/form-data">
                        <div class="md:flex items-center gap-10">
                           <label class="md:w-32 text-right"> Môn Học</label>
                           <div class="flex-1 max-md:mt-4">
                              <select class="!border-0 !rounded-md w-full js-example-basic-single" name="subject_id" style="width: 100%;">
                                 <?php foreach ($list_subject as $value): ?>
                                    <option value="<?= $value['id']; ?>"<?php if(isset($subject_id) && $value['id'] == $subject_id){ echo ' selected'; } ?>><?= $value['code_subject']; ?> - <?= $value['name_subject']; ?></option>
                                 <?php endforeach ?>
                              </select>
                           </div>
                        </div>
                        <div class="md:flex items-center gap-10">
                           <label class="md:w-32 text-right"> Điểm số mong muốn(<span style="color:red">*</span>) </label>
                           <div class="flex-1 max-md:mt-4">
                              <!-- <input type="text" inputmode="decimal" pattern="[0-9,\.]*" name="scores" required class="w-full" placeholder="4.0" required> -->
                              <select class="!border-0 !rounded-md w-full js-example-basic-single" name="scores" style="width: 100%;">
                                 <option value="HD"<?php if(isset($scores) && $scores == 'HD'){ echo ' selected'; } ?>>HD - 4</option>
                                 <option value="DI"<?php if(isset($scores) && $scores == 'DI'){ echo ' selected'; } ?>>DI - 3</option>
                                 <option value="CR"<?php if(isset($scores) && $scores == 'CR'){ echo ' selected'; } ?>>CR - 2</option>
                                 <option value="PA"<?php if(isset($scores) && $scores == 'PA'){ echo ' selected'; } ?>>PA - 1</option>
                              </select>
                           </div>
                        </div>
                        <div class="flex items-center gap-4 mt-16 lg:pl-[10.5rem]">
                           <button type="submit" class="button lg:px-10 bg-primary text-white max-md:flex-1" name="check" value="1"> Tìm kiếm <span class="ripple-overlay"></span></button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php if(isset($list_teammeat)){ ?>
   <div class="mt-4 mb-6 lg:flex 2xl:gap-12 gap-10 2xl:max-w-[1220px]  mx-auto" id="js-oversized" style="padding-bottom: 100px;">
      <div class="flex-1">
         <div class="lg:max-w- w-full">
            <div class="box relative rounded-lg shadow-md">
               <!-- nav tabs -->
               <div class="relative border-b" tabindex="-1" uk-slider="finite: true">
                  <nav class="uk-slider-container overflow-hidden nav__underline px-6 p-0 border-transparent -mb-px">
                     <ul class="uk-slider-items w-[calc(100%+10px)] !overflow-hidden" uk-switcher="connect: #setting_tab ; animation: uk-animation-slide-right-medium, uk-animation-slide-left-medium">
                        <li class="w-auto pr-2.5"> <a href="#"> Danh sách sinh viên </a> </li>
                     </ul>
                  </nav>
               </div>
               <style>
                  .checked {
                   color: orange;
                }
             </style>
             <div id="setting_tab" class="uk-switcher p-6 overflow-hidden text-black text-sm">
               <!-- tab user basic info -->
               <div>
                  <div class="mt-5">
                    <?php if(count($list_teammeat) == 0){ ?>
                       <h1 class="text-center"><b>Không có sinh viên nào phù hợp nội dung tìm kiếm!</b></h1>
                    <?php }else{ ?>
                      <div class="grid sm:grid-cols-3 grid-cols-2 gap-3" uk-scrollspy="target: > div; cls: uk-animation-scale-up; delay: 100 ;repeat: true">
                        <?php $array_teammeat = array(); ?>
                        <?php foreach ($list_teammeat as $value_teammeat): ?>
                           <?php array_push($array_teammeat,$value_teammeat['user_id']); ?>
                        <?php endforeach ?>
                        <?php foreach ($list_user as $value_user): ?>
                           <?php if(in_array($value_user['id'],$array_teammeat)){ ?>
                              <?php $avatar = base_url('uploads/'.$value_user['user_avatar']); ?>
                              <?php
                              // Kiểm tra xem đã gửi lời kết bạn chưa
                              $check_friend = array(
                                 'id_from' => $user['iduser'],
                                 'id_to' => $value_user['id'],
                              );
                              $view_add_friend = $this->db->select('*')->from('rmit_friend')->where($check_friend)->get()->row_array();
                              ?>
                              <div class="card">
                                 <a href="<?= base_url('profile?id='.$value_user['msv'].'&subject_id='.$subject_id.'&scores='.$scores); ?>">
                                   <div class="card-media sm:aspect-[2/1.7] h-40">
                                     <img src="<?php get_img($avatar); ?>" alt="">
                                     <div class="card-overly"></div>
                                  </div>
                               </a>
                               <div class="card-body">
                                <a href="<?= base_url('profile?id='.$value_user['msv'].'&subject_id='.$subject_id.'&scores='.$scores); ?>"> <h4 class="card-title"> <?= $value_user['username']; ?> </h4> </a>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <h4 class="card-title text-sm" style="padding: 10px 0px;font-size: 14px;">Overall GPA: <?= $value_user['user_gpa']; ?></h4>
                                <div class="grid lg:grid-cols-6 md:grid-cols-6 sm:grid-cols-2 gap-2.5 mt-4">
                                <a href="<?= base_url('profile?id='.$value_user['msv'].'&subject_id='.$subject_id.'&scores='.$scores); ?>">
                                   <button type="button" class="button bg-access text-white">View Profile</button>
                                </a>
                                <?php if(isset($view_add_friend)){ ?>
                                  <a href="<?= base_url('cancel-friend-request?code='.$value_user['msv'].'&subject_id='.$subject_id.'&scores='.$scores); ?>"   onclick="return confirm('Bạn có chắc chắn muốn hủy kết bạn với <?= $value_user['username']; ?>?')">
                                   <button type="button" class="button bg-danger text-white">Cancel friend request</button>
                                </a>
                                <?php }else{ ?>
                                  <a href="<?= base_url('add-friend?code='.$value_user['msv'].'&subject_id='.$subject_id.'&scores='.$scores); ?>" onclick="return confirm('Bạn có chắc chắn muốn kết bạn với <?= $value_user['username']; ?>?')">
                                   <button type="button" class="button bg-primary text-white">Add Friend</button>
                                </a>
                                <?php } ?>
                             </div>
                          </div>
                       </div>
                    <?php } ?>
                 <?php endforeach ?>
              </div>
           <?php } ?>
        </div>
     </div>
  </div>
</div>
</div>
</div>
</div>
<?php } ?>