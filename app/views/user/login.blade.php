<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>{{ Config::get('app.sitetitle') }} : Login</title>

   @include('assets.styles')
</head>
<body class="user-login">

   @include('partials.topbar')

   <div class="login-form">
      <div class="container">
         <div class="col-md-4 col-md-offset-4">
            <div class="row">
               <div class="col-sm-6 col-sm-offset-3 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
                  <div class="row">
                     <h5><i class="glyphicon glyphicon-log-in"></i> LOG IN</h5>
                     <hr>
                     {{ Form::open(["url" => route("user.login"), 'method' => 'post', 'class' => 'form-vertical']) }}
                        <div class="form-group">
                           <div class="input-group">
                              <span class="input-group-addon"><i class="fi-at-sign"></i></span>
                              {{ Form::text('email', '', ['class' => 'form-control input-sm', 'placeholder' => 'Email']) }}
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="input-group">
                              <span class="input-group-addon"><i class="fi-key"></i></span>
                              {{ Form::password('password', ['class' => 'form-control input-sm', 'placeholder' => 'Password']) }}
                           </div>
                        </div>
                        <div class="form-group text-right">
                           <button class="btn btn-info" type="submit">
                              <i class="glyphicon glyphicon-log-in"></i>
                              <i class="hidden fa fa-gear fa-spin"></i>
                              <i class="hidden fa fa-check"></i> Log In</button>
                        </div>
                     {{ Form::close() }}

                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   @include('assets.scripts')

   <script type="text/javascript">
   $(function(){
      $("form button").on('click', function(ev){
         ev.preventDefault(true);

         $.ajax({
            url: '{{ route('user.login') }}',
            data: $('form').serialize(),
            dataType: 'jsonp',
            type: 'post',
            beforeSend: function(){
               $('form i.glyphicon-log-in').addClass('hidden');
               $('form i.fa-gear').removeClass('hidden');
            }
         })
         .fail(function(xhr, textStatus, thrownError){
            console.log(xhr);
            console.log(textStatus);
            console.log(thrownError);
         })
         .done(function(data, xhr, textStatus){
            $('form i.glyphicon-log-in').addClass('hidden');
            $('form i.fa-gear').addClass('hidden');
            console.log(data.status);
            if(data.status == 'success') {
               $('form i.fa-check').removeClass('hidden');
               window.location.reload();
            } else {
               $('form i.fa-gear').addClass('hidden');
               $('form i.fa-check').addClass('hidden');
               $('form i.glyphicon-log-in').removeClass('hidden');
            }
         });
      });
   });
   </script>
</body>
</html>
