@extends('layouts.dashboard')
@section('title', 'Contatos')
@section('a-contact', 'active')
@section('li-contact', 'active')
@section('ul-contact', 'menu-open')
@section('content')


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

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Inbox</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Todos os contatos</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-3">
                    <a href="{{ route('dashboard-contact-create') }}" class="btn btn-primary btn-block mb-3">Cadastrar</a>

                    {{-- <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Pastas</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item active">
                                    <a href="{{ route('dashboard-contact') }}" class="nav-link">
                                        <i class="fas fa-inbox"></i> Todos
                                    </a>
                                </li>
                                <li class="nav-item active">
                                    <a href="{{ route('dashboard-contact-unread') }}" class="nav-link">
                                        <i class="fas fa-inbox"></i> Não lidos
                                        <span class="badge bg-primary float-right">{{ count($unread) }}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('dashboard-contact-read') }}" class="nav-link">
                                        <i class="far fa-envelope"></i> Lidos
                                        <span class="badge bg-primary float-right">{{ count($read) }}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div> --}}
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
                                    <a class="nav-link" href="{{ route('dashboard-contact-label', ['label' => 'other']) }}">
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
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Todos os contatos</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm">
                                    <input type="text" class="form-control" placeholder="Search Mail">
                                    <div class="input-group-append">
                                        <div class="btn btn-primary">
                                            <i class="fas fa-search"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="table-responsive mailbox-messages">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>status</th>
                                            <th>Label</th>
                                            <th>Nome</th>
                                            <th>Titulo</th>
                                            <th>Assunto</th>
                                            <th>Data</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($unreads) > 0)
                                            @foreach ($unreads as $unread)
                                                <tr>
                                                    <td class="mailbox-star">
                                                        <a
                                                            href="{{ route('dashboard-contact-show', ['id' => $unread['id']]) }}"><i
                                                                class="fas fa-star text-warning"></i></a>
                                                    </td>
                                                    <td>
                                                        @if ($unread['label'] == 'service')
                                                            <i class="far fa-circle text-success"></i>
                                                        @elseif ($unread['label'] == 'compliment')
                                                            <i class="far fa-circle text-primary"></i>
                                                        @elseif ($unread['label'] == 'complaint')
                                                            <i class="far fa-circle text-danger"></i>
                                                        @else
                                                            <i class="far fa-circle text-secondary"></i>
                                                        @endif
                                                    </td>
                                                    <td class="mailbox-attachment">
                                                        <a
                                                            href="{{ route('dashboard-contact-show', ['id' => $unread['id']]) }}">{{ $unread['name'] }}</a>
                                                    </td>
                                                    <td class="mailbox-name"><a
                                                            href="{{ route('dashboard-contact-show', ['id' => $unread['id']]) }}">{{ $unread['title'] }}</a>
                                                    </td>
                                                    <td class="mailbox-subject"><a
                                                            href="{{ route('dashboard-contact-show', ['id' => $unread['id']]) }}">{{ $unread['subject'] }}</a>
                                                    </td>
                                                    <td class="mailbox-date">
                                                        {{ date('d/m/Y - H:i', strtotime($unread['created_at'])) }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        @if (count($reads) > 0)
                                            @foreach ($reads as $read)
                                                <tr>
                                                    <td class="mailbox-star">
                                                        <a
                                                            href="{{ route('dashboard-contact-show', ['id' => $read['id']]) }}"></a>
                                                    </td>
                                                    <td>
                                                        @if ($read['label'] == 'service')
                                                            <i class="far fa-circle text-success"></i>
                                                        @elseif ($read['label'] == 'compliment')
                                                            <i class="far fa-circle text-primary"></i>
                                                        @elseif ($read['label'] == 'complaint')
                                                            <i class="far fa-circle text-warning"></i>
                                                        @elseif ($read['label'] == 'important')
                                                            <i class="far fa-circle text-danger"></i>
                                                        @else
                                                            <i class="far fa-circle text-secondary"></i>
                                                        @endif
                                                    </td>
                                                    <td class="mailbox-attachment">
                                                        <a
                                                            href="{{ route('dashboard-contact-show', ['id' => $read['id']]) }}">{{ $read['name'] }}</a>
                                                    </td>
                                                    <td class="mailbox-name"><a
                                                            href="{{ route('dashboard-contact-show', ['id' => $read['id']]) }}">{{ $read['title'] }}</a>
                                                    </td>
                                                    <td class="mailbox-subject"><a
                                                            href="{{ route('dashboard-contact-show', ['id' => $read['id']]) }}">{{ $read['subject'] }}</a>
                                                    </td>
                                                    <td class="mailbox-date">
                                                        {{ date('d/m/Y - H:i', strtotime($read['created_at'])) }}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        @if (count($reads) < 1 && count($unreads) < 1)
                                            <td class="mailbox-date">Não há registro</td>
                                        @endif
                                    </tbody>
                                </table>
                                <!-- /.table -->
                            </div>
                            <!-- /.mail-box-messages -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer p-0">
                            <div class="mailbox-controls">
                                <div class="float-right">
                                    {{-- {{-- 1-50/200 --}}
                                    <div class="btn-group">
                                        {{ $reads->links('pagination::bootstrap-4') }}
                                    </div>
                                    <!-- /.btn-group -->
                                </div>
                                <!-- /.float-right -->
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
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
