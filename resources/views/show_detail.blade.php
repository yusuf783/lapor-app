<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Status Laporan -FTP</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="site/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('site/css/styles.css') }}" rel="stylesheet" />
    <link rel="stylesheet" data-purpose="Layout StyleSheet" title="Web Awesome"
        href="/css/app-wa-a60ddbceb7292f11c9e430d067b1eb9f.css?vsn=d">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/all.css">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-thin.css">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-solid.css">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-regular.css">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-light.css">
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <link href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"
        integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top"><img
                    src="{{ asset('site/img/navbar-logo.svg') }}" alt="..." /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}#how">How?</a></li>
                    <li class="nav-item"><a class="nav-link"
                            href="{{ url('/') }}#portfolio">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}#contact">Lapor</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}#team">Team</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#faq">FAQ</a></li>
                    <li class="nav-item"><a class="nav-link active"
                            href="{{ route('pengaduan.status') }}">Status Laporan</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <div class="masthead-heading text-uppercase">Detail Pengaduan </div>
            <div class="masthead-subheading">{{ $detail->judul_permasalahan }} </div>
            <div class="masthead-subheading text-h4">" {{ $detail->deskripsi_permasalahan }} "</div>
            <div class="masthead-subheading text-h4">" {{ $detail->status_laporan }} "</div>
            <br>
            <span class="badge bg-info"><i class="fas fa-user"></i> {{ $detail->nama_pelapor }}</span>
            <span class="badge bg-primary"><i class="fa-duotone fa-calendar-alt"></i> {{ $detail->updated_at }}</span>
        </div>
    </header>
    <!-- Services-->
 
    <!-- Portfolio Grid-->


    <!-- Team-->

    <!-- Clients-->
    <!-- <div class="py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="site/img/logos/microsoft.svg" alt="..." aria-label="Microsoft Logo" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="site/img/logos/google.svg" alt="..." aria-label="Google Logo" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="site/img/logos/facebook.svg" alt="..." aria-label="Facebook Logo" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="site/img/logos/ibm.svg" alt="..." aria-label="IBM Logo" /></a>
                    </div>
                </div>
            </div>
        </div> -->
    <section class="page-section" id="table">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Detail History</h2>
                <h3 class="section-subheading text-muted">berisi detail data penanganan oleh admin</h3>
                <div class="row justify-content-center">
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-12 col-12">

                    @foreach($detail->detailPengaduan as $i)
                    <div class="card mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-4 col-lg-4">
                                <img src="{{ asset('storage/'.$i->foto_balasan) }}" width="250" height="100" alt="...">
                            </div>
                            <div class="col-md-8 col-lg-8">
                                <div class="card-body">
                                    <h5 class="card-title">Status pada section ini <span class="badge bg-primary">{{ $i->status_laporan }}</span>   </h5>
                                    <p class="card-text">{{ $i->catatan }}</p>
                                    <p class="card-text"><i class="fa-duotone fa-calendar-alt"></i><small class="text-muted"> {{ $i->created_at }}</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </section>




    <!-- Footer-->
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start">Copyright &copy; Your Website 2023</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i
                            class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i
                            class="fab fa-linkedin-in"></i></a>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                    <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer>
    <div class="show">
        <div class="overlay"></div>
        <div class="img-show">
            <span>X</span>
            <img src="">
        </div>
    </div>

    <script src="site/js/captcha.js"></script>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>

    <script>
    </script>
    <!-- Core theme JS-->
    <script src="{{ asset('site/js/scripts.js') }}"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
