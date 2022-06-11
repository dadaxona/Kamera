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
  #itog2{
        /* background: #ffffff;
        border: none;
        border-bottom: 2px solid; */
    }

  #nazadclicke{
    cursor: pointer;
  }

  .sifra{
    border: none;
    border-bottom: 2px solid;
    font-size: 20px;
    text-align: right;
    padding-bottom: 0px;
  }
  #tavar2{
    display: none;
    background-color: rgb(0 0 0 / 75%);
    padding: 32px;
    border-radius: 12px;
    width: 99%;
    margin: auto;
    position: absolute;
    border-radius: 3px solid black; 
    color: white;
  }
</style>
<div id="AAAAAAAA" class="card ui-widget-content">
    <div class="card-block tab-icon">
            <div class="col-12">
                <ul class="nav nav-tabs md-tabs " role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#home7" role="tab" aria-expanded="true"><i class="icofont icofont-home"></i>Товар</a>
                        <div class="slide"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#profile7" role="tab" aria-expanded="false"><i class="icofont icofont-ui-user "></i>Cписок товаров</a>
                        <div class="slide"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#messages7" role="tab" aria-expanded="false"><i class="icofont icofont-ui-message"></i>Итого</a>
                        <div class="slide"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#settings7" role="tab" aria-expanded="false"><i class="icofont icofont-ui-settings"></i>Данные</a>
                        <div class="slide"></div>
                    </li>
                </ul>
                <div class="tab-content card-block">
                    <div class="tab-pane active" id="home7" role="tabpanel" aria-expanded="true">
                        <div class="card-header-left">
                        <div class="row">
                          <div class="col-9 mt-0">
                            <button type="button" class="btn btn-success m-0 p-1" id="addPost3">
                              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                              </svg>
                              Создать
                            </button>
                          </div>
                          <div class="col-3 mt-0">
                              <form action="{{ route('datasearche') }}" method="GET">
                                @csrf
                                <div class="d-flex">
                                  <input class="form-control" style="width: 37%" type="date" name="date">
                                  <input class="form-control" style="width: 37%" type="date" name="date2">
                                    <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary buts">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                      </svg>
                                    </button>
                                  </div>
                                </div>
                              </form>
                          </div>
                        </div>
                        </div>
                        <div class="table-responsive">
                            <table class="tab table-hover" id="laravel_crud">
                                <thead>
                                    <tr>
                                      <th>Тип</th>
                                      <th>Поставщик</th>
                                      <th>Имя</th>
                                      <th>Шт</th>
                                      <th>Закупочная цена</th>
                                      <th>Оптовая цена</th>
                                      <th>Розничная цена</th>
                                      <th>Последняя дата</th>
                                      <th>Управлена</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($ichkitavar as $item)
                                  <tr id="row_{{$item->id}}" style="border-bottom: 1px solid">
                                    <td>{{ $item->tavar->name }}</td>
                                    <td>{{ $item->adress }}</td>
                                    <td>{{ $item->tavar2->name }}</td>
                                    @if ($item->hajm <= $item->raqam)
                                    <td style="background-color: rgb(237, 0, 0); color: white;">{{ $item->hajm }}</td>                                        
                                    @else
                                    <td>{{ $item->hajm }}</td>  
                                    @endif
                                    <td>{{ $item->summa }}</td>
                                    <td>{{ $item->summa2 }}</td>
                                    <td>{{ $item->summa3 }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>
                                      <a href="javascript:void(0)" onclick="editPost3({{ $item->id }})" style="color: green">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                          <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                                        </svg>
                                      </a>                            
                                      <a href="javascript:void(0)" onclick="deletePost3({{ $item->id }})" class="mx-3" style="color: red">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                          <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                        </svg>
                                      </a>
                                    </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                            </table>
                          </div>                          
                    </div>
                    <div class="tab-pane" id="profile7" role="tabpanel" aria-expanded="false">
                      <div class="row">
                        <div class="col-2 bor">
                          <div class="table-responsive">
                            <div class="extr22 scrolll2">
                              <div class="rty2">
                                <table class="tab" id="">
                                    <thead>
                                      <th>
                                        <button id="vse" class="btn btn-success">
                                          Все
                                        </button>
                                      </th>
                                    </thead>
                                    <tbody id="tavar_tip">

                                    </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-10">
                          <div class="table-responsive">
                            <div class="extr22 scrolll2">
                              <div class="rty2">
                                <table class="tab table-hover">
                                  <thead>
                                    <tr>
                                      <th>Тип</th>
                                      <th>Поставщик</th>
                                      <th>Имя</th>
                                      <th>Шт</th>
                                      <th>Закупочная цена</th>
                                      <th>Оптовая цена</th>
                                      <th>Розничная цена</th>
                                      <th>Последняя дата</th>
                                    </tr>
                                </thead>
                                    <tbody id="tavarlar">

                                    </tbody>
                                </table>
                              </div> 
                            </div>
                          </div> 
                        </div>
                        <div class="col-12 m-0 p-0 borders">
                          <div class="row">
                            <div class="col-2">
                              <input type="text" id="tavarshtuk" class="form-control sifra" placeholder="Товар шт">
                              <input type="text" id="shtuk" class="form-control sifra" placeholder="Шт">  
                            </div>
                            <div class="col-2">
                              <input type="text" id="foiz" class="form-control sifra" placeholder="Товар протсент">
                              <input type="text" id="dateitog" class="form-control sifra" placeholder="Итого">  
                            </div>
                            <div class="col-5">
                            </div>
                            <div class="col-3 mt-4">
                              <form>
                                @csrf
                                <div class="d-flex">
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
                    <div class="tab-pane" id="messages7" role="tabpanel" aria-expanded="false">
                      <div class="table-responsive">
                        <table class="tab table-hover" id="laravel_crud">
                            <thead>
                                <tr>
                                  <th>Тип</th>
                                  <th>Поставщик</th>
                                  <th>Имя</th>
                                  <th>Шт</th>
                                  <th>Закупочная цена</th>
                                  <th>Оптовая цена</th>
                                  <th>Розничная цена</th>
                                  <th>Последняя дата</th>
                                  <th>Управлена</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($tiklash as $item)
                              <tr id="row2_{{$item->id}}" style="border-bottom: 1px solid">
                                <td>{{ $item->tavar->name }}</td>
                                <td>{{ $item->adress }}</td>
                                <td>{{ $item->tavar2->name }}</td>
                                @if ($item->hajm <= $item->raqam)
                                <td style="background-color: rgb(237, 0, 0); color: white;">{{ $item->hajm }}</td>                                        
                                @else
                                <td>{{ $item->hajm }}</td>  
                                @endif
                                <td>{{ $item->summa }}</td>
                                <td>{{ $item->summa2 }}</td>
                                <td>{{ $item->summa3 }}</td>
                                <td>{{ $item->updated_at }}</td>
                                <td>
                                  <a href="javascript:void(0)" onclick="tiklash({{ $item->id }})" style="color: green">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                                      <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                      <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
                                    </svg>
                                  </a>                            
                                  <a href="javascript:void(0)" onclick="deletePro3({{ $item->id }})" class="mx-3" style="color: red">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                      <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                    </svg>
                                  </a>
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                        </table>
                      </div> 
                    </div>
                    <div class="tab-pane" id="settings7" role="tabpanel" aria-expanded="false">
                      <div class="card-header-left">
                        <div class="row">
                          <div class="col-3 mt-0">
                            <div class="card-tools">
                              <form action="" method="GET">
                                @csrf
                                <div class="input-group input-group-sm">
                                  <input class="form-control" type="date" name="date">
                                  <input class="form-control" type="date" name="date2">
                                    <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary buts">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                      </svg>
                                    </button>
                                  </div>            
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                        </div>
                        <p class="m-0 text-center">Пусто</p>
                    </div>
                </div>
            </div>
    </div>
</div>

  <div id="tavar2">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Товарни кошиш</h5>
          <svg xmlns="http://www.w3.org/2000/svg" id="nazadclicke" width="25" height="25" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
          </svg>
      </div>
        <form id="TavarFormTable" action="{{ route('store3') }}" method="POST">
          @csrf
          <table class="col-12" id="dynamicTable">
            <thead>
              <tr>
                <th>Тип</th>
                <th>Поставщик</th>
                <th>Имя</th>
                <th>Предупрежденние</th>
                <th>Шт</th>
                <th>Закупочная цена</th>
                <th>Оптовая цена</th>
                <th>Розничная цена</th>
                <th>Удалить</th>
            </tr>
            </thead>
          <tbody>

          </tbody>

          </table>   
          <div class="modal-footer">
            <a href="javascript:void(0)" id="add" class="btn btn-success">
              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
              </svg>
              Добавыт
            </a>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="nazadclick">Назад</button>
            <button type="submit" class="btn btn-primary">Сохранить</button>
          </div>
    
    </form>
  </div>

  <div class="modal fade" id="tavar2delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Товарни очириш</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <input type="hidden" name="id" id="iddel">
          </div>
          <div class="text-center pb-4">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Нет</button>
              <button type="submit" onclick="deleet()" class="btn btn-success">Да</button>
          </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="tavar2delete2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Товарни очириш</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <input type="hidden" name="id" id="iddelsss">
          </div>
          <div class="text-center pb-4">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Нет</button>
              <button type="submit" onclick="deleetemnu()" class="btn btn-success">Да</button>
          </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="updates2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="updates" action="{{ route('updates') }}" method="POST">
              @csrf
              <input type="hidden" name="id" id="ichki_id">
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Тип</label>
                  <select name="tavar_id" class="form-control">
                    <option value="">--Танланг--</option>
                    @foreach($data as $item)
                      <option value="{{ $item->id }}">{{ $item->name }}</option>                                
                    @endforeach
                  </select>
                <span class="text-danger error-text tavar_id_error"></span>
              </div>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Етказиб берувчи</label>
                  <select name="adress" class="form-control">
                    <option value="">--Танланг--</option>
                    @foreach($adress as $item)
                      <option value="{{ $item->adress }}">{{ $item->adress }}</option>                                
                    @endforeach
                  </select>
                <span class="text-danger error-text adress_error"></span>
              </div>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Тавар номи</label>
                  <select name="tavar2_id" class="form-control">
                    <option value="">--Танланг--</option>
                    @foreach($datatip as $item)
                      <option value="{{ $item->id }}">{{ $item->name }}</option>                                
                    @endforeach
                  </select>
                <span class="text-danger error-text adress_error"></span>
              </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Ид ракам</label>
              <input type="text" class="form-control" name="raqam"  id="raqam2">
              <span class="text-danger error-text raqam_error"></span>
            </div>            
            <div class="mb-3">
                <label for="message-text" class="col-form-label">Тавар хажм</label>
                <input type="number" class="form-control" name="hajm" id="hajm2">
                <span class="text-danger error-text hajm_error"></span>
              </div>
              <div class="mb-3">
                <label for="message-text" class="col-form-label">Закупочная цена</label>
                <input type="number" class="form-control" name="summa" id="summa12">
                <span class="text-danger error-text summa_error"></span>
              </div> 
              <div class="mb-3">
                <label for="message-text" class="col-form-label">Оптовая цена</label>
                <input type="number" class="form-control" name="summa2" id="summa22">
                <span class="text-danger error-text summa2_error"></span>
              </div>
              <div class="mb-3">
                <label for="message-text" class="col-form-label">Розничная цена</label>
                <input type="number" class="form-control" name="summa3" id="summa223">
                <span class="text-danger error-text summa3_error"></span>
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


<script>

    // $(function(){
    //  $( "#AAAAAAAA" ).draggable();
    // });

    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });

    var i = 0;
    $("#add").click(function(){            
            ++i;
        $("#dynamicTable tbody").append('<tr><td><select name="addmore['+i+'][tavar_id]" id="" class="form-control mx-2">@foreach ($data as $item)<option value="{{ $item->id }}">{{ $item->name }}</option>@endforeach</select></td><td><select name="addmore['+i+'][adress]" id="" class="form-control mx-2">@foreach ($adress as $item)<option value="{{ $item->adress }}">{{ $item->adress }}</option>@endforeach</select></td><td><select name="addmore['+i+'][tavar2_id]" id="" class="form-control mx-2">@foreach ($datatip as $item)<option value="{{ $item->id }}">{{ $item->name }}</option>@endforeach</select></td><td><input type="number" name="addmore['+i+'][raqam]" id="" class="form-control mx-2" placeholder="Предупрежденние"></td><td><input type="number" name="addmore['+i+'][hajm]" id="" class="form-control mx-2" placeholder="Шт"></td><td><input type="number" name="addmore['+i+'][summa]" id="" class="form-control mx-2" placeholder="Закупочная цена"></td><td><input type="number" name="addmore['+i+'][summa2]" id="" class="form-control mx-2" placeholder="Оптовая цена"><td><input type="number" name="addmore['+i+'][summa3]" id="" class="form-control mx-2" placeholder="Розничная цена"></td><td><button type="button" class="btn btn-danger remove-tr">Удалить</button></td></tr>');
    }); 
  
    $(document).on('click', '.remove-tr', function(){
        $(this).parents('tr').remove();
        --i;               
    });

    $( "#addPost3" ).on( "click", function() {
      $('#tavar2').show('fold', 1000);
    });
    
    $( "#nazadclick" ).on( "click", function() {
      $('#tavar2').toggle('fold', 1000);
    });

    $( "#nazadclicke" ).on( "click", function() {
      $('#tavar2').toggle('fold', 1000);
    });

    $(document).ready(function(){
      let _token   = $('meta[name="csrf-token"]').attr('content');
      fetch_customer_data();
      function fetch_customer_data(query = '')
      {
          $.ajax({
              url:"{{ route('tavar_tip') }}",
              method:'GET',
              data:{query:query},
              dataType:'json',
              success:function(data)
              {
                $('#tavar_tip').html(data.table_data);
              }
          })
      }

      fetch_customer_data2();
      function fetch_customer_data2(query = '')
      {
          $.ajax({
              url:"{{ route('tavar') }}",
              method:'GET',
              data:{query:query},
              dataType:'json',
              success:function(data)
              {
                $('#tavarlar').html(data.table_data);
              }
          })
      }

      $(document).on('click', "#vse", function(){
        let _token  = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
              url:"{{ route('tavarvse') }}",
              method:'GET',
              data:{
                _token: _token
              },
              dataType:'json',
              success:function(data)
              {
                $('#tavarlar').html(data.output);
                fetch_customer_data();
                fetch_customer_data2(data);
                var foo =100 * data.foo2.dateitog / data.foo2.opshi;
                $("#tavarshtuk").val(data.foo2.tavarshtuk);
                $("#shtuk").val(data.foo2.shtuk);
                $("#foiz").val(foo);
                $("#dateitog").val(data.foo2.dateitog);
              }
          })
        });

      $(document).on('click', "#data", function(){
        var id = $(this).data("id");
        $.ajax({
              url:"{{ route('tavar') }}",
              method:'GET',
              data:{
                id: id
              },
              dataType:'json',
              success:function(data)
              {
                $('#tavarlar').html(data.output);
                fetch_customer_data();
                fetch_customer_data2(data);
                var foo =100 * data.foo2.dateitog / data.foo2.opshi;
                $("#tavarshtuk").val(data.foo2.tavarshtuk);
                $("#shtuk").val(data.foo2.shtuk);
                $("#foiz").val(foo);
                $("#dateitog").val(data.foo2.dateitog);
              }
          })
        });

        $(document).on('change', "#date", function(e) {
          e.preventDefault();
          let _token  = $('meta[name="csrf-token"]').attr('content');
          var date = $("#date").val();
          var date2 = $("#date2").val();
            $.ajax({
              url: "{{ route('search') }}",
              method: "POST",
              data:{
                date: date,
                date2: date2,              
                _token: _token
              },
              dataType:'json',
              success:function(data){
                $('#tavarlar').html(data.output);
                fetch_customer_data();
                var foo =100 * data.foo2.dateitog / data.foo2.opshi;
                $("#tavarshtuk").val(data.foo2.tavarshtuk);
                $("#shtuk").val(data.foo2.shtuk);
                $("#foiz").val(foo);
                $("#dateitog").val(data.foo2.dateitog);
              }
            });
        });

        $(document).on('change', "#date2", function(e) {
          e.preventDefault();
          let _token  = $('meta[name="csrf-token"]').attr('content');
          var date = $("#date").val();
          var date2 = $("#date2").val();
            $.ajax({
              url: "{{ route('search') }}",
              method: "POST",
              data:{
                date: date,
                date2: date2,              
                _token: _token
              },
              dataType:'json',
              success:function(data){
                $('#tavarlar').html(data.output);
                fetch_customer_data();
                var foo =100 * data.foo2.dateitog / data.foo2.opshi;
                $("#tavarshtuk").val(data.foo2.tavarshtuk);
                $("#shtuk").val(data.foo2.shtuk);
                $("#foiz").val(foo);
                $("#dateitog").val(data.foo2.dateitog);
              }
            });
        });
    });

  function editPost3(id) {
    $.ajax({
      url: "{{ route('edit4') }}",
      type: "GET",
      data: {
        id: id
      },
      success: function(response) {
          $("#ichki_id").val(response.ichkitavar_id);
          $("#raqam2").val(response.raqam);
          $("#hajm2").val(response.hajm);
          $("#summa12").val(response.summa);
          $("#summa22").val(response.summa2);
          $("#summa223").val(response.summa3);
          $('#updates2').modal('show');
      }
    });
  }

  $('#TavarFormTable').on('submit', function(e) {
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
          toastr.success(data.msg);
          location.reload(true);
        }
        if(data.code == 0){
          $.each(data.error, function(prefix, val){
            $(form).find('span.'+prefix+'_error').text(val[0]);
          });
          toastr.error(data.msg);
        }      
      }
    });
  });

  $('#updates').on('submit', function(e) {
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
        if(data.code == 0){
          $.each(data.error, function(prefix, val){
            $(form).find('span.'+prefix+'_error').text(val[0]);
          });
          toastr.error(data.msg);
        }
        if(data.code == 201){
          toastr.success(data.msg);
          location.reload(true);
        }
      }
    });
  });
  
  function deletePost3(id) {
    $("#iddel").val(id);
    $('#tavar2delete').modal('show');
  }

  function deleet() {
    var id = $("#iddel").val();
    let _url = `delete3/${id}`;
    let _token   = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
      url: _url,
      type: 'POST',
      data: {
        _token: _token
      },
      success: function(data) {
        $("#row_"+id).remove();
        $('#tavar2delete').modal('hide');
        toastr.success(data.msg);
        location.reload(true);
      }
    });
  }

  function tiklash(id){
      let _url = `tiklash/${id}`;
      let _token   = $('meta[name="csrf-token"]').attr('content');
      $.ajax({
        url: _url,
        type: 'POST',
        data: {
          _token: _token
        },
        success: function(data) {
          $("#row2_"+id).remove();
          toastr.success(data.msg);
          location.reload(true);
        }
      });
    }
    function deletePro3(id) {
      $("#iddelsss").val(id);
      $('#tavar2delete2').modal('show');
    }

  function deleetemnu() {
    var id = $("#iddelsss").val();
    let _url = `deleetemnu/${id}`;
    let _token   = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
      url: _url,
      type: 'POST',
      data: {
        _token: _token
      },
      success: function(data) {
        $("#row2_"+id).remove();
        $('#tavar2delete2').modal('hide');
        toastr.success(data.msg);
      }
    });
  }
  </script>

@endsection