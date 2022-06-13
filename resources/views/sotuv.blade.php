@extends('welcome')
@section('content')
<style>

    #itog{
        background: #ffffff;
        border: none;
        font-size: 25px;
        border-bottom: 2px solid;
    }
    #itog2{
        background: #ffffff;
        border: none;
        font-size: 25px;
        border-bottom: 2px solid;
    }
    #kurs{
        background: #ffffff;
        border: none;
        font-size: 20px;
        border-bottom: 2px solid;
    }
    #kurs2{
        background: #ffffff;
        border: none;
        font-size: 20px;
        border-bottom: 2px solid;
    }
    #belgi{
        background: #ffffff;
        border: none;
        font-size: 20px;
        border-bottom: 2px solid;
    }
    .fff{
        background: #ffffff;
        border: none;
        font-size: 20px;
    }
    .itogsw{
        background-color: white;
        color: black;
        font-size: 20px;
    }
    .form-con {
        font-size: 37px;
        border-radius: 9px;
        border: 1px solid #000000;
    }

    #zaqazmodal{
        display: none;
        background-color: rgb(0 0 0/0.8);
        padding: 32px;
        width: 99%;
        margin: auto;
        position: absolute;
        border-radius: 9px;
        color: white;
    }
    .tab0{
        border-right: 1px solid;
        color: #ffffff;
    }
    .tab01{
        color: #ffffff;
    }
  
</style>
<div class="page-body button-page">
        <div class="col-sm-12 card">
            <div class="row">
            <div class="card col-9">
                <div class="extr22 scrolll2">
                    <div class="rty2">
                        <table class="tab table-hover">
                            <thead>
                                <tr>
                                    <th>Номи</th>
                                    <th>Сотилиш нарх</th>
                                    <th>Сони</th>
                                    <th>Чегирма</th>
                                    <th>Итого</th>
                                    <th>Шт</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">

                            </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card col-1">
            <button onclick="deciremente()" id="deciremente" class="btn btn-info mt-1 m-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                  </svg>
            </button>
            <button onclick="inceremente()" id="inceremente" class="btn btn-danger mt-1 m-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-dash" viewBox="0 0 16 16">
                    <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                  </svg>
            </button>
            <button onclick="yangilash()" class="btn btn-warning mt-1 m-0" style="color: black;">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                  </svg>
            </button>
            <button onclick="udalit()" id="udalit" class="btn btn-danger mt-1 m-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                  </svg>
            </button>
            <button id="aqsh" class="btn btn-primary mt-1 m-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-arrow-down-up" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M11.5 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L11 2.707V14.5a.5.5 0 0 0 .5.5zm-7-14a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V1.5a.5.5 0 0 1 .5-.5z"/>
                  </svg>
            </button>
            <button id="tayyor" class="btn btn-success mt-1 m-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                    <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
                  </svg>
            </button>
            <button id="zaqas" class="btn btn-dark mt-1 m-0">
               Заказ
            </button>
            <input type="hidden" id="radio">
        </div>
        <div class="card col-2">
            @if ($itogs)
                <label for="message-text" class="col-form-label m-0 text-right">Итого</label>
                <input type="text" name="id" id="itog" class="form-control text-right" disabled value="{{ $itogs->itogo }}">
                <label for="message-text" class="col-form-label m-0 text-right">Курс</label>
                <input type="text" id="kurs" class="form-control text-right" disabled value="{{ $itogs->kurs }}">
                <button onclick="kursm()" id="kursm" class="btn btn-dark mt-1 m-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                        <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"/>
                      </svg>
                </button>
            @else
                <label for="message-text" class="col-form-label m-0 text-right">Итого</label>
                <input type="text" id="itog2" class="form-control text-right" disabled value="0">
                <label for="message-text" class="col-form-label m-0 text-right">Курс</label>
                <input type="text" id="kurs2" class="form-control text-right" disabled>
                <button onclick="kursm()" id="kursm" class="btn btn-secondary mt-1 m-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                        <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"/>
                      </svg>
                </button>
                @endif
                <div class="form-check mt-4">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="Radio1" value="option1">
                    <label class="form-check-label" for="exampleRadios1">
                        Розничная цена
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="Radio2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                        Оптовая цена
                    </label>
                </div>
            
            <input type="text" id="belgi" class="form-control mt-1 m-0" disabled style="text-align: center;background-color: white;">
            <input type="hidden" name="id" id="belgi2">
        </div>
    </div>
 <div class="row">
    <div class="card col-10">
        <div class="card-header">
            <div class="card-header-left">
                <input type="text" name="search" id="search" class="form-control" placeholder="Поиск" />
            </div>
        </div>
            <div class="table-responsive mailbox-messages">
                <div class="extr22 scrolll2">
                    <div class="rty2">
                        <table class="tab table-hover">
                            <thead class="">
                                <tr>
                                <th>Номи</th>
                                <th>Шт</th>
                                </tr>
                            </thead>
                            <tbody id="tbody2">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>        
</div>

<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><input type="text" class="form-control fff" id="name2" disabled></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-6 mb-3">
                    <label for="message-text" class="col-form-label">Тавар сони</label>
                    <input type="number" class="form-control form-con" name="son" id="son">
                </div>
                <div class="col-6 mb-3">
                    <label for="message-text" class="col-form-label">Сотилиш сумма</label>
                    <input type="number" class="form-control form-con" name="summo" id="summo">
                    <input type="hidden" id="summ2">
                </div>
            </div>
            <div class="mb-3">
                <label for="message-text" class="col-form-label">Тавар суммаси</label>
                <input type="number" class="form-control form-con" name="summ" id="summ">
                <input type="hidden" id="sum2">
            </div>
            <div class="mb-3">
                <label for="message-text" class="col-form-label">Чегирма</label>
                <input type="number" class="form-control form-con" name="cheg" id="cheg">
            </div>          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="nazad">Назад</button>
          <button type="submit" class="btn btn-primary" id="saqlash">Сохранить</button>
        </div>
   
      </div>
    </div>
  </div>

  <div class="modal fade" id="kurrrr" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Курсни белгиланг</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                @csrf
                <div class="mb-3">
                    <input type="number" class="form-control form-con" name="usdkurd" id="usdkurd">
                </div>          
            </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="nazad">Назад</button>
          <button type="submit" class="btn btn-primary" id="usdkurd2">Сохранить</button>
        </div>
   
      </div>
    </div>
  </div>

  
  <div class="modal fade" id="jonatish" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <div class="mb-3 d-flex">
                   <div class="col-4">
                        <h5 class="mt-2 mx-2">Итого:</h5>
                    </div>
                    <div class="col-8">
                        <input type="number" class="form-control text-right itogsw" name="itogs" id="itogs" disabled>
                    </div>
                </div>
                <div class="mb-3 d-flex">
                    <div class="col-4">
                        <h5 class="mt-2 mx-2">Наличные:</h5>
                    </div>                    
                   <div class="col-8">
                    <input type="number" class="form-control text-right itogsw" name="naqt" id="naqt">
                   </div>
                </div>
                <div class="mb-3 d-flex">
                    <div class="col-4">
                        <h5 class="mt-2 mx-2">Карта:</h5> 
                    </div>
                    <div class="col-8">
                        <input type="number" class="form-control text-right itogsw" name="plastik" id="plastik">
                    </div>
                </div>  
                <div class="mb-3 d-flex">
                    <div class="col-4">
                        <h5 class="mt-2 mx-2">Безнал:</h5>    
                    </div>
                    <div class="col-8">
                        <input type="number" class="form-control text-right itogsw" name="bank" id="bank">
                    </div>
                </div>
                <div class="mb-3 d-flex">
                    <div class="col-4">
                        <h5 class="mt-2 mx-2">Долг:</h5>    
                    </div>
                    <div class="col-8">
                        <input type="number" class="form-control text-right itogsw" name="karzs" id="karzs" disabled>
                    </div>
                </div>
                <div class="mb-3 d-flex">
                    <select name="clentra" id="clentra" class="form-control text-center">
                        <option value="">Выберите клиент</option>
                        @foreach ($clents as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-check">
                    <input type="hidden" id="checkshidden">
                    <div class="mb-3 d-flex">
                        <div class="col-4 mt-2">
                            <input class="form-check-input" type="checkbox" name="exampleRadios" id="checks" value="1">
                            <label class="form-check-label">
                                Заказ
                            </label>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control text-right itogsw" id="malumot">
                        </div>
                    </div>
                </div>
            </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="nazad">Назад</button>
          <button type="submit" class="btn btn-success" id="oplataed">Оплаты</button>
        </div>
   
      </div>
    </div>
  </div>

  <div id="zaqazmodal">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Заказ болими</h5>
        <svg xmlns="http://www.w3.org/2000/svg" id="nazadclicke" width="25" height="25" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
          <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
        </svg>
    </div>
        <div class="row">
            <input type="hidden" id="user_zaq">
            <input type="hidden" id="diomiy">
            <div class="col-3">
                <table class="tab table-hover tab0">
                    <thead>
                    <tr>
                        <th>Имя</th>
                    </tr>
                    </thead>
                    <tbody id="imya">

                    </tbody>
                </table>
            </div>
            <div class="col-9">
                <table class="tab table-hover tab01">
                    <thead>
                        <tr>
                            <th>Клиент</th>
                            <th>Товар номи</th>
                            <th>Сотилиш нарх</th>
                            <th>Сони</th>
                            <th>Чегирма</th>
                            <th>Итого</th>
                        </tr>
                    </thead>
                    <tbody id="zaqazz123">

                    </tbody>
                </table>
            </div>
        </div>  
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="nazadclick">Назад</button>
        <button id="SubmitCkicked" class="btn btn-primary">Сохранить</button>
    </div>
</div>

<div class="modal fade" id="zaqazaytModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Заказ болими</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
          <div class="text-center pb-4 pt-4">
              <button type="button" class="btn btn-primary mx-4" id="zzzz">Бирламчи</button>
              <button type="submit" id="zzzz2" class="btn btn-success">Дойимий</button>
          </div>
      </div>
    </div>
  </div>

<script type="text/javascript">
  $( function() {
    $( "#tbody2" ).selectable();
  } );
  
  $( function() {
    $( "#zaqazz123" ).selectable();
  } );

//   $( function() {
//     $( "#imya" ).selectable();
//   } );

  $( function() {
    $( "#tbody" ).selectable();
  } );
function kursm(){
        let _token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: "{{ route('kursm') }}",
            type: 'GET',
            data: {
                _token: _token
            },
            success: function(data) {
                $("#usdkurd").val(data.kurs);
                $('#kurrrr').modal('show');
            }
        });
    }

    $(document).on('click', '#zaqas', function(){
        $("#zaqazaytModal").modal('show');
    });

    $('#zzzz').on('click', function(){
        $("#zaqazaytModal").modal('hide');
        $('#zaqazmodal').toggle('fold');
        $("#user_zaq").val('');
        $("#diomiy").val(0);        
        fetch_customer_data();
        function fetch_customer_data(query = '')
        {
            $.ajax({
                url:"{{ route('zzzz') }}",
                method:'GET',
                data:{query:query},
                dataType:'json',
                success:function(data)
                {
                    $('#imya').html(data);
                }
            });
        }
    });

    $(document).on('click', '#data2' ,function(){
        var id = $(this).data("id");
        $("#user_zaq").val(id);        
        $.ajax({
            url:"{{ route('zzzzcli') }}",
            method:'GET',
            data:{
                id: id,
            },
            dataType:'json',
            success:function(data)
            {
                $('#zaqazz123').html(data);
            }
        });
    });

    $("#zzzz2").on( "click", function() {
        $("#zaqazaytModal").modal('hide');
        $('#zaqazmodal').toggle('fold');
        $("#user_zaq").val('');
        $("#diomiy").val(1);
        fetch_customer_data();
        function fetch_customer_data(query = '')
        {
            $.ajax({
                url:"{{ route('zzzzaaaa') }}",
                method:'GET',
                data:{query:query},
                dataType:'json',
                success:function(data)
                {
                    $('#imya').html(data);
                }
            });
        }
    });

    $(document).on('click', '#data22' ,function(){
        var id = $(this).data("id");
        $("#user_zaq").val(id);  
        $.ajax({
            url:"{{ route('zzzzclick') }}",
            method:'GET',
            data:{
                id: id,
            },
            dataType:'json',
            success:function(data)
            {
                $('#zaqazz123').html(data);
            }
        });
    });

    $('#nazadclicke').on('click', function(){
        $('#zaqazmodal').toggle('fold');
        $("#user_zaq").val('');  
    });

    $("#nazadclick").on( "click", function() {
        $('#zaqazmodal').toggle('fold');
        $("#zaqazaytModal").modal('show');
        $("#user_zaq").val('');
    });
    
    $(document).on('click', '#checks', function(){
        var son = $("#checks").val();
        var ch = $("#checkshidden").val();
        if(ch == 1){
            $("#checkshidden").val(0);
        }
        if(ch == 0){
            $("#checkshidden").val(son);
        }
    });

    $(document).ready(function(){
        $(document).on('keyup', '#son', function(){
            var son = $("#son").val();
            var summo = $("#summo").val();
            $("#summ").val(son * summo);
            $("#sum2").val(son * summo);
            $("#cheg").val("");
        });
        $(document).on('keyup', '#summo', function(){
            var son = $("#son").val();
            var summo = $("#summo").val();
            var summ2 = $("#summ2").val();
            var j = summ2 - summo;
            $("#sum2").val(summo * son); 
            $("#summ").val(summo * son);
            $("#cheg").val("");
        });
        $(document).on('keyup', '#cheg', function(){
            var cheg = $("#cheg").val();         
            var summo = $("#summo").val();
            var son = $("#son").val();
            var sum2 = $("#sum2").val();
            var j = summo / 100;
            var j2 = cheg * j;
            var j3 = son * j2;
            $("#summ").val(sum2 - j3);
            var sss = $("#summ").val();
            $("#summo").val(sss / son);

        });
        $(document).on('keyup', '#summ', function(){
            var son = $("#son").val();     
            var summ = $("#summ").val();
            var sum2 = $("#sum2").val();
            var a = summ / sum2;
            var j = a * 100;
            $("#summo").val(summ / son);
            $("#cheg").val(100 - j);
        });

        $(document).on('keyup', '#naqt', function(){
            var itogs = $("#itogs").val();
            var naqt = $("#naqt").val();
            var plastik = $("#plastik").val();
            var bank = $("#bank").val();
            var sss = itogs - naqt - plastik - bank;
            $("#karzs").val(sss);
        });

        $(document).on('keyup', '#plastik', function(){
            var itogs = $("#itogs").val();
            var naqt = $("#naqt").val();
            var plastik = $("#plastik").val();
            var bank = $("#bank").val();
            var sss = itogs - naqt - plastik - bank;
            $("#karzs").val(sss);
        });

        $(document).on('keyup', '#bank', function(){
            var itogs = $("#itogs").val();
            var naqt = $("#naqt").val();
            var plastik = $("#plastik").val();
            var bank = $("#bank").val();
            var sss = itogs - naqt - plastik - bank;
            $("#karzs").val(sss);
        });
    });
    
    $(document).ready(function(){
        fetch_customer_data();
        function fetch_customer_data(query = '')
        {
            $.ajax({
                url:"{{ route('sotuv') }}",
                method:'GET',
                data:{query:query},
                dataType:'json',
                success:function(data)
                {
                    $('#tbody').html(data.table_data);
                }
            });
        }
        fetch_customer_data2();
        function fetch_customer_data2(query = '')
        {
            $.ajax({
                url:"{{ route('live_search') }}",
                method:'GET',
                data:{query:query},
                dataType:'json',
                success:function(data)
                {
                    $('#tbody2').html(data.table_data);                    
                }
            })
        }
        $("#usdkurd2").on('click', function(){
            var usdkurd = $("#usdkurd").val();
            let _token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{ route('usdkurd2') }}",
                type: 'GET',
                data: {
                    kurs: usdkurd,
                    _token: _token
                },
                success: function(data) {
                    $("#itog2").val(data.data.itogo);
                    $("#itog").val(data.data.itogo);
                    $("#kurs").val(data.data.kurs);
                    $("#kurs2").val(data.data.kurs);
                    $('#kurrrr').modal('hide');
                    fetch_customer_data();
                    fetch_customer_data2();
                    toastr.success(data.msg).fadeOut(1500);
                }
            });
        });

        $(document).on('click', '#SubmitCkicked' ,function(){
            var id = $("#user_zaq").val();
            var doimiy = $("#diomiy").val();
            let _token = $('meta[name="csrf-token"]').attr('content');
            if(id){
                $.ajax({
                    url:"{{ route('submitckicked') }}",
                    method:'POST',
                    data:{
                        id: id,
                        doimiy: doimiy,
                        _token: _token
                    },
                    dataType:'json',
                    success:function(data)
                    {
                        fetch_customer_data();
                        $("#itog2").val(data.data.itogo);
                        $("#itog").val(data.data.itogo);
                        $("#kurs").val(data.data.kurs);
                        $("#kurs2").val(data.data.kurs);
                        $("#user_zaq").val('');
                        $('#zaqazmodal').toggle('fold');
                        toastr.success(data.msg).fadeOut(1500);
                    }
                });
            }else{
                toastr.error("Клентни белгиланг").fadeOut(1500);
            }
        });
        $("#Radio1").on('click', function(){
            var aaa = $("#Radio1").val();
            $("#radio").val(aaa);        
        });
        $("#Radio2").on('click', function(){
            var aaa = $("#Radio2").val();
            $("#radio").val(aaa);        
        });
 


        $("#aqsh").on('click', function(){
            let _token = $('meta[name="csrf-token"]').attr('content');
            var kurs = $("#kurs").val();
            var kurs2 = $("#kurs2").val();
            if(kurs < 1 || kurs2 < 1){
                toastr.error("Выберите курс");
            }else{
                $.ajax({
                    url: "{{ route('tugle') }}",
                    type: 'POST',
                    data: {
                        _token: _token
                    },
                    success: function(data) {                    
                        $("#itog2").val(data.data.itogo);
                        $("#itog").val(data.data.itogo);
                        fetch_customer_data();
                        fetch_customer_data2();
                    }
                });            
            }            
        });

        $("#tayyor").on('click', function(){
            var itog = $("#itog").val();
            var itog2 = $("#itog2").val();
            if(itog < 1 || itog2 < 1){
                toastr.error("Итог 0").fadeOut(1500);
            }else{
                $.ajax({
                    url: "{{ route('rachot') }}",
                    type: 'GET',
                    success: function(data) {
                        $("#itogs").val(data.itogo);
                        $("#jonatish").modal("show");                        
                    }
                });
            }
        });

        $("#oplataed").on('click', function(){
            let _token = $('meta[name="csrf-token"]').attr('content');
            var itogs = $("#itogs").val();
            var naqt = $("#naqt").val();
            var plastik = $("#plastik").val();
            var bank = $("#bank").val();
            var karzs = $("#karzs").val();
            var clentra = $("#clentra").val();
            var checks = $("#checkshidden").val();
            var malumot = $("#malumot").val();
            if(checks == 1){
                if(malumot){
                    $.ajax({
                        url: "{{ route('zakazayt') }}",
                        type: 'POST',
                        data:{
                            id: clentra,
                            malumot: malumot,
                            itogs: itogs,
                            naqt: naqt,
                            plastik: plastik,
                            bank: bank,
                            checks: checks,
                            karzs: karzs,
                            _token: _token
                        },
                        success: function(data) {
                            if(data.code == 0){
                                toastr.error(data.msg).fadeOut(2000);
                            }else{
                                fetch_customer_data();
                                fetch_customer_data2();
                                $("#itog2").val(data.itogo);
                                $("#itog").val(data.itogo);
                                $("#belgi").val('');
                                $("#belgi2").val('');
                                $("#itogs").val("");
                                $("#naqt").val("");
                                $("#plastik").val("");
                                $("#bank").val("");
                                $("#karzs").val("");
                                $("#clentra").val("");
                                toastr.success("Малумотлар сакланди").fadeOut(2000);
                                $("#jonatish").modal("hide");
                                location.reload(true);
                            }
                        }
                    });
                }else{
                    toastr.error("Малумотини киритинг").fadeOut(2000);
                }
            }else{
                if(naqt || plastik || bank){
                    if(karzs > 0){
                        $.ajax({
                            url: "{{ route('oplata') }}",
                            type: 'POST',
                            data:{
                                id: clentra,
                                itogs: itogs,
                                naqt: naqt,
                                plastik: plastik,
                                bank: bank,
                                karzs: karzs,
                                _token: _token
                            },
                            success: function(data) {
                                if(data.code == 0){
                                    toastr.error(data.msg).fadeOut(2000);
                                }else{
                                    fetch_customer_data();
                                    fetch_customer_data2();
                                    $("#itog2").val(data.itogo);
                                    $("#itog").val(data.itogo);
                                    $("#belgi").val('');
                                    $("#belgi2").val('');
                                    $("#itogs").val("");
                                    $("#naqt").val("");
                                    $("#plastik").val("");
                                    $("#bank").val("");
                                    $("#karzs").val("");
                                    $("#clentra").val("");
                                    toastr.success("Малумотлар сакланди").fadeOut(2000);
                                    $("#jonatish").modal("hide");
                                }
                            }
                        });
                    }
                    if(clentra){
                        $.ajax({
                            url: "{{ route('oplata') }}",
                            type: 'POST',
                            data:{
                                id: clentra,
                                itogs: itogs,
                                naqt: naqt,
                                plastik: plastik,
                                bank: bank,
                                karzs: karzs,
                                _token: _token
                            },
                            success: function(data) {
                                if(data.code == 0){
                                    toastr.error(data.msg).fadeOut(2000);
                                }else{
                                    fetch_customer_data();
                                    fetch_customer_data2();
                                    $("#itog2").val(data.itogo);
                                    $("#itog").val(data.itogo);
                                    $("#belgi").val('');
                                    $("#belgi2").val('');
                                    $("#itogs").val("");
                                    $("#naqt").val("");
                                    $("#plastik").val("");
                                    $("#bank").val("");
                                    $("#karzs").val("");
                                    $("#clentra").val("");
                                    toastr.success("Малумотлар сакланди").fadeOut(2000);
                                    $("#jonatish").modal("hide");
                                }
                            }
                        });
                    }else{
                        toastr.error("Клентни танланг").fadeOut(2000);
                    }
                }else{
                    toastr.error("Устунлар бош").fadeOut(2000);
                }
            }
        });
    });

    function yangilash() {
        var id = $("#belgi2").val();
        if(id){
            let _token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{ route('belgi2') }}",
                type: 'GET',
                data: {
                    id: id,
                    _token: _token
                },
                success: function(data) {
                    $("#name2").val(data.name);
                    $("#son").val(data.soni);
                    $("#summ").val(data.itog);
                    $("#summo").val(data.summa2);
                    $("#summ2").val(data.summa2);                    
                    $("#sum2").val(data.itog);
                    $("#cheg").val('');
                    $('#edit').modal('show');
                }
            });
        }else{ 
            toastr.error("Малумот танланмаган");
        }

    }
    
    $(document).ready(function(){
        $("#saqlash").on('click', function(){
            var id = $("#belgi2").val();
            var son = $("#son").val();
            var summo = $("#summo").val();
            var summ = $("#summ").val();
            var cheg = $("#cheg").val();            
            let _token   = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{ route('yangilash') }}",
                type: 'POST',
                data: {
                    id: id,
                    soni: son,
                    summo: summo,
                    summ: summ,
                    cheg: cheg,
                    _token: _token
                },
                success: function(data) {
                    if(data.code == 0){
                        toastr.error(data.msg);
                    }else{
                        $("#belgi").val(data.data.name);
                        $("#belgi2").val(data.data.id);
                        $("#itog2").val(data.data2.itogo);
                        $("#itog").val(data.data2.itogo);
                        $("#son").val(data.data.soni);
                        $('#edit').modal('hide');
                        toastr.success(data.msg).fadeOut(1500);
                    }                  
                }
            });            
        });

        fetch_customer_data();
        function fetch_customer_data(query = '')
        {
            $.ajax({
                url:"{{ route('sotuv') }}",
                method:'GET',
                data:{query:query},
                dataType:'json',
                success:function(data)
                {
                    $('#tbody').html(data.table_data);
                   
                }
            })
        }
            
        $("#saqlash").on('click', function(){
            fetch_customer_data();
            fetch_customer_data();
            fetch_customer_data();
        });
    });


    $(document).ready(function(){
    fetch_customer_data2();
    function fetch_customer_data2(query = '')
    {
        $.ajax({
            url:"{{ route('live_search') }}",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data)
            {
                $('#tbody2').html(data.table_data);                
            }
        })
    }
    
    $(document).on('keyup', '#search', function(){
            var query = $(this).val();
            fetch_customer_data2(query);
        });
    });
  

    function plus(id) {
        let _token   = $('meta[name="csrf-token"]').attr('content');
        var kurs = $("#kurs").val();
        var kurs2 = $("#kurs2").val();
        var radio = $("#radio").val();
        if(kurs < 1 || kurs2 < 1){
            toastr.error("Выберите курс").fadeOut(2000);
        }else{
            if(radio){
                    $.ajax({
                    url: "{{ route('sazdat') }}",
                    type: 'POST',
                    data: {
                        id: id,
                        radio: radio,
                        _token: _token
                    },
                    success: function(data) {
                        $('#tbody').prepend('<tr onclick="belgilash('+data.data.id+')" style="border-bottom: 1px solid;" id="selectablesdasd"><td>'+data.data.name+'</td><td>'+data.data.summa2+'</td><td>'+data.data.soni+'</td><td>'+data.data.chegirma+'</td><td>'+data.data.itog+'</td><td>'+data.data.hajm+'</td></tr>');
                        $("#itog").val(data.data2.itogo);
                        $("#itog2").val(data.data2.itogo);
                        $("#kurs").val(data.data2.kurs);
                        $("#kurs2").val(data.data2.kurs);
                        toastr.success(data.msg).fadeOut(1500);
                    }
                });
            }else{
                toastr.error("Тип оплаты").fadeOut(2000);
            }
        }
    }

    function belgilash(id){
        let _token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: "{{ route('belgila') }}",
            type: 'POST',
            data: {
                id: id,
                _token: _token
            },
            success: function(data) {
                $("#belgi").val(data.name);
                $("#belgi2").val(data.id);
                toastr.success("Танланди").fadeOut(1500);
            }
        });
    }

    function deciremente() {
        var id = $("#belgi2").val();
        var radio = $("#radio").val();
        let _token   = $('meta[name="csrf-token"]').attr('content');
        if(radio){
            $.ajax({
                url: "{{ route('plus') }}",
                type: 'POST',
                data: {
                    id: id,
                    radio: radio,
                    _token: _token
                },
                success: function(data) {
                    if(data.error == 400){
                        toastr.error(data.msg).fadeOut(1500);
                    }else{
                        $("#belgi").val(data.data.name);
                        $("#belgi2").val(data.data.id);
                        $("#itog2").val(data.data2.itogo);
                        $("#itog").val(data.data2.itogo);
                        $("#son").val(data.data.soni);
                        $("#summ").val(data.data.itog);
                    }
                }
            });
        }else{
            toastr.error("Тип оплаты").fadeOut(2000);
        }
    }

    $(document).ready(function(){
        fetch_customer_data();
        function fetch_customer_data(query = '')
        {
            $.ajax({
                url:"{{ route('sotuv') }}",
                method:'GET',
                data:{query:query},
                dataType:'json',
                success:function(data)
                {
                    $('#tbody').html(data.table_data);
                   
                }
            })
        }
            
        $("#deciremente").on('click', function(){
            fetch_customer_data();
            fetch_customer_data();
        });
    });

    
    function inceremente() {
        var id = $("#belgi2").val();
        var radio = $("#radio").val();
        let _token   = $('meta[name="csrf-token"]').attr('content');
        if(radio){
            $.ajax({
                url: "{{ route('minus') }}",
                type: 'POST',
                data: {
                    id: id,
                    radio: radio,
                    _token: _token
                },
                success: function(data) {           
                    if(data.error == 400){
                        $("#belgi").val('');
                        $("#belgi2").val('');
                        $("#itog2").val(data.data2.itogo);
                        $("#itog").val(data.data2.itogo);
                        $("#son").val(data.data.soni);
                        $("#summ").val(data.data.itog);
                        toastr.error(data.msg).fadeOut(1500);
                    }else{
                        $("#belgi").val(data.data.name);
                        $("#belgi2").val(data.data.id);
                        $("#itog2").val(data.data2.itogo);
                        $("#itog").val(data.data2.itogo);
                        $("#son").val(data.data.soni);
                        $("#summ").val(data.data.itog);
                    }
                }
            });
        }else{
            toastr.error("Тип оплаты").fadeOut(2000);
        }
    }

    $(document).ready(function(){
        fetch_customer_data();
        function fetch_customer_data(query = '')
        {
            $.ajax({
                url:"{{ route('sotuv') }}",
                method:'GET',
                data:{query:query},
                dataType:'json',
                success:function(data)
                {
                    $('#tbody').html(data.table_data);
                   
                }
            })
        }
            
        $("#inceremente").on('click', function(){
            fetch_customer_data();
            fetch_customer_data();
        });
    });

    function udalit() {
        var id = $("#belgi2").val();
        let _token   = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: "{{ route('udalit') }}",
            type: 'POST',
            data: {
                id: id,
                _token: _token
            },
            success: function(data) {
                $("#belgi").val('');
                $("#belgi2").val('');
                $("#itog2").val(data.data2.itogo);
                $("#itog").val(data.data2.itogo);
                toastr.error(data.msg).fadeOut(1500);
            }            
        });
    }

    $(document).ready(function(){
        fetch_customer_data();
        function fetch_customer_data(query = '')
        {
            $.ajax({
                url:"{{ route('sotuv') }}",
                method:'GET',
                data:{query:query},
                dataType:'json',
                success:function(data)
                {
                    $('#tbody').html(data.table_data);
                   
                }
            })
        }
            
        $("#udalit").on('click', function(){
            fetch_customer_data();
            fetch_customer_data();
        });

        $("#nazad").on('click', function(){
            fetch_customer_data();
            fetch_customer_data();
        });
    });

</script>

@endsection