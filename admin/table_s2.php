<?php 
// Get status from URL parameters
$status = 'ยืม/ใช้งาน';

// Query to fetch items based on status
if ($status) {
    $squeryTable = $condb->prepare("SELECT * FROM tbl_table WHERE status = :status ORDER BY id DESC");
    $squeryTable->execute([':status' => $status]);
} else {
    $squeryTable = $condb->prepare("SELECT * FROM tbl_table ORDER BY id DESC");
    $squeryTable->execute();
}
$rsTable = $squeryTable->fetchAll();


// Fetch counts for each status
$statusCounts = [];
$statuses = ['ส่งซ่อม', 'ยืม/ใช้งาน', 'ชำรุด', 'ส่งรุจำหน่าย', 'สูญหาย'];
foreach ($statuses as $statusKey) {
    $countQuery = $condb->prepare("SELECT COUNT(*) as count FROM tbl_table WHERE status = :status");
    $countQuery->execute([':status' => $statusKey]);
    $result = $countQuery->fetch();
    $statusCounts[$statusKey] = $result['count'];
}
?>


  
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>ข้อมูลครุภัณฑ์
            <a href="datatable.php?act=add" class="btn btn-primary">+เพิ่มข้อมูล</a>
          </h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">           
          <div class="card">
          <div class="card-header">
              <a href="datatable.php?act=s1" class="btn btn-info">ส่งซ่อม (<?= $statusCounts['ส่งซ่อม'] ?>)</a>
              <a href="datatable.php?act=s2" class="btn btn-success">ยืม/ใช้งาน (<?= $statusCounts['ยืม/ใช้งาน'] ?>)</a>
              <a href="datatable.php?act=s3" class="btn btn-warning">ชำรุด (<?= $statusCounts['ชำรุด'] ?>)</a>
              <a href="datatable.php?act=s4" class="btn btn-danger">ส่งรุจำหน่าย (<?= $statusCounts['ส่งรุจำหน่าย'] ?>)</a>               
              <a href="datatable.php?act=s5" class="btn btn-danger">สูญหาย (<?= $statusCounts['สูญหาย'] ?>)</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr class="table-active">
                    <th width="5%" class="text-center">No.</th>
                    <th width="35%">ชื่อข้อมูลทรัพย์สิน</th>
                    <th width="22%">S/N</th>                   
                    <th width="10%" class="text-center">สถานะ</th>
                    <th width="12%" class="text-center">บันทึกยืม</th>
                    <th width="8%" class="text-center">คืน</th>
                    <th width="8%" class="text-center">view</th>
                  </tr>
                </thead>
                <tbody>  
                  <?php 
                  $i = 1; // Start number
                  foreach($rsTable as $row){ ?>     
                  <tr>
                    <td align="center"> <?php echo $i++ ?></td>
                    <td>
                        <?=$row['type_group'];?> <br>
                        <?=$row['no'];?> <br>
                        <?=$row['name_lend']?> ว/ด/ปที่ยืม <?=$row['date_lend'];?>
                    </td>
                    <td><?=$row['sn'];?> </td>
                    <td><?=$row['status'];?> </td>
                    <td align="center">
                      <a href="#" class="btn btn-success btn-sm actionButton" data-action="view">
                        
                      <i class="fas fa-book"></i> 
                      </a>
                    </td>
                    <td align="center">
                      <a href="datatable.php?id=<?=$row['id'];?>&act=view" class="btn btn-success btn-sm actionButton" data-action="view">
                        
                      <i class="fas fa-undo"></i> 
                      </a>
                    </td>
                    <td align="center">
                      <a href="datatable.php?id=<?=$row['id'];?>&act=edit" class="btn btn-primary btn-sm actionButton" data-action="edit">
                        
                      <i class="fas fa-edit me-1"></i></a>
                    </td>
                   
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
