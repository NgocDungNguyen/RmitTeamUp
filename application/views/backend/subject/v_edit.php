<div class="card" style="margin-top: 30px;">
   <div class="card-body">
      <div class="row">
         <div class="col-md-6">
            <h5 class="header-title mt-0">Thêm thông tin môn học</h5>
         </div>
         
      </div>
      <form action="<?= base_url('backend/subject-update/'.$view_subject['id']); ?>" method="post">
         <div class="row">
            <div class="col-md-12">
               <div class="mb-3">
                  <label class="form-label">COURSE CODE</label>
                  <input type="text" class="form-control" name="code_subject" value="<?= $view_subject['code_subject']; ?>" required>
               </div>
            </div>
            <div class="col-md-12">
               <div class="mb-3">
                  <label class="form-label">COURSE TITLE</label>
                  <input type="text" class="form-control" name="name_subject" value="<?= $view_subject['name_subject']; ?>" required>
               </div>
            </div>
            <div class="col-md-12">
               <div class="mb-3">
                  <label class="form-label">STUDY LEVEL</label>
                  <input type="text" class="form-control" name="study_level" value="<?= $view_subject['study_level']; ?>">
               </div>
            </div>
            <div class="col-md-12">
               <div class="mb-3">
                  <label class="form-label">CREDIT POINTS</label>
                  <input type="text" class="form-control" name="credit_points" value="<?= $view_subject['credit_points']; ?>">
               </div>
            </div>
            <div class="col-md-12">
               <div class="mb-3">
                  <label class="form-label">SUBJECT AREA</label>
                  <input type="text" class="form-control" name="subject_area" value="<?= $view_subject['subject_area']; ?>">
               </div>
            </div>
            <div class="col-md-12">
               <div class="mb-3">
                  <label class="form-label">CAMPUS</label>
                  <input type="text" class="form-control" name="campus" value="<?= $view_subject['campus']; ?>">
               </div>
            </div>
            <div class="col-md-12">
               <input type="submit" class="btn btn-primary btn-sm" name="update" value="Chỉnh sửa môn học">
            </div>
         </div>
      </form>
   </div>
</div>
