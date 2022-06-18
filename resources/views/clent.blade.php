@extends('welcome')
@section('content')
<div id="AAAAAAAA" class="card ui-widget-content">
  <div class="card-block tab-icon">
          <div class="col-12">
              <ul class="nav nav-tabs md-tabs " role="tablist">
                  <li class="nav-item">
                      <a class="nav-link active" data-toggle="tab" href="#home7" role="tab" aria-expanded="true"><i class="icofont icofont-home"></i>Клиенты</a>
                      <div class="slide"></div>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#profile7" role="tab" aria-expanded="false"><i class="icofont icofont-ui-user "></i>Cписок Клиенты</a>
                      <div class="slide"></div>
                  </li>
              </ul>
              <div class="tab-content card-block">
                  <div class="tab-pane active" id="home7" role="tabpanel" aria-expanded="true">
                    <div class="card-header">
                      <button type="button" class="btn btn-primary" onclick="addPost()">Создание клиентов</button>
                    </div>
                       <table class="tab table-hover" id="laravel_crud">
                          <thead>
                          <tr>
                              <th>Имя</th>
                              <th>Телефон</th>
                              <th>Фирма имя</th>
                              <th>Фирма ИНН</th>
                              <th>Управление</th>
                          </tr>
                          </thead>
                          <tbody id="clent">
      
                          </tbody>               
                      </table>
                  </div>
        
                <div class="tab-pane" id="profile7" role="tabpanel" aria-expanded="false">
                  <div class="exstrapro scrolll2">
                    <div class="wizzz">
                      <table class="tab table-hover">
                        <thead>
                        <tr>
                            <th>Клиент имя</th>
                            <th>Фамилия</th>
                            <th>Дата рождения</th>
                            <th>Тел</th>
                            <th>Дополнительно тел</th>
                            <th>Регион</th>
                            <th>Адресс</th>
                            <th>Ориентир</th>
                            <th>Места работа</th>
                            <th>Звания</th>
                            <th>Дополнительно работа</th>
                            <th>Дополнительно данних</th>
                            <th>Дополнительно данних</th>
                        </tr>
                        </thead>
                        <tbody id="malumotser">

                        </tbody>               
                      </table>      
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>   
  </div>

        
      <div class="modal fade" id="post-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Обновление клиентов</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="userForm" action="{{ route('store') }}" method="POST">
                  @csrf
                  <input type="hidden" name="id" id="id">
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Клиент имя</label>
                  <input type="text" class="form-control" name="name" id="name">
                  <span class="text-danger error-text name_error"></span>
                </div>
                <div class="mb-3">
                  <label for="message-text" class="col-form-label">Тел..</label>
                  <input type="number" class="form-control" name="tel"  id="tel">
                  <span class="text-danger error-text tel_error"></span>
                </div>
                <div class="mb-3">
                    <label for="message-text" class="col-form-label">Фирма имя</label>
                    <input type="text" class="form-control" name="firma" id="firma">
                    <span class="text-danger error-text firma_error"></span>
                  </div>
                  <div class="mb-3">
                    <label for="message-text" class="col-form-label">Фирма ИНН</label>
                    <input type="text" class="form-control" name="inn" id="inn">
                    <span class="text-danger error-text inn_error"></span>
                  </div>             
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Назад</button>
              <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
          </form>
          </div>
        </div>
      </div>

      <div id="post">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Клиент данних</h5>
              <svg xmlns="http://www.w3.org/2000/svg" id="Closem" width="25" height="25" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
              </svg>
            </div>
            <div class="modal-body">
              <form id="UserFormclents" action="{{ route('storemalumot') }}" method="POST">
                  @csrf
                  <input type="hidden" name="id" id="idd2">
                  <input type="hidden" name="user_id" id="idcc">
                  <div class="row">
                    <div class="col-4 mb-3">
                      <label for="recipient-name" class="col-form-label">Клиент имя</label>
                      <input type="text" class="form-control" id="namese" disabled>
                      <input type="hidden" class="form-control" name="namese2" id="namese2">
                    </div>
                    <div class="col-4 mb-3">
                      <label for="message-text" class="col-form-label">Фамилия</label>
                      <input type="text" class="form-control" name="familiya"  id="familiya">
                    </div>
                    <div class="col-4 mb-3">
                      <label for="message-text" class="col-form-label">Дата рождения</label>
                      <input type="date" class="form-control" name="sana" id="sana">
                    </div>  
                    <div class="col-4 mb-3">
                      <label for="message-text" class="col-form-label">Тел</label>
                      <input type="text" class="form-control" name="tels"  id="tels">
                    </div>
                    <div class="col-4 mb-3">
                      <label for="message-text" class="col-form-label">Дополнительно тел</label>
                      <input type="text" class="form-control" name="tels2"  id="tels2">
                    </div>
                    <div class="col-4 mb-3">
                      <label for="message-text" class="col-form-label">Регион</label>
                      <input type="text" class="form-control" name="region"  id="region">
                    </div>
                    <div class="col-4 mb-3">
                        <label for="message-text" class="col-form-label">Адресс</label>
                        <input type="text" class="form-control" name="adress" id="adress">
                      </div>
                      <div class="col-4 mb-3">
                        <label for="message-text" class="col-form-label">Ориентир</label>
                        <input type="text" class="form-control" name="orentr" id="orentr">
                      </div>                    
                      <div class="col-4 mb-3">
                        <label for="message-text" class="col-form-label">Места работа</label>
                        <input type="text" class="form-control" name="ishjoyi" id="ishjoyi">
                      </div>  
                      <div class="col-4 mb-3">
                        <label for="message-text" class="col-form-label">Звания</label>
                        <input type="text" class="form-control" name="lavozim" id="lavozim">
                      </div>  
                      <div class="col-4 mb-3">
                        <label for="message-text" class="col-form-label">Дополнительно работа</label>
                        <input type="text" class="form-control" name="qoshimachaish" id="qoshimachaish">
                      </div>  
                      <div class="col-4 mb-3">
                        <label for="message-text" class="col-form-label">Дополнительно данних</label>
                        <input type="text" class="form-control" name="qoshimcha" id="qoshimcha">
                      </div>  
                      <div class="col-12 mb-3">
                        <label for="message-text" class="col-form-label">Дополнительно данних</label><br>
                        <textarea name="coment" class="form-control" id="coment" style="width: 100%; height: 100px;"></textarea>
                      </div>
                 
                  </div>
            </div>
            <div class="modal-footer">
              <a id="delev" class="btn btn-danger">Удалить</a>
              <a id="clo" class="btn btn-secondary">Назад</a>
              <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
          </form>
          </div>

      <div class="modal fade" id="post-modal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Удаление клиента</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id5" id="id5">
              </div>
              <div class="text-center pb-4">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Нет</button>
                  <button type="submit" onclick="dele2()" class="btn btn-success">Да</button>
              </div>
          </div>
        </div>
      </div>
<script>
    $( function() {
      $( "#malumotser" ).selectable();
    });
    
    $( "#Closem" ).on( "click", function() {
      $('#post').toggle('blind');
    });

    $( "#clo" ).on( "click", function() {
      $('#post').toggle('blind');
    });

    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });

  function addPost() {
    $("#id").val('');
    $('#post-modal').modal('show');
  }

  function foo(id) {
    let _url = `showklentmalumot/${id}`;    
    $.ajax({
      url: _url,
      type: "GET",
      success: function(response) {
          $("#idd2").val(response.id);
          $("#idcc").val(response.user_id);
          $("#namese").val(response.namese2);
          $("#namese2").val(response.namese2);
          $("#tels").val(response.tels);
          $("#familiya").val(response.familiya);
          $("#sana").val(response.sana);
          $("#tels2").val(response.tels2);
          $("#region").val(response.region);
          $("#adress").val(response.adress);
          $("#orentr").val(response.orentr);
          $("#ishjoyi").val(response.ishjoyi);
          $("#lavozim").val(response.lavozim);
          $("#qoshimachaish").val(response.qoshimachaish);
          $("#qoshimcha").val(response.qoshimcha);
          $("#coment").val(response.coment);       
          $('#post').toggle('blind');
        }
    });  
  }
  
  $(document).on("click", "#malumotclent", function () {
    var id = $(this).data("id");
    let _url = `show/${id}`;    
    $.ajax({
      url: _url,
      type: "GET",
      success: function(response) {
          $("#idcc").val(response.id);
          $("#namese").val(response.name);
          $("#namese2").val(response.name);
          $("#tels").val(response.tel);
          $("#familiya").val('');
          $("#sana").val('');
          $("#tels2").val('');
          $("#region").val('');
          $("#adress").val('');
          $("#orentr").val('');
          $("#ishjoyi").val('');
          $("#lavozim").val('');
          $("#qoshimachaish").val('');
          $("#qoshimcha").val('');
          $("#coment").val('');       
          $('#post').toggle('blind');
        }
    });    
  });

  fetchdata();
    function fetchdata(query = '')
    {
        $.ajax({
            url:"{{ route('malumotser_live') }}",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data)
            {
              $('#malumotser').html(data.table_data);
            }
        })
    }

    $(document).on("click", "#delev", function () {
    var id = $("#idd2").val();
    let _url = `deletemijoz/${id}`;
    let _token   = $('meta[name="csrf-token"]').attr('content');

      $.ajax({
        url: _url,
        type: 'POST',
        data: {
          _token: _token
        },
        success: function(data) {
          fetchdata()
          $('#post').toggle('blind');
          toastr.success(data.msg);
        }
      });
  });

  $('#UserFormclents').on('submit', function(e) {
      e.preventDefault();
      var form = this;
      $.ajax({
        url:$(form).attr('action'),
        method:$(form).attr('method'),
        data:new FormData(form),
        processData:false,
        dataType:'json',
        contentType:false,
        beforeSend:function(){
          $(form).find('span.error-text').text('');
        },
        success:function(data){
          if(data.code == 200){
            $(form)[0].reset();
            fetchdata();
            $("#familiya").val('');
            $("#sana").val('');
            $("#tels2").val('');
            $("#region").val('');
            $("#adress").val('');
            $("#orentr").val('');
            $("#ishjoyi").val('');
            $("#lavozim").val('');
            $("#qoshimachaish").val('');
            $("#qoshimcha").val('');
            $("#coment").val('');       
            $('#post').toggle('blind');
            toastr.success(data.msg);
          }
          if(data.code == 0){
            $.each(data.error, function(prefix, val){
              $(form).find('span.'+prefix+'_error').text(val[0]);
            });
            toastr.error(data.msg);
          }
          if(data.code == 201){
            fetchdata();
            $("#familiya").val('');
            $("#sana").val('');
            $("#tels2").val('');
            $("#region").val('');
            $("#adress").val('');
            $("#orentr").val('');
            $("#ishjoyi").val('');
            $("#lavozim").val('');
            $("#qoshimachaish").val('');
            $("#qoshimcha").val('');
            $("#coment").val('');       
            $('#post').toggle('blind');
            toastr.success(data.msg);
          }           
        }
      });
  });
  function editPost(id) {
    let _url = `show/${id}`;
    $('#idError').text('');
    $('#nameError').text('');
    $('#telError').text('');
    $('#firmaError').text('');
    $('#innError').text('');
    
    $.ajax({
      url: _url,
      type: "GET",
      success: function(response) {
        $("#id").val(response.id);
        $("#name").val(response.name);
        $("#tel").val(response.tel);
        $("#firma").val(response.firma);
        $("#inn").val(response.inn);
        $('#post-modal').modal('show');
      }
    });
  }

  $(document).ready(function(){
    fetch_customer_data();
    function fetch_customer_data(query = '')
    {
        $.ajax({
            url:"{{ route('live_clent') }}",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data)
            {
                $('#clent').html(data.table_data);
                $('#total_records').text(data.total_data);
            }
        })
    }
    $('#userForm').on('submit', function(e) {
        e.preventDefault();
        var form = this;
        $.ajax({
          url:$(form).attr('action'),
          method:$(form).attr('method'),
          data:new FormData(form),
          processData:false,
          dataType:'json',
          contentType:false,
          beforeSend:function(){
            $(form).find('span.error-text').text('');
          },
          success:function(data){
            if(data.code == 200){
              $(form)[0].reset();
              fetch_customer_data();
              // $('table tbody').prepend('<tr id="row_'+data.data.id+'"><td>'+data.data.name+'</td><td>'+data.data.tel+'</td><td>'+data.data.firma+'</td><td>'+data.data.inn+'</td><td><a href="javascript:void(0)" onclick="editPost('+data.data.id+')" style="color: green"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16"><path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/></svg></a><a href="javascript:void(0)" onclick="deletePost('+data.data.id+')" class="mx-3" style="color: red"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16"><path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/></svg></a></td></tr>');
              $('#name').val('');
              $('#tel').val('');
              $('#firma').val('');
              $('#inn').val('');
              $('#post-modal').modal('hide');
              toastr.success(data.msg);
            }
            if(data.code == 0){
              $.each(data.error, function(prefix, val){
                $(form).find('span.'+prefix+'_error').text(val[0]);
              });
              toastr.error(data.msg);
            }
            if(data.code == 201){
              fetch_customer_data();
              $('#name').val('');
              $('#tel').val('');
              $('#firma').val('');
              $('#inn').val('');
              $('#post-modal').modal('hide');
              toastr.success(data.msg);
            }           
          }
        });
      });    
  });

  function deletePost(id) {
    $("#id5").val(id);
    $('#post-modal5').modal('show');
  }

  function dele2() {
    var id = $("#id5").val();
    let _url = `delete/${id}`;
    let _token   = $('meta[name="csrf-token"]').attr('content');

      $.ajax({
        url: _url,
        type: 'POST',
        data: {
          _token: _token
        },
        success: function(data) {
          $("#row_"+id).remove();
          $('#post-modal5').modal('hide');
          toastr.success(data.msg);
        }
      });
  }

</script>

@endsection