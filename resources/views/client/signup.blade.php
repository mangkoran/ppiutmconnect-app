@extends('client.layout.nonav')
@section('title', 'Sign-up')
@section('content')
<section id="authSection">
    <div class="main-container sign-up-mode">
      <div class="auth-container">
        <div class="auth">
          <form action="#" class="sign-in-form">
            <img class="form-logo" src="assets/icon/apple-icon-114x114.png" alt="">
            <h2 class="title">Sign in</h2>
            <div class="input-div">
              <i class="fas fa-user"></i>
              <input type="text" name="matricNo" placeholder="Matric No" />
            </div>
            <div class="input-div">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" />
            </div>
            <input type="submit" value="Login" class="btn btn-std mt-3 px-5 py-2" />
          </form>
          <form action="#" class="sign-up-form">
            <img class="form-logo" src="assets/icon/apple-icon-114x114.png" alt="">
            <h2 class="title">Sign up</h2>
            <div class="input-div">
              <i class="fas fa-user"></i>
              <input type="text" name="matricNo" placeholder="Matric No" />
            </div>
            <div class="input-div">
              <i class="fas fa-id-badge"></i>
              <input type="text" name="name" placeholder="Name" />
            </div>
            <div class="input-div">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" placeholder="Email" />
            </div>
            <div class="input-div">
              <i class="fas fa-school"></i>
              <input type="email" name="batch" placeholder="Batch" />
            </div>
            <div class="input-div">
              <i class="fas fa-university"></i>
              <input type="email" name="progCode" placeholder="Program Code" />
            </div>
            <div class="input-div">
              <i class="fas fa-graduation-cap"></i>
              <input type="email" name="degree" placeholder="Degree" />
            </div>
            <div class="input-div">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" />
            </div>
            <input type="submit" class="mt-3 btn btn-std px-5 py-2" value="Sign up" />
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Don't have an account yet?</h3>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
              ex ratione. Aliquid!
            </p>
            <button class="btn btn-std px-5 py-2" id="sign-up-btn">
              Sign up
            </button>
          </div>
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Already have an account?</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
              laboriosam ad deleniti.
            </p>
            <button class="btn btn-std px-5 py-2" id="sign-in-btn">
              Sign in
            </button>
          </div>
        </div>
      </div>
    </div>
    </section>

@endsection