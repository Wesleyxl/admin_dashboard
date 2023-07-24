@extends('layouts.dashboard')
@section('content')
@section('title', 'Perfil')
@section('a-profile', 'active')

@if (session('success'))
    <script>
        var click = 0;
        setInterval(() => {
            if (click == 0) {
                $("#modal-success").trigger('click');
                click = 1;
            }
        }, 0);
    </script>
@endif
@if (session('warning'))
    <script>
        var click = 0;
        setInterval(() => {
            if (click == 0) {
                $("#modal-warning").trigger('click');
                click = 1;
            }
        }, 0);
    </script>
@endif
@if (session('error'))
    <script>
        var click = 0;
        setInterval(() => {
            if (click == 0) {
                $("#modal-error").trigger('click');
                click = 1;
            }
        }, 0);
    </script>
@endif

<style>
    .img-circle {
        max-width: 160px;
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard-home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Perfil de usuário</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                @if (Auth::user()->image == null)
                                    <img src="{{ URL::to('/dist/img/user2-160x160.jpg') }}"
                                        class="img-circle elevation-2" alt="User Image">
                                @else
                                    <img src="{{ URL::to(Auth::user()->image) }}" class="img-circle elevation-2"
                                        alt="User Image">
                                @endif
                            </div>

                            <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

                            <p class="text-muted text-center">{{ Auth::user()->company }}</p>

                            <p class="text-center"><i><u>Modifique os campos para realizar as alterações</u></i></p>
                            <form class="form-horizontal" method="POST" enctype="multipart/form-data"
                                action="{{ route('dashboard-profile-update') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Nome</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="name" name="name"
                                            class="form-control @error('name') is-invalid

                                        @enderror"
                                            value="{{ Auth::user()->name }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" id="email" name="email"
                                            class="form-control @error('email')
                                            is-invalid
                                        @enderror"
                                            id="email" value="{{ Auth::user()->email }}">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="company" class="col-sm-2 col-form-label">Empresa</label>
                                    <div class="col-sm-10">
                                        <input id="company" name="company" type="text"
                                            class="form-control @error('company')
                                            is-invalid
                                        @enderror"
                                            value="{{ Auth::user()->company }}">
                                        @error('company')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-sm-2 col-form-label">Senha</label>
                                    <div class="col-sm-10">
                                        <input id="password" name="password" type="password"
                                            class="form-control @error('password')
                                            is-invalid
                                        @enderror"
                                            placeholder="Digite sua senha">
                                        <small class="text-warning">Caso não for mudar a senha, manter o campo
                                            vazio</small>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="file" class="col-sm-2 col-form-label">Imagem de perfil</label>
                                    {{-- <div class="custom-file"> --}}
                                    <div class="col-sm-10">
                                        <input type="file" class="custom-file-input" id="file" name="file">
                                        <label class="custom-file-label" for="file">Escolher imagem</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary">Editar Perfil</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- modal success -->
<button type="button" id="modal-success" style="opacity: 0" class="btn btn-primary" data-toggle="modal"
    data-target="#exampleModal">
    Launch demo modal
</button>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-success" id="exampleModalLabel"><strong>Sucesso!</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p> {{ session('success') }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->
<!-- modal warning -->
<button type="button" id="modal-warning" style="opacity: 0" class="btn btn-primary" data-toggle="modal"
    data-target="#exampleModalWarning">
    Launch demo modal
</button>
<div class="modal fade" id="exampleModalWarning" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-warning" id="exampleModalLabel"><strong>Atenção!</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p> {{ session('warning') }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->
<!-- modal error -->
<button type="button" id="modal-error" style="opacity: 0" class="btn btn-primary" data-toggle="modal"
    data-target="#exampleModalError">
    Launch demo modal
</button>
<div class="modal fade" id="exampleModalError" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="exampleModalLabel"><strong>Error!</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p> {{ session('error') }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->
@endsection
