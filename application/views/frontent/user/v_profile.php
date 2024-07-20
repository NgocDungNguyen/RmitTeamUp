<div class="max-w-3xl mx-auto">
   <div class="box relative rounded-lg shadow-md">
      <div class="flex md:gap-8 gap-4 items-center md:p-8 p-6 md:pb-4">
         <div class="relative md:w-20 md:h-20 w-12 h-12 shrink-0">
            <label for="file" class="cursor-pointer">
            <img id="img" src="<?= base_url('public/frontent/'); ?>assets/images/avatars/avatar-3.jpg" class="object-cover w-full h-full rounded-full" alt="">
            <input type="file" id="file" class="hidden">
            </label>
            <label for="file" class="md:p-1 p-0.5 rounded-full bg-slate-600 md:border-4 border-white absolute -bottom-2 -right-2 cursor-pointer dark:border-slate-700">
               <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor" class="md:w-4 md:h-4 w-3 h-3 fill-white">
                  <path d="M12 9a3.75 3.75 0 100 7.5A3.75 3.75 0 0012 9z"></path>
                  <path fill-rule="evenodd" d="M9.344 3.071a49.52 49.52 0 015.312 0c.967.052 1.83.585 2.332 1.39l.821 1.317c.24.383.645.643 1.11.71.386.054.77.113 1.152.177 1.432.239 2.429 1.493 2.429 2.909V18a3 3 0 01-3 3h-15a3 3 0 01-3-3V9.574c0-1.416.997-2.67 2.429-2.909.382-.064.766-.123 1.151-.178a1.56 1.56 0 001.11-.71l.822-1.315a2.942 2.942 0 012.332-1.39zM6.75 12.75a5.25 5.25 0 1110.5 0 5.25 5.25 0 01-10.5 0zm12-1.5a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd"></path>
               </svg>
               <input id="file" type="file" class="hidden">
            </label>
         </div>
         <div class="flex-1">
            <h3 class="md:text-xl text-base font-semibold text-black dark:text-white"> Monroe Parker </h3>
            <p class="text-sm text-blue-600 mt-1 font-normal">@Monroe</p>
         </div>
         <button class="inline-flex items-center gap-1 py-1 pl-2.5 pr-3 rounded-full bg-slate-50 border-2 border-slate-100 dark:text-white dark:bg-slate-700" type="button" aria-haspopup="true" aria-expanded="false">
            <ion-icon name="flash-outline" class="text-base duration-500 group-aria-expanded:rotate-180 md hydrated" role="img" aria-label="chevron down outline"></ion-icon>
            <span class="font-medium text-sm"> Upgrade  </span> 
         </button>
      </div>
      <!-- nav tabs -->
      <div class="relative border-b" tabindex="-1" uk-slider="finite: true">
         <nav class="uk-slider-container overflow-hidden nav__underline px-6 p-0 border-transparent -mb-px">
            <ul class="uk-slider-items w-[calc(100%+10px)] !overflow-hidden" uk-switcher="connect: #setting_tab ; animation: uk-animation-slide-right-medium, uk-animation-slide-left-medium">
               <li class="w-auto pr-2.5"> <a href="#"> Description </a> </li>
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
            <div>
               <div class="space-y-6">
                  <div class="md:flex items-center gap-10">
                     <label class="md:w-32 text-right"> Username </label>
                     <div class="flex-1 max-md:mt-4">
                        <input type="text" placeholder="Monroe" class="lg:w-1/2 w-full">
                     </div>
                  </div>
                  <div class="md:flex items-center gap-10">
                     <label class="md:w-32 text-right"> Email </label>
                     <div class="flex-1 max-md:mt-4">
                        <input type="text" placeholder="info@mydomain.com" class="w-full">
                     </div>
                  </div>
                  <div class="md:flex items-start gap-10">
                     <label class="md:w-32 text-right"> Bio </label>
                     <div class="flex-1 max-md:mt-4">
                        <textarea class="w-full" rows="5" placeholder="Inter your Bio"></textarea>
                     </div>
                  </div>
                  <div class="md:flex items-center gap-10">
                     <label class="md:w-32 text-right"> Gender </label>
                     <div class="flex-1 max-md:mt-4">
                        <select class="!border-0 !rounded-md lg:w-1/2 w-full">
                           <option value="1">Male</option>
                           <option value="2">Female</option>
                        </select>
                     </div>
                  </div>
                  <div class="md:flex items-center gap-10">
                     <label class="md:w-32 text-right"> Relationship </label>
                     <div class="flex-1 max-md:mt-4">
                        <select class="!border-0 !rounded-md lg:w-1/2 w-full">
                           <option value="0">None</option>
                           <option value="1">Single</option>
                           <option value="2">In a relationship</option>
                           <option value="3">Married</option>
                           <option value="4">Engaged</option>
                        </select>
                     </div>
                  </div>
                  <div class="md:flex items-start gap-10 " hidden="">
                     <label class="md:w-32 text-right"> Avatar </label>
                     <div class="flex-1 flex items-center gap-5 max-md:mt-4">
                        <img src="<?= base_url('public/frontent/'); ?>assets/images/avatars/avatar-3.jpg" alt="" class="w-10 h-10 rounded-full">
                        <button type="submit" class="px-4 py-1 rounded-full bg-slate-100/60 border dark:bg-slate-700 dark:border-slate-600 dark:text-white"> Change</button>
                     </div>
                  </div>
               </div>
               <div class="flex items-center gap-4 mt-16 lg:pl-[10.5rem]">
                  <button type="submit" class="button lg:px-6 bg-secondery max-md:flex-1"> Cancle</button>
                  <button type="submit" class="button lg:px-10 bg-primary text-white max-md:flex-1"> Save <span class="ripple-overlay"></span></button>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>