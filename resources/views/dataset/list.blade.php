<ul>
    @foreach($dataset as $set)
        <li>
            <strong style="cursor: pointer">{{ $set['label'] }}</strong>
            @if(is_array($set['children']) && count($set['children']) > 0)
                @include('dataset.list',['dataset' => $set['children']])
            @endif
        </li>
    @endforeach
</ul>
