


<form action="imgadd.php" method="post">
        <img src="img\plus-circle-dotted.svg" width="200" data-bs-toggle="modal" data-bs-target="#exampleModal" >   
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title">ภาพเมนู</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <p>เลือกภาพเมนู</p>
                        <div class="mb-3">
                        <input class="form-control form-control-sm" id="formFileSm" type="file" name="posts_img" accept="image/*">
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                    <button type="submit" class="btn btn-primary" name="imgsubmit">บันทึก</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>