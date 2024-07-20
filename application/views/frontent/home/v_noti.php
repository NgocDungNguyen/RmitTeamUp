<!-- notification -->
                     <button type="button" class="sm:p-2 p-1 rounded-full relative sm:bg-secondery dark:text-white" uk-tooltip="title: Notification; pos: bottom; offset:6">
                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor" class="w-6 h-6 max-sm:hidden">
                           <path d="M5.85 3.5a.75.75 0 00-1.117-1 9.719 9.719 0 00-2.348 4.876.75.75 0 001.479.248A8.219 8.219 0 015.85 3.5zM19.267 2.5a.75.75 0 10-1.118 1 8.22 8.22 0 011.987 4.124.75.75 0 001.48-.248A9.72 9.72 0 0019.266 2.5z"></path>
                           <path fill-rule="evenodd" d="M12 2.25A6.75 6.75 0 005.25 9v.75a8.217 8.217 0 01-2.119 5.52.75.75 0 00.298 1.206c1.544.57 3.16.99 4.831 1.243a3.75 3.75 0 107.48 0 24.583 24.583 0 004.83-1.244.75.75 0 00.298-1.205 8.217 8.217 0 01-2.118-5.52V9A6.75 6.75 0 0012 2.25zM9.75 18c0-.034 0-.067.002-.1a25.05 25.05 0 004.496 0l.002.1a2.25 2.25 0 11-4.5 0z" clip-rule="evenodd"></path>
                        </svg>
                        <?php if(count($list_noti) != 0){ ?>
                        <div class="absolute top-0 right-0 -m-1 bg-red-600 text-white text-xs px-1 rounded-full"><?= count($list_noti); ?></div>
                        <ion-icon name="notifications-outline" class="sm:hidden text-2xl"><i class="fa-regular fa-bell"></i></ion-icon>
                     <?php } ?>
                     </button>
                     <div class="hidden bg-white pr-1.5 rounded-lg drop-shadow-xl dark:bg-slate-700 md:w-[365px] w-screen border2" uk-drop="offset:6;pos: bottom-right; mode: click; animate-out: true; animation: uk-animation-scale-up uk-transform-origin-top-right ">
                        <!-- heading -->
                        <div class="flex items-center justify-between gap-2 p-4 pb-2">
                           <h3 class="font-bold text-xl"> Notifications </h3>
                           <div class="flex gap-2.5">
                              <button type="button" class="p-1 flex rounded-full focus:bg-secondery dark:text-white">
                                 <i class="fa-solid fa-bars"></i>
                              </button>
                              <div class="w-[280px] group" uk-dropdown="pos: bottom-right; animation: uk-animation-scale-up uk-transform-origin-top-right; animate-out: true; mode: click; offset:5">
                                 <nav class="text-sm">
                                    <a href="">
                                       <ion-icon class="text-xl shrink-0" name="checkmark-circle-outline"></ion-icon>
                                       Mark all as read
                                    </a>
                                 </nav>
                              </div>
                           </div>
                        </div>
                        <div class="text-sm h-[400px] w-full overflow-y-auto pr-2">
                           <!-- contents list -->
                           <div class="pl-2 p-1 text-sm font-normal dark:text-white">

                              <?php foreach ($list_noti as $value): ?>
                                 <?php $view_user = $this->Model_main->viewId('rmit_user',$value['id_user_send']); ?>
                                 <?php $avatar = base_url('uploads/'.$view_user['user_avatar']); ?>
                                 <a href="<?= base_url($value['link_notification']); ?>" class="relative flex items-center gap-3 p-2 duration-200 rounded-xl pr-10 hover:bg-secondery dark:hover:bg-white/10 bg-teal-500/5">
                                 <div class="relative w-12 h-12 shrink-0"> <img src="<?php get_img($avatar); ?>" alt="" class="object-cover w-full h-full rounded-full"></div>
                                 <div class="flex-1 ">
                                    <p> <b class="font-bold mr-1"> <?= $view_user['username']; ?></b> <?= $value['message_notification']; ?> </p>
                                    <div class="text-xs text-gray-500 mt-1.5 dark:text-white/80"> <?= date('d-m-Y H:i:s', $value['date_creat']); ?> </div>
                                 </div>
                              </a>
                              <?php endforeach ?>

                           </div>
                        </div>
                        <!-- footer -->
                        <a href="#">
                           <div class="text-center py-4 border-t border-slate-100 text-sm font-medium text-blue-600 dark:text-white dark:border-gray-600">  View Notifications </div>
                        </a>
                        <div class="w-3 h-3 absolute -top-1.5 right-3 bg-white border-l border-t rotate-45 max-md:hidden dark:bg-dark3 dark:border-transparent"></div>
                     </div>