@extends('layouts.dashboard')
@section('title', 'Contatos Cadastro')
@section('a-contact', 'active')
@section('li-contact', 'active')
@section('ul-contact', 'menu-open')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Cadastro</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard-home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Cadastro</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <a href="{{ route('dashboard-contact') }}" class="btn btn-primary btn-block mb-3">Voltar aos
                            contatos</a>
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Labels</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <ul class="nav nav-pills flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="{{ route('dashboard-contact-label', ['label' => 'important']) }}">
                                            <i class="far fa-circle text-danger"></i>
                                            Importante
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="{{ route('dashboard-contact-label', ['label' => 'compliment']) }}">
                                            <i class="far fa-circle text-success"></i>
                                            Elogios
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="{{ route('dashboard-contact-label', ['label' => 'service']) }}">
                                            <i class="far fa-circle text-primary"></i>
                                            Serviços
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="{{ route('dashboard-contact-label', ['label' => 'complaint']) }}">
                                            <i class="far fa-circle text-warning"></i>
                                            Reclamações
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="{{ route('dashboard-contact-label', ['label' => 'other']) }}">
                                            <i class="far fa-circle text-secondary"></i>
                                            Outros
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <form action="{{ route('dashboard-contact-store') }}" method="POST">
                            @csrf

                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">Cadastrar novo contato</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Titulo</label>
                                        <input id="title" name="title"
                                            class="form-control @error('title') is-invalid @enderror" placeholder="Titutlo:"
                                            value="{{ $contact['title'] }}">
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="subject">Assunto</label>
                                        <input id="subject" name="subject"
                                            class="form-control @error('subject') is-invalid @enderror"
                                            placeholder="Assunto:" value="{{ $contact['subject'] }}">
                                        @error('subject')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input id="name" name="name"
                                            class="form-control @error('name') is-invalid @enderror" placeholder="Nome:"
                                            value="{{ $contact['name'] }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror" placeholder="Email:"
                                            value="{{ $contact['email'] }}">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="text">Text</label>
                                        <textarea id="compose-textarea-contato" name="text" class="form-control" placeholder="Digite seu texto">{{ $contact['text'] }}</textarea>
                                    </div>
                                    @error('text')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-success">
                                            <i class="far fa-envelope"></i>
                                            Salvar
                                        </button>
                                    </div>
                                    <a href="{{ route('dashboard-contact-delete', ['id' => $contact['id']]) }}"
                                        class="btn btn-danger">
                                        <i class="fas fa-times"></i>
                                        Apagar
                                    </a>
                                </div>
                                <!-- /.card-footer -->
                            </div>
                        </form>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
