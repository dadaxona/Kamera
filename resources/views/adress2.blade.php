@extends('welcome')
@section('content')
<div class="page-body button-page">
  <div class="row">
      <div class="col-sm-12">
          <div class="card">
              <div class="card-header">
                  <div class="card-header-left">
                    <button type="button" class="btn btn-success m-0 p-1" onclick="addPost2()">
                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                      </svg>
                      Создать 
                    </button>
                  </div>
                  <div class="table-responsive">
                    <table class="tab table-hover" id="laravel_crud">
                        <thead>
                            <tr>
                              <th>Етказиб берувчи</th>
                              <th>Управление</th>
                            </tr>
                        </thead>
                        <tbody id="ttbody">
       
                        </tbody>
                    </table>
                  </div>
                </div>
          </div>
      </div>
  </div>
</div>

<div class="modal fade" id="post-modal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Создать поставщики</h5>
        <a href="javascript:void(0)" id="add" class="btn btn-success m-0 p-1">
          <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
          </svg>
          Добавыт
        </a>
      </div>
      <div class="modal-body">
        <form id="pastavka" action="{{ route('pastavka') }}" method="POST">
            @csrf
            <table class="col-12" id="dynamicTable">

            </table>             
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Назад</button>
        <button type="submit" class="btn btn-primary">Сохранить</button>
      </div>
    </form>
    </div>
  </div>
</div>

<div class="modal fade" id="post-modal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="pastavkaupdate" action="{{ route('pastavkaupdate') }}" method="POST">
            @csrf
            <input type="hidden" name="id" id="adress_id">
            <input type="text" name="adress" class="form-control" id="adress">          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Назад</button>
        <button type="submit" class="btn btn-primary">Сохранить</button>
      </div>
    </form>
    </div>
  </div>
</div>

<div class="modal fade" id="post-modal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Мижозни очириш</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <input type="hidden" name="id" id="adress_id">
        </div>
        <div class="text-center pb-4">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Нет</button>
            <button type="submit" onclick="dele()" class="btn btn-success">Да</button>
        </div>
    </div>
  </div>
</div>


  <script>

$( function() {
    $( "#ttbody" ).selectable();
  } );

    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });

    var i = 0;
    $("#add").click(function(){            
            ++i;
        $("#dynamicTable").append('<tr><td><input type="text" name="addmore['+i+'][adress]" id="" class="form-control col-10" placeholder="Имя поставщика"></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
    }); 
  
    $(document).on('click', '.remove-tr', function(){
        $(this).parents('tr').remove();
        --i;               
    });

    function addPost2() {
      $("#id").val('');
      $('#post-modal2').modal('show');
    }

  function editPosts2(id) {
    let _url = `show3/${id}`;
    $('#idError').text('');
    $('#adressError').text('');
    
    $.ajax({
      url: _url,
      type: "GET",
      success: function(response) {
          if(response) {
            $("#adress_id").val(response.id);
            $("#adress").val(response.adress);
            $('#post-modal3').modal('show');
          }
      }
    });
  }

  $(document).ready(function(){
    fetch_customer_data();
    function fetch_customer_data(query = '')
    {
        $.ajax({
            url:"{{ route('live_adress') }}",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data)
            {
                $('#ttbody').html(data.table_data);
                $('#total_records').text(data.total_data);
            }
        })
    }
    $('#pastavka').on('submit', function(e) {
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
            $(form)[0].reset();
            fetch_customer_data();
            // $('table tbody').prepend('<tr id="row_'+data.data.id+'"><td>'+data.data.adress+'</td><td><a href="javascript:void(0)" onclick="editPosts2('+data.data.id+')" style="color: green"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16"><path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/></svg></a><a href="javascript:void(0)" onclick="deletePost('+data.data.id+')" class="mx-3" style="color: red"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16"><path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/></svg></a></td></tr>');
            $('#adress').val('');
            $('#post-modal2').modal('hide');
            toastr.success(data.msg);
            // location.reload(true);
          }
        });
      });
  
      $('#pastavkaupdate').on('submit', function(e) {
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
            fetch_customer_data();
            $('#post-modal3').modal('hide');
            toastr.success(data.msg);
            // location.reload(true);
          }
        });
      });
    
  });



  function deletePost2(id) {
    $("#adress_id").val(id);
    $('#post-modal4').modal('show');
  }
  function dele() {
    var id = $("#adress_id").val();
    let _url = `delete4/${id}`;
    let _token   = $('meta[name="csrf-token"]').attr('content');

      $.ajax({
        url: _url,
        type: 'POST',
        data: {
          _token: _token
        },
        success: function(data) {
          $("#row_"+id).remove();
          $('#post-modal4').modal('hide');
          toastr.success(data.msg);
        }
      });
  }
  </script>
@endsection