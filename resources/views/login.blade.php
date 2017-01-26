@extends('layouts/master')

	@section ('body')
	<div class="container">
		<div class="col s12 m6 ">
          <div class="card grey darken-2">
            <div class="card-content white-text">
              <span class="card-title">Login</span>
              <br />
              @if(isset($error))
              		<div class="chip">
					   Username or password is invalid
					</div>
              @endif
              
              <form action="/" method="post" class="col s12">
              		<input type="hidden" name="_token" value="{{csrf_token()}}" />
				      
				      <div class="row">
				        <div class="input-field col s12">
				        	<label for="email">Email</label>
				          	<input id="email" name="email" type="email"  class="validate">
				        </div>
				      </div>
				      <div class="row">
				        <div class="input-field col s12">
				          <input id="password" name="password" type="password" class="validate" >
				          <label for="password">Password</label>
				        </div>
				      </div>
				      <div class="row">
				      	<input type="submit" name="submit" class="waves-effect waves-light green btn" value="Login" />
				      </div>
              </form>
            </div>
          </div>
      </div>
	</div>

	@stop
