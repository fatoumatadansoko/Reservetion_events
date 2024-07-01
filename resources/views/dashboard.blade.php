{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


</x-app-layout> --}}
@extends('layouts.sidebarAdmin')
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
            <p style="color:#0d4c9b">
                les statistiques du moments
            </p>
        </div>
        <div class="col card card-timeline border-none bg-light">
            <ul class="bs4-order-tracking ml-5 ">
                <li class="step ">
                    <div><i class="fas fa-dot"></i></div>
                    <div class="rounded-circle mt-5 p-5 d-flex justify-content-center" style="height: 150px; width:150px; background: #0d4c9b;">
                        1000
                    </div>
                    <h6>Évenements au total </h6>
                </li>
                <li class="step ">
                    <div><i class="fas fa-dot"></i></div>
                    <div class="rounded-circle mt-5 p-5 d-flex justify-content-center" style="height: 150px; width:150px; background: #0d4c9b;">
                        1000
                    </div>
                    <h6>Évenements au total </h6>
                </li>
                <li class="step ">
                    <div><i class="fas fa-dot"></i></div>
                    <div class="rounded-circle mt-5 p-5 d-flex justify-content-center" style="height: 150px; width:150px; background: #0d4c9b;">
                        1000
                    </div>
                    <h6>Évenements au total </h6>
                </li>

            </ul>
        </div>
    </div>
@endsection
