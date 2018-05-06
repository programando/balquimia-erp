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
    <div class="login-box-body text-justify">
      <h4>
      <p class="login-box-msg"> {{ trans('_app.pass_remember_title') }}</p>
      </h4>
    {!! Form::open( ['url'=> route( 'update-password' ), 'method'=>'POST' ] ) !!}
            {!! Form::hidden('token',$token ) !!}
            {!! Form::hidden('email',$email ) !!}


      <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' :'' }}">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
       {!! Form::password('password', [
           'class'       => 'form-control', 'placeholder' => 'Password o contraseña',
         ])
       !!}
        {!! $errors->first('password', '<label class=error><i class="fa  fa-hand-o-right"></i>&nbsp;:message</label>') !!}
      </div>

        <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' :'' }}">
           <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                 {!! Form::password('password_confirmation', [
                     'class'       => 'form-control', 'placeholder' => trans('_app.passw_placeholder_confirma'),
                   ])
                 !!}
           {!! $errors->first('password_confirmation', '<label class=error>:message</label>') !!}
       </div>

        <div class="col-xs-5 pull-right">
            {!! Form::submit(trans('_app.btn_reset_password'), ['class'=>'btn btn-block alert-danger ']) !!}
        </div>
      <br>
      <br>
    {!! Form::close() !!}

  </div>
</div>

  @include('adminLayout.files-js')


</body>



</html>





