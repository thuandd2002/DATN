<li>
    <div class="comment-main-level">
        <!-- Avatar -->
        <div class="comment-avatar"><img src="{{ $comment->user->avatar }}" onerror="this.onerror=null;this.src='/images/placeholder.png';" alt="{{$comment->user->name}}}"></div>

        <div class="comment-box">
            <div class="comment-head">
                <h6 class="comment-name by-author"><a href="#" title="{{$comment->user->name}}}">{{$comment->user->name}}</a></h6>
                <span>{{$comment->created_at}}</span>
                <i class="fa fa-reply"></i>
                <i class="fa fa-heart"></i>
            </div>
            <div class="comment-content">{{$comment->com_message}}</div>
        </div>
    </div>
    <ul class="comments-list reply-list">
        <li>
            <!-- Avatar -->
            <div class="comment-avatar">
                <img src="{{ asset('favicon.png') }}" alt="avatar">
            </div>
            <!-- Contenedor del Comentario -->
            <div class="comment-box">
                <div class="comment-head">
                    <h6 class="comment-name">
                        <a href="http://creaticode.com/blog">Admin</a>
                    </h6>
                    <span>{!! $comment->created_at !!}</span>
                    <i class="fa fa-reply"></i>
                    <i class="fa fa-heart"></i>
                </div>
                <div class="comment-content">Cảm ơn bạn đã quan tâm ô tô. Nhân viên chăm sóc khách hàng sẽ liên hệ với bạn hoạc hãy liên hệ với hotline : {{ isset($information) ? $information->if_phone : '' }} để được tư vấn nhanh nhất</div>
            </div>
        </li>
    </ul>
</li>
