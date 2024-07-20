<div class="row mt-3">
<!--  <div class="col-md-12">
    <a href="<?= base_url('backend/register/1'); ?>">
      <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Đăng kí đã có thông tin</button>
  </a>
  <a href="<?= base_url('backend/register/0'); ?>">
      <button type="button" class="btn btn-danger btn-sm waves-effect waves-light">Đăng kí chưa có thông tin</button>
    </a> -->
  </div>
</div>
<div class="card mt-3">
  <div class="card-body">
    <div class="row mb-3">
     <div class="col-md-6">
      <h4 class="card-title">Danh sách đăng kí</h4>
      <p class="card-title-desc">Tổng hợp danh sách thành viên đăng kí đã có thông tin.</p>
    </div>
  </div>
  <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
      <tr>
        <th>Ngày đăng kí</th>
        <th>Tên</th>
        <th>Email</th>
        <th>Mã Sinh Viên</th>
        <th>Thẻ Sinh Viên</th>
        <th>Duyệt</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($list_user_reg as $value): ?>
        <tr>
          <td>
            <?= date('d-m-Y', $value['date_creat']); ?>
          </td>
          <td><?= $value['username'] ?></td>
          <td><?= $value['email'] ?></td>
          <td><?= $value['msv'] ?></td>
          <td><a href="<?= base_url('uploads/'.$value['images_check']); ?>" target="_blank"><img src="<?= base_url('uploads/'.$value['images_check']); ?>" alt="" width="350px"></a></td>
          <td>
            <?php if($value['status'] != 2) { ?>
              <a href="<?= base_url('backend/register-status/2/'.$value['id']); ?>" onclick="return confirm('Bạn có chắc chắn muốn duyệt tài khoản?')">
                <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Duyệt</button>
              </a>
            <?php } ?>
            
            <a href="<?= base_url('backend/register-status/3/'.$value['id']); ?>" onclick="return confirm('Bạn có chắc chắn muốn hủy tài khoản?')">
              <button type="button" class="btn btn-danger btn-sm waves-effect waves-light">Hủy</button>
            </a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>

</div>
