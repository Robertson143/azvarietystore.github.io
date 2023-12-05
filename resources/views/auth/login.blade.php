<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Login | {{ config('app.name') }}</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/favicon.png') }}">
    <!-- CoreUI CSS -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<style>
  .gradient-custom-2 {
/* fallback for old browsers */
background: #fccb90;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

border-radius: 10px 25px;
}

@media (min-width: 768px) {
.gradient-form {
height: 100vh !important;
}
}
@media (min-width: 769px) {
.gradient-custom-2 {
border-top-right-radius: .3rem;
border-bottom-right-radius: .3rem;
}

}

.form-outline {
    display: flex;
    align-items: center;
}

.form-outline .eye-icon {
    width: 15px;
    cursor: pointer;
    position: absolute;
    right: 2%; /* Position the image to the right within the password input field */
    top: 50%; /* Center the image vertically */
    transform: translateY(-50%); /* Adjust for vertical centering */
}
   </style>
   <section class="h-100 gradient-form" style="background-color: #cbcefb">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black" style="border-radius: 35px;">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">
                <div class="text-center">
                    <img width="50" src="{{ asset('images/Logo.png') }}" alt="Logo"> 
                  <h3 class="mt-3 mb-3 pb-1">Sign in</h3>
                </div>

                <form method="post" action="{{ url('/login') }}">
                            @csrf
                  <p>Please sign in to your account</p>

                  <div class="form-outline mb-3">
                  <input type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}"
                                       placeholder="example@gmail.com">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                   <!-- <label class="form-label" for="form2Example11">Username</label> -->
                  </div>

                  <div class="form-outline mb-4 position-relative">
                              <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    placeholder="•••••••" name="password" id="password">
                              <img src="{{ asset('images/eye-close.png') }}" id="eyeicon" class="eye-icon">
                              @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                   <!-- <label class="form-label" for="form2Example22">Password</label> -->
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <button class="btn btn-primary btn-block mb-3" type="submit" style="border-radius: 10px 35px;">Sign in</button>
                    <a class="text-muted" href="{{ route('password.request') }}">Forgot password?</a>
                  </div>

                <!--  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">Don't have an account?</p>
                    <button type="button" class="btn btn-outline-danger">Create new</button>
                  </div> -->

                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center bg-primary" style="background-image: url('{{ asset('images/azvariety.jpg') }}'); background-size: cover;">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
               <!-- <h4 class="mb-4">AZ Variety Store</h4>
                <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                  exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CoreUI -->
<script src="{{ mix('js/app.js') }}" defer></script>
<script src="{{ asset('vendor/types/typed.umd.js') }}"></script>


</body>
</html>

<script>
  let section = document.querySelector("section"),
  icons = document.querySelector(".icons");
  icons.onclick = ()=>{
    section.classList.toggle("dark");
  }
  // creating a function and calling it in every seconds
  setInterval(()=>{
    let date = new Date(),
    hour = date.getHours(),
    min = date.getMinutes(),
    sec = date.getSeconds();
    day = date.getDate(),
    month = date.getMonth(), // Months are 0-indexed
    year = date.getFullYear();

    let d;
    d = hour < 12 ? "AM" : "PM"; //if hour is smaller than 12, than its value will be AM else its value will be pm
    hour = hour > 12 ? hour - 12 : hour; //if hour value is greater than 12 than 12 will subtracted ( by doing this we will get value till 12 not 13,14 or 24 )
    hour = hour == 0 ? hour = 12 : hour; // if hour value is  0 than it value will be 12
    // adding 0 to the front of all the value if they will less than 10
    hour = hour < 10 ? "0" + hour : hour;
    min = min < 10 ? "0" + min : min;
    sec = sec < 10 ? "0" + sec : sec;

    const monthNames = [
      "January", "February", "March", "April", "May", "June",
      "July", "August", "September", "October", "November", "December"
    ];

    // Convert date components to words
    const dateWords = `${monthNames[month]} ${day}, ${year}`;

    document.querySelector(".hour_num").innerText = hour;
    document.querySelector(".min_num").innerText = min;
    document.querySelector(".sec_num").innerText = sec;
    document.querySelector(".am_pm").innerText = d;
    document.querySelector(".date_words").innerText = dateWords;
  }, 1000); // 1000 milliseconds = 1s
  </script>

<script>
    let eyeicon = document.getElementById("eyeicon");
    let password = document.getElementById("password");

    eyeicon.onclick = function () {
        if (password.type == "password") {
            password.type = "text";
            eyeicon.src = "{{ asset('images/eye-open.png') }}";
        } else {
            password.type = "password";
            eyeicon.src = "{{ asset('images/eye-close.png') }}";
        }
    }

    // Check if the password input is empty or not
    password.addEventListener("input", function () {
        if (password.value.trim() === "") {
            // Password is empty, hide the eye icon
            eyeicon.style.display = "none";
        } else {
            // Password is not empty, show the eye icon
            eyeicon.style.display = "block";
        }
    });
</script>





<!--
<style>
  .gradient-custom-2 {
/* fallback for old browsers */
background: #fccb90;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
}

@media (min-width: 768px) {
.gradient-form {
height: 100vh !important;
}
}
@media (min-width: 769px) {
.gradient-custom-2 {
border-top-right-radius: .3rem;
border-bottom-right-radius: .3rem;
}
}
   </style>
   <section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp"
                    style="width: 185px;" alt="logo">
                  <h4 class="mt-1 mb-5 pb-1">We are The Lotus Team</h4>
                </div>

                <form>
                  <p>Please login to your account</p>

                  <div class="form-outline mb-4">
                    <input type="email" id="form2Example11" class="form-control"
                      placeholder="Phone number or email address" />
                    <label class="form-label" for="form2Example11">Username</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" id="form2Example22" class="form-control" />
                    <label class="form-label" for="form2Example22">Password</label>
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="button">Log
                      in</button>
                    <a class="text-muted" href="#!">Forgot password?</a>
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">Don't have an account?</p>
                    <button type="button" class="btn btn-outline-danger">Create new</button>
                  </div>

                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">We are more than just a company</h4>
                <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                  exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

-->