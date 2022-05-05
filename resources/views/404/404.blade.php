@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('partials.navbar404')
            <div class="container d-flex">
            <div class="col-2"></div>
            <div class="col-8 text-center">
                @isset($ficheindividuNotExiste)
                    <div class="alert alert-danger" role="alert">                        
                        {{ $ficheindividuNotExiste }}
                    </div>
                @endisset
                PAGE NON TROUVER</div>
            <div class="col-2"></div>
        </div>
        </div>
    </div>
</div>

@endsection