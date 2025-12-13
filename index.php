<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SRE WEBSITE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="srewebsite.css">
    <style>
        .navbar-brand img { width: 40px;height: 30px; }
        .navbar {
            background-color: transparent !important; 
            position: absolute; 
            top: 0;
            width: 100%;
            z-index: 10; 
        }
        .navbar .nav-link, .navbar .navbar-brand {
            color: white !important; } 
        .navbar-toggler-icon {
            /* Perlu disesuaikan agar ikon toggler juga terlihat */
        }
        /* --- PERUBAHAN SAMPAI SINI --- */
        .container-fluid {
            height: auto; 
        overflow-y: visible;
            padding-right: 0 !important;
            padding-left: 0 !important;
            margin-right: 0 !important;
            margin-left: 0 !important;
            width: 100% !important; /* Memastikan lebar penuh */
        }
    </style>
</head>
<body class="home-page">
    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="assets/SRE_logo_green.png" alt="logo sre">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="About.php">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="Ourteam.php">Our Team</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="activity.php">Our Activity</a>
              </li>
              
            </ul>
          </div>
        </div>
      </nav>

    <div class="container-fluid">
        <section class="home-one">
            <div class="overlay-container">
                <div class="overlay">
                    <p class="scroll-in-left">──── Welcome to</p>
                    <h1 class="scroll-in-left">SRE<span>UPNVY</span></h1>
                    <h3 class="scroll-in-left"><em>Young Energy Infinite Posibilities</em></h3>
                </div> 
                <div class="explore-text">
                    <h2 class="scroll-in">Explore more at our official site</h2>
                    <a href="https://www.sre.co.id/id" target="_blank" class="sreidn-button scroll-in">SRE INDONESIA</a>
                </div>
            </div>
        </section>

        <section class="home-three">
            <div class="sreidn-images">
                <img src="sreidn-logo/WhatsApp Image 2025-07-17 at 11.28.17_38786099.jpg" alt="foto 1">
                <img src="sreidn-logo/WhatsApp Image 2025-07-17 at 11.29.37_6268dc3e.jpg" alt="foto 2">
                <img src="sreidn-logo/WhatsApp Image 2025-07-17 at 11.30.44_0208b21f.jpg" alt="foto 3">
                <img src="sreidn-logo/WhatsApp Image 2025-07-17 at 11.29.37_50a04f51.jpg" alt="foto 4">
            </div>
            <div class="sreidn-top">
                <div class="scroll-in-left">
                    <div class="sreidn-heading">
                        <img src="SRE_logo_green.png" alt="logo sre">
                        <h1><span>INDONESIA</span></h1>
                    </div>
                </div>
                <p class="scroll-in-right">
                    SRE Indonesia or Society of Renewable Energy Indonesia is a non-profit organization that aims to accelerate <br> 
                    the energy transition in Indonesia particularly through capacity building in the renewable energy sector.
                </p>
            </div>
            <div class="sreidn-middle">
                <div class="middle-item">
                    <img src="sreidn-logo/univ-removebg-preview.png" class="scroll-in-left" alt="middle-item 1">
                    <div class="scroll-in">
                        <h3>40 Universities</h3>
                        <p >SRE is spread across 40 universities <br> throughout Indonesia</p>
                    </div>
                </div>
                <div class="middle-item">
                    <img src="sreidn-logo/orang-removebg-preview.png" class="scroll-in-right" alt="middle-item 2">
                    <div class="scroll-in">
                        <h3>400.000+ People</h3>
                        <p>Reaching more than 400 thousand people</p>
                    </div>
                </div>
                <div class="middle-item">
                    <img src="sreidn-logo/acara-removebg-preview.png" class="scroll-in-right" alt="middle-item 3">
                    <div class="scroll-in">
                        <h3>300+ Events</h3>
                        <p>
                            Conducting more than 300 events<br>
                            throughout Indonesia.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="home-two">
            <div class="sre-images">
                <img src="fotoalbum/IMG_6080.jpg" alt="Foto 1" class="sre-img">
                <img src="fotoalbum/IMG_6080.jpg" alt="Foto 2" class="sre-img">
                <img src="fotoalbum/IMG_6080.jpg" alt="Foto 3" class="sre-img">
            </div>

            <div class="sre-bottom">
                <div class="sre-left">
                    <div class="scroll-in-left">
                         <img src="SRE_logo_green.png" alt="logo sre" class="sre-logo">
                        <h2>UPN "Veteran" Yogyakarta</h2>
                        <p>Young Energy Infinite Posibilities</p>
                    </div>
                </div>
                <div class="sre-right">
                    <h1 class="scroll-in">What is SRE UPNVY?</h1>
                    <div class="slogan-wrapper">
                        <span class="slogan-badge scroll-in-right">Young Energy Infinite Posibilities</span>
                    </div>
                    <p class="desc scroll-in-right">
                        <span>Society of Renewable Energy (SRE) UPNVY</span> is a student organization specializing in New and Renewable Energy (NRE). <br>
                        This organization provides a forum for renewable energy science for male and female students from various departments at UPN "Veteran" Yogyakarta, <br>
                        introducing renewable energy and collaborating to create projects in the renewable energy field. Furthermore, this organization aims to increase student interest in and awareness of new and renewable energy. This is based on the fact that many students still have minimal knowledge about renewable energy.  
                    </p>
                </div>
            </div>
        </section>

        <section class="home-four">
            <div class="collab-container">
                <div class="collab-heading">
                    <h1><span>MEET</span></h1>
                    <img src="SRE_logo_green.png" alt="logo sre">
                    <h1><span>INDONESIA COLLABORATORS</span></h1>
                </div>
                <div class="collab">
                    <div class="collaborators">
                        <a href="https://asean.org/" target="_blank">
                            <img src="srecollaborators/ASEAN.png" alt="logo ASEAN"> </a>
                        <a href="http://astra.co.id/" target="_blank">
                            <img src="srecollaborators/ASTRA.jpg" alt="logo ASTRA"></a>
                        <img src="srecollaborators/BPPT.png" alt="logo BPPT">
                        <a href="https://chandra-asri.com/id?gad_source=1&gad_campaignid=22125669579&gbraid=0AAAAArFUI5LkAQlbtIqx-YOl7ykiFJECK&gclid=Cj0KCQjw953DBhCyARIsANhIZobNIRGiQLPTIWfWsMm63AUCVNhUXt6UmaYI_AD4T3_EtJ8Ee23jcooaAioqEALw_wcB" target="_blank">
                            <img src="srecollaborators/chandra_asri.webp" alt="logo Chandra asri"></a>
                        <a href="https://www.ecadin.org/" target="_blank">
                            <img src="srecollaborators/ECADIN-1.webp" alt="logo ECADIN"></a>
                        <a href="https://www.ge.com/news/reports/tag/ge%20indonesia" target="_blank">
                            <img src="srecollaborators/General_Electric_logo.svg.png" alt="logo General Electric"></a>
                        <img src="srecollaborators/geodipa-logo.png" alt="logo Geodipa">
                        <a href="https://www.giz.de/en/worldwide/352.html" target="_blank">
                            <img src="srecollaborators/giz.jpg" alt="logo GIZ"></a>
                        <a href="https://iesr.or.id/en/" target="_blank">
                            <img src="srecollaborators/IESR-logo-caps-hires.png" alt="logo IESR"></a>
                        <a href="https://www.irena.org/" target="_blank">
                            <img src="srecollaborators/irena.png" alt="logo Irena"></a>
                        <a href="https://www.metiires.or.id/" target="_blank">
                            <img src="srecollaborators/METI-logo.png" alt="logo METI" class="logoMETI"></a>
                        <a href="https://www.unmgcy.org/" target="_blank">
                            <img src="srecollaborators/MGCY-Full.png" alt="logo MGCY"></a>
                        <a href="https://www.esdm.go.id/en" target="_blank">
                            <img src="srecollaborators/Ministry_of_Energy_and_Mineral_Resources.png" alt="logo Ministry of Energy and Mineral Resources of the Republic of Indonesia"></a>
                        <a href="https://kemlu.go.id/portal/en" target="_blank">
                            <img src="srecollaborators/ministry.png" alt="logo Ministry of Foreign Affairs of the Republic of Indonesia"></a>
                        <a href="https://www.newenergynexus.com/" target="_blank">
                            <img src="srecollaborators/nexus.png" alt="logo Nexus"></a>
                        <a href="https://www.pertamina.com/" target="_blank">
                            <img src="srecollaborators/pertamina.png" alt="logo Pertamina"></a>
                        <a href="https://web.pln.co.id/" target="_blank">
                            <img src="srecollaborators/PLN.png" alt="logo PLN"></a>
                        <a href="https://purnomoyusgiantorocenter.org/" target="_blank">
                            <img src="srecollaborators/purnomoyusgiantoro.jpg" alt="logo Purnomo Yusgiantoro"></a>
                        <a href="https://rm.id/" target="_blank">
                            <img src="srecollaborators/rakyatmerdeka.png" alt="logo RM.id"></a>
                        <a href="https://rigsis.com/" target="_blank">
                            <img src="srecollaborators/RIGSIS.png" alt="logo RIGSIS"></a>
                        <a href="https://www.se.com/id/en/" target="_blank">
                            <img src="srecollaborators/Schneider Electric 1.png" alt="logo Schneider Electric"></a>
                        <a href="https://www.sedayu.com/" target="_blank">
                            <img src="srecollaborators/SDU-1.png" alt="logo Sedayu"></a>
                        <a href="https://www.seda.gov.my/" target="_blank">
                            <img src="srecollaborators/seda-malaysia-logo-png_seeklogo-285004.png" alt="logo SEDA Malaysia"></a>
                        <a href="https://www.ptsmi.co.id/" target="_blank">
                            <img src="srecollaborators/SMI.webp" alt="logo SMI"></a>
                        <a href="https://sunenergy.id/" target="_blank">
                            <img src="srecollaborators/sun.jpg" alt="logo SUN"></a>
                        <a href="https://www.supreme-energy.com/" target="_blank">
                            <img src="srecollaborators/supreme.png" alt="logo Supreme Energy"></a>
                        <a href="https://www.tmlenergy.co.id/" target="_blank">
                            <img src="srecollaborators/tml.png" alt="logo TMLEnergy"></a>
                        <a href="https://www.undp.org/" target="_blank">
                            <img src="srecollaborators/UNDP_logo.svg.png" alt="logo UNDP" class="logoUNDP"></a>
                        <a href="https://www.wartsila.com/" target="_blank">
                            <img src="srecollaborators/Wärtsilä_logo.svg.png" alt="logo Wärtsilä"></a>
    
                        <!-- DUPLIKAT -->
                        <a href="https://asean.org/" target="_blank">
                            <img src="srecollaborators/ASEAN.png" alt="logo ASEAN"> </a>
                        <a href="http://astra.co.id/" target="_blank">
                            <img src="srecollaborators/ASTRA.jpg" alt="logo ASTRA"></a>
                        <img src="srecollaborators/BPPT.png" alt="logo BPPT">
                        <a href="https://chandra-asri.com/id?gad_source=1&gad_campaignid=22125669579&gbraid=0AAAAArFUI5LkAQlbtIqx-YOl7ykiFJECK&gclid=Cj0KCQjw953DBhCyARIsANhIZobNIRGiQLPTIWfWsMm63AUCVNhUXt6UmaYI_AD4T3_EtJ8Ee23jcooaAioqEALw_wcB" target="_blank">
                            <img src="srecollaborators/chandra_asri.webp" alt="logo Chandra asri"></a>
                        <a href="https://www.ecadin.org/" target="_blank">
                            <img src="srecollaborators/ECADIN-1.webp" alt="logo ECADIN"></a>
                        <a href="https://www.ge.com/news/reports/tag/ge%20indonesia" target="_blank">
                            <img src="srecollaborators/General_Electric_logo.svg.png" alt="logo General Electric"></a>
                        <img src="srecollaborators/geodipa-logo.png" alt="logo Geodipa">
                        <a href="https://www.giz.de/en/worldwide/352.html" target="_blank">
                            <img src="srecollaborators/giz.jpg" alt="logo GIZ"></a>
                        <a href="https://iesr.or.id/en/" target="_blank">
                            <img src="srecollaborators/IESR-logo-caps-hires.png" alt="logo IESR"></a>
                        <a href="https://www.irena.org/" target="_blank">
                            <img src="srecollaborators/irena.png" alt="logo Irena"></a>
                        <a href="https://www.metiires.or.id/" target="_blank">
                            <img src="srecollaborators/METI-logo.png" alt="logo METI"></a>
                        <a href="https://www.unmgcy.org/" target="_blank">
                            <img src="srecollaborators/MGCY-Full.png" alt="logo MGCY"></a>
                        <a href="https://www.esdm.go.id/en" target="_blank">
                            <img src="srecollaborators/Ministry_of_Energy_and_Mineral_Resources.png" alt="logo Ministry of Energy and Mineral Resources of the Republic of Indonesia"></a>
                        <a href="https://kemlu.go.id/portal/en" target="_blank">
                            <img src="srecollaborators/ministry.png" alt="logo Ministry of Foreign Affairs of the Republic of Indonesia"></a>
                        <a href="https://www.newenergynexus.com/" target="_blank">
                            <img src="srecollaborators/nexus.png" alt="logo Nexus"></a>
                        <a href="https://www.pertamina.com/" target="_blank">
                            <img src="srecollaborators/pertamina.png" alt="logo Pertamina"></a>
                        <a href="https://web.pln.co.id/" target="_blank">
                            <img src="srecollaborators/PLN.png" alt="logo PLN"></a>
                        <a href="https://purnomoyusgiantorocenter.org/" target="_blank">
                            <img src="srecollaborators/purnomoyusgiantoro.jpg" alt="logo Purnomo Yusgiantoro"></a>
                        <a href="https://rm.id/" target="_blank">
                            <img src="srecollaborators/rakyatmerdeka.png" alt="logo RM.id"></a>
                        <a href="https://rigsis.com/" target="_blank">
                            <img src="srecollaborators/RIGSIS.png" alt="logo RIGSIS"></a>
                        <a href="https://www.se.com/id/en/" target="_blank">
                            <img src="srecollaborators/Schneider Electric 1.png" alt="logo Schneider Electric"></a>
                        <a href="https://www.sedayu.com/" target="_blank">
                            <img src="srecollaborators/SDU-1.png" alt="logo Sedayu"></a>
                        <a href="https://www.seda.gov.my/" target="_blank">
                            <img src="srecollaborators/seda-malaysia-logo-png_seeklogo-285004.png" alt="logo SEDA Malaysia"></a>
                        <a href="https://www.ptsmi.co.id/" target="_blank">
                            <img src="srecollaborators/SMI.webp" alt="logo SMI"></a>
                        <a href="https://sunenergy.id/" target="_blank">
                            <img src="srecollaborators/sun.jpg" alt="logo SUN"></a>
                        <a href="https://www.supreme-energy.com/" target="_blank">
                            <img src="srecollaborators/supreme.png" alt="logo Supreme Energy"></a>
                        <a href="https://www.tmlenergy.co.id/" target="_blank">
                            <img src="srecollaborators/tml.png" alt="logo TMLEnergy"></a>
                        <a href="https://www.undp.org/" target="_blank">
                            <img src="srecollaborators/UNDP_logo.svg.png" alt="logo UNDP"></a>
                        <a href="https://www.wartsila.com/" target="_blank">
                            <img src="srecollaborators/Wärtsilä_logo.svg.png" alt="logo Wärtsilä"></a>
                    </div>
                </div>
            </div>
        </section>

        <section class="home-five">
            <h1 class="Contact-title">Contact Us</h1>
            <footer class="footer-sre">
                <div class="footer-left">
                    <img src="SRE_logo_green.png" alt="logo sre">
                    <h2>UPN "Veteran" Yogyakarta</h2>
                    <p>Young Energy Infinite Posibilities</p>
                </div>

                <div class="footer-right">
                    <div class="contact-item">
                        <img src="contactlogo/icons8-email-90.png" alt="email">
                        <span>email sre</span>
                    </div>
                    <div class="contact-item">
                        <img src="contactlogo/icons8-instagram-logo-50.png" alt="instagram">
                        <a href="https://www.instagram.com/sre.upnvy?igsh=MTJiMDk4Z2ZpbHgyZQ==" target="_blank">@sre.upnvy</a>
                    </div>
                    <div class="contact-item">
                        <img src="contactlogo/icons8-tiktok-90.png" alt="tiktok">
                        <a href="https://www.tiktok.com/@sre.upnvy?_t=ZS-8y2zm5NRVfc&_r=1" target="_blank">SRE UPNVY</a>
                    </div>
                    <div class="contact-item">
                        <img src="contactlogo/icons8-youtube-50.png" alt="youtube">
                        <a href="https://www.youtube.com/@sreupnvy3680" target="_blank">SRE UPNVY</a>
                    </div>
                    <div class="contact-item">
                        <img src="contactlogo/icons8-linkedin-50.png" alt="linkedin">
                        <a href="www.linkedin.com/company/sre-upnvy" target="_blank">linkedin</a>
                    </div>
                    <div class="contact-item">
                        <img src="contactlogo/icons8-location-50.png" alt="location">
                        <p>Jl. Padjajaran Jl. Ring Road Utara No.104, Ngropoh, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55283</p>
                    </div>
                </div>
            </footer>
        </section>
    </div>


    <script>
        const elements = document.querySelectorAll('.scroll-in, .scroll-in-right, .scroll-in-left');
      
        const observer = new IntersectionObserver((entries) => {
          entries.forEach(entry => {
            if (entry.isIntersecting && !entry.target.classList.contains('show')) {
              entry.target.classList.add('show');
            }
          });
        }, {
          threshold: 0.2
        });
      
        elements.forEach(el => {
          observer.observe(el);
      
          // 🔧 Tambahan: langsung beri class 'show' kalau sudah kelihatan saat load
          const rect = el.getBoundingClientRect();
          if (rect.top < window.innerHeight && rect.bottom > 0) {
            el.classList.add('show');
          }
        });
    </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
      
</body>
</html>
