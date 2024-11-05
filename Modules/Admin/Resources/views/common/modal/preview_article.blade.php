<div class="modal fade" id="myModal--preview">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h1 class="modal-title" style="font-size: 24px;">{{ $article->a_title }}</h1>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <label for="" style="margin-bottom: 0;font-weight: 500">Meta Title</label>
                <p>{{ $article->a_title_seo }}</p>
                <label for="" style="margin-bottom: 0;font-weight: 500">Meta Keyword</label>
                <p>{{ $article->a_keyword_seo }}</p>
                <label for="" style="margin-bottom: 0;font-weight: 500">Meta Description</label>
                <p>{{ $article->a_description_seo }}</p>

                <div class="content">{!!  $article->a_content !!}</div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>