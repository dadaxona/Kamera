
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <title>HiLook</title>

    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        .body{
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            width: 100%;
            height: 100vh;
        }
        #abcd{
            display: none;
            position: absolute;
            width: 30%;
            height: auto;
            z-index: 10001;
            background: rgba(0, 0, 0, 0.6);
            padding: 30px;

        }
        #abcd input{
            width: 100%;
            background: none;
            border-top: none;
            border-right: none;
            border-bottom: 4px solid white;
            border-left: 0;
            color: white;
            font-weight: 600;
            letter-spacing: 1px;
           
        }
         #abcd label{
            font-weight: 800;
            color: white;
        }
         #abcd .gab{
             color: white;
             font-size: 18px;
             margin-top: 5px;
         }
         #abcd .fab{
             display: flex;
             justify-content: center;
         }
         #abcd .fab button{
             font-size: 18px;
             font-weight: 600;
         }
        img{
            width: 200px;
            height: 200px;
        }
        .hilook{
            position: absolute;
            width: 600px;
            height: 370px;
            z-index: 10000;
        }
        .AVCROWNS{
            width: 300px;
            height: 300px;
           position: absolute;
           left: 5%;
           top:5%;
           animation: animate 5s linear infinite;

        }
        @keyframes animate{
            0%{
                left: 3%;
                top:0%;
            }
            25%{
                 top:3%;
                 left: 0%; 
            }
            50%{
                top:6%;
                left: 3%; 
            }
            75%{
                top:3%;
                left: 6%; 
            }
            100%{
                left: 3%;
                top:0%;
            }

        }
        .Delta{
            width: 350px;
            height: 350px;
           position: absolute;
           bottom: 0;
           left: 0; 
           animation: aaa 5s linear infinite;
        }
        @keyframes aaa{
            0%{
              left: 0%;
            }
            50%{
                left: 5%;
            }
            100%{
              left:0%;
            }

        }
        .LELISU{
            width: 300px;
            height: 300px;
           position: absolute;
           top:0%;
           right: 5%;
           animation: bbb 5s linear infinite;
        }
        @keyframes bbb{
            0%{
                top: 1%;
            }
           
            50%{
                top: 7%;
            }
         
            100%{
              top: 1%;
            }
        }
        .Mi{
            width: 300px;
            height: 300px;
           position: absolute;
           bottom: 5%;
           right: 5%;
           border-radius: 50%;
           animation: ccc 5s linear infinite;
        }
        @keyframes ccc{
            0%{
                bottom: 0%;
                right: 0%;
            }
            25%{
                bottom: 3%;
                 right: 3%;
            }
            50%{
                bottom: 6%;
                 right: 6%;
            }
            75%{
                bottom: 3%;
                right: 3%;
            }
            100%{
                bottom: 0%;
                right: 0%;
            }
        }
    </style>
  </head>

  <body>
      <div class="body">
        <img src="{{ asset('imges/hilook.png') }}" class="hilook" alt="">
        <img src="{{ asset('imges/AVCROWNS.jpg') }}" class="AVCROWNS" alt="">
        <img src="{{ asset('imges/Delta-Logo.jpg') }}" class="Delta" alt="">
        <img src="{{ asset('imges/LELISU.jpg') }}" class="LELISU" alt="">
        <img src="{{ asset('imges/Mi.png') }}" class="Mi" alt="">        
        <form action="{{ route('login-user') }}" method="POST" id="abcd">
            @csrf
            <div>
                <div class="form-group">
                    <label class="float-label">Логин</label>
                    <input type="text" name="login" class="form-control" id="login">
                    <span class="text-danger error-text login_error"></span>
                </div>
                <div class="form-group">
                    <label class="float-label">Парол</label>
                    <input type="password" name="password" class="form-control" id="password">
                    <span class="text-danger error-text password_error"></span>
                </div>
                <div class="row m-t-25 text-left mt-3 mb-4">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-6 checkbox-fade fade-in-primary d-">
                                <label>
                                    <div class="row">
                                        <div class="col-5">
                                            <input type="checkbox" name="ok" value="ok" id="ok">
                                            <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                        </div>
                                        <div class="col-7">
                                            <span class="text-inverse">Белгилаш</span>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="col-6 forgot-phone text-right">
                                <a href="#" class="text-right f-w-600 gab">Тасдикланг ?</a>
                            </div>
                            <span class="text-danger error-text ok_error"></span>
                        </div>
                    </div>
                </div>
                <div class="row m-t-30">
                    <div class="col-md-12 fab" >
                        <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Sign in</button>
                    </div>
                </div>
            </form>
        </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
      <script>
        $(document).ready(function(){
            $(document).on("mouseover", ".hilook", function () {
                $("#abcd").toggle("show");
            });

            $('#abcd').on('submit', function(e) {
                e.preventDefault();
                var form = this;
                    $.ajax({
                    url:$(form).attr('action'),
                    method:$(form).attr('method'),
                    data:new FormData(form),
                    processData:false,
                    dataType:'json',
                    contentType:false,
                    beforeSend:function(){
                        $(form).find('span.error-text').text('');
                    },
                    success:function(data){
                        if(data.data == 200){
                            toastr.success("Привет");
                            $(form)[0].reset();                            
                            window.location.href = "/glavninachal";
                        }
                        if(data.data == 404){
                            toastr.error("Парол хато");
                        }
                        if(data.data == 500){
                            toastr.error("Бегона шахслар кириши такикланади");
                        }
                        if(data.data == 0){
                            $.each(data.error, function(prefix, val){
                                $(form).find('span.'+prefix+'_error').text(val[0]);
                            });
                        }
                    }
                });
            });
        });
      </script>
</body>
</html>
