@extends('welcome')
@section('content')
<hr>
<div class="card">
    <div class="row">
        <div class="col-xl-4 col-md-6 mt-5">
            <div class="card" style="border: 2px solid">
                <a href="{{ route('index2') }}" class="p-0">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-building" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z"/>
                                <path d="M2 11h1v1H2v-1zm2 0h1v1H5v-1zm-2 2h1v1H2v-1zm2 0h1v1H5v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z"/>
                              </svg>
                        </div>
                        <div class="col-8">
                            <h5 class="text-c-blue mx-4">Закупки</h5>
                        </div>
                    </div>
                </div>
                    <div class="card-footer bg-c-blue">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <p class="text-white m-b-0">
                                    Eтказиб берувчилардан омборга товарларни қабул қилишни рўйхатдан ўтказиш
                                </p>
                            </div>
                        </div>            
                    </div>
                </a>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mt-5">
            <div class="card" style="border: 2px solid">
                <a href="{{ route('clents') }}" class="p-0">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h5.216z"/>
                                <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                              </svg>
                        </div>
                        <div class="col-8">
                            <h5 class="text-c-blue mx-4">Все Клент</h5>
                        </div>
                    </div>
                </div>
                    <div class="card-footer bg-c-blue">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <p class="text-white m-b-0">
                                    Eтказиб берувчилардан омборга товарларни қабул қилишни рўйхатдан ўтказиш
                                </p>
                            </div>
                        </div>            
                    </div>
                </a>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mt-5">
            <div class="card" style="border: 2px solid">
                <a href="{{ route('clent2') }}" class="p-0">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                              </svg>
                        </div>
                        <div class="col-8">
                            <h5 class="text-c-blue mx-4">Отдел торговля клиентов</h5>
                        </div>
                    </div>
                </div>
                    <div class="card-footer bg-c-blue">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <p class="text-white m-b-0">
                                    Eтказиб берувчилардан омборга товарларни қабул қилишни рўйхатдан ўтказиш
                                </p>
                            </div>
                        </div>            
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection