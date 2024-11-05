<div class="row">
    @if ($attributes)
        @foreach($attributes as $atr)
            <div class="col-sm-3" style="display: inline-block">
                <h4>{{ $atr->atr_name }}</h4>
                @if ($atr->value)
                    <ul>
                        @foreach($atr->value as $item)
                            <li><input type="checkbox" name="value[]" value="{{ $item->id }}">{{ $item->av_name }}</li>
                        @endforeach
                    </ul>
                @endif

            </div>
        @endforeach
    @endif

</div>