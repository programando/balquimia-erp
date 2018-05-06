<!DOCTYPE html>
<html>
<head>

  @include('adminLayout.metas')
  @include('adminLayout.files-css')

</head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-6 CentrarCol">
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> {{ trans('_app.pass_remember_title_msg_ok') }}</h4>
            <p class="text-justify">{!! trans('_app.pass_remember_text_ok',['email'=>$email]) !!}</p>
          </div>

          <a  class ="btn btn-success pull-right" href="{{ route('login') }}"> {{ trans('_app.btn_cerrar') }}</a>
        </div>
      </div>
    </div>
  </body>
</html>
