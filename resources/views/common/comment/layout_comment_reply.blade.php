<li>
    <!-- Avatar -->
    <div class="comment-avatar">
        <img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_2_zps7de12f8b.jpg" alt=""></div>
    <!-- Contenedor del Comentario -->
    <div class="comment-box">
        <div class="comment-head">
            <h6 class="comment-name"><a href="http://creaticode.com/blog">{{$comment->user->name}}</a></h6>
            <span>{{$comment->created_at}}</span>
            <i class="fa fa-reply"></i>
            <i class="fa fa-heart"></i>
        </div>
        <div class="comment-content">
            {{$comment->com_message}}
        </div>
        <a class="comment--reply" href="javascript:void(0)" style="color: #4285F4">Trả lời</a>
    </div>
</li>