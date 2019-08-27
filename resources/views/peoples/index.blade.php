@extends('layouts.page')
@section('content')
<div class="peoples">
    <div class="container">
        <form class="mb-3 jumbotron" action="{{route('peoples.store')}}" method="post">
            <h3>Cadastro de Pessoas</h3>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group {{ $errors->has('fullname') ? 'has-error' : '' }}">
                <label for="fullname">Nome Completo</label>
                <input type="text" class="form-control" name="fullname" id="fullname" required>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="phone">Telefone</label>
                    <input-phone name="phone" classis="form-control" required="true"></input-phone>
                </div>
            </div>
            <filter-cities url-states="{{route('api-states')}}" url-cities="{{route('api-cities')}}"></filter-cities>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
        <div class="jumbotron">
            <h3>Lista de Pessoas</h3>
            @if(count($peoples)>0)
            <table class="table table-striped table-responsive-lg">
                <thead>
                    <tr>
                        <th scope="col">Nome Completo</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Celular</th>
                        <th scope="col">Cidade/UF</th>
                        <th scope="col">Cadastrado em</th>
                        <th scope="col"></th>
                    </tr>
                </thead>

                <tbody class="table">
                    @foreach($peoples as $people)
                    <tr>
                        <td>
                            {{$people->fullname}}
                        </td>
                        <td>
                            {{$people->email}}
                        </td>
                        <td>
                            {{$people->phone}}
                        </td>
                        <td>
                            {{$people->location}}
                        </td>
                        <td>
                            {{$people->created_at_pt}}
                        </td>
                        <td>
                            <button-delete url="{{route('peoples.destroy', ['people'=>$people->id])}}">
                            </button-delete>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                Nenhuma pessoa cadastrada até o momento...
            @endif
        </div>
    </div>
</div>
@endsection