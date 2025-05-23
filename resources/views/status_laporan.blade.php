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
      <link
      rel="stylesheet"
      data-purpose="Layout StyleSheet"
      title="Web Awesome"
      href="/css/app-wa-a60ddbceb7292f11c9e430d067b1eb9f.css?vsn=d"
    >

      <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.5.2/css/all.css"
      >

      <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-thin.css"
      >

      <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-solid.css"
      >

      <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-regular.css"
      >

      <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-light.css"
      >
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
            <a class="navbar-brand" href="#page-top"><img src="{{ asset('site/img/navbar-logo.svg') }}" alt="..." /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}#how">How?</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}#portfolio">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}#contact">Lapor</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}#team">Team</a></li>
                    <li class="nav-item"><a class="nav-link" href="#faq">FAQ</a></li>
                    <li class="nav-item"><a class="nav-link active" href="{{ route('pengaduan.status') }}">Status Laporan</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <div class="masthead-heading text-uppercase">Status Laporan</div>
            <div class="masthead-subheading">Berikut adalah tabel yang berisi laporan dan status nya </div>
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
    <section class="page-section" id="table" >
         <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Data laporan</h2>
                <h3 class="section-subheading text-muted">isi data laporan yang tersimpan</h3>
                <div class="row justify-content-center">
                </div>
            </div>

             <div class="row justify-content-center">
                    <div class="col-lg-12 col-12">
                        <table id="pengaduan_table">
                            <thead>
                            <tr>
                                <th>Identitas Pelapor</th>
                                <th>Judul masalah</th>
                                <th>Lokasi Permasalahan</th>
                                <th>Jenis Layanan</th>
                                <th>Status Laporan</th>
                                <th>Foto Bukti</th>
                                <th>Tanggal Laporan </th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                        
                                @foreach($pengaduan as $i)
                                    <tr>
                                <td>{{ $i->nama_pelapor }} <br> <span class="badge bg-info rounded-pill text-white"><i class="fa-duotone fa-address-card text-white"></i> {{ $i->nomor_identitas }}</span>
                                <br><span class=" text-black text-sm"><i class="fa-duotone fa-user-tie"></i> {{ $i->status_pelapor }}</span></td>
                                <td>{{ $i->judul_permasalahan }}</td>
                                <td><i class="fa-duotone fa-map-location text-success"></i> {{ $i->lokasi_permasalahan }}</td>
                                <td>{{ $i->jenis_layanan }}</td>
                                <td>
                                    @if($i->status_laporan == 'open')
                                    <span class="badge bg-danger"><i class="fa-duotone fa-arrows-retweet"></i> {{ $i->status_laporan }}</span>
                                    @elseif($i->status_laporan == 'process')
                                    <span class="badge bg-warning"><i class="fa-duotone fa-arrows-rotate"></i> {{ $i->status_laporan }}</span>
                                    @elseif($i->status_laporan == 'closed')
                                    <span class="badge bg-success"> <i class="fa-duotone fa-circle-x"></i> {{ $i->status_laporan }}</span>
                                    @endif
                                
                                </td>
                                <td >
                                <div class="popup">                                
                                <img src="{{ asset('storage/'.$i->upload_bukti) }}" width="150" height="100" class="rounded"/>
                                </div>
                                </td>
                                <td>{{ $i->created_at }}</td>
                                <td><a class="btn btn-info btn-md" href="{{ route('pengaduan.show',$i->id) }}" ><i class="fa-duotone fa-eye"></i></a></td>
                                 </tr>
                                @endforeach
                          
                            </tbody>
                        </table>
                    </div>
             </div>

         </div>
    </section>



    <section class="page-section" id="faq">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">FAQ</h2>
                <h3 class="section-subheading text-muted">penjelasan terkait pertanyaan berulang</h3>
                <div class="row justify-content-center">
                    <!-- Menambahkan kelas justify-content-center di sini -->
                    <div class="col-lg-9">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        <strong>aplikasi ini resmi dari fakultas ?</strong>
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Aplikasi Web ini masih dalam tahap uji coba efektifitas dan efisien, jadi setiap
                                        laporan dari civitas akan sangat berharga dalam uji coba ini.
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                            aria-expanded="false" aria-controls="collapseTwo">
                                            <strong>Apakah laporan yang dikirim pasti akan diproses ? </strong>
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            Saat ini kami mengusahakan semua laporan yang diterima akan diproses, namun
                                            komitmen ini juga bergantung dengan kesiapan pihak fakultas terkait.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                            aria-expanded="false" aria-controls="collapseThree">
                                            <strong>Berapa lama laporan akan diproses ? </strong>
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            Laporan yang diterima akan mengalami antrian proses, waktu antrian proses
                                            ini bergantung load kerja team.
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                                aria-expanded="false" aria-controls="collapseFour">
                                                <strong>Apakah ada bukti penyelesaian pekerjaan bagi laporan yang sudah
                                                    selesai ?</strong>
                                            </button>
                                        </h2>
                                        <div id="collapseFour" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Iya, lampiran bukti akan terlampir otomatis di halaman status laporan
                                                untuk laporan yang sudah selesai
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseFive"
                                                aria-expanded="false" aria-controls="collapseFive">
                                                <strong>Apa fungsi dari halaman Status Laporan ?</strong>
                                            </button>
                                        </h2>
                                        <div id="collapseFive" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Status Laporan adalah sebuah fitur halaman untuk menampilkan list
                                                laporan yang diterima hingga diproses, dengan adanya fitur ini semua
                                                laporan menjadi transparan, civitas dapat memonitoring laporan yang ada.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

    <script >
       $(document).ready(function() {
    $('#pengaduan_table').DataTable();
    
    $(".lihat_detail").on('click',function(e){
        var id = $(this).attr('data-id');
        $('#detail_pengaduan').modal('show');
        $('.id_pengaduan').text(id);
    })

    $(".popup img").click(function () {
        var $src = $(this).attr("src");
        $(".show").fadeIn();
        $(".img-show img").attr("src", $src);
    });
    
    $("span, .overlay").click(function () {
        $(".show").fadeOut();
    });
});
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
