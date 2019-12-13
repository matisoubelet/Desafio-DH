@extends('plantilla')

@section('principal')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>

<ul>
  @foreach($titulos as $titulo)
    <li>
      <h3>  <a href="/peliculas/{{$titulo->id}}"></a> {{$titulo->title}} </h3>
    </li>
    @endforeach
</ul>





@endsection
