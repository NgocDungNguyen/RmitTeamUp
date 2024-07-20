<?php $load_cloud = $this->db->select('*')->from('rmit_group_cloud')->where('code_group',$view_group['code_group'])->order_by('date_creat','desc')->get()->result_array(); ?>
<div class="bg-white rounded-xl shadow-sm p-4 space-y-4 text-sm font-medium border1 dark:bg-dark2">
    <div class="flex items-center gap-3">
        <div class="flex-1 bg-slate-100 hover:bg-opacity-80 transition-all rounded-lg cursor-pointer dark:bg-dark3" tabindex="0" aria-expanded="false"> 
            <a href="<?= base_url('groups-content?codegroup='.$view_group['code_group']); ?>">
                <div class="py-2.5 text-center dark:text-white"> What do you have in mind? </div>
            </a>
        </div>
    </div>
</div>
<!--  post image-->
<?php foreach ($load_cloud as $value): ?>
    <?php $view_user_post = $this->db->select('*')->from('rmit_user')->where('id',$value['id_user_send'])->get()->row_array(); ?>
    <?php $avatar = base_url('uploads/'.$view_user_post['user_avatar']); ?>
    <div class="bg-white rounded-xl shadow-sm text-sm font-medium border1 dark:bg-dark2">

        <!-- post heading -->
        <div class="flex gap-3 sm:p-4 p-2.5 text-sm font-medium">
            <a href="<?= base_url('/profile?id='.$view_user_post['msv']); ?>"> <img src="<?php get_img($avatar); ?>" alt="" class="w-9 h-9 rounded-full"> </a>  
            <div class="flex-1">
                <a href="<?= base_url('/profile?id='.$view_user_post['msv']); ?>"> <h4 class="text-black dark:text-white"> <?= $view_user_post['username']; ?> </h4> </a>  
                <div class="text-xs text-gray-500 dark:text-white/80"> <?= date('d-m-Y H:i:s', $value['date_creat']); ?></div>
            </div>
        </div>
        <div class="relative w-full h-full sm:px-4 mb-2">
            <h4>
                <?= $value['content_group']; ?>
            </h4>
        </div>
        <?php if($value['type_content'] == 'images'){ ?>
            <?php $images = base_url('uploads/'.$value['file_group']); ?>
            <!-- post image -->
            <div class="relative w-full lg:h-96 h-full sm:px-4" style="padding-bottom: 20px;">
                <img src="<?php get_img($images); ?>" alt="" class="sm:rounded-lg w-full h-full object-cover">
            </div>
        <?php } ?>
        <?php if($value['type_content'] == 'files'){ ?>
            <?php if(strlen($value['file_group']) > 0){ ?>
                <?php $link_files = base_url('uploads/'.$value['file_group']); ?>
                <!-- post image -->
                <div class="relative w-full h-full sm:px-4" style="padding-bottom: 20px;">
                    <a href="<?= $link_files; ?>" target="_blank">
                        <i class="fa-solid fa-file" style="color: #ff9d05;font-size: 20px;"></i>&nbsp;&nbsp; Attached files
                    </a>
                </div>
            <?php } ?>
        <?php } ?>
        <div class="relative w-full h-full sm:px-4" style="padding-bottom: 20px;">
            <a href="<?= base_url('groups-content-edit?codegroup='.$view_group['code_group'].'&id_post='.$value['id']); ?>" title="Edit Post">
                <i class="fa-regular fa-pen-to-square" style="font-size: 16px;color: blue;"></i>
            </a>
            <a href="<?= base_url('groups-content-delete?codegroup='.$view_group['code_group'].'&id_post='.$value['id']); ?>" style="padding-left: 10px;font-size: 16px;color: red;" title="Delete Post" onclick="return confirm('Are you sure you want to delete the post??')">
                <i class="fa-regular fa-trash-can"></i>
            </a>
        </div>
    </div>  
<?php endforeach ?>

<div style="padding-bottom: 200px;"></div>