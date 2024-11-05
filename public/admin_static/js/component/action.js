import { default as swal } from "sweetalert2";
import SweetAlert2 from "./../plugin/runSweetAlert2";
var Options = {
  configSelect: {
    componentActive: ".component--active",
    componentSelect: ".component--select",
    // 'componentPreviewArticle' : '.component--preview-article',
    componentPreview: ".component--preview",
    componentPreviewOrder: ".component--preview--order",
    componentPreviewOrderUpdate:".component--preview--order--update",
    modalPreview: "#myModal--preview",
    iconLoading: "fa fa-spinner fa-spin",
    componentPrintOrder:".component--preview--print--info",
    btnChiaDonTuDong:"#chiadontudong",
    btnXuatXe:".xuatxe",
    btnNhanTien:".nhantien",
  },

  init: function() {
    let __this = this;

    __this.componentActive();
    __this.componentSelect();
    __this.runSweetAlert2();
    __this.previewImage();
    __this.previewArticle();
    __this.previewOrder();
    __this.previewOrderUpdate();
    __this.fnChiaDonTuDong();
    __this.fnXuatXe();
    __this.fnNhanTien();

    // __this.previewOrderPrintInfo();

    // __this.messagesSwal();
  },

  fnChiaDonTuDong: function() {
    let _this = this;

    $(_this.configSelect.btnChiaDonTuDong).click(function(event) {
      event.preventDefault();
      $("#overlay").fadeIn(300);　
      let $url = $(this).attr("href");

      if ($url) {
        $.ajax({
          url: $url,
          type: "POST",
          async: true,
          dataType: "json",
        }).done(function(result) {
          setTimeout(function(){
            $("#overlay").fadeOut(300);
            window.location.reload();
          },500);
         
        });
      }
     
    });
  },

  fnXuatXe: function() {
    let _this = this; 

    $(_this.configSelect.btnXuatXe).click(function(event) {
      event.preventDefault();
      let $url = $(this).attr("data-url");
      let id = $(this).attr('data-id');
      swal({
        title: 'Bạn chắc chắn muốn xuất xe',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Xuất xe'
      }).then((result) => {
          if(result.value){
            $("#overlay").fadeIn(300);　
            // $("#overlay").fadeOut(300);
            let $url = $(this).attr("data-url");

              if ($url) {
                $.ajax({
                  url: $url,
                  type: "POST",
                  async: true,
                  dataType: "json",
                }).done(function(result) {
                  $(`#xuatxe-${id}`).addClass('disabled');
                  $(`#xuatxe-${id}`).text('Đã xuất xe');
                  $("#overlay").fadeOut(300);
                  _this.messagesSwal(
                    "success",
                    "Yêu cầu đã được gửi"
                  );
                })
                .fail(function(jqXHR, textStatus, errorThrown) {
                  $("#overlay").fadeOut(300);
                    alert("Đã có lỗi xảy ra");
                });
              }
          }
      })
    });
  },
  fnNhanTien: function() {
    let _this = this;

    $(_this.configSelect.btnNhanTien).click(function(event) {
      event.preventDefault();
      let $url = $(this).attr("data-url");
      let id = $(this).attr('data-id');
      swal({
        title: 'Bạn chắc chắn đã nhận được tiền',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Đã nhận tiền'
      }).then((result) => {
        if(result.value){
          $("#overlay").fadeIn(300);
          // $("#overlay").fadeOut(300);
          let $url = $(this).attr("data-url");

          if ($url) {
            $.ajax({
              url: $url,
              type: "POST",
              async: true,
              dataType: "json",
            }).done(function(result) {
              $(`#nhantien-${id}`).addClass('disabled');
              $(`#nhantien-${id}`).text('Đã nhận tiền');
              $(`#xuatxe-${id}`).removeClass('d-none');
              $("#overlay").fadeOut(300);


              _this.messagesSwal(
                  "success",
                  "Yêu cầu đã được gửi"
              );
            })
                .fail(function(jqXHR, textStatus, errorThrown) {
                  $("#overlay").fadeOut(300);
                  alert("Đã có lỗi xảy ra");
                });
          }
        }
      })
    });
  },


  previewArticle: function() {
    let _this = this;
    $(_this.configSelect.componentPreview).click(function(event) {
      event.preventDefault();
      let $url = $(this).attr("href");

      if ($url) {
        $.ajax({
          url: $url,
          type: "POST",
          async: true,
          dataType: "json",
        }).done(function(result) {
          $("#box--modal")
            .html("")
            .append(result.data);
          $(_this.configSelect.modalPreview).modal({
            show: true,
          });
        });
      }
     
    });
  },


  previewOrder: function() {
    let _this = this; 
    $(_this.configSelect.componentPreviewOrder).click(function(event) {
      event.preventDefault();
      let $url = $(this).attr("href");

      if ($url) {
        $.ajax({
          url: $url,
          type: "POST",
          dataType: "json",
          async: true,
        }).done(function(result) {
          $("#box--modal")
            .html("")
            .append(result.data);
          $(_this.configSelect.modalPreview).modal({
            show: true,
          });
        });
      }
     
    });
  },


  previewOrderUpdate:function(){
    let _this = this;
    $(_this.configSelect.componentPreviewOrderUpdate).click(function(){
      event.preventDefault();
      let deposit_url =$(this).attr("data-deposit");
      let print_url = $(this).attr("data-print");
      let data_id =$(this).attr("data-id");
      let data = {
        deposit_url: deposit_url,
        print_url:print_url,
        data_id: data_id,
      };
      let $url = $(this).attr("href");
      if ($url) {
        $.ajax({
          url: $url,
          type: "POST",
          data:data,
          dataType: "json",
          async: true,
        }).done(function(result) { 
          $("#box--modal") 
            .html("")
            .append(result.data);
          $(_this.configSelect.modalPreview).modal({
            show: true,
          });

          if(result.data){
           _this.previewOrderPrintInfo();
          }
          
        });
      }
     
    })
  },

  previewOrderPrintInfo:function(){
    let _this = this;  
    $(_this.configSelect.componentPrintOrder).click(function(event){
      event.preventDefault(); console.log(event);
      let $url = $(this).attr("href");

      if ($url) {
        $.ajax({
          url: $url,
          type: "POST",
          dataType: "json",
          async: true,
        }).done(function(result) {
          $("#box--modal")
            .html("")
            .append(result.data);
          $(_this.configSelect.modalPreview).modal({
            show: true,
          });
        });
      }
   
    })

  },

  componentActive: function() {
    let _this = this;
    $(_this.configSelect.componentActive).click(function(event) {
      event.preventDefault();

      let $this = $(this);
      let $url = $this.attr("href");

      $.ajax({
        url: $url,
        type: "POST",
        dataType: "json",
        async: true,
      })
        .done(function(responsive) {
          if (responsive && responsive.code == 1) {
            let $text = "Ẩn";
            if (responsive.active) {
              $text = "Hiển thị";
              $this
                .removeClass("btn-outline-secondary")
                .addClass("btn-outline-danger")
                .text($text);
            } else {
              $this
                .removeClass("btn-outline-danger")
                .addClass("btn-outline-secondary")
                .text($text);
            }

            _this.messagesSwal();
          }
        })
        .fail(function(XMLHttpRequest, textStatus, thrownError) {
          _this.messagesSwal(
            "warning",
            "Có lỗi xẩy ra và nguyên nhân chưa xác định"
          );
        });
    });
  },

  //TODO:: function ajax select

  componentSelect: function() {
    let _this = this;
    $(_this.configSelect.componentSelect).change(function(event) {
      let $this = $(this);

      let $url = $this.attr("data-src");
      let $id = $this.attr("data-id");
      let selectedStatus = $(this)
        .children("option:selected")
        .val();

      if(selectedStatus === ""){
        return false;
      }
      let data = {
        id:$id,
        admin_id:selectedStatus
      }
      $("#overlay").fadeIn(300);　
      $.ajax({
        url: $url,
        type: "POST",
        data: data,
        dataType: "json",
        async: true,
      })
        .done(function(responsive) {
            console.log(responsive);
            if(responsive.active){
              $("#overlay").fadeOut(300);
              _this.messagesSwal();
            }
        })
        .fail(function(XMLHttpRequest, textStatus, thrownError) {
          _this.messagesSwal(
            "warning",
            "Có lỗi xẩy ra và nguyên nhân chưa xác định"
          );
        });
    });


//TODO:: function ajax end select

    function car_pick_up_date(id,urlCar) { 
      swal({
        title: "Nhập thông tin ngày lấy xe của khách hàng (Y-m-d)",
        input: "text",
        inputAttributes: {
          autocapitalize: "off",
        },
        showCancelButton: true,
        confirmButtonText: "Update",
        showLoaderOnConfirm: true,
        preConfirm: (timeValues) => {
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0');
            var yyyy = today.getFullYear();
            today = yyyy + '-' + mm + '-' + dd;
            const x = new Date(timeValues);
            const y = new Date(today);

            console.log(x,y);
            if(timeValues == ""   || (+x <= +y) ){
              alert("Thông tin nhập không hợp lệ");
              return false;
            }
          return $.ajax({
            url:urlCar,
            type: "POST",
            data: {
              id: id,
              o_car_viewing_time: timeValues,
            },
            dataType: "json",
            // async: true,
          }).done(function(respon){
            setTimeout(() => {
                _this.messagesSwal("success", "Cập nhật dữ liệu thành công");
            }, 2000);
          });
        },
        allowOutsideClick: () => !swal.isLoading(),
      }).then((result) => {
        if (result.isConfirmed) {
        
        }
      });
    }
  },

  messagesSwal: function(
    $type = "success",
    $messages = "Dữ liệu đã được xử lý thành công! !"
  ) {
    swal({
      title: $messages,
      type: $type,
      timer: 2000,
      showCancelButton: false,
      showConfirmButton: false,
      position: "top-right",
    });
  },

  runSweetAlert2() {
    if (typeof TYPE_MESSAGE != "undefined" && typeof MESSAGE != "undefined") {
      swal({
        title: MESSAGE,
        type: TYPE_MESSAGE,
        timer: 2000,
        showCancelButton: false,
        showConfirmButton: false,
        position: "top-right",
      });
    }
  },

  previewImage: function() {
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          $("#out_e_avatar").attr("src", e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#e_avatar").change(function() {
      readURL(this);
    });
  },
};

$(function() {
  Options.init();
});
