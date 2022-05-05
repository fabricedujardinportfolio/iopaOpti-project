@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('partials.navbar')

            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>

            @endif

            <div class="container d-flex">
                <div class="alertDismissible">
                    {{ __('Tu es connectée!') }}
                </div>
            </div>
            <div class="container">
                <section class="col-md-12">
                    <div class="card">
                        <div class="card-header">{{ __('Date de la création de la fiche de l\'individue : ') }} <strong>15/03/2022 </strong> par : {{$agent->email}}</div>

                        <div class="card-body ">
                        </div>
                        <div class="card-footer">
                            {{ __('Pour suivi du candidat') }}
                        </div>
                    </div>
            </div>
        </div>
        </section>
    </div>
</div>
</div>
</div>
@endsection