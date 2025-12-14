<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SRE WEBSITE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif; 
        }

        body {
            width: 100%; 
            overflow-y: visible; 
            overflow-x: hidden; 
            background: white; 
            margin: 0; 
            padding: 0; 
            scroll-behavior: smooth;
        }

        .container-fluid {
            padding-right: 0 !important;
            padding-left: 0 !important;
            margin-right: 0 !important;
            margin-left: 0 !important;
            width: 100% !important;
        }
        .navbar {
            padding: 20px 50px;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            background-color: transparent !important;
            z-index: 100;
        }
        .navbar-brand img { height: 50px; width: auto; }
        .nav-link {
            color: var(--primary-green) !important;
            font-weight: 600;
            margin-left: 15px;
            font-size: 1rem;
            transition: all 0.3s;
            padding: 8px 15px !important;
            border-radius: 20px;
        }
        .nav-link:hover { color: var(--accent-gold) !important; }

        /* Class khusus untuk menu yang sedang aktif */
        .nav-link.active-page {
            background-color: var(--primary-green) !important;
            color: white !important;
            box-shadow: 0 4px 10px rgba(45, 80, 22, 0.2);
        }
        section{
            overflow-x: hidden;
            justify-content: center;
            align-items: center; 
        } 

        /* ANIMASI SCROLL IN */
        .scroll-in { transform: translateY(100px); transition: transform 0.8s ease-out; }
        .scroll-in.show { transform: translateY(0); }
        .scroll-in-right {
            transform: translateX(100px) scale(0.95);
            opacity: 0;
            transition: transform 0.8s ease-out, opacity 0.8s ease-out; 
        }
        .scroll-in-right.show { transform: translateX(0) scale(1); opacity: 1;  }
        .scroll-in-left {
            transform: translateX(-100px) scale(0.95);
            opacity: 0;
            transition: transform 0.8s ease; 
        }
        .scroll-in-left.show { transform: translateX(0) scale(1); opacity: 1;  }

        /* HOME PAGE */
        .home-one{
            position: relative;
            background-image: url(fotoalbum/Green\ Tosca\ Modern\ Geometric\ Web\ Hosting\ Service\ Presentation.jpg);
            background-size: cover; 
            background-position: center;
            height: 100vh;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: left; 
        }

        .overlay-container{
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: center;
            height: 100%;
            padding: 50px;
            width: 100%; 
        }

        .overlay{ 
            padding: 50px; 
            width: 100%; 
            margin-bottom: 0; 
        }

        .overlay p{
            margin: 0;
            padding: 0;
            font-size: 18px;
            font-weight: 500;
            letter-spacing: 2px; 
        }

        .overlay h1{
            padding-top: 10px;
            font-size: 100px;
            font-weight: bold;
            margin: 0;
            line-height: 0.7; 
        }

        .overlay h1 span{ 
            display: block; 
            color: #18350B; 
            margin: 0; 
            padding: 0; 
            line-height: 1; 
        }

        .overlay h3{ 
            font-style: italic; 
            font-size: 20px; 
            margin-top: 6px; 
        }

        .explore-text{ margin-top: 10px;  margin-left: 3rem;  }
        .explore-text h2{  font-size: 20px;  font-weight: bold; }
        .sreidn-button{
            display: inline-block;
            background-color: #687C32;
            color: white;
            padding: 10px 10px;
            text-decoration: none;
            font-weight: bold;
            border-radius: 8px;
            margin: 10px; 
        }
        .sreidn-button:hover{
            background-color: #536328;
            color: white;
        }

        /* TENTANG SRE INDONESIA */
        .home-three{
            color: #18350B; 
            background-color: white;
            padding: 0 5% 80px 5%; 
            text-align: center; 
        }

        .sreidn-heading{
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 1rem; 
        }

        .sreidn-heading h1{
            font-size: 2.5rem;
            font-weight: bold;
            color: #18350B; 
            margin: 0; 
        }

        .sreidn-heading img{ 
            width: 85px; 
            height: auto; 
            display: block; 
        }

        .sreidn-images{
            margin-top: 0;
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
            gap: 0.3rem; 
        }

        .sreidn-images img{
            width: 100%;
            max-width: 360px;
            height: auto;
            object-fit: cover;
            border-radius: 10px; 
        }

        .sreidn-top{ padding-bottom: 10px; }
        .sreidn-top p{
            color: #333;
            max-width: 900px;
            margin: 0 auto;
            line-height: 1.8;
        }
        .sreidn-middle{
            display: flex;
            justify-content: center;
            align-items: flex-start;
            gap: 40px;
            margin-top: 3rem;
            flex-wrap: wrap; 
        }
        .middle-item{  text-align: center; max-width: 200px; }
        .middle-item img{
            width: 150px;
            height: auto;
            margin-bottom: 1rem;
        }
        .middle-item h3{
            color: #18350B;
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }
        .middle-item p{ color: #666; }
        /* TENTANG SRE UPNVY */
        .home-two {
            max-width: 100%;
            overflow-x: hidden;
            color: #18350B;
            padding: 80px 5%;
            font-family: 'Poppins', sans-serif; 
        }
        .sre-images{
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-bottom: 3rem; 
        }
        .sre-img{
            width: 45%;
            height: auto;
            object-fit: cover;
            border: none;  /* dari border: 3px solid #18350B jadi none */
            border-radius: 15px; 
        }
        .sre-bottom{
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 3rem;
            padding-right: 0;
            padding-top: 30px; 
        }
        .sre-left{  flex: 1;  text-align: left;  padding-left: 0; }
        .sre-left .sre-logo{  height: 90px; }
        .sre-left h2{
            color: #18350B; 
            font-size: 2rem; 
            margin: 0;
        }
        .sre-left p{ font-style: italic;  color: #666; }
        .sre-right{
            flex: 2; 
            padding-right: 0; 
            color: #18350B;
        }
        .sre-right h1{
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 5px; 
        }

        .slogan-wrapper{
            display: inline-block;
            padding: 0;  /* dari padding: 4px jadi 0 */
            border-radius: 20px;
            margin-bottom: 5px;
        }

        .slogan-badge {
            background-color: #466b67;
            color: white;
            font-style: italic;
            font-weight: 600;
            border-radius: 20px;
            padding: 8px 20px;
            display: inline-block;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.25);
            font-size: 14px; 
        }

        .desc{
            font-size: 14px;
            line-height: 1.6;
            text-align: justify;
            color: #333;
        }

        .desc span{ font-weight: bold;color: #18350B;}
        /* COLLABORATORS */
        .home-four{ 
            /* background-color: #f8f9fa; */
            overflow-x: hidden;
            padding: 80px 5%;
        }

        .logoMETI{
            height: 100px; 
            width: 100px; 
            padding: 20px;
        }

        .logoUNDP{
            height: 100px; 
            width: 100px;
        }

        .collab-heading{
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 13px;
            flex-wrap: wrap;
            text-align: center;
            margin-bottom: 3rem;
        }

        .collab-heading h1{ 
            font-size: 2rem; 
            margin: 0; 
            color: #18350B;  
        }

        .collab-heading img{
            margin-top: 0;
            height: auto; 
            width: 85px;
            display: block;
        }

        .collab{
            overflow: hidden;
            white-space: nowrap;
            position: relative;
            padding: 20px 0;
            justify-content: center;
            text-align: center;
        }

        .collaborators{ display: inline-block; animation: scroll-logo 50s linear infinite; }
        .collab:hover .collaborators{ animation-play-state: paused;}
        .collaborators img{
            padding: 10px;
            background-color: white;
            height: 100px;
            margin: 0 30px;
            border-radius: 10px;
            vertical-align: middle;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .collaborators img:hover {
            transform: scale(1.1);
            box-shadow: 0 8px 16px rgba(0,0,0,0.3);
        }

        @keyframes scroll-logo {
            0%{transform: translateX(0);}
            100%{transform: translateX(-50%);}
        }

        /* CONTACT US */
        .home-five{
            background-image: url("assets/background/bg.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: white;
            padding: 0px 5% 80px 5%;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .Contact-title{
            font-weight: bold;
            text-align: center;
            font-size: 4rem;
            color: #18350B;  
            margin-bottom: 50px;
        }
        .footer-sre{
            display: flex;
            justify-content: center;
            align-items: flex-start;
            flex-wrap: wrap;
            color:  #18350B;
            max-width: 1100px;
            width: 100%;
            gap: 6rem;
        }
        .footer-left{
            text-align: center;
            flex: 1 1 300px;
            max-width: 300px;
        }
        .footer-left h2{ 
            font-size: 2rem; 
            margin-bottom: 10px; 
            color:  #18350B; 
        }  
        .footer-left p{
            margin: 4px 0;
            font-style: italic;
            font-size: 0.95rem;
            color: #18350B;
        }
        .footer-left img{  height: 90px; }
        .footer-right {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px 24px;
            max-width: 600px;
        }
        .contact-item{
            display: flex;
            align-items: flex-start;
            gap: 10px;
            line-height: 1.5;
            font-size: 0.95rem;
        }
        .contact-item img{
            width: 24px;
            height: 24px;
            margin-top: 3px;
            filter: none;  /* HAPUS filter putih */
        }
        .contact-item a{ 
            color: #18350B;  /* DARI white JADI hijau */
            text-decoration: none; 
            font-size: 1rem; 
        }
        .contact-item a:hover{  text-decoration: underline; }
        .contact-item span{ color:  #18350B; } 
        .contact-item p{ color:  #18350B;  margin: 0;  }
        /* Responsive */
        @media (max-width: 768px) {
            .overlay h1 {
                font-size: 3rem;
            }
            .sre-images,
            .sre-bottom,
            .sreidn-middle {
                flex-direction: column;
                align-items: center;
            }
            .sre-img {width: 80%;}
            .footer-right { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body class="home-page">
<nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="assets/SRE_logo_green.png" alt="logo sre">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active-page" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="About.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="Ourteam.php">Our Team</a></li>
                    <li class="nav-item"><a class="nav-link" href="activity.php">Our Activity</a></li>
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
                <img src="assets/home/home1.jpg" alt="foto 1">
                <img src="assets/home/home2.jpg" alt="foto 2">
                <img src="assets/home/home3.jpg" alt="foto 3">
                <img src="assets/home/home1.jpg" alt="foto 4">
            </div>
            <div class="sreidn-top">
                <div class="scroll-in-left">
                    <div class="sreidn-heading">
                        <img src="assets/SRE_logo_green.png" alt="logo sre">
                        <h1><span>INDONESIA</span></h1>
                    </div>
                </div>
                <p class="scroll-in-right">
                    SRE Indonesia or Society of Renewable Energy Indonesia is a non-profit organization that aims to accelerate 
                    the energy transition in Indonesia particularly through capacity building in the renewable energy sector.
                </p>
            </div>
            <div class="sreidn-middle">
                <div class="middle-item">
                    <img src="assets/home/univ-removebg-preview.png" class="scroll-in-left" alt="middle-item 1">
                    <div class="scroll-in">
                        <h3>40 Universities</h3>
                        <p>SRE is spread across 40 universities <br> throughout Indonesia</p>
                    </div>
                </div>
                <div class="middle-item">
                    <img src="assets/home/orang-removebg-preview.png" class="scroll-in-right" alt="middle-item 2">
                    <div class="scroll-in">
                        <h3>400.000+ People</h3>
                        <p>Reaching more than 400 thousand people</p>
                    </div>
                </div>
                <div class="middle-item">
                    <img src="assets/home/acara-removebg-preview.png" class="scroll-in-right" alt="middle-item 3">
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
                         <img src="assets/SRE_logo_green.png" alt="logo sre" class="sre-logo">
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
                    <img src="assets/SRE_logo_green.png" alt="logo sre">
                    <h1><span>INDONESIA COLLABORATORS</span></h1>
                </div>
                <div class="collab">
                    <div class="collaborators">
                        <a href="https://asean.org/" target="_blank">
                            <img src="assets/srecollaborators/ASEAN.png" alt="logo ASEAN"> </a>
                        <a href="http://astra.co.id/" target="_blank">
                            <img src="assets/srecollaborators/ASTRA.jpg" alt="logo ASTRA"></a>
                        <img src="assets/srecollaborators/BPPT.png" alt="logo BPPT">
                        <a href="https://chandra-asri.com/id" target="_blank">
                            <img src="assets/srecollaborators/chandra_asri.webp" alt="logo Chandra asri"></a>
                        <a href="https://www.ecadin.org/" target="_blank">
                            <img src="assets/srecollaborators/ECADIN-1.webp" alt="logo ECADIN"></a>
                        <a href="https://www.ge.com/news/reports/tag/ge%20indonesia" target="_blank">
                            <img src="assets/srecollaborators/General_Electric_logo.svg.png" alt="logo General Electric"></a>
                        <img src="assets/srecollaborators/geodipa-logo.png" alt="logo Geodipa">
                        <a href="https://www.giz.de/en/worldwide/352.html" target="_blank">
                            <img src="assets/srecollaborators/giz.jpg" alt="logo GIZ"></a>
                        <a href="https://iesr.or.id/en/" target="_blank">
                            <img src="assets/srecollaborators/IESR-logo-caps-hires.png" alt="logo IESR"></a>
                        <a href="https://www.irena.org/" target="_blank">
                            <img src="assets/srecollaborators/irena.png" alt="logo Irena"></a>
                        <a href="https://www.metiires.or.id/" target="_blank">
                            <img src="assets/srecollaborators/METI-logo.png" alt="logo METI" class="logoMETI"></a>
                        <a href="https://www.unmgcy.org/" target="_blank">
                            <img src="assets/srecollaborators/MGCY-Full.png" alt="logo MGCY"></a>
                        <a href="https://www.esdm.go.id/en" target="_blank">
                            <img src="assets/srecollaborators/Ministry_of_Energy_and_Mineral_Resources.png" alt="logo Ministry"></a>
                        <a href="https://kemlu.go.id/portal/en" target="_blank">
                            <img src="assets/srecollaborators/ministry.png" alt="logo Ministry FA"></a>
                        <a href="https://www.newenergynexus.com/" target="_blank">
                            <img src="assets/srecollaborators/nexus.png" alt="logo Nexus"></a>
                        <a href="https://www.pertamina.com/" target="_blank">
                            <img src="assets/srecollaborators/pertamina.png" alt="logo Pertamina"></a>
                        <a href="https://web.pln.co.id/" target="_blank">
                            <img src="assets/srecollaborators/PLN.png" alt="logo PLN"></a>
                        <a href="https://www.undp.org/" target="_blank">
                            <img src="assets/srecollaborators/UNDP_logo.svg.png" alt="logo UNDP" class="logoUNDP"></a>
    
                        <!-- DUPLIKAT -->
                        <a href="https://asean.org/" target="_blank">
                            <img src="assets/srecollaborators/ASEAN.png" alt="logo ASEAN"> </a>
                        <a href="http://astra.co.id/" target="_blank">
                            <img src="assets/srecollaborators/ASTRA.jpg" alt="logo ASTRA"></a>
                        <img src="assets/srecollaborators/BPPT.png" alt="logo BPPT">
                        <a href="https://chandra-asri.com/id" target="_blank">
                            <img src="srecollaborators/chandra_asri.webp" alt="logo Chandra asri"></a>
                        <a href="https://www.ecadin.org/" target="_blank">
                            <img src="assets/srecollaborators/ECADIN-1.webp" alt="logo ECADIN"></a>
                        <a href="https://www.ge.com/news/reports/tag/ge%20indonesia" target="_blank">
                            <img src="assets/srecollaborators/General_Electric_logo.svg.png" alt="logo GE"></a>
                        <img src="assets/srecollaborators/geodipa-logo.png" alt="logo Geodipa">
                        <a href="https://www.giz.de/en/worldwide/352.html" target="_blank">
                            <img src="assets/srecollaborators/giz.jpg" alt="logo GIZ"></a>
                        <a href="https://iesr.or.id/en/" target="_blank">
                            <img src="assets/srecollaborators/IESR-logo-caps-hires.png" alt="logo IESR"></a>
                        <a href="https://www.irena.org/" target="_blank">
                            <img src="assets/srecollaborators/irena.png" alt="logo Irena"></a>
                        <a href="https://www.pertamina.com/" target="_blank">
                            <img src="assets/srecollaborators/pertamina.png" alt="logo Pertamina"></a>
                        <a href="https://web.pln.co.id/" target="_blank">
                            <img src="assets/srecollaborators/PLN.png" alt="logo PLN"></a>
                    </div>
                </div>
            </div>
        </section>

        <section class="home-five">
            <h1 class="Contact-title">Contact Us</h1>
            <footer class="footer-sre">
                <div class="footer-left">
                    <img src="assets/SRE_logo_green.png" alt="logo sre">
                    <h2>UPN "Veteran" Yogyakarta</h2>
                    <p>Young Energy Infinite Posibilities</p>
                </div>

                <div class="footer-right">
                    <div class="contact-item">
                        <img src="assets/contactlogo/icons8-email-90.png" alt="email">
                        <span>email sre</span>
                    </div>
                    <div class="contact-item">
                        <img src="assets/contactlogo/instagram.png" alt="instagram">
                        <a href="https://www.instagram.com/sre.upnvy" target="_blank">@sre.upnvy</a>
                    </div>
                    <div class="contact-item">
                        <img src="assets/contactlogo/icons8-tiktok-90.png" alt="tiktok">
                        <a href="https://www.tiktok.com/@sre.upnvy" target="_blank">SRE UPNVY</a>
                    </div>
                    <div class="contact-item">
                        <img src="assets/contactlogo/icons8-youtube-50.png" alt="youtube">
                        <a href="https://www.youtube.com/@sreupnvy3680" target="_blank">SRE UPNVY</a>
                    </div>
                    <div class="contact-item">
                        <img src="assets/contactlogo/linkedin.png" alt="linkedin">
                        <a href="https://www.linkedin.com/company/sre-upnvy" target="_blank">linkedin</a>
                    </div>
                    <div class="contact-item">
                        <img src="assets/contactlogo/icons8-location-50.png" alt="location">
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
      
          const rect = el.getBoundingClientRect();
          if (rect.top < window.innerHeight && rect.bottom > 0) {
            el.classList.add('show');
          }
        });
    </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz4YYw