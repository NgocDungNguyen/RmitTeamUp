<?php $member_group = json_decode($view_group['member_group']); ?>
<h1 style="margin-top: 20px; margin-bottom: 20px;"><b>Group Members</b></h1>
<div class="grid lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-3 grid-cols-2 gap-4" uk-scrollspy="target: > div; cls: uk-animation-scale-up; delay: 100 ;repeat: true" style="margin-bottom: 150px;">
	<?php foreach ($member_group as $value): ?>
		<?php $view_user = $this->db->select('*')->from('rmit_user')->where('id',$value)->get()->row_array(); ?>
		<?php $avatar = base_url('uploads/'.$view_user['user_avatar']); ?>
		<div class="card uk-scrollspy-inview " style="">
			<a href="<?= base_url('profile?id='.$view_user['msv']); ?>">
				<div class="card-media sm:aspect-[2/1.7] h-40">
					<img src="<?php get_img($avatar); ?>" alt="">
					<div class="card-overly"></div>
				</div>
			</a>
			<div class="card-body">
				<a href="<?= base_url('profile?id='.$view_user['msv']); ?>"> <h4 class="card-title"> <?= $view_user['username']; ?> </h4> </a>
				<h4 class="card-title text-sm" style="padding: 10px 0px;font-size: 14px;">Overall GPA: <?= $view_user['user_gpa']; ?></h4>
				<?php if($value == $view_group['creator_group']){ ?>
					<h4 class="card-title text-sm" style="padding: 10px 0px;font-size: 14px;">Administrators</h4>
				<?php } ?>
			</div>
		</div>
	<?php endforeach ?>
</div>