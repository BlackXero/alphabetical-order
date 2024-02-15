@extends('theme.theme')
@push('css')

@endpush

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h3 class="card-title">Remote Dataset List</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        @forelse($remoteDatasetList as $dataset)
                            <div class="col-sm-12 col-md-12 col-lg-6 mt-3">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Dataset #{{ $dataset->id }}</strong>
                                    </div>
                                    <div class="card-body" style="max-height: 300px; overflow-y: scroll">
                                        <div class="text-center">
                                            {{ $dataset->dataset }}
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-flex justify-content-between">
                                            <a href="{{ route('modifyDataset',['id' => $dataset->id]) }}" type="button" class="btn btn-dark">Modify Dataset</a>
                                            <a href="{{ route('modifiedVersions',['id' => $dataset->id]) }}" type="button" class="btn btn-danger">View Modified Versions</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center">
                                <h3 class="text-danger">No Dataset found.</h3>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('modal')

@endpush

@push('script')

@endpush
