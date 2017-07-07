@extends('layouts.layout_login')

@section('title', 'Login')

@section('content')
<div class="login">
  <a class="hiddenanchor" id="signup"></a>
  <a class="hiddenanchor" id="signin"></a>

  <div class="login_wrapper">
    <div class="animate form login_form">
      <section class="login_content">
        <form id="formLogin" action="">
          <h1>Login Form</h1>
          <div>
            <input type="text" class="form-control"  id="username" placeholder="Username" />
          </div>
          <div>
            <input type="password" class="form-control" id="password" placeholder="Password" />
          </div>
          <div>

          </div>
          </form>
          <button class="btn btn-primary" role="button" id="onLogin" >Login</button>
          <div class="clearfix"></div>

          <div class="separator">

            <div class="clearfix"></div>
            <br />

            <div>
              <h1><i class="fa fa-paw"></i> ???!</h1>
            </div>
          </div>

      </section>
    </div>
  </div>
</div>
