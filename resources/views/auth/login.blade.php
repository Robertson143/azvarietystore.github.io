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
    /* Add this CSS code to your existing styles */

    /* Center the entire content vertically and horizontally */
    .c-app {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-image: url('images/azvarietybackground.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
        background-size: cover;
    }

    /* Center the logo within the row */
    .row {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        background-size: 30%;
        background-repeat: no-repeat;
        background-position: center;

        
    }
    

/*@keyframes rotateImage {
             0%{
      transform: rotateX(0deg) rotateY(360deg) rotateZ(0deg);
    }
    100%{
      transform: rotateX(0deg) rotateY(0deg) rotateZ(0deg);
            }
        } */
        
section{
  min-height: 100vh;
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 0 20px;
  margin-top: -400px;
  
  
}
section.dark{
  background: #24292D;

}
section .container{
  margin-top: 370px;
  margin-left: 270px;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 420px;
  max-width: 45%;
  width: 100%;
  background: #fff;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  border-radius: 12px;
  position: relative;
}
section.dark .container{
  background: #323840;
}
section .container .icons i{
  position: absolute;
  right: 17px;
  top: 17px;
  height: 30px;
  width: 30px;
  background: #24292D;
  color: #fff;
  text-align: center;
  line-height: 30px;
  border-radius: 50%;
  font-size: 14px;
  cursor: pointer;
}
section.dark .container .icons i{
  background: #fff;
  color: #323840;
}
.container .icons i.fa-sun{
  opacity: 0;
  pointer-events: none;
}
section.dark .container .icons i.fa-sun{
  opacity: 1;
  pointer-events: auto;
  font-size: 16px;
}
section .container .time{
  margin-left: 1020px;
  margin-top: -400px;
  display: flex;
  align-items: center;
  
}
.container .time .time-colon{
  display: flex;
  align-items: center;
  position: relative;
}
.time .time-colon .am_pm{
  position: absolute;
  top: 0;
  right: -35px;
  font-size: 15px;
  font-weight: 500;
  letter-spacing: 1px;
}
section.dark .time .time-colon .am_pm{
  color: #fff;
}
.time .time-colon .time-text{
  height: 50px;
  width: 50px;
  display: flex;
  align-items: center;
  flex-direction: column;
  justify-content: center;
  background: #F0F8FF;
  border-radius: 6px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
}
section.dark .time .time-colon .time-text{
  background: #24292D;
}
.time .time-colon .time-text,
.time .time-colon .colon{
  font-size: 20px;
  font-weight: 450;
}
section.dark .time .time-text .num,
section.dark .time .colon{
  color: #fff;
}
.time .time-colon .colon{
  font-size: 40px;
  margin: 0 10px;
}
.time .time-colon .time-text .text{
  font-size: 10px;
  font-weight: 500;
  letter-spacing: 1px;
}
section.dark  .time .time-colon .text{
  color: #fff;
}

</style>


<body class="c-app flex-row"> 
<div class="container">
    <div class="row mb-3">
      <h3 style="margin-top: -185px; margin-left: 930px; text-shadow: 1px 1px violet; font-family: 'Times New Roman', serif;"> Philippine Time (PHT) </h4> 
    <h4 class="date" style="margin-left: -190px; margin-top: -120px; text-shadow: 1px 1px violet; font-family: 'Times New Roman', serif;">
      <span class="date_words"> January 1, 2023 </span> </h5>     
    <section>
    <div class="container">
      <div class="icons">
      
     <!--   <i class="fas fa-moon"></i>
        <i class="fas fa-sun"></i> -->
      </div>
      <div class="time" style="text-shadow: 1px 1px violet; font-family: 'Times New Roman', serif;">
        <div class="time-colon">
          <div class="time-text">
            <span class="num hour_num">08</span>
            <span class="text">Hours</span>
          </div>
          <span class="colon">:</span>
        </div>
        <div class="time-colon">
          <div class="time-text">
            <span class="num min_num">45</span>
            <span class="text">Minutes</span>
          </div>
          <span class="colon">:</span>
        </div>
        <div class="time-colon">
          <div class="time-text">
            <span class="num sec_num">06</span>
            <span class="text">Seconds</span>
          </div>
          <span class="am_pm">AM</span>
        </div>
  </div> 
    </div>
  </section>
      <!--  <h1> <span class="multiple-text text-muted" style="color: #0f001a; text-shadow: 2px 2px violet;"></span></h1> -->
     <!--   <div class="col-12 d-flex justify-content-center">
        </div> -->
    </div>
    <div class="row">
        <div class="{{ Route::has('register') ? 'col-md-8' : 'col-md-5' }}">
            @if(Session::has('account_deactivated'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('account_deactivated') }}
                </div>
            @endif
            <div class="card-group" style="margin-top: -445px; margin-left: -65px;">
                <div class="card p-4 border-10 shadow-xl" style="box-shadow: 0 3px 10px rgb(0 0 0 / 0.2); width: 1px; background: transparent;">
                    <div class="card-body" style="background: transparent;">
                        <form method="post" action="{{ url('/login') }}">
                            @csrf
                            <img width="50" src="{{ asset('images/Logo.png') }}" alt="Logo" style="margin-left: 175px; margin-top: -55px; position: absolute; animation: rotateImage 5s linear infinite;">
                            <h3 class="text-center" style=" text-shadow: 1px 1px violet; margin-top: 35px; font-family: 'Times New Roman', serif;">Point of Sale in AZ Variety Store</h3> 
                            <h5 class="text-center" style=" text-shadow: 1px 1px violet; margin-top: 10px; font-family: 'Times New Roman', serif;">Sign in to your Account!</h5> 
                            <p  style=" text-shadow: 1px 1px violet; margin-top: 30px; font-family: 'Times New Roman', serif;" >Email :</p>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <i class="bi bi-person"></i>
                                    </span>
                                </div>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}"
                                       placeholder="example@gmail.com">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <p style=" text-shadow: 1px 1px violet; font-family: 'Times New Roman', serif;">Password :</p>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <i class="bi bi-lock"></i>
                                    </span>
                                </div>
                                <input type="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       placeholder="•••••••" name="password">
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row">
                               
                                <div class="col-8 text-left">
                                    <a class="btn btn-link px-0" href="{{ route('password.request') }}">
                                     
                                    </a>
                                </div>
                                <div class="col-4">
                                    <button class="btn btn-primary px-4" type="submit">Sign in</button>
                                </div> 
                            </div>  
                        </form>
                    </div>
                </div>
                @if(Route::has('register'))
                <div class="card text-white bg-primary py-5 d-md-down-none" style="width:45%">
                    <div class="card-body text-center">
                        <div>
                            <h2>Sign up</h2>
                            <p>Sign in to start your session</p>
                            <a class="btn btn-lg btn-outline-light mt-3" href="{{ route('register') }}">Sign up</a>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

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


