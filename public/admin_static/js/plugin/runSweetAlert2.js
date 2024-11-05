import { default as swal } from 'sweetalert2'

function runSweetAlert2()
{
    if (typeof TYPE_MESSAGE != 'undefined' && typeof MESSAGE != 'undefined') {
        swal({
            title: MESSAGE,
            type: TYPE_MESSAGE,
            timer: 2000,
            showCancelButton:false,
            showConfirmButton:false,
            position: 'top-right',
        })
    }
}

function messagesSwal($type='success',$messages='Dữ liệu đã được xử lý thành công! !')
{
    swal({
        title: $messages,
        type: $type,
        timer: 2000,
        showCancelButton:false,
        showConfirmButton:false,
        position: 'top-right',
    })
}

export default { runSweetAlert2 ,messagesSwal}