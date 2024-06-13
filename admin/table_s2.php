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
                    <th width="57%">ชื่อข้อมูลทรัพย์สิน</th>                   
                    <th width="10%" class="text-center">สถานะ</th>
                    <th width="5%" class="text-center">ดู</th>
                    <th width="11%" class="text-center">คืน</th>
                    <th width="7%" class="text-center">แก้ไข</th>
                    <th width="7%" class="text-center">view</th>
                  </tr>
                </thead>
                <tbody>  
                 


                    <?php 
$i = 1; // Start number
foreach($rsTable as $row) { 
?>

<?php
// Convert date to DateTime object
$date_lend = new DateTime($row['date_lend']);
$date_lend_formatted = $date_lend->format('d/m/') . ($date_lend->format('Y') + 543);

if (!empty($row['date_night'])) {
    $date_night = new DateTime($row['date_night']);
    $date_night_formatted = $date_night->format('d/m/') . ($date_night->format('Y') + 543);
}
?>

<tr>
    <td align="center"> <?php echo $i++ ?></td>
    <td>
        <?=$row['type_group'];?> <br>
        เลขทะเบียนครุภัณฑ์ : <?=$row['no'];?>,
        S/N : <?=$row['sn'];?> <br>
        <p style="color:red;">
            <?=$row['name_lend']?>  ว/ด/ป ที่ยืม <?=$date_lend_formatted;?> <br>
            <?php if (!empty($row['date_night'])): ?>
                ว/ด/ป คืน <?=$date_night_formatted;?> 
            <?php endif; ?> <br>
            <?php if (!empty($row['name_return'])): ?>
                ชื่อผู้คืน : <?=$row['name_return'];?>
            <?php endif; ?>
        </p> <br>
    </td>





                    <td><?=$row['status'];?> </td>
                    <td align="center">
                    <a href="datatable.php?id=<?=$row['id'];?>&act=view_s2" class="btn btn-success btn-sm actionButton" data-action="view_s2">
                        <i class="fas fa-eye me-1"></i> 
                      </a>
                      </a>
                    </td>

                    <td align="center">
                      <a href="datatable.php?id=<?=$row['id'];?>&act=nl_s2" class="btn btn-success btn-sm actionButton" data-action="edit_s2">
                        
                      บันทึกรับคืน
                      </a>
                    </td>

                    <td align="center">
                      <a href="datatable.php?id=<?=$row['id'];?>&act=edit_s2" class="btn btn-warning btn-sm actionButton" data-action="edit">
                        
                      <i class="fas fa-edit me-1"></i></a>
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
