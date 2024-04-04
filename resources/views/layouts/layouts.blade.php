<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="{{asset('icon/logomidi.png')}}" type="image/x-icon">
        <title>Midishare</title>
        <style>
            body {
                font-family: "Poppins", sans-serif;
            }
        </style>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">      
        <link rel="stylesheet" href="{{asset('css.style.css')}}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-body-tertiary py-3 fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"> <img src="{{asset('icon/logomidi.png')}}" height="24" width="110" alt=""> </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-start" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0" style="margin-right: 6.5rem;">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/beritamidi">News</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Repository
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/repositoryall">Knowledge Management</a></li>
                                <li><a class="dropdown-item" href="/belajarmandiri">Belajar Mandiri</a></li>
                            </ul>                            
                        </li>
                    </ul>
                </div>                
            </div>
        </nav>
    @yield('content') 
    
    <footer class="text-white text-center" style="margin-top: 4rem; background-color: #E62323;">
        <div class="container">
            <div style="background-color: #E62323; padding: 1rem;">
                <div class="row">
                    <div class="col-md-6">
                        <div class="d-flex justify-content-start align-items-center">
                            <img class="img-fluid mr-1" src="{{asset('icon/logomidifooter.png')}}" alt="Logo" style="height: 4rem; width: 4rem;">
                        </div>  
                    </div>
                    <div class="col-md-6">
                        <p style="text-align: right;">PT Midi Utama Indonesia, Tbk<br>
                            Alfa Tower Lt 10 - 12, Jl  Jalur Sutera Barat Kav 7-9 Alam<br>
                            Sutera, Panunggangan Timur, Pinang, Tangerang</p>
                    </div>
                </div>                  
            </div>
        </div>            
    </footer>        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>