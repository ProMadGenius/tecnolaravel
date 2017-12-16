@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">

            <div class="panel panel-default">

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    Seleccione Una Opcion
                </div>
            </div>

    </div>
</div>
@endsection
