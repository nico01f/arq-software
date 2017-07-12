@extends('layouts.layout_login')

@section('title', 'Página no encontrada')

@section('content')
    <div class="x_panel">
        <div class="x_title">
            <h1>Error 404</h1>
        </div>
        <div class="x_content">
            <p class="span12 text-center">
              Página no encontrada!
            </p>

            <div class="row">
              <img src="http://mmhqllc.com/wp-content/uploads/2014/04/Medical-Management-Services-Medical-Practice-Improvement.jpg" class="img-rounded center-block" alt="Responsive image">
            </div>
            <div class="span12 text-center">
                <div class="btn-group"><!-- 
                    <a href="{{ route('auth/login') }}" type="button" class="btn btn-lg btn-success">Iniciar sesión</a> -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
