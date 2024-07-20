<?php 
$user_info = $this->session->userdata('UserFrontent');
$user_id = $user_info['iduser'];
$view_user = $this->db->select('*')->from('rmit_user')->where('id',$user_id)->get()->row_array();
?>
<div class="max-w-3xl mx-auto mt-5" style="padding-bottom: 100px;">
   <div class="box relative rounded-lg shadow-md">
      <div class="card">
        <div class="card-body">
            <h1 class="text-base font-medium text-black dark:text-white" style="background: #f7f7f7;padding: 10px 0px;text-align: center;border-radius: 10px;font-size: 22px;">Bank transfer</h1>
            <p class="card-text text-black mt-2" style="font-weight: bold;">Vui lòng ghi rõ ID tài khoản của bạn <?= $view_user['msv']; ?> và tên gói (Basic Plan hoặc Standard Plan hoặc Premium Plan) trong nội dung chuyển khoản.</p>
            <p class="card-text text-black mt-2">Thông tin chuyển khoản: <?= $view_user['msv'].' '.$content_packet; ?></p>
            <p class="card-text text-black mt-2">Chủ tài khoản: NGUYỄN NGỌC DŨNG</p>

            <div class="card mt-3">
                <div class="card-body">
                    <h1 class="text-base font-medium text-black dark:text-white" style="background: #f7f7f7;padding: 6px 10px;border-radius: 10px;font-size: 16px;">Bank transfer</h1>
                    <div class="grid lg:grid-cols-6 md:grid-cols-6 sm:grid-cols-2 gap-2.5 mt-4">
                        <div>
                            <p class="card-text text-black mt-2" style="font-weight: bold;">Số tài khoản: 1903 6823 3150 10</p>
                            <p class="card-text text-black mt-2">Ngân hàng Techcombank</p>
                            <p class="card-text text-black mt-2">Chủ tài khoản: Nguyễn Ngọc Dũng</p>
                            <p class="card-text text-black mt-2">Nội dung chuyển khoản: <?= $view_user['msv'].' '.$content_packet; ?></p>
                        </div>
                        <div>
                            <img src="<?= base_url('images/techcombank.jpg'); ?>" alt="" width="100%">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <h1 class="text-base font-medium text-black dark:text-white" style="background: #f7f7f7;padding: 6px 10px;border-radius: 10px;font-size: 16px;">MoMo</h1>
                    <div class="grid lg:grid-cols-6 md:grid-cols-6 sm:grid-cols-2 gap-2.5 mt-4">
                        <div>
                            <p class="card-text text-black mt-2" style="font-weight: bold;">Số điện thoại: 0865 949 604</p>
                            <p class="card-text text-black mt-2">Chủ tài khoản: Nguyễn Ngọc Dũng</p>
                            <p class="card-text text-black mt-2">Nội dung chuyển khoản: <?= $view_user['msv'].' '.$content_packet; ?></p>
                        </div>
                        <div>
                            <img src="<?= base_url('images/momo.jpg'); ?>" alt="" width="100%">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>