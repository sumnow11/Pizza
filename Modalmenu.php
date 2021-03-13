
<?php
require_once('dbcon.php');
if(isset($_GET['id'])) { ?>
    <?php $sql = "SELECT * FROM menu WHERE menu_id '{$_GET['id']}' ";
        $resul= $conn->query($sqlr);
 while($row= $resul->fetch_assoc()) { 
  ?>
  <form>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">แก้ไขชื่อหมวดหมู่</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">ชื่อหมวดหมู่:</label>
                <input type="text" class="form-control" id="recipient-name"value="<?php echo $row['menu_name']; ?>" >
            </div>
            
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
            <button type="button" class="btn btn-primary">บันทึก</button>
        </div>
        </div>
    </div>
    </div>
    </form>
    <?php }
}
    ?>