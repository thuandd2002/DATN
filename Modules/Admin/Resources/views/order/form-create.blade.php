<style>
    .main {
        margin: 1rem;
        width: 50%;
        height: 250px;
    }

    @media(max-width:34em) {
        .main {
            min-width: 150px;
            width: auto;
        }
    }

    select {
        display: none !important;
    }

    .dropdown-select {
        background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.25) 0%, rgba(255, 255, 255, 0) 100%);
        background-repeat: repeat-x;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#40FFFFFF', endColorstr='#00FFFFFF', GradientType=0);
        background-color: #fff;
        border-radius: 6px;
        border: solid 1px #eee;
        box-shadow: 0px 2px 5px 0px rgba(155, 155, 155, 0.5);
        box-sizing: border-box;
        cursor: pointer;
        display: block;
        float: left;
        font-size: 14px;
        font-weight: normal;
        height: 42px;
        line-height: 40px;
        outline: none;
        padding-left: 18px;
        padding-right: 30px;
        position: relative;
        text-align: left !important;
        transition: all 0.2s ease-in-out;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        white-space: nowrap;
        width: auto;

    }

    .dropdown-select:focus {
        background-color: #fff;
    }

    .dropdown-select:hover {
        background-color: #fff;
    }

    .dropdown-select:active,
    .dropdown-select.open {
        background-color: #fff !important;
        border-color: #bbb;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.05) inset;
    }

    .dropdown-select:after {
        height: 0;
        width: 0;
        border-left: 4px solid transparent;
        border-right: 4px solid transparent;
        border-top: 4px solid #777;
        -webkit-transform: origin(50% 20%);
        transform: origin(50% 20%);
        transition: all 0.125s ease-in-out;
        content: '';
        display: block;
        margin-top: -2px;
        pointer-events: none;
        position: absolute;
        right: 10px;
        top: 50%;
    }

    .dropdown-select.open:after {
        -webkit-transform: rotate(-180deg);
        transform: rotate(-180deg);
    }

    .dropdown-select.open .list {
        -webkit-transform: scale(1);
        transform: scale(1);
        opacity: 1;
        pointer-events: auto;
    }

    .dropdown-select.open .option {
        cursor: pointer;
    }

    .dropdown-select.wide {
        width: 100%;
        margin-block: 10px;
    }

    .dropdown-select.wide .list {
        left: 0 !important;
        right: 0 !important;
    }

    .dropdown-select .list {
        box-sizing: border-box;
        transition: all 0.15s cubic-bezier(0.25, 0, 0.25, 1.75), opacity 0.1s linear;
        -webkit-transform: scale(0.75);
        transform: scale(0.75);
        -webkit-transform-origin: 50% 0;
        transform-origin: 50% 0;
        box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.09);
        background-color: #fff;
        border-radius: 6px;
        margin-top: 4px;
        padding: 3px 0;
        opacity: 0;
        overflow: hidden;
        pointer-events: none;
        position: absolute;
        top: 100%;
        left: 0;
        z-index: 999;
        max-height: 250px;
        overflow: auto;
        border: 1px solid #ddd;
    }

    .dropdown-select .list:hover .option:not(:hover) {
        background-color: transparent !important;
    }

    .dropdown-select .dd-search {
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0.5rem;
    }

    .dropdown-select .dd-searchbox {
        width: 90%;
        border: 1px solid #999;
        border-color: #999;
        border-radius: 4px;
        outline: none;
    }

    .dropdown-select .dd-searchbox:focus {
        border-color: #12CBC4;
    }

    .dropdown-select .list ul {
        padding: 0;
    }

    .dropdown-select .option {
        cursor: default;
        font-weight: 400;
        line-height: 40px;
        outline: none;
        padding-left: 18px;
        padding-right: 29px;
        text-align: left;
        transition: all 0.2s;
        list-style: none;
    }

    .dropdown-select .option:hover,
    .dropdown-select .option:focus {
        background-color: #f6f6f6 !important;
    }

    .dropdown-select .option.selected {
        font-weight: 600;
        color: #12cbc4;
    }

    .dropdown-select .option.selected:focus {
        background: #f6f6f6;
    }

    .dropdown-select a {
        color: #aaa;
        text-decoration: none;
        transition: all 0.2s ease-in-out;
    }

    .dropdown-select a:hover {
        color: #666;
    }
</style>

<form action="{{route('get.insert.order.update')}}" method="POST">
    @csrf
    <div class="card-footer mb-2" style="background-color: white;margin-top: 10px">
        <button class="btn btn-sm btn-primary" name="save" value="save" type="submit"><i class="fa fa-save"></i> Lưu
        </button>
        <a class="btn btn-sm btn-danger" href="{{ route('get.list.orders') }}"> Trở về trang
            trước</a>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4>Tạo Thông Tin </h4>

                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">Tên khách hàng </label>
                        </div>
                        <input class="form-control" id="name" name="name" value="{{ old('name') }}" type="text"
                            autocomplete="off">
                            @if($errors->has('name'))
                            <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('name') }}</em>
                              @endif
                    </div>
                 

                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">Email </label>
                        </div>
                        <input class="form-control" id="email" name="email" value="{{ old('email') }}" type="email"
                            autocomplete="off">
                            @if($errors->has('email'))
                            <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('email') }}</em>
                              @endif
                    </div>

                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">Phone </label>
                        </div>
                        <input class="form-control" id="phone" name="phone" value="{{ old('phone') }}" type="text"
                            autocomplete="off">
                            @if($errors->has('phone'))
                            <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('phone') }}</em>
                              @endif
                    </div>

                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">Tên xe </label>
                        </div>

                        <select name="o_product_id" class="dropdown_selector">  
                            <option value="">--Tên xe--</option>
                            @foreach ($products as $product)
                                <option value="{{$product['id']}}">{{$product['pro_name']}}</option>
                            @endforeach
                           
                        </select>
                        @if($errors->has('o_product_id'))
                        <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('o_product_id') }}</em>
                          @endif
                    </div>

                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">Trạng thái </label>
                        </div>

                        <select name="o_status" class="">  
                            <option value="">--Chọn--</option>
                            @foreach ($status as $key =>  $item)
                                <option value="{{$key}}">{{$item}}</option>
                            @endforeach
                           
                        </select>
                        @if($errors->has('o_status'))
                        <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('o_status') }}</em>
                          @endif
                    </div>

                    <div class="form-group  p-0">
                        <div class="fs-13">
                            <label for="company">Thời gian hẹn xem xe </label>
                        </div>

                        <input class="form-control col-2" id="car_viewing_day" name="car_viewing_day" value="" type="datetime-local"
                        autocomplete="off">
                        @if($errors->has('car_viewing_day'))
                        <em id="lastname-error" class="error invalid-feedback">{{ $errors->first('car_viewing_day') }}</em>
                          @endif
                    </div>
                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">Ghi chú </label>
                        </div>
                        <input class="form-control" id="message" name="messages" value="" type="textarea"
                            autocomplete="off">
                    </div>

                    <div class="form-group">
                        <div class="fs-13">
                            <label for="company">Người tạo</label>
                        </div>
                        <input disabled class="form-control" id="" name=""
                            value="{{ Auth::user()->name }}" type="text" autocomplete="off">
                        <input type="hidden" name="admin_id" value="{{ Auth::user()->id }}">
                    </div>

                </div>
            </div>
        </div>
    </div>


</form>



<script>


    function create_custom_dropdowns() {
        $('select').each(function(i, select) {
            if (!$(this).next().hasClass('dropdown-select')) {
                $(this).after('<div class="dropdown-select wide mb-3 ' + ($(this).attr('class') || '') +
                    '" tabindex="0"><span class="current"></span><div class="list"><ul></ul></div></div>');
                var dropdown = $(this).next();
                var options = $(select).find('option');
                var selected = $(this).find('option:selected'); console.log(selected.val())
                dropdown.find('.current').html(selected.data('display-text') || selected.text());
                options.each(function(j, o) {
                    var display = $(o).data('display-text') || '';
                    dropdown.find('ul').append('<li class="option ' + ($(o).is(':selected') ?
                            'selected' : '') + '" data-value="' + $(o).val() +
                        '" data-display-text="' + display + '">' + $(o).text() + '</li>');
                });
            }
        });

        $('.dropdown-select ul').before(
            '<div class="dd-search"><input id="txtSearchValue" autocomplete="off" onkeyup="filter()" class="dd-searchbox" type="text"></div>'
            );
    }

    // Event listeners

    // Open/close
    $(document).on('click', '.dropdown-select', function(event) {
        if ($(event.target).hasClass('dd-searchbox')) {
            return;
        }
        $('.dropdown-select').not($(this)).removeClass('open');
        $(this).toggleClass('open');
        if ($(this).hasClass('open')) {
            $(this).find('.option').attr('tabindex', 0);
            $(this).find('.selected').focus();
        } else {
            $(this).find('.option').removeAttr('tabindex');
            $(this).focus();
        }
    });

    // Close when clicking outside
    $(document).on('click', function(event) {
        if ($(event.target).closest('.dropdown-select').length === 0) {
            $('.dropdown-select').removeClass('open');
            $('.dropdown-select .option').removeAttr('tabindex');
        }
        event.stopPropagation();
    });

    function filter() {
        var valThis = $('#txtSearchValue').val();
        $('.dropdown-select ul > li').each(function() {
            var text = $(this).text();
            (text.toLowerCase().indexOf(valThis.toLowerCase()) > -1) ? $(this).show(): $(this).hide();
        });
    };
    // Search

    // Option click
    $(document).on('click', '.dropdown-select .option', function(event) {
        $(this).closest('.list').find('.selected').removeClass('selected');
        $(this).addClass('selected');
        var text = $(this).data('display-text') || $(this).text();
        $(this).closest('.dropdown-select').find('.current').text(text);
        console.log($(this).data('value'));
        console.log( $(this));
        $(this).closest('.dropdown-select').prev('select').val($(this).data('value')).trigger('change');
    });

    // Keyboard events
    $(document).on('keydown', '.dropdown-select', function(event) {
        var focused_option = $($(this).find('.list .option:focus')[0] || $(this).find('.list .option.selected')[
            0]);
        // Space or Enter
        //if (event.keyCode == 32 || event.keyCode == 13) {
        if (event.keyCode == 13) {
            if ($(this).hasClass('open')) {
                focused_option.trigger('click');
            } else {
                $(this).trigger('click');
            }
            return false;
            // Down
        } else if (event.keyCode == 40) {
            if (!$(this).hasClass('open')) {
                $(this).trigger('click');
            } else {
                focused_option.next().focus();
            }
            return false;
            // Up
        } else if (event.keyCode == 38) {
            if (!$(this).hasClass('open')) {
                $(this).trigger('click');
            } else {
                var focused_option = $($(this).find('.list .option:focus')[0] || $(this).find(
                    '.list .option.selected')[0]);
                focused_option.prev().focus();
            }
            return false;
            // Esc
        } else if (event.keyCode == 27) {
            if ($(this).hasClass('open')) {
                $(this).trigger('click');
            }
            return false;
        }
    });

    $(document).ready(function() {
        create_custom_dropdowns();
    });
</script>
