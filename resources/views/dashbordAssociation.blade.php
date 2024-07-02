@extends('layouts.sidebarAssociation')
@section('content')
    <div class="col grid-margin">
        <div class="card bg-twitter d-flex" style="height: 30vh;  background: #0d4c9b;">
            <div class="card-body">
                <div class="d-flex flex-row ">
                    <div class="p-5 ml-5">
                        <h6 class="text-white mb-0">3k followers</h6>
                        <p class="text-white card-text">total followers on twitter</p>
                    </div>
                    <i class="fa fa-twitter text-white icon-md"></i>
                    <img src="{{ asset('images/logo.png') }}" alt="" style="width: 20%">
                </div>
            </div>
        </div>
    </div>
    <div class="row p-5">
        <div class="col-2 titre">
            <h4>Statistiques</h4>
        </div>
        <div class="col bg-light mt-5 p-5 d-flex justify-content-center">
            <div class="rounded-circle mt-0 p-5 d-flex justify-content-center"
                style="height: 150px; width:150px; background: #0d4c9b;">
                1000
            </div>
            <h6>Inscrits</h6>

        </div>
        <div class="col bg-light mt-5 p-5 d-flex justify-content-center">
            <div class="rounded-circle mt-1 p-5 d-flex justify-content-center"
                style="height: 150px; width:150px; background: #0d4c9b;">
                1000
            </div>
            <h6>Évenements</h6>
        </div>
    </div>
@endsection
