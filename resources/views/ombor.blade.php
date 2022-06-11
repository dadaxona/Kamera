@extends('welcome')
@section('content')
<hr>
<div class="card">
    <div class="row">
        <div class="col-xl-4 col-md-6 mt-5">
            <div class="card" style="border: 2px solid">
                <a href="{{ route('edit3') }}" class="p-0">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
                                <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                            </svg>
                        </div>
                        <div class="col-8">
                            <h5 class="text-c-green mx-4">Закупки</h5>
                        </div>
                    </div>
                </div>
                    <div class="card-footer bg-c-green">
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
                <a href="" class="p-0">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                                <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/>
                                <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"/>
                                </svg>
                        </div>
                        <div class="col-8">
                            <h5 class="text-c-green mx-4">Вазврат паставщику</h5>
                        </div>
                    </div>
                </div>
                    <div class="card-footer bg-c-green">
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
                <a href="{{ route('sqlad.php') }}" class="p-0">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-server" viewBox="0 0 16 16">
                                <path d="M1.333 2.667C1.333 1.194 4.318 0 8 0s6.667 1.194 6.667 2.667V4c0 1.473-2.985 2.667-6.667 2.667S1.333 5.473 1.333 4V2.667z"/>
                                <path d="M1.333 6.334v3C1.333 10.805 4.318 12 8 12s6.667-1.194 6.667-2.667V6.334a6.51 6.51 0 0 1-1.458.79C11.81 7.684 9.967 8 8 8c-1.966 0-3.809-.317-5.208-.876a6.508 6.508 0 0 1-1.458-.79z"/>
                                <path d="M14.667 11.668a6.51 6.51 0 0 1-1.458.789c-1.4.56-3.242.876-5.21.876-1.966 0-3.809-.316-5.208-.876a6.51 6.51 0 0 1-1.458-.79v1.666C1.333 14.806 4.318 16 8 16s6.667-1.194 6.667-2.667v-1.665z"/>
                                </svg>
                        </div>
                        <div class="col-8">
                            <h5 class="text-c-green mx-4">Перемещение</h5>
                        </div>
                    </div>
                </div>
                    <div class="card-footer bg-c-green">
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