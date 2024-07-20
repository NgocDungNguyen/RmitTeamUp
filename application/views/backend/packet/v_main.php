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
        <th>Mã sinh viên</th>
        <th>Tên</th>
        <th>Gói đang dùng</th>
        <th>Ngày hết hạn</th>
        <th>Thay đổi gói</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($list_user_reg as $value): ?>
        <?php $view_packet = $this->db->select('*')->from('rmit_packet')->where('id',$value['service_pack'])->get()->row_array(); ?>
        <tr>
          <td><?= $value['msv']; ?></td>
          <td><?= $value['username']; ?></td>
          <td><?= $view_packet['name_packet']; ?></td>
          <td><?= date("d-m-Y H:i:s", $value['expiration_date']); ?></td>
          <td>
           <div class="btn-group">
            <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Gói dịch vụ <i class="mdi mdi-chevron-down"></i></button>
            <div class="dropdown-menu" style="">
              <?php foreach ($list_packet as $value_packet): ?>
                <a class="dropdown-item" href="<?= base_url('backend/packet/change/'.$value['id'].'/'.$value_packet['id']); ?>"><?= $value_packet['name_packet']; ?></a>
              <?php endforeach ?>
            </div>
          </div>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
</div>

</div>
