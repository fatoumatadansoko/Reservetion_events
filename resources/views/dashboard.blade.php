{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
</x-app-layout> --}}
@extends('layouts.sidebarAdmin')
@section('content')
<div class="row p-5">
    <div class="col-12 col-md-2 titre">
        <h4>Statistiques</h4>
        <p style="color:#0d4c9b">
            les statistiques du moments
        </p>
    </div>
    <div class="col-12 col-md-10 card card-timeline border-none bg-light d-flex flex-column flex-md-row justify-content-around align-items-center">
        <ul class="bs4-order-tracking list-unstyled d-flex flex-column flex-md-row align-items-center justify-content-between w-100">
            <li class="step text-center">
                <div class="d-flex flex-column align-items-center">
                <img src="{{asset('img/point.svg')}}" alt=""> 
                 <hr class="d-none d-md-block" style="width: 2px; height: 50px; margin: 0 15px;">
                    <div class="rounded-circle p-5 d-flex justify-content-center align-items-center" style="height: 150px; width:150px; background: #0d4c9b; font-size:30px; color:aliceblue;">
                        {{ $totalEvenements }}
                    </div>
                </div>
                <h6 style="color: black" >Évenements au total</h6>
            </li>
            <li class="step text-center">
                <div class="d-flex flex-column align-items-center">
                    <img src="{{asset('img/point.svg')}}" alt=""> 
                    <hr class="d-none d-md-block" style="width: 2px; height: 50px; margin: 0 15px;">
                    <div class="rounded-circle p-5 d-flex justify-content-center align-items-center" style="height: 150px; width:150px; background: #0d4c9b; font-size:30px; color:aliceblue;">
                        {{ $totalEvenements }}
                    </div>
                </div>
                <h6 style="color: black;">Évenements au total</h6>
            </li>
            <li class="step text-center">
                <div class="d-flex flex-column align-items-center">
                    <img class="point" src="{{asset('img/point.svg')}}" alt=""> 
                    <hr class="d-none d-md-block" style="width: 2px; height: 50px; margin: 0 15px;">
                    <div class="rounded-circle p-5 d-flex justify-content-center align-items-center" style="height: 150px; width:150px; background: #0d4c9b; font-size:30px; color:aliceblue;">
                        {{ $totalAssociations }}
                    </div>
                </div>
                <h6 style="color: black">Associations au total</h6>
            </li>
        </ul>
    </div>
</div>

@endsection
