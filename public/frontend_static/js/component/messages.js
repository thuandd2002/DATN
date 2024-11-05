import { default as swal } from 'sweetalert2'

export function messagesSwal($type='success',$messages='Dữ liệu đã được xử lý thành công! !') {
    swal({
        title: $messages,
        type: $type,
        timer: 2000,
        showCancelButton:false,
        showConfirmButton:false,
        position: 'top-center',
    })
}