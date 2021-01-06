<?php include './admin_header.php'; ?>
<?php include './admin_side-menu.php'; ?>
<h2 class="text-center display-5 mb-4">DANH SÁCH ĐƠN HÀNG</h2>
<div class="row">
    <div class="w-100 text-end">
        <a href="./admin_create_product.php" class="btn btn-primary btn-rounded ml-auto" id="btn-add">Thêm mới</a>
    </div>
</div>
<div class=" mt-3">
    <table id="table" class="table hover row-border align-middle" style="width:100%">
        <thead>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Tên khách hàng</th>
                <th>Phí ship</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Ngày đặt hàng</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>DH0001</td>
                <td>Nguyễn Minh Hiếu</td>
                <td>15000</td>
                <td>300000</td>
                <th><span class="btn-success p-1 ">Đang vận chuyển</span></th>
                <td>29/12/2020</td>

                <td class="text-center">
                            <a href="" class="btn-watch btn-control text-dark" title="Xem chi tiết"><i class="fas fa-search"></i></a>   
                <a title="edit" class="  btn-control text-success" data-toggle="modal" data-target="#changeStatusModal">
                        <i class="far fa-edit"></i>
                    </a>
                    
                    <a title="Xoa" class=" btn-delete btn-control text-danger">
                        <i class="far fa-times-circle"></i>
                    </a>
                </td>
            </tr>
            <tr>
                <td>DH0001</td>
                <td>Nguyễn Minh Hiếu</td>
                <td>15000</td>
                <td>300000</td>
                <th><span class="btn-warning p-1 ">Đang đóng gói</span></th>
                <td>29/12/2020</td>
                <td class="text-center">
                            <a href="" class="btn-watch btn-control text-dark" title="Xem chi tiết"><i class="fas fa-search"></i></a>   
                <a title="edit" class="  btn-control text-success" data-toggle="modal" data-target="#changeStatusModal">
                        <i class="far fa-edit"></i>
                    </a>
                    
                    <a title="Xoa" class=" btn-delete btn-control text-danger">
                        <i class="far fa-times-circle"></i>
                    </a>
                </td>
            </tr>
            <tr>
                <td>DH0001</td>
                <td>Nguyễn Minh Hiếu</td>
                <td>15000</td>
                <td>300000</td>
                <th><span class="btn-primary p-1 ">Hoàn thành</span></th>
                <td>29/12/2020</td>
                <td class="text-center">
                            <a href="" class="btn-watch btn-control text-dark" title="Xem chi tiết"><i class="fas fa-search"></i></a>   
                <a title="edit" class="  btn-control text-success" data-toggle="modal" data-target="#changeStatusModal">
                        <i class="far fa-edit"></i>
                    </a>
                    
                    <a title="Xoa" class=" btn-delete btn-control text-danger">
                        <i class="far fa-times-circle"></i>
                    </a>
                </td>
            </tr>
            <tr>
                <td>DH0001</td>
                <td>Nguyễn Minh Hiếu</td>
                <td>15000</td>
                <td>300000</td>
                <th><span class="btn-danger p-1 ">Đã hủy</span></th>
                <td>29/12/2020</td>
                <td class="text-center">
                            <a href="" class="btn-watch btn-control text-dark" title="Xem chi tiết"><i class="fas fa-search"></i></a>   
                <a title="edit" class="  btn-control text-success" data-toggle="modal" data-target="#changeStatusModal">
                        <i class="far fa-edit"></i>
                    </a>
                    
                    <a title="Xoa" class=" btn-delete btn-control text-danger">
                        <i class="far fa-times-circle"></i>
                    </a>
                </td>
            </tr>

        </tbody>
        <tfoot>
            <tr> 
                <th>Mã đơn hàng</th>
                <th>Tên khách hàng</th>
                <th>Phí ship</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Ngày đặt hàng</th>
                <th>Thao tác</th>
            </tr>
        </tfoot>
    </table>
</div>


<div class="modal fade" id="changeStatusModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thay đổi trạng thái đơn hàng</h5>
            </div>
            <div class="modal-body">
                <a class="btn btn-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hourglass-split" viewBox="0 0 16 16">
                        <path d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2h-7zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48V8.35zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z" />
                    </svg>
                    Chở xử lý</a>
                <a class="btn btn-warning"><i class="fas fa-pallet"></i> Đang đóng gói</a>
                <a class="btn btn-danger"> <i class="far fa-times-circle"></i> Hủy</a>
                <a class="btn btn-success"><i class="fas fa-shipping-fast"></i> Đang vận chuyển</a>
                <a class="btn btn-primary"><i class="fas fa-clipboard-check"></i> Hoàn thành</a>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="comfirmModal" tabindex="-1" aria-labelledby="comfirmModalLable" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="comfirmModalLable">Thêm loại sản phẩm</h5>
                    </div>
                    <div class="modal-body">
                       <h3>Bạn có muốn xóa sản phẩm?</h3>
                    </div>
                    <div class="modal-footer text-center">
                        <button type="button" class="btn btn-secondary btn-comfirm" data-dismiss="modal" >No</button>
                        <button type="button" class="btn btn-primary btn-comfirm">Yes</button>
                    </div>
                </div>
            </div>
        </div>
<?php include './admin_footer.php'; ?>