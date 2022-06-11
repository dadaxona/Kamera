@extends('welcome')
@section('content')
<div id="AAAAAAAA" class="card ui-widget-content">
    <div class="card-block tab-icon">
            <div class="col-12">
                <ul class="nav nav-tabs md-tabs " role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#home7" role="tab" aria-expanded="true"><i class="icofont icofont-home"></i>Товар</a>
                        <div class="slide"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#messages7" role="tab" aria-expanded="false"><i class="icofont icofont-ui-message"></i>Итого</a>
                        <div class="slide"></div>
                    </li>
                </ul>
                <div class="tab-content card-block">
                    <div class="tab-pane active" id="home7" role="tabpanel" aria-expanded="true">
                            <div class="row">
                                <div class="card-header">
                                    <div class="card-header-left">
                                        <h4 id="inner"></h4>
                                    </div>
                                </div>
                                <div class="card col-11">
                                    <div class="extr223 scrolll2">
                                        <div class="rty2">
                                            <table class="tab table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Тип</th>
                                                        <th>Имя</th>
                                                        <th>Шт</th>
                                                        <th>Закупочная цена</th>
                                                        <th>Оптовая цена</th>
                                                        <th>Розничная цена</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbody">
                    
                                                </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="card col-1">
                                <button id="deciremente" class="btn btn-info mt-1 m-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                                      </svg>
                                </button>
                                <button id="inceremente" class="btn btn-danger mt-1 m-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-dash" viewBox="0 0 16 16">
                                        <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                                      </svg>
                                </button>
                                <button id="yangilash" class="btn btn-warning mt-1 m-0" style="color: black;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                                      </svg>
                                </button>
                                <button id="udalit" class="btn btn-danger mt-1 m-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                      </svg>
                                </button>
                                <button id="tayyor" class="btn btn-success mt-1 m-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                        <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
                                      </svg>
                                </button>
                                
                                <input type="hidden" id="radio">
                            </div>
                        </div>
                     <div class="row">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-header-left">
                                    <input type="text" name="search" id="search" class="form-control" placeholder="Поиск" />
                                </div>
                            </div>
                                <div class="table-responsive mailbox-messages">
                                    <div class="extr22 scrolll2">
                                        <div class="rty2">
                                            <table class="tab table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Тип</th>
                                                        <th>Имя</th>
                                                        <th>Шт</th>
                                                        <th>Закупочная цена</th>
                                                        <th>Оптовая цена</th>
                                                        <th>Розничная цена</th>
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
                    <div class="tab-pane" id="messages7" role="tabpanel" aria-expanded="false">
                      <div class="table-responsive">
                          <div class="card-header">
                              <div class="card-header-left col-5 ml-0 pl-0 d-flex">
                                  <input type="search" id="sqladsearch" class="form-control ml-0" placeholder="Search">
                                  <input type="date" name="date" id="date1" class="form-control mx-2">
                                  <input type="date" name="date2" id="date2" class="form-control">
                              </div>
                          </div>
                        <div class="epam scrolll2">
                            <div class="rty2">
                                <table class="tab table-hover" id="laravel_crud">
                                    <thead>
                                        <tr>
                                            <th>Тип</th>
                                            <th>Имя</th>
                                            <th>Шт</th>
                                            <th>Закупочная цена</th>
                                            <th>Оптовая цена</th>
                                            <th>Розничная цена</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody3">
                                        
                                    </tbody>
                                </table>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="zaqazaytModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Товар хажмини киритиш</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <input type="number" name="son" id="son" class="form-control">
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Назад</button>
              <button id="button" class="btn btn-primary">Сохранить</button>
          </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="zaqazay0" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Товарни очириш</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
          <div class="text-center pb-4">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Нет</button>
              <button id="udalit2" class="btn btn-success">Да</button>
          </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="zaqazaytModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Товарларни жонатмокчимисиз</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
          <div class="text-center pb-4">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Нет</button>
              <button id="tayyor2" class="btn btn-success">Да</button>
          </div>
      </div>
    </div>
  </div>
  
<script>
    $(document).ready(function(){
        fetch_customer_data();
        function fetch_customer_data(query = '')
        {
            $.ajax({
                url:"{{ route('sqladiskizapas') }}",
                method:'GET',
                data:{query:query},
                dataType:'json',
                success:function(data)
                {
                    $('#tbody2').html(data.table_data);
                }
            });
        }

        $(document).on('keyup', '#search', function(){
            var query = $(this).val();
            fetch_customer_data(query);
        });

        fetch_customer_data2();
        function fetch_customer_data2(query = '')
        {
            $.ajax({
                url:"{{ route('sqladiskizapas2') }}",
                method:'GET',
                data:{query:query},
                dataType:'json',
                success:function(data)
                {
                    $('#tbody').html(data.table_data);                    
                }
            })
        }

        fetch_customer_data3();
        function fetch_customer_data3(query = '')
        {
            $.ajax({
                url:"{{ route('tbody3table') }}",
                method:'GET',
                data:{query:query},
                dataType:'json',
                success:function(data)
                {
                    $('#tbody3').html(data.table_data);
                }
            });
        }

        $(document).on('keyup', '#sqladsearch', function(){
            var query = $(this).val();
            fetch_customer_data3(query);
        });

       $(document).on('change', '#date1', function(){
            var date1 = $("#date1").val();
            var date2 = $("#date2").val();
            $.ajax({
                url:"{{ route('tbody3table2') }}",
                method:'GET',
                data:{
                    date1: date1,
                    date2: date2
                },
                dataType:'json',
                success:function(data)
                {
                    $('#tbody3').html(data.table_data);
                }
            });
        });

        $(document).on('change', '#date2', function(){
            var date1 = $("#date1").val();
            var date2 = $("#date2").val();
            $.ajax({
                url:"{{ route('tbody3table2') }}",
                method:'GET',
                data:{
                    date1: date1,
                    date2: date2
                },
                dataType:'json',
                success:function(data)
                {
                    $('#tbody3').html(data.table_data);
                }
            });
        });

        $(document).on('click', "#data", function(){
            let _token   = $('meta[name="csrf-token"]').attr('content');
            var id = $(this).data("id");       
            $.ajax({
                url:"{{ route('otkazish') }}",
                method:'POST',
                data:{
                    id: id,
                    _token: _token
                },
                dataType:'json',
                success:function(data)
                {
                    fetch_customer_data2();
                    toastr.success("Кошилди").fadeOut(1500);

                }
            });
        });

        $(document).on('click', "#asdsad", function(){
            let _token   = $('meta[name="csrf-token"]').attr('content');
            var id = $(this).data("id");
            $.ajax({
                url:"{{ route('malumotolish') }}",
                method:'GET',
                data:{
                    id: id,
                    _token: _token
                },
                dataType:'json',
                success:function(data)
                {
                    $("#radio").val(data.id);
                    $("#inner").html(data.name);
                }
            });
        });

        $(document).on('click', "#deciremente", function(){
            let _token   = $('meta[name="csrf-token"]').attr('content');
            var id = $("#radio").val();
            $.ajax({
                url:"{{ route('plussqlad') }}",
                method:'POST',
                data:{
                    id: id,
                    _token: _token
                },
                dataType:'json',
                success:function(data)
                {
                    if(data.status == 0){
                        $("#radio").val(data.data.id);
                        $("#inner").html(data.data.name);
                        toastr.error("Товар етарли емас").fadeOut(1500);
                    }else{
                        fetch_customer_data2();
                        $("#radio").val(data.data.id);
                        $("#inner").html(data.data.name);
                    }
                }
            });
        });

        $(document).on('click', "#inceremente", function(){
            let _token   = $('meta[name="csrf-token"]').attr('content');
            var id = $("#radio").val();
            $.ajax({
                url:"{{ route('minussqlad') }}",
                method:'POST',
                data:{
                    id: id,
                    _token: _token
                },
                dataType:'json',
                success:function(data)
                {
                    if(data.status == 0){
                        $("#radio").val(data.data.id);
                        $("#inner").html(data.data.name);
                        toastr.error("Товар 1дан кам болмайди").fadeOut(1500);
                    }else{
                        fetch_customer_data2();
                        $("#radio").val(data.data.id);
                        $("#inner").html(data.data.name);
                    }
                }
            });
        });

        $(document).on('click', "#udalit", function(){
            $("#zaqazay0").modal("show");
        });

        $(document).on('click', "#udalit2", function(){
            let _token   = $('meta[name="csrf-token"]').attr('content');
            var id = $("#radio").val();
            $.ajax({
                url:"{{ route('udalitsqlad') }}",
                method:'POST',
                data:{
                    id: id,
                    _token: _token
                },
                dataType:'json',
                success:function(data)
                {
                    fetch_customer_data2();
                    $("#radio").val('');
                    $("#inner").html('')
                    $("#zaqazay0").modal("hide");
                    toastr.error("Товар очирилди").fadeOut(1500);                
                }
            });
        });

        $(document).on('click', "#yangilash", function(){
            let _token   = $('meta[name="csrf-token"]').attr('content');
            var id = $("#radio").val();
            if(id){
                $.ajax({
                    url:"{{ route('yangilashsqlad') }}",
                    method:'GET',
                    data:{
                        id: id,
                        _token: _token
                    },
                    dataType:'json',
                    success:function(data)
                    {
                        $("#son").val(data.hajm);
                        $("#zaqazaytModal").modal("show");
                    }
                });
            }else{
                toastr.error("Товар белгилаш").fadeOut(2000); 
            }
        });
     
        $(document).on('click', "#button", function(){
            let _token   = $('meta[name="csrf-token"]').attr('content');
            var id = $("#radio").val();
            var son = $("#son").val();
            $.ajax({
                url:"{{ route('saqlashsqlad') }}",
                method:'POST',
                data:{
                    id: id,
                    son: son,
                    _token: _token
                },
                dataType:'json',
                success:function(data)
                {
                    if(data.status == 200){
                        fetch_customer_data2();
                        $("#radio").val(data.data.id);
                        $("#inner").html(data.data.name)
                        $("#zaqazaytModal").modal("hide");
                        toastr.success("Кошилди").fadeOut(2000);
                    }
                    if(data.status == 0){
                        $("#radio").val(data.data.id);
                        $("#inner").html(data.data.name)
                        toastr.error("Товар етарли емас").fadeOut(2500);
                    }
                }
            });
        });
        
        $(document).on('click', "#tayyor", function(){
            $("#zaqazaytModal2").modal("show");
        })

        $(document).on('click', "#tayyor2", function(){
            let _token = $('meta[name="csrf-token"]').attr('content');       
            $.ajax({
                url:"{{ route('tayyorsqlad') }}",
                method:'POST',
                data:{
                    _token: _token
                },
                dataType:'json',
                success:function(data)
                {
                    fetch_customer_data();
                    fetch_customer_data();
                    fetch_customer_data2();
                    fetch_customer_data3();
                    $("#zaqazaytModal2").modal("hide");
                    toastr.success("Мувофакиятли отказилди");                 
                }
            });
        });
    });

</script>
@endsection