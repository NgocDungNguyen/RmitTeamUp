<?php 
$user = $this->session->userdata('UserFrontent');
$view_user = $this->db->select('*')->from('rmit_user')->where('id',$user['iduser'])->get()->row_array();
$avatar = base_url('uploads/'.$view_user['user_avatar']);
?>
<?php if(isset($view_group_mess)){ ?>
	<?php if($view_group_mess['id_user_from'] != $user['iduser']){
		$view_user_friend = $this->db->select('*')->from('rmit_user')->where('id',$view_group_mess['id_user_from'])->get()->row_array();
		$avatar_friend = base_url('uploads/'.$view_user_friend['user_avatar']);
	} ?>
	<?php if($view_group_mess['id_user_to'] != $user['iduser']){
		$view_user_friend = $this->db->select('*')->from('rmit_user')->where('id',$view_group_mess['id_user_to'])->get()->row_array();
		$avatar_friend = base_url('uploads/'.$view_user_friend['user_avatar']);
	} ?>
	<?php 
	$check_mess = array(
		'code_group_mess' => $view_group_mess['code_mess'],
		'date_group_mess' => $view_group_mess['id'],
	);
	?>
	<?php $view_messenger = $this->db->select('*')->from('rmit_messenger')->where($check_mess)->get()->row_array(); ?>
	<?php $list_group_mess = $this->db->select('*')->from('rmit_messenger_group')->where('father_group_mess',$view_group_mess['id'])->get()->result_array(); ?>
	<div class="flex justify-center ">
		<div class="font-medium text-gray-500 text-sm dark:text-white/70">
			<?= date('d-m-Y',$view_group_mess['date_group_mess']); ?> , <?= date('H:i',$view_messenger['date_group_mess']); ?>
		</div>
	</div>
	<?php if($view_messenger['id_user_from'] == $user['iduser']){ ?>
				<!-- sent -->
	<div class="flex gap-2 flex-row-reverse items-end">
		<img src="<?php get_img($avatar); ?>" alt="" class="w-4 h-4 rounded-full shadow">
		<div class="px-4 py-2 rounded-[20px] max-w-sm bg-gradient-to-tr from-sky-500 to-blue-500 text-white shadow">  <?= $view_messenger['content']; ?> </div>
	</div>
	<?php }else{ ?>
				<!-- received -->
				<div class="flex gap-3 mt-2">
					<img src="<?php get_img($avatar_friend); ?>" alt="" class="w-9 h-9 rounded-full shadow">
					<div class="px-4 py-2 rounded-[20px] max-w-sm bg-secondery">  <?= $view_messenger['content']; ?> </div>
				</div>
			<?php } ?>
	<?php foreach ($list_group_mess as $value_sub): ?>
		<?php $list_mess = $this->db->select('*')->from('rmit_messenger')->where('date_group_mess',$value_sub['id'])->get()->result_array(); ?>
		<div class="flex justify-center ">
			<div class="font-medium text-gray-500 text-sm dark:text-white/70">
				<?= date('d-m-Y',$value_sub['date_group_mess']); ?>
			</div>
		</div>
		<?php foreach ($list_mess as $value_mess): ?>
			<?php if($value_mess['id_user_from'] == $user['iduser']){ ?>
				<!-- sent -->
				<div class="flex gap-2 flex-row-reverse items-end mt-2">
					<img src="<?php get_img($avatar); ?>" alt="" class="w-4 h-4 rounded-full shadow">
					<div class="px-4 py-2 rounded-[20px] max-w-sm bg-gradient-to-tr from-sky-500 to-blue-500 text-white shadow">  <?= $value_mess['content']; ?> </div>
				</div>
			<?php }else{ ?>
				<!-- received -->
				<div class="flex gap-3 mt-2">
					<img src="<?php get_img($avatar_friend); ?>" alt="" class="w-9 h-9 rounded-full shadow">
					<div class="px-4 py-2 rounded-[20px] max-w-sm bg-secondery">  <?= $value_mess['content']; ?> </div>
				</div>
			<?php } ?>
		<?php endforeach ?>
	<?php endforeach ?>

<?php } ?>
