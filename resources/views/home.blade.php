@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('partials.navbar')
            <div class="card">
                <div class="card-header">{{ __('Tous les demandeurs') }}</div>

                <div class="card-body ">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>

                    @endif

                    <div class="alertDismissible">
                        {{ __('Tu es connectée!') }}
                    </div>
                    <form class="navbar-search m-auto mb-2">
                        <div class="input-append">
                            <input type="text" class="search-query span2 w-100" placeholder="Rechercher un demandeur"><span class="fornav"><i class="icon-search"></i></span>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered ">
                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>Identifiant</th>
                                    <th>Prénom</th>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Nom</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th><a href="#">MODIFIER</a></th>
                                    <td>02875401</td>
                                    <td>Mohamed</td>
                                    <td>Rahhal</td>
                                    <td>mohamed.rahhal@gmail.com</td>
                                    <td>Rahhal</td>
                                    <td>mohamed.rahhal@gmail.com</td>
                                    <td>Rahhal</td>
                                    <td>mohamed.rahhal@gmail.com</td>
                                    <td>Rahhal</td>
                                    <td>mohamed.rahhal@gmail.com</td>
                                </tr>
                                <tr>
                                    <th><a href="#">MODIFIER</a></th>
                                    <td>07986532</td>
                                    <td>Rachid</td>
                                    <td>Hadded</td>
                                    <td>rachidhadded@gmail.com</td>
                                    <td>Hadded</td>
                                    <td>rachidhadded@gmail.com</td>
                                    <td>Hadded</td>
                                    <td>rachidhadded@gmail.com</td>
                                    <td>Hadded</td>
                                    <td>rachidhadded@gmail.com</td>
                                </tr>
                                <tr>
                                    <th><a href="#">MODIFIER</a></th>
                                    <td>03985421</td>
                                    <td>Jamila</td>
                                    <td>Rahmani</td>
                                    <td>rahmani123@gmail.com</td>
                                    <td>Rahmani</td>
                                    <td>rahmani123@gmail.com</td>
                                    <td>Rahmani</td>
                                    <td>rahmani123@gmail.com</td>
                                    <td>Rahmani</td>
                                    <td>rahmani123@gmail.com</td>
                                </tr>
                                <tr>
                                    <th><a href="#">MODIFIER</a></th>
                                    <td>03985477</td>
                                    <td>Samira</td>
                                    <td>Soltani</td>
                                    <td>samirasousou@gmail.com</td>
                                    <td>Soltani</td>
                                    <td>samirasousou@gmail.com</td>
                                    <td>Soltani</td>
                                    <td>samirasousou@gmail.com</td>
                                    <td>Soltani</td>
                                    <td>samirasousou@gmail.com</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                {{ __('Info suplémentaire') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection