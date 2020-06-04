@extends('layouts.app')

@section('content')

@push('head')
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-steps.css') }}" rel="stylesheet">
@endpush
@push('scripts')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>
    <script type="text/javascript">
         $(document).ready(function() {
           $('.summernote').summernote({
            height: 200,
            dialogsInBody: true,
            callbacks:{
                onInit:function(){
                $('body > .note-popover').hide();
                }
             },
         });
      });
    </script>
@endpush

<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>Configurator</h2></div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Acasa</a></li>
                        <li class="breadcrumb-item active">Configurator</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->

<!-- Container-fluid Ends-->
<section class="about-page section-b-space" style="background-color: white;">
    <div class="container my-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="mb-3">
                    @include($getViewPath('steps_bar'))
                </div>

                <form action="{{ $getActionUrl($postAction, [$step->slug()]) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    @include($step->view(), compact('step', 'errors'))

                    <div class="d-flex align-items-center">
                        <div class="mr-auto">
                            @if ($stepRepo->hasPrev())
                                <button type="button" class="btn btn-primary" onclick="this.form.action = '{{ $getActionUrl($postAction, [$step->slug(), '_trigger' => 'back']) }}'; this.form.submit();">
                                    @lang('wizard::generic.back')
                                </button>
                            @endif
                        </div>
                        <div class="ml-auto">
                            @if ($stepRepo->hasNext())
                                <button type="submit" class="btn btn-primary">
                                    @lang('wizard::generic.next')
                                </button>
                            @else
                                <button type="submit" class="btn btn-primary">
                                    @lang('wizard::generic.done')
                                </button>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
