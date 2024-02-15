@extends('theme.theme')
@section('content')
    <div class="row my-5 justify-content-center">
        <div class="col-12">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Modified Version
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="row">
                                @forelse($actualVersions as $k => $alphaVersion)
                                    <div class="col-sm-12 col-md-12 col-lg-6">
                                        <div class="card">
                                            <div class="card-header bg-dark text-white">
                                                <h3 class="card-title">Version #{{ ($k + 1) }}</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <small class="text-danger">Click on any item to edit</small>
                                                    </div>
                                                    <div class="col-12" id="nestedList" contenteditable="true">
                                                        @include('dataset.list',['dataset' => $alphaVersion])
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-sm-12 col-md-12 col-lg-12 text-center">
                                        <strong>NA</strong>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Modified Alphabetical Version
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="row">
                                @forelse($alphaVersions as $k => $alphaVersion)
                                    <div class="col-sm-12 col-md-12 col-lg-6">
                                        <div class="card">
                                            <div class="card-header bg-dark text-white">
                                                <h3 class="card-title">Version #{{ ($k + 1) }}</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <small class="text-danger">Click on any item to edit</small>
                                                    </div>
                                                    <div class="col-12" id="nestedList" contenteditable="true">
                                                        @include('dataset.list',['dataset' => $alphaVersion])
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-sm-12 col-md-12 col-lg-12 text-center">
                                        <strong>NA</strong>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

