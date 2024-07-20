<div class="row mt-3">
 <div class="col-md-12">
  <a href="<?= base_url('backend/subject-creat'); ?>">
    <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Thêm môn học</button>
  </a>
</div>
<div class="card mt-3">
  <div class="card-body">
    <div class="row mb-3">
     <div class="col-md-6">
      <h4 class="card-title">Danh sách môn học</h4>
      <p class="card-title-desc">Tổng hợp danh sách thông tin các môn học.</p>
    </div>
  </div>
  <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
      <tr>
        <th>ID</th>
        <th>COURSE CODE</th>
        <th>COURSE TITLE</th>
        <th>STUDY LEVEL</th>
        <th>CREDIT POINTS</th>
        <th>SUBJECT AREA</th>
        <th>CAMPUS</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($list_subject as $value): ?>
        <tr>
          <td><?= $value['id']; ?></td>
          <td><?= $value['code_subject']; ?></td>
          <td><?= $value['name_subject']; ?></td>
          <td><?= $value['study_level']; ?></td>
          <td><?= $value['credit_points']; ?></td>
          <td><?= $value['subject_area']; ?></td>
          <td><?= $value['campus']; ?></td>
          <td>
           <a href="<?= base_url('backend/subject-edit/'.$value['id']); ?>" class="px-2 text-primary">
            <i class="fas fa-pencil-alt"></i>
          </a>
          <a href="<?= base_url('backend/subject-delete/'.$value['id']); ?>" class="px-2 text-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa môn học?')">
            <i class="far fa-trash-alt"></i>
          </a>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
</div>

</div>
