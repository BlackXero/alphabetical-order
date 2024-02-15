@extends('theme.theme')
@push('css')

@endpush

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h3 class="card-title">Modify Dataset # {{ $record->id }}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <small class="text-danger">Click on any item to edit</small>
                        </div>
                        <div class="col-12" id="nestedList" contenteditable="true">
                            @include('dataset.list',['dataset' => $dataset])
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-dark float-end" onclick="parseContent()" type="button">Save</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('modal')

@endpush

@push('script')
    <script>
        function ulToObject($list) {
            let result = [];
            $list.children('li').each(function() {
                let $li = $(this);
                let item = {
                    label: $li.first('strong').text().trim().split('\n')[0]
                };
                let $ul = $li.children('ul');
                if ($ul.length) {
                    item.children = ulToObject($ul);
                }else{
                    item.children = [];
                }
                result.push(item);
            });
            return result;
        }
        function parseContent(){
            let jsonObj = ulToObject($('#nestedList > ul'));
            let schema = {menu_items:jsonObj};
            let data = {
                'order_id':'{{ $record->id }}',
                'dataset': JSON.stringify(schema)
            };
            $.ajax({
                type: "POST",
                url: "{{ route('saveModifiedOrder') }}",
                data: data,
                success: function(success){
                    console.log(success);
                },
            });
        }
    </script>
@endpush
