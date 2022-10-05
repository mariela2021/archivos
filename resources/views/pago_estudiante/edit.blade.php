@extends('layouts.app',['activePage' => 'estudiante', 'titlePage' => 'Editar Postgraduante'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row" style="margin-left: 10%">
                <div class="col-md-11">
                    <form action="{{ route('pago_estudiante.update',$estudiante->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <label for="nombre" class="col-sm-2 col-form-label"><b>Nombre del Programa:</b></label>
                                <div class="col-sm-7">
                                    <select name="programa_id" id="_programa" class="form-control">
                                        <option disabled selected>Seleccione el Programa</option>
                                        @foreach ($programas as $programa)
                                            <option value="{{$programa->id}}">{{$programa->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <label for="modulos" class="col-sm-2 col-form-label"><b>Cantidad de Modulos:</b></label>
                                <div class="col-sm-7">
                                    <input type="number" class="form-control"
                                    name="cant_modulos"
                                    >
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <label for="nombre" class="col-sm-2 col-form-label"><b>Nombre del Descuento:</b></label>
                                <div class="col-sm-7">
                                    <select name="tipo_descuento_id" id="_descuento" class="form-control">
                                        <option disabled selected>Seleccione el Tipo de Descuento</option>
                                        @foreach ($descuentos as $descuento)
                                            <option value="{{$descuento->id}}">{{$descuento->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <label for="modulos" class="col-sm-2 col-form-label"><b>Convalidacion:</b></label>
                                <div class="col-sm-7">
                                    <input type="number" class="form-control"
                                    name="convalidacion"
                                    value="">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit"class="btn btn-primary">
                                <b>Guardar Datos</b>                                 
                            </button>
                            <a href="{{route('pago_estudiante.index')}}" class="btn btn-primary"><b>Cancelar</b></a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection