<!DOCTYPE html>
<html>

<head>

  @include('adminLayout.metas')
  @include('adminLayout.files-css')
</head>

<body class="login-page bg-grey">

  <div class="login-box">
    <div class="login-logo">
      <a href=   "{{ route( 'login' )}}"> <b> {{ trans('_app.EMPRESA') }}-ERP</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Ingrese sus datos para ingreso al sistema</p>

      {!! Form::open( ['url'=> route('login'),  ] ) !!}

      <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' :'' }}">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <div >
          {!! Form::text('email', null,[
            'class'       => 'form-control', 'placeholder' => 'E-mail', 'autofocus'
          ])
          !!}
        </div>
        {!! $errors->first('email', '<label class=error><i class="fa  fa-hand-o-right"></i>&nbsp;:message</label>') !!}
      </div>


      <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' :'' }}">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <div class="form-line">
          {!! Form::password('password', [
            'class'       => 'form-control', 'placeholder' => 'Password o contraseña',
          ])
          !!}
        </div>
        {!! $errors->first('password', '<label class=error><i class="fa  fa-hand-o-right"></i>&nbsp;:message</label>') !!}
      </div>
      <div class="row">


        <div class="col-xs-6 " >
          <div class=""  >
            <input type="checkbox" name='remember_me' checked="checked">
            <label>No cerrar mi sesión</label>
          </div>

        </div>
      </div>

      <div class="row">
        <div class="col-xs-1">
        </div>
        <div class="col-xs-11 ">
          <a href="{{ route( 'password.reset.show.form' )}}">No tengo contraseña u olvidé la que tenía, quiero asignar una para ingreso a mi cuenta.</a><br>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12">
          {!! Form::submit('Ingresar al sistema', ['class'=>'btn pull-right bg-red waves-effect']) !!}
        </div>
      </div>

      <br>
      <blockquote >
        <div class="row">
          <div class="col-xs-12">
            <div class="frase text-justify">
              <p> {{ $Frase }}</p>
            </div>
            <small class="frase font-bold pull-right"><b>{{ $Autor }}</b></small>
          </div>
        </div>
      </blockquote>

    {!! Form::close() !!}

    </div>  <!-- /.login-box-body -->

  </div>

  @include('adminLayout.files-js')
  <script>
    $(document).ready(function(){
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square',
        increaseArea: '20%' // optional
        });
    });
  </script>

</body>


</html>


