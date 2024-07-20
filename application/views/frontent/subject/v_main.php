<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<?php $list_subject = $this->db->select('*')->from('rmit_subject')->get()->result_array(); ?>
<?php $user = $this->session->userdata('UserFrontent'); ?>
<?php $view_user = $this->db->select('*')->from('rmit_user')->where('id',$user['iduser'])->get()->row_array(); ?>
<?php $list_subject_user = $this->db->select('*')->from('rmit_user_subject')->where('user_id',$user['iduser'])->get()->result_array(); ?>
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
                     <li class="w-auto pr-2.5"> <a href="#"> Mô tả </a> </li>
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
                     <form method="post" action="<?= base_url('subject-check'); ?>" class="space-y-7 text-sm text-black font-medium dark:text-white" uk-scrollspy="target: > *; cls: uk-animation-scale-up; delay: 100 ;repeat: true" enctype="multipart/form-data">
                        <div class="md:flex items-center gap-10">
                           <label class="md:w-32 text-right"> Môn Học </label>
                           <div class="flex-1 max-md:mt-4">
                              <select class="!border-0 !rounded-md w-full js-example-basic-single" name="subject_id" width="100%">
                                 <?php foreach ($list_subject as $value): ?>
                                    <option value="<?= $value['id']; ?>"><?= $value['code_subject']; ?> - <?= $value['name_subject']; ?></option>
                               <?php endforeach ?>
                            </select>
                           </div>
                        </div>
                        <div class="md:flex items-center gap-10">
                           <label class="md:w-32 text-right"> Điểm số(<span style="color:red">*</span>) </label>
                           <div class="flex-1 max-md:mt-4">
                              <!-- <input type="text" inputmode="decimal" pattern="[0-9,\.]*" name="scores" required class="w-full" placeholder="4.0" required> -->
                           <select class="!border-0 !rounded-md w-full js-example-basic-single" name="scores" width="100%">
                              <option value="HD">HD - 4</option>
                              <option value="DI">DI - 3</option>
                              <option value="CR">CR - 2</option>
                              <option value="PA">PA - 1</option>
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
<div class="mt-4 mb-6 lg:flex 2xl:gap-12 gap-10 2xl:max-w-[1220px]  mx-auto" id="js-oversized" style="padding-bottom: 100px;">
   <div class="flex-1">
      <div class="lg:max-w- w-full">
         <div class="box relative rounded-lg shadow-md">
            <!-- nav tabs -->
            <div class="relative border-b" tabindex="-1" uk-slider="finite: true">
               <nav class="uk-slider-container overflow-hidden nav__underline px-6 p-0 border-transparent -mb-px">
                  <ul class="uk-slider-items w-[calc(100%+10px)] !overflow-hidden" uk-switcher="connect: #setting_tab ; animation: uk-animation-slide-right-medium, uk-animation-slide-left-medium">
                     <li class="w-auto pr-2.5"> <a href="#"> Danh sách môn học </a> </li>
                  </ul>
               </nav>
               <a class="absolute -translate-y-1/2 top-1/2 left-0 flex items-center w-20 h-full p-2 py-1 justify-start bg-gradient-to-r from-white via-white dark:from-slate-800 dark:via-slate-800" href="#" uk-slider-item="previous">
                  <ion-icon name="chevron-back" class="text-2xl ml-1"></ion-icon>
               </a>
               <a class="absolute right-0 -translate-y-1/2 top-1/2 flex items-center w-20 h-full p-2 py-1 justify-end bg-gradient-to-l from-white via-white dark:from-slate-800 dark:via-slate-800" href="#" uk-slider-item="next">
                  <ion-icon name="chevron-forward" class="text-2xl mr-1"></ion-icon>
               </a>
            </div>
            <div id="setting_tab" class="uk-switcher p-6 overflow-hidden text-black text-sm">
               <!-- tab user basic info -->
               <div>
                  <div class="mt-5">
                     <h1 class="mb-3"><b>Overall GPA: <?= $view_user['user_gpa'] ?></b></h1>
                     <table id="customers">
                        <tr>
                           <th>COURSE CODE</th>
                           <th>COURSE TITLE</th>
                           <th>CREDIT POINTS</th>
                           <th>SCORES</th>
                           <th></th>
                        </tr>
                        <?php foreach ($list_subject_user as $value): ?>
                            <?php $view_subject = $this->db->select('*')->from('rmit_subject')->where('id',$value['subject_id'])->get()->row_array(); ?>
                            <tr>
                               <td><?= $view_subject['code_subject']; ?></td>
                               <td><?= $view_subject['name_subject']; ?></td>
                               <td><?= $view_subject['credit_points']; ?></td>
                               <td><?= $value['scores']; ?></td>
                               <td>
                                   <a href="<?= base_url('subject-edit/'.$value['id']); ?>" class="px-2 text-primary">
                                    <i class="fas fa-pencil-alt"></i>
                                  </a>
                                  <a href="<?= base_url('subject-delete/'.$value['id']); ?>" class="text-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa môn học?')" style="color: red">
                                    <i class="far fa-trash-alt"></i>
                                  </a>
                               </td>
                            </tr>  
                        <?php endforeach ?>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>