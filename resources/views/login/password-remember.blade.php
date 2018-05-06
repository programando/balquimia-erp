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
     <div class="row">
       <div class="col-sm-12">
         @include('_app.alerts.errors')
       </div>
     </div>
    <!-- /.login-logo -->
    <div class="login-box-body text-justify">
      <p class="login-box-msg">A través de este proceso enviaremos las indicaciones para que, desde su cuenta de correo electrónico, pueda asignar una nueva contraseña.</p>

      {!! Form::open( ['url'=> route('reset-password'),  ] ) !!}

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

      <div class="row">
        <div class="col-xs-12">
          {!! Form::submit('Enviar correo electrónico', ['class'=>'btn pull-right alert-danger']) !!}
        </div>
      </div>

    {!! Form::close() !!}

</div>  <!-- /.login-box-body -->




  </div>

  @include('adminLayout.files-js')


</body>




</html>

