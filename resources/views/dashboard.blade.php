use App\Models\Evenement;
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
                Les statistiques du moment
            </p>
        </div>
        <div class="col-12 col-md-10 card card-timeline border-none bg-light">
            <div class="row">
                <img src="{{ asset('images/2.svg') }}" alt="" class="img-fluid">
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-4 d-flex flex-column align-items-center mb-3">
                    <div class="rounded-circle p-5 d-flex justify-content-center align-items-center" style="height: 150px; width:150px; background: #0d4c9b; font-size:30px; color:aliceblue;">
                        {{ $totalEvenements }}
                    </div>
                    <h6>Évenements au total</h6>
                </div>
                <div class="col-12 col-md-4 d-flex flex-column align-items-center mb-3">
                    <div class="rounded-circle p-5 d-flex justify-content-center align-items-center" style="height: 150px; width:150px; background: #0d4c9b; font-size:30px; color:aliceblue;">
                        {{ $totalUsers }}
                    </div>
                    <h6>Utilisateurs au total</h6>
                </div>
                <div class="col-12 col-md-4 d-flex flex-column align-items-center mb-3">
                    <div class="rounded-circle p-5 d-flex justify-content-center align-items-center" style="height: 150px; width:150px; background: #0d4c9b; font-size:30px; color:aliceblue;">
                        {{ $totalAssociations }}
                    </div>
                    <h6>Associations au total</h6>
                </div>
            </div>
        </div>
    </div>
@endsection
