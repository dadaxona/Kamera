@extends('welcome')
@section('content')
<div class="tab-content card">
    <div class="tab-pane active" id="home7" role="tabpanel" aria-expanded="true">
    <div class="card">
      <form action="{{ route('sinimayt') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-success m-2">Кабул килиш</button>
      </form>
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
                </tr>
            </thead>
            <tbody>
                @foreach ($jonatil as $item)
                <tr>
                    <td>{{ $item->tavar->name }}</td>
                    <td>{{ $item->adress }}</td>
                    <td>{{ $item->tavar2->name }}</td>
                    <td>{{ $item->hajm }}</td>
                    <td>{{ $item->summa }}</td>
                    <td>{{ $item->summa2 }}</td>
                    <td>{{ $item->summa3 }}</td>
                    <td>{{ $item->updated_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
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

<script>

$( function() {
  $( "#tavarlar" ).selectable();
} );

 
  </script>

@endsection