<nav class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid">
        <a href="{{ route('datasetHome') }}" class="navbar-brand text-white">{{ env('APP_NAME','Appoly Test') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="{{ route('datasetHome') }}" class="nav-link text-white">Home</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
