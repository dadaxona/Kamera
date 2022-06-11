@extends('welcome')
@section('content')
<style>
   .borders{
    border-top: 2px solid;
  }
  .bor{
    border-right: 2px solid;
    padding: 0;
  }
  .bor1{
    border-right: 2px solid;
    padding-right: 0;
  }
  .bor2{
    border-bottom: 2px solid;
  }
  #itog2{
        /* background: #ffffff;
        border: none;
        border-bottom: 2px solid; */
    }
  .sifra{
    border: none;
    border-bottom: 2px solid;
    font-size: 20px;
    text-align: right;
    padding-bottom: 0px;
  }
  .sifra2{
    border: none;
    border-bottom: 2px solid;
    font-size: 20px;
    text-align: center;
    margin-top: 26px;
  }
</style>

<div id="AAAAAAAA" class="card ui-widget-content">
  <div class="card-block tab-icon">
    <div class="col-12">
      <ul class="nav nav-tabs md-tabs " role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#home7" role="tab" aria-expanded="true"><i class="icofont icofont-home"></i>Клент</a>
            <div class="slide"></div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#profile7" role="tab" aria-expanded="false"><i class="icofont icofont-ui-user "></i>Бирламчи</a>
            <div class="slide"></div>
        </li>
      </ul>
      <div class="tab-content card-block">
        <div class="tab-pane active" id="home7" role="tabpanel" aria-expanded="true">
            <div class="row">
              <div class="col-2 bor">
                <div class="table-responsive">
                  <div class="ext scrolll2">
                    <div class="rty2">
                      <table class="tab table-hover" id="">

                          <thead>
                            <th>
                              <button id="vseclent" class="btn btn-success">
                                Все
                              </button>
                            </th>
                          </thead>
                          <tbody id="clent_tip">
          
                          </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6 bor">
                <div class="table-responsive">
                  <div class="ext scrolll2">
                    <div class="rty2">
                      <table class="tab table-hover">

                        <thead>
                          <tr>
                            <th>Клент</th>
                            <th>Товар</th>
                            <th>Штрих код</th>
                            <th>Шт</th>
                            <th>Цена продажи</th>
                            <th>Скидка</th>
                            <th>Итого</th>
                            <th>Последняя дата</th>
                          </tr>             
                      </thead>
                          <tbody id="savdo">
          
                          </tbody>
                      </table>
                    </div> 
                  </div>
                </div> 
              </div>
              <div class="col-4">
                <div class="table-responsive">
                  <div class="ext scrolll2">
                    <div class="rty2">
                      <table class="tab table-hover">

                        <thead>
                          <tr>
                            <th>Клент</th>
                            <th>Итого</th>
                            <th>Наличные</th>
                            <th>Карта</th>
                            <th>Безнал</th>
                            <th>Долг</th>
                            <th>Последняя дата</th>
                          </tr>             
                      </thead>
                          <tbody id="dolg">
          
                          </tbody>
                      </table>
                    </div> 
                  </div>
                </div> 
              </div>
              <div class="col-12 m-0 p-0 borders">
                <div class="row">
                  <div class="col-2 bor1">
                    <input type="text" id="tavarshtuk2" class="form-control sifra" placeholder="Товар шт">
                    <input type="text" id="shtuk2" class="form-control sifra" placeholder="Шт">  
                  </div>
                  <div class="col-2 bor1">
                    <input type="text" id="foiz2" class="form-control sifra" placeholder="Товар протсент">
                    <input type="text" id="itoge2" class="form-control sifra" placeholder="Итого">  
                  </div>
                  <div class="col-3 mx-5 bor1">
                    <input type="text" id="clentname" class="form-control sifra2" placeholder="Клент имя">  
                  </div>
                  <div class="col-4 mt-4">
                    <form>
                      @csrf
                    <input type="hidden" id="oydi">
          
                      <div class="d-flex">
                        <select name="tavar_id" id="tavar_id" class="form-control bor2">
                          <option value="">--Тип--</option>
                          @foreach ($tavar as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                          @endforeach
                        </select>
                        <input class="form-control mx-2" style="width: 37%" type="date" id="date" name="date">
                        <input class="form-control" style="width: 37%" type="date" id="date2" name="date2">
                          {{-- <div class="input-group-append">
                          <button type="submit" class="btn btn-primary buts" id="submithendel">
                              Поиск
                          </button>
                        </div> --}}
                      </div>
                    </form>
                </div>
                </div>
              </div>
            </div>
        </div>
        <div class="tab-pane" id="profile7" role="tabpanel" aria-expanded="false">
            <div class="row">
              <div class="col-12 bor">
                <div class="table-responsive">
                  <div class="ext scrolll2">
                    <div class="rty2">
                      <table class="tab table-hover">
                        <thead>
                          <tr>
                            <th>Товар</th>
                            <th>Штрих код</th>
                            <th>Шт</th>
                            <th>Цена продажи</th>
                            <th>Скидка</th>
                            <th>Итого</th>
                            <th>Последняя дата</th>
                          </tr>             
                      </thead>
                          <tbody id="savdobirlamchi">
          
                          </tbody>
                      </table>
                    </div> 
                  </div>
                </div> 
              </div>
              <div class="col-12 m-0 p-0 borders">
                <div class="row">
                  <div class="col-2 bor1">
                    <input type="text" id="tavarshtuk2s" class="form-control sifra" placeholder="Товар шт">
                    <input type="text" id="shtuk2s" class="form-control sifra" placeholder="Шт">  
                  </div>
                  <div class="col-2 mt-3 bor1">
                    <br>
                    <input type="text" id="itoge2s" class="form-control sifra" placeholder="Итого">
                  </div>
                  <div class="col-8 mt-4">
                    <form>
                      @csrf
                      <div class="d-flex">
                        <select name="tavar_id" id="tavar_ids" class="form-control bor2">
                          <option value="">--Тип--</option>
                          @foreach ($tavar as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                          @endforeach
                        </select>
                        <input class="form-control mx-2" style="width: 37%" type="date" id="datem">
                        <input class="form-control" style="width: 37%" type="date" id="datem2">                      
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
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

  $(document).ready(function(){
    fetch_customer_data();
    function fetch_customer_data(query = '')
    {
        $.ajax({
            url:"{{ route('clent_tip') }}",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data)
            {
                $('#clent_tip').html(data.table_data);
            }
        })
    }
    fetch_customer_data123();
    function fetch_customer_data123(query = '')
    {
        $.ajax({
            url:"{{ route('savdobirlamchi') }}",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data)
            {
                $('#savdobirlamchi').html(data.table_data);
            }
        })
    }

    $(document).on('change', "#tavar_ids", function(){
    var tavar_id = $("#tavar_ids").val();
    var date = $("#datem").val();
    var date2 = $("#datem2").val();
    let _token  = $('meta[name="csrf-token"]').attr('content');
      // if(oydi){
        $.ajax({
              url:"{{ route('brlamclient') }}",
              method:'POST',
              data:{
                tavar_id: tavar_id,
                date: date,
                date2: date2,
                _token: _token
              },
              dataType:'json',
              success:function(data)
              {
                $('#savdobirlamchi').html(data.output);
                // fetch_customer_data123();
                $("#tavarshtuk2s").val(data.foo2.tavarshtuk);
                $("#shtuk2s").val(data.foo2.shtuk);
                $("#itoge2s").val(data.foo2.opshi);
              }
          });
      // }else{
      //   toastr.error("Выберите клент").fadeOut(1500);
      // }
    });

    $(document).on('change', "#datem", function(){
    var tavar_id = $("#tavar_ids").val();
    var date = $("#datem").val();
    var date2 = $("#datem2").val();
    let _token  = $('meta[name="csrf-token"]').attr('content');
    // if(oydi){
        $.ajax({
              url:"{{ route('brlamclient') }}",
              method:'POST',
              data:{
                tavar_id: tavar_id,
                date: date,
                date2: date2,
                _token: _token
              },
              dataType:'json',
              success:function(data)
              {
                $('#savdobirlamchi').html(data.output);
                // fetch_customer_data123();
                $("#tavarshtuk2s").val(data.foo2.tavarshtuk);
                $("#shtuk2s").val(data.foo2.shtuk);
                $("#itoge2s").val(data.foo2.opshi);
              }
          });
      // }else{
      //   toastr.error("Выберите клент").fadeOut(1500);
      // }
    });

    $(document).on('change', "#datem2", function(){
    var tavar_id = $("#tavar_ids").val();
    var date = $("#datem").val();
    var date2 = $("#datem2").val();
    let _token  = $('meta[name="csrf-token"]').attr('content');
      // if(oydi){
        $.ajax({
              url:"{{ route('brlamclient') }}",
              method:'POST',
              data:{
                tavar_id: tavar_id,
                date: date,
                date2: date2,
                _token: _token
              },
              dataType:'json',
              success:function(data)
              {
                $('#savdobirlamchi').html(data.output);
                // fetch_customer_data123();
                $("#tavarshtuk2s").val(data.foo2.tavarshtuk);
                $("#shtuk2s").val(data.foo2.shtuk);
                $("#itoge2s").val(data.foo2.opshi);
              }
          });
      // }else{
      //   toastr.error("Выберите клент").fadeOut(1500);
      // }
    });

    $(document).on('click', "#data", function(){
    var id = $(this).data("id");
    $("#oydi").val(id);
    $.ajax({
          url:"{{ route('clents2') }}",
          method:'GET',
          data:{
            id: id
          },
          dataType:'json',
          success:function(data)
          {
            $('#savdo').html(data.output);
            $('#dolg').html(data.output2);
            fetch_customer_data();
            $("#clentname").val(data.clent.name);
            $("#tavarshtuk2").val(data.foo2.tavarshtuk);
            $("#shtuk2").val(data.foo2.shtuk);
            $("#foiz2").val(data.foo2.foiz);
            $("#itoge2").val(data.foo2.opshi);
          }
      });
    });

    $(document).on('click', "#vseclent", function(event){
      event.preventDefault();
      let _token  = $('meta[name="csrf-token"]').attr('content');
      $.ajax({
          url:"{{ route('vseclent') }}",
          method:'POST',
          data:{
            _token: _token
          },
          dataType:'json',
          success:function(data)
          {
            $('#savdo').html(data.output);
            $('#dolg').html(data.output2);
            fetch_customer_data();
            $("#clentname").val(data.clent);
            $("#tavarshtuk2").val(data.foo2.tavarshtuk);
            $("#shtuk2").val(data.foo2.shtuk);
            $("#foiz2").val(data.foo2.foiz);
            $("#itoge2").val(data.foo2.opshi);
          }
      });
    });

    $(document).on('change', "#tavar_id", function(){
    var tavar_id = $("#tavar_id").val();
    var date = $("#date").val();
    var date2 = $("#date2").val();
    var oydi = $("#oydi").val();
    let _token  = $('meta[name="csrf-token"]').attr('content');
      // if(oydi){
        $.ajax({
              url:"{{ route('clents3') }}",
              method:'POST',
              data:{
                id: oydi,
                tavar_id: tavar_id,
                date: date,
                date2: date2,
                _token: _token
              },
              dataType:'json',
              success:function(data)
              {
                $('#savdo').html(data.output);
                $('#dolg').html(data.output2);
                fetch_customer_data();
                $("#tavarshtuk2").val(data.foo2.tavarshtuk);
                $("#shtuk2").val(data.foo2.shtuk);
                $("#foiz2").val(data.foo2.foiz);
                $("#itoge2").val(data.foo2.opshi);
              }
          });
      // }else{
      //   toastr.error("Выберите клент").fadeOut(1500);
      // }
    });

    $(document).on('change', "#date", function(){
    var tavar_id = $("#tavar_id").val();
    var date = $("#date").val();
    var date2 = $("#date2").val();
    var oydi = $("#oydi").val();
    let _token  = $('meta[name="csrf-token"]').attr('content');
    // if(oydi){
        $.ajax({
              url:"{{ route('clents3') }}",
              method:'POST',
              data:{
                id: oydi,
                tavar_id: tavar_id,
                date: date,
                date2: date2,
                _token: _token
              },
              dataType:'json',
              success:function(data)
              {
                $('#savdo').html(data.output);
                $('#dolg').html(data.output2);
                fetch_customer_data();
                $("#tavarshtuk2").val(data.foo2.tavarshtuk);
                $("#shtuk2").val(data.foo2.shtuk);
                $("#foiz2").val(data.foo2.foiz);
                $("#itoge2").val(data.foo2.opshi);
              }
          });
      // }else{
      //   toastr.error("Выберите клент").fadeOut(1500);
      // }
    });

    $(document).on('change', "#date2", function(){
    var tavar_id = $("#tavar_id").val();
    var date = $("#date").val();
    var date2 = $("#date2").val();
    var oydi = $("#oydi").val();
    let _token  = $('meta[name="csrf-token"]').attr('content');
      // if(oydi){
        $.ajax({
              url:"{{ route('clents3') }}",
              method:'POST',
              data:{
                id: oydi,
                tavar_id: tavar_id,
                date: date,
                date2: date2,
                _token: _token
              },
              dataType:'json',
              success:function(data)
              {
                $('#savdo').html(data.output);
                $('#dolg').html(data.output2);
                fetch_customer_data();
                $("#tavarshtuk2").val(data.foo2.tavarshtuk);
                $("#shtuk2").val(data.foo2.shtuk);
                $("#foiz2").val(data.foo2.foiz);
                $("#itoge2").val(data.foo2.opshi);
              }
          });
      // }else{
      //   toastr.error("Выберите клент").fadeOut(1500);
      // }
    });
  });

</script>

@endsection