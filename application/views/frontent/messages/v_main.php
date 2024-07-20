<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<?php 
$user = $this->session->userdata('UserFrontent');
$view_user = $this->db->select('*')->from('rmit_user')->where('id',$user['iduser'])->get()->row_array();
$group_friend = json_decode($view_user['friend_group']);
$friend_first = 0;
foreach ($group_friend as $key => $value) {
   if ($key == 0) {
      $friend_first = $value;
   }
}
?>
<script>
  $(document).ready(function(){
    $("#load_user_friend").load("load_user_friend");
    $.post("load-messenger",{iduserfriend: <?= $friend_first; ?>}, function(data) {
      $("#load_messenger").html(data);
   });
 });
  function chat_friend(idfriend){
    $.post("load-chat-friend",{iduserfriend: idfriend}, function(data) {
      $("#load_messenger").html(data);
   });
 }
 function timeorder(time){
    $("#load_user_friend").load("load_user_friend");
 }
 init_reload();
 function init_reload(){
    setInterval( function() {
      timeorder().reload();
   },5000);
 }
</script>
<script>
   $(function(){
     $("#search").keyup(function () {
       var value = $("#search").val();
       $.post("load-chat-friend-search",{ndsearch: value}, function(data) {
         $("#load_user_friend").html(data);
      });
    }).keyup();
  });
</script>
<div class="relative overflow-hidden border -m-2.5 dark:border-slate-700">
   <div class="flex bg-white dark:bg-dark2">
      <!-- sidebar -->
      <div class="md:w-[360px] relative border-r dark:border-slate-700">
         <div id="side-chat" class="top-0 left-0 max-md:fixed max-md:w-5/6 max-md:h-screen bg-white z-50 max-md:shadow max-md:-translate-x-full dark:bg-dark2">
            <!-- heading title -->
            <div class="p-4 border-b dark:border-slate-700">
               <div class="flex mt-2 items-center justify-between">
                  <h2 class="text-2xl font-bold text-black ml-1 dark:text-white">
                     Chats 
                     <!-- right action buttons -->
                     <div class="flex items-center gap-2.5">
                        <button class="group">
                           <ion-icon name="settings-outline" class="text-2xl flex group-aria-expanded:rotate-180"></ion-icon>
                        </button>
                        <div class="md:w-[270px] w-full" uk-dropdown="pos: bottom-left; offset:10; animation: uk-animation-slide-bottom-small">
                           <nav>
                              <a href="#">
                                 <ion-icon class="text-2xl shrink-0 -ml-1" name="checkmark-outline"></ion-icon>
                                 Mark all as read 
                              </a>
                              <a href="#">
                                 <ion-icon class="text-2xl shrink-0 -ml-1" name="notifications-outline"></ion-icon>
                                 notifications setting 
                              </a>
                              <a href="#">
                                 <ion-icon class="text-xl shrink-0 -ml-1" name="volume-mute-outline"></ion-icon>
                                 Mute notifications 
                              </a>
                           </nav>
                        </div>
                        <button class="">
                           <ion-icon name="checkmark-circle-outline" class="text-2xl flex"></ion-icon>
                        </button>
                        <!-- mobile toggle menu -->
                        <button type="button" class="md:hidden" uk-toggle="target: #side-chat ; cls: max-md:-translate-x-full">
                           <ion-icon name="chevron-down-outline"></ion-icon>
                        </button>
                     </div>
                  </h2>
               </div>
               <!-- search -->
               <div class="relative mt-4">
                  <div class="absolute left-3 bottom-1/2 translate-y-1/2 flex">
                     <ion-icon name="search" class="text-xl"></ion-icon>
                  </div>
                  <input type="text" placeholder="Search" id="search" class="w-full !pl-10 !py-2 !rounded-lg">
               </div>
            </div>
            <!-- users list -->
            <div class="space-y-2 p-2 overflow-y-auto md:h-[calc(100vh-204px)] h-[calc(100vh-130px)]" id="hidden-click">
               <span id="load_user_friend"></span>
            </div>
         </div>
         <!-- overly -->
         <div id="side-chat" class="bg-slate-100/40 backdrop-blur w-full h-full dark:bg-slate-800/40 z-40 fixed inset-0 max-md:-translate-x-full md:hidden" uk-toggle="target: #side-chat ; cls: max-md:-translate-x-full"></div>
      </div>
      <?php if(count($group_friend) != 0): ?>
         <!-- message center -->
         <div class="flex-1">
            <p id="load_messenger"></p>
         </div>
      <?php endif ?>
   </div>
</div>