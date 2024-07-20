<?php 
	$user_info = $this->session->userdata('UserFrontent');
	$user_id = $user_info['iduser'];
	$view_user = $this->db->select('*')->from('rmit_user')->where('id',$user_id)->get()->row_array();
	$view_packet = $this->db->select('*')->from('rmit_packet')->where('id',$view_user['service_pack'])->get()->row_array();
?>
<h1 class="text-base font-medium text-black dark:text-white mt-16 mb-5" style="border-radius: 5px;">Tài khoản: <?= $view_packet['name_packet']; ?> | <?= date('d-m-Y H:i:s', $view_user['expiration_date']); ?></h1>
<div class="md:p-8 p-5 bg-white shadow-sm rounded-xl  dark:bg-dark3">
	<h1 class="text-base font-medium text-black dark:text-white" style="border-radius: 5px;">Account packages for members</h1>
	<div class="">
		<div class="grid lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-2 gap-2.5 mt-4">

			<div class="card">
				<div class="card-body">
					<h1 class="text-base font-medium text-black dark:text-white" style="background: #f7f7f7;padding: 10px 0px;text-align: center;border-radius: 10px;font-size: 22px;">Basic Plan</h1>
					<h4 class="card-title text-sm" style="padding: 10px 0px;text-align: center;font-size: 18px;">Price: 10,000 VND/month</h4>
					<p class="card-text text-black mt-2">- 3 Days Free Trial</p>
					<p class="card-text text-black mt-2">- Access to viewing courses and course information.</p>
					<p class="card-text text-black mt-2">- Ability to add courses to your profile and find teammates based on courses.</p>
					<p class="card-text text-black mt-2">- Ad-supported browsing.</p>
					<p class="card-text text-black mt-2">- Limited access to advanced features.</p>
					<p class="card-text text-black mt-2"></p>
					<div class="" style="text-align: center;">
						<a href="<?= base_url('service_pack/basic_plan'); ?>">
						<button type="button" class="button bg-primary text-white flex-1">Upgrade account</button>
						</a>
					</div>
				</div>
			</div>

			<div class="card">
				<div class="card-body">
					<h1 class="text-base font-medium text-black dark:text-white" style="background: #f7f7f7;padding: 10px 0px;text-align: center;border-radius: 10px;font-size: 22px;">Standard Plan</h1>
					<h4 class="card-title text-sm" style="padding: 10px 0px;text-align: center;font-size: 18px;">Price: 15,000 VND/month</h4>
					<p class="card-text text-black mt-2">- 3 Days Free Trial</p>
					<p class="card-text text-black mt-2">- Includes all features of the Basic Plan.</p>
					<p class="card-text text-black mt-2">- View profiles of other users.</p>
					<p class="card-text text-black mt-2">- Chat and call with connected users.</p>
					<p class="card-text text-black mt-2">- Advanced search filters for finding teammates.</p>
					<p class="card-text text-black mt-2">- No ads during website usage.</p>
					<div class="" style="text-align: center;">
						<a href="<?= base_url('service_pack/standard_plan'); ?>">
						<button type="button" class="button bg-primary text-white flex-1">Upgrade account</button>
						</a>
					</div>
				</div>
			</div>

			<div class="card">
				<div class="card-body">
					<h1 class="text-base font-medium text-black dark:text-white" style="background: #f7f7f7;padding: 10px 0px;text-align: center;border-radius: 10px;font-size: 22px;">Premium Plan</h1>
					<h4 class="card-title text-sm" style="padding: 10px 0px;text-align: center;font-size: 18px;">Price: 20,000 VND/month</h4>
					<p class="card-text text-black mt-2">- 3 Days Free Trial</p>
					<p class="card-text text-black mt-2">- Includes all features of the Standard Plan.</p>
					<p class="card-text text-black mt-2">- Priority online support from admins.</p>
					<p class="card-text text-black mt-2">- Enhanced visibility in teammate search results.</p>
					<p class="card-text text-black mt-2">- Access to a library of past exam papers.</p>
					<p class="card-text text-black mt-2">&nbsp;</p>
					<div class="" style="text-align: center;">
						<a href="<?= base_url('service_pack/premium_plan'); ?>">
						<button type="button" class="button bg-primary text-white flex-1">Upgrade account</button>
						</a>
					</div>
				</div>
			</div>
			
		</div>
	</div> 
</div> 