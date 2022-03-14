<x-app-layout>
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="fa-sitemap fa fa-fwr"></i>
                </div>
                <div>Roles </div>
            </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                    <a href="{{route('roles.listar')}}" type="button"  aria-haspopup="true" aria-expanded="false" class="btn btn-primary">
                        <i class="fa fa-list-ol fa-w-20"></i> Listado de Roles
                    </a>
                </div>
            </div>
        </div> 
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">Editar Role</div>
                <div class="card-body">
                    <x-alerta-component />
                    {!! Form::open(['url' => '/roles/'.$role->id.'/PostEditRole','autocomplete' => 'off']) !!}
                        <div class="col-12 mb-4">
                            <div class="form-group row">
                                <label for="nombre" class="col-form-label">Nombre:</label>
                                <div class="col-12">
                                    {!! Form::text('nombre', $role->nombre, ['id'=>'nombre','class' => 'form-control','placeholder'=>'Ingrese el nombre del rol','disabled'])!!}
                                    @error('nombre')<x-validate-error :message="$message"/>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach (Helper::Permisos() as $key => $value)
                                <div class="col-md-3">
                                    <div class="card bg-light mb-3" style="height: 100%;">
                                        <div class="card-header">
                                            {!! $value['icon'] !!}  {{ $value['title'] }}
                                        </div>
                                        <div class="card-body">
                                            @foreach ($value['key'] as $k => $v)
                                            <div class="form-check">
                                                <input type="checkbox" value="true" name="{{ $k }}" id="{{ $k }}" class="form-check-input" id="{{ $k }}" @if(Helper::Permisos($role->permisos,$k)) checked @endif>
                                                <label for="{{ $k }}" class="form-check-label">{{ $v }}</label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {!! Form::submit('Acualizar',['class' => 'mt-5 btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>