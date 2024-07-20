<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<?php 
$avatar = base_url('uploads/'.$view_user_friend['user_avatar']);
?>
<script>
	$(document).ready(function(){
        $.post("load-messenger-info",{iduserfriend: <?= $view_user_friend['id']; ?>}, function(data) {
            $("#load_messenger-info").html(data);
         });
    });
    function load_mess_auto(time){
        $.post("load-messenger-info",{iduserfriend: <?= $view_user_friend['id']; ?>}, function(data) {
            $("#load_messenger-info").html(data);
         });
    }
    reload_mess()
    function reload_mess(){
        setInterval( function() {
            load_mess_auto().reload();
          },5000);
    }
</script>
<div class="flex-1">
	<!-- chat heading -->
	<div class="flex items-center justify-between gap-2 w- px-6 py-3.5 z-10 border-b dark:border-slate-700 uk-animation-slide-top-medium">
		<div class="flex items-center sm:gap-4 gap-2">
			<!-- toggle for mobile -->
			<button type="button" class="md:hidden" uk-toggle="target: #side-chat ; cls: max-md:-translate-x-full">
				<ion-icon name="chevron-back-outline" class="text-2xl -ml-4"><i class="fa-solid fa-chevron-left" style="font-size: 16px;"></i></ion-icon>
			</button>
			<div class="relative cursor-pointer max-md:hidden" uk-toggle="target: .rightt ; cls: hidden">
				<img src="<?php get_img($avatar); ?>" alt="" class="w-8 h-8 rounded-full shadow">
				<div class="w-2 h-2 bg-teal-500 rounded-full absolute right-0 bottom-0 m-px"></div>
			</div>
			<div class="cursor-pointer" >
				<div class="text-base font-bold"> <?= $view_user_friend['username']; ?></div>
			</div>
		</div>
	</div>
	<!-- chats bubble -->
	<div class="w-full p-5 py-10 overflow-y-auto md:h-[calc(100vh-204px)] h-[calc(100vh-195px)]">
		<div class="py-10 text-center text-sm lg:pt-8">
			<img src="<?php get_img($avatar); ?>" class="w-24 h-24 rounded-full mx-auto mb-3" alt="">
			<div class="mt-8">
				<div class="md:text-xl text-base font-medium text-black dark:text-white"> <?= $view_user_friend['username']; ?> </div>
				<div class="text-gray-500 text-sm dark:text-white/80"> @<?= $view_user_friend['msv']; ?> </div>
			</div>
			<div class="mt-3.5">
				<a href="<?= base_url('profile?id='.$view_user_friend['msv']); ?>" class="inline-block rounded-lg px-4 py-1.5 text-sm font-semibold bg-secondery">View profile</a>
			</div>
		</div>
		<div class="text-sm font-medium space-y-6">
			<!-- received -->
			<span id="load_messenger-info"></span>
		</div>
	</div>
	<!-- sending message area -->
	<form action="" id="loginform">
		<div class="flex items-center md:gap-1 gap-2 md:p-3 p-2 overflow-hidden">
			<div class="grid grid-cols-6 gap-4">
				<div class="col-span-2">
					<div class="space-y-6">
						<div class="md:flex items-center gap-10">
							<div class="flex-1 max-md:mt-4">
								<div class="relative flex-1">
									<textarea id="messenger" name="messenger" rows="1" class="w-full resize-none bg-secondery rounded-full px-4 p-2"></textarea>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="">
					<button type="button" id="btnSubmit" class="button lg:px-10 bg-primary text-white max-md:flex-1"> Send <span class="ripple-overlay"></span></button>
				</div>
			</div>
		</div>
	</form>
</div>
<script type="text/javascript">
$(document).ready(function()
{
    //khai báo nút submit form
    var submit   = $("#btnSubmit");
    //khi thực hiện kích vào nút Sign in
    submit.click(function()
    {
        //khai báo các biến
        var messenger = $("#messenger").val(); //lấy giá trị input của email
        //kiểm tra xem bạn đã nhập email chưa
        if(messenger == ''){
            alert('Vui lòng nhập nội dung của bạn!');
            return false;
        }
        //Lấy dữ liệu trong form login
        var data = $('form#loginform').serialize();
        //Sử dụng hàm $.ajax()
        $.ajax({
        type : 'POST', //kiểu post
        url  : 'send-messenger/<?= $view_user_friend['id']; ?>', //gửi dữ liệu sang trang submit.php
        data : data,
        success :  function(data)
               {
                    if(data == 'false')
                    {
                        alert('Sai Email hoặc mật khẩu');
                    }else{
                    	$("#messenger").val("");
                        load_mess_auto(<?= $view_user_friend['id']; ?>).load();
                    }
               }
        });
        return false;
    });
});
</script>