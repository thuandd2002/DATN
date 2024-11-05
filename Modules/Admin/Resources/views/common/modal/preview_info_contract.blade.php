<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>

<div class="modal fade" id="myModal--preview">
    <div class="modal-dialog modal-lg">

        <div class="modal-content">
            <div class="card-body px-0 pt-0 pb-2">
                <div class="card-header pb-0">
                    <h6 class="text-center p-3">Thông tin hợp đồng đặt cọc</h6>
                </div>

            </div>
            <form>

                <div class="container-fluid">
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="exampleInputEmail1">Biển kiểm soát</label>
                            <input type="text" name="bienkiemsoat" class="form-control" id="bienkiemsoat">
                        </div>
                        <div class="form-group col-6">
                            <label for="exampleInputEmail1">Giá: </label>
                            <input type="text" name="gia" class="form-control" id="price">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <fieldset>
                                <legend>Bên bán:</legend>
                                <div class="form-group col-12">
                                    <label for="exampleInputEmail1">Họ và tên </label>
                                    <input type="text" class="form-control" name="nameA" id="nameA">
                                    <label for="exampleInputEmail1">Ngày tháng năm sinh </label>
                                    <input type="date" class="form-control" name="dateA" id="dateA">
                                    <label for="exampleInputEmail1">CMND </label>
                                    <input type="number" class="form-control" name="cmndA" id="cmndA">
                                    <label for="exampleInputEmail1">Nơi cấp </label>
                                    <input type="text" class="form-control" name="noicapA" id="noicapA">
                                    <label for="exampleInputEmail1">Ngày cấp </label>
                                    <input type="date" class="form-control" name="ngaycapA" id="ngaycapA">
                                    <label for="exampleInputEmail1">Hộ khẩu thường chú</label>
                                    <input type="number" class="form-control" name="hokhauthuongchuA"
                                        id="hokhauthuongchuA">
                                    <label for="exampleInputEmail1">Nơi ở hiện tại </label>
                                    <input type="text" class="form-control" name="noioA" id="noioA">
                                    <label for="exampleInputEmail1">Số điện thoại </label>
                                    <input type="number" class="form-control" name="phoneA" id="phoneA">
                                </div>
                            </fieldset>
                        </div>
                        <div class="form-group col-6">
                            <fieldset>
                                <legend>Bên mua:</legend>
                                <div class="form-group col-12">
                                    <label for="exampleInputEmail1">Họ và tên </label>
                                    <input type="text" class="form-control" name="nameB" id="nameB">
                                    <label for="exampleInputEmail1">Ngày tháng năm sinh </label>
                                    <input type="date" class="form-control" name="dateB" id="dateB">
                                    <label for="exampleInputEmail1">CMND </label>
                                    <input type="number" class="form-control" name="cmndB" id="cmndB">
                                    <label for="exampleInputEmail1">Nơi cấp </label>
                                    <input type="text" class="form-control" name="noicapB" id="noicapB">
                                    <label for="exampleInputEmail1">Ngày cấp </label>
                                    <input type="date" class="form-control" name="ngaycapB" id="ngaycapB">
                                    <label for="exampleInputEmail1">Hộ khẩu thường chú</label>
                                    <input type="number" class="form-control" name="hokhauthuongchuB"
                                        id="hokhauthuongchuB">
                                    <label for="exampleInputEmail1">Nơi ở hiện tại </label>
                                    <input type="text" class="form-control" name="noioB" id="noioB">
                                    <label for="exampleInputEmail1">Số điện thoại </label>
                                    <input type="number" class="form-control" name="phoneB" id="phoneB">
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="row">
                        <div class=" form-group col-12">
                            <fieldset>
                                <legend>Đặc điểm xe : </legend>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="exampleInputEmail1">Nhãn hiệu xe</label>
                                        <input type="text" class="form-control" name="nhanhieuxe" id="loaixe">
                                        <label for="exampleInputEmail1">Loại xe</label>
                                        <input type="text" class="form-control" name="loaixe" id="loaixe">
                                        <label for="exampleInputEmail1">Màu sơn</label>
                                        <input type="text" class="form-control" name="mauson" id="loaixe">
                                        <label for="exampleInputEmail1">Số máy</label>
                                        <input type="text" class="form-control" name="somay" id="loaixe">
                                        <label for="exampleInputEmail1">Số khung</label>
                                        <input type="text" class="form-control" name="sokhung" id="loaixe">
                                    </div>
                                    <div class="form-group col-6">

                                        <label for="exampleInputEmail1">Biển số đăng kí</label>
                                        <input type="text" class="form-control" name="biensodangki"
                                            id="loaixe">
                                        <label for="exampleInputEmail1">Đăng kí xe số</label>
                                        <input type="text" class="form-control" name="dangkixeso" id="loaixe">
                                        <label for="exampleInputEmail1">Công an tỉnh nào cấp:</label>
                                        <input type="text" class="form-control" name="congantinh" id="loaixe">
                                        <label for="exampleInputEmail1">Cấp ngày</label>
                                        <input type="date" class="form-control" name="capngay" id="loaixe">
                                        <label for="exampleInputEmail1">Giá mua qua thỏa thuận giữa 2 bên </label>
                                        <input type="date" class="form-control" name="giamuaquathoathuan" id="loaixe">
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="form-group col-6">

                        </div>
                    </div>
                </div>
                <div class="form-group p-3">
                    <button type="submit" class="btn btn-primary" id="info_hopdong">In hợp đồng</button>
                </div>


            </form>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>



    </div>
</div>


<script>
    $(document).ready(function() {
        $("#info_hopdong").click(function(e) {
            e.preventDefault();


            var _token = $("input[name='_token']").val();
            var gia = $("input[name='gia']").val();

            var nameA = $("input[name='nameA']").val();
            var dateA = $("input[name='dateA']").val();
            var cmndA = $("textarea[name='cmndA']").val();
            var noicapA = $("input[name='noicapA']").val();
            var ngaycapA = $("input[name='ngaycapA']").val();
            var hokhauthuongchuA = $("input[name='hokhauthuongchuA']").val();
            var noioA = $("input[name='noioA']").val();
            var phoneA = $("textarea[name='phoneA']").val();

            var nameB = $("input[name='nameB']").val();
            var dateB = $("input[name='dateB']").val();
            var cmndB = $("textarea[name='cmndB']").val();
            var noicapB = $("input[name='noicapB']").val();
            var ngaycapB = $("input[name='ngaycapB']").val();
            var hokhauthuongchuB = $("input[name='hokhauthuongchuB']").val();
            var noioB = $("input[name='noioB']").val();
            var phoneB = $("textarea[name='phoneB']").val();

            var loaixe = $("input[name='loaixe']").val();
            var mauson = $("input[name='mauson']").val();
            var somay = $("input[name='somay']").val();
            var sokhung = $("input[name='sokhung']").val();
            var biensodangki = $("input[name='biensodangki']").val();
            var dangkixeso = $("input[name='dangkixeso']").val();
            var congantinh = $("input[name='congantinh']").val();
            var capngay = $("input[name='capngay']").val();


            // $.ajax({
            //     url: "{{ route('post.print') }}",
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     },
            //     type: 'POST',
            //     dataType: 'json',
            //     data: {
            //         _token: _token,
            //         gia: gia,
            //         nameA: nameA,
            //         dateA: dateA,
            //         cmndA: cmndA,
            //         noicapA: noicapA,
            //         ngaycapA: ngaycapA,
            //         hokhauthuongchuA: hokhauthuongchuA,
            //         noioA: noioA,
            //         phoneA: phoneA,
            //         dateB: dateB,
            //         cmndA: cmndB,
            //         noicapA: noicapB,
            //         ngaycapA: ngaycapB,
            //         hokhauthuongchuA: hokhauthuongchuB,
            //         noioB: noioB,
            //         phoneB: phoneB,
            //         loaixe: loaixe,
            //         mauson: mauson,
            //         sokhung: sokhung,
            //         biensodangki: biensodangki,
            //         dangkixeso: dangkixeso,
            //         congantinh: congantinh,
            //         capngay: capngay
            //     },
            //     success: function(data) {
            //         console.log(data.data);



            //         let doc = new jsPDF('p', 'pt', 'a4');
            //         let margins = {
            //             top: 10,
            //             bottom: 10,
            //             left: 10,
            //             width: 595
            //         }

            //         doc.fromHTML(
            //             data.data,
            //             margins.left,
            //             margins.top, {
            //                 "width": margins.width,
            //                 "elementHandlers": specialElementHandlers
            //             },
            //             function(dispose) {
            //                 doc.save("output.pdf")
            //             }, margins
            //         )
            //     }
            // });


        });


    });

    var specialElementHandlers = {
        '.no-export': function(element, renderer) {
            return true;
        }
    }
</script>
