@extends('welcome')
@section('content')
<div class="card p-0">
        <div class="card-header">
              <div class="row">
                 <table class="table table-hover" id="laravel_crud">
                    <thead>
                    <tr>
                        <th>Логин</th>
                        <th>Парол</th>
                        <th>Управление</th>
                    </tr>
                    </thead>
                    <tbody id="clent">

                    </tbody>               
                </table>
              </div>
            </div>
        </div>
        
      <div class="modal fade" id="post-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="userForm" action="{{ route('storeadmin') }}" method="POST">
                  @csrf
                  <input type="hidden" name="id" id="id">
                <div class="mb-3">
                  <label for="message-text" class="col-form-label">Логин</label>
                  <input type="text" class="form-control" name="logins"  id="logins" disabled>
                  <input type="hidden" class="form-control" name="login"  id="login">
                  <span class="text-danger error-text login_error"></span>
                </div>
                <div class="mb-3">
                    <label for="message-text" class="col-form-label">Парол</label>
                    <input type="text" class="form-control" name="password" id="password">
                    <span class="text-danger error-text password_error"></span>
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

      <div class="modal fade" id="post-modal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Товарни очириш</h5>
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
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });

  function addPost() {
    $("#id").val('');
    $("#login").val('');
    $("#password").val('');
    $('#post-modal').modal('show');
  }

  function editPost(id) {
    let _url = `showadmin/${id}`;
    $('#loginError').text('');
    $('#passwordError').text('');
    
    $.ajax({
      url: _url,
      type: "GET",
      success: function(response) {
          if(response) {
            $("#id").val(response.id);
            $("#logins").val(response.login);
            $("#login").val(response.login);
            $("#password").val(response.password);
            $('#post-modal').modal('show');
          }
      }
    });
  }

  $(document).ready(function(){
    fetch_customer_data();
    function fetch_customer_data(query = '')
    {
        $.ajax({
            url:"{{ route('live_admin') }}",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data)
            {
                $('#clent').html(data.table_data);
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
              $('#login').val('');
              $('#password').val('');
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
              $('#login').val('');
              $('#password').val('');
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
    let _url = `deleteadmin/${id}`;
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