<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SRE WEBSITE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,700;1,400&family=Poppins:wght@400;600&display=swap" rel="stylesheet">  
    <style>
        :root {
            --primary-green: #2D5016;
            --light-green: #4A7C2C;
            --accent-gold: #B39B2A;
        }

        body {
            font-family: 'Poppins', sans-serif !important;
            background-color: #f9fbf9;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Poppins', sans-serif !important;
            font-weight: 700;
        }

        /* === NAVBAR === */
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

        .nav-link.active-page {
            background-color: var(--primary-green) !important;
            color: white !important;
            box-shadow: 0 4px 10px rgba(45, 80, 22, 0.2);
        }

        /* === CONTENT SECTION === */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        .two { padding-top: 120px; padding-bottom: 50px; }

        /* === VISION SECTION === */
        .vision { margin-bottom: 100px; }

        .vission-row {
            display: flex;
            align-items: center;
            gap: 60px;
            flex-wrap: wrap;
        }

        .vision-content { flex: 1; min-width: 300px; }
        .vision-title { margin-bottom: 30px; }
        .vision-title h2.our {
            font-size: 2.5rem;
            color: var(--accent-gold);
            margin-bottom: 0;
            font-weight: 700;
        }
        .vision-title h2.visi {
            font-size: 3.5rem;
            color: var(--primary-green);
            margin-top: -10px;
            font-weight: 800;
        }
        .vision-text p { font-size: 1.1rem; line-height: 1.8; color: #333; }
        .vision-text span { color: var(--primary-green); font-weight: 700; }
        .vision-image { flex: 0 0 400px; text-align: center; } 
        .vision-image img {
            max-width: 100%;
            height: auto;
            filter: drop-shadow(0 10px 30px rgba(0,0,0,0.1));
        }

        /* === MISSION SECTION === */
        .mission {
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 60px;
            margin-bottom: 100px;
            align-items: start;
        }

        .mission-title h2.our {
            font-size: 2.5rem;
            color: var(--accent-gold);
            margin-bottom: 0;
            font-weight: 700;
        }

        .mission-title h2.visi {
            font-size: 3.5rem;
            color: var(--primary-green);
            margin-top: -10px;
            font-weight: 800;
        }
        .mission-right {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }
        .mission-item {
            display: flex;
            align-items: center;
            gap: 25px;
        }
        .misi-icon {
            width: 80px;
            height: 80px;
            flex-shrink: 0;
            object-fit: contain;
        }

        .misi-box {
            background: white;
            padding: 25px 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            border-left: 4px solid var(--primary-green);
            flex: 1;
        }

        .misi-box p {
            margin: 0;
            font-size: 1rem;
            line-height: 1.6;
            color: #333;
        }

        /* === TAGLINE SECTION === */
        .ourtagline { margin-bottom: 80px; }
        .ourtagline > div h1 {
            text-align: center;
            font-size: 3rem;
            margin-bottom: 60px;
            color: var(--primary-green);
        }
        .ourtagline > div h1 span.our { color: var(--accent-gold); }
        .scroll-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .tagline-item {
            background: linear-gradient(135deg, var(--primary-green), var(--light-green));
            color: white;
            padding: 40px 30px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(45, 80, 22, 0.2);
            transition: transform 0.3s ease;
        }

        .tagline-item:hover {transform: translateY(-10px); }
        .tagline-item h2 {
            font-size: 2rem;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .tagline-item p {
            font-size: 0.95rem;
            line-height: 1.6;
            opacity: 0.95;
        }

        /* === SCROLL ANIMATIONS === */
        .scroll-in, .scroll-in-right { opacity: 0; transition: all 0.8s ease; }
        .scroll-in { transform: translateY(30px); }
        .scroll-in-right { transform: translateX(50px); }
        .scroll-in.show, .scroll-in-right.show { opacity: 1; transform: translate(0, 0); }
        /* === RESPONSIVE === */
        @media (max-width: 992px) {
            .mission {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .vision-image {
                flex: 0 0 300px;
            }
        }

        @media (max-width: 768px) {
            .vission-row {
                flex-direction: column;
            }

            .vision-title h2.our {
                font-size: 2rem;
            }

            .vision-title h2.visi {
                font-size: 2.8rem;
            }

            .mission-title h2.our {
                font-size: 2rem;
            }

            .mission-title h2.visi {
                font-size: 2.8rem;
            }

            .mission-item {
                flex-direction: column;
                text-align: center;
            }

            .scroll-container {
                grid-template-columns: 1fr;
            }

            .ourtagline > div h1 {
                font-size: 2rem;
            }
        }

        /* === FOOTER === */
        .footer {
            background: linear-gradient(135deg, var(--primary-green) 0%, var(--light-green) 100%);
            color: white;
            padding: 70px 0 30px 0;
            margin-top: 50px;
        }
        .footer h5 { font-weight: 700; margin-bottom: 25px; letter-spacing: 0.5px; }
        .footer a { color: rgba(255,255,255,0.85); text-decoration: none; transition: 0.3s; }
        .footer a:hover { color: white; padding-left: 5px; }
        .footer-logo {
            max-width: 180px;
            margin-bottom: 20px;
            margin-top: 20px;
            margin-left: 20px;
        }
        .footer-bottom { border-top: 1px solid rgba(255,255,255,0.15); margin-top: 50px; padding-top: 25px; font-size: 0.9rem; }
        .quick-links li { margin-bottom: 12px; list-style: none; }
        .quick-links { padding-left: 0; }
    </style>
</head>
<body class="about-page">
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
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link active-page" href="About.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="Ourteam.php">Our Team</a></li>
                    <li class="nav-item"><a class="nav-link" href="activity.php">Our Activity</a></li>
                </ul>
            </div>
        </div>
    </nav>
  
    <div class="container">
        <section class="two">
            <div class="vision">
                <div class="vission-row">
                    <div class="vision-content">
                        <div class="vision-title">
                            <div class="scroll-in">
                                <h2 class="our">OUR</h2>
                                <h2 class="visi">VISION</h2>
                            </div>
                        </div>
                        <div class="vision-text">
                            <p class="scroll-in"><span>SRE UPNVY </span>as a dynamic platform for growth, 
                            encourage a collaborative and supportive environment in the field of Renewable Energy, 
                            and maximizing its potential through education and continuous innovation.</p>
                        </div>
                    </div>

                    <div class="vision-image">
                        <img src="sreidn-logo/wind-power.png" class="scroll-in-right" style="transition-delay: 0s;" alt="wind-power">
                    </div>
                </div>
            </div>

            <div class="mission">
                <div class="mission-left">
                    <div class="mission-title">
                        <div class="scroll-in">
                            <h2 class="our">OUR</h2>
                            <h2 class="visi">MISSION</h2>
                        </div>
                    </div>
                </div>
                
                <div class="mission-right">
                    <div class="mission-item">
                        <img src="sreidn-logo/logo 1 (1).png" class="misi-icon scroll-in-right" style="transition-delay: 0s" alt="icon 1">
                        <div class="misi-box scroll-in-right" style="transition-delay: 0.1s">
                            <p>1. Enhancing RE-Knowledge through educational programs and real-world implementation</p>
                        </div>
                    </div>
                    <div class="mission-item">
                        <img src="sreidn-logo/logo 3.png" class="misi-icon scroll-in-right" style="transition-delay: 0.2s" alt="icon 2">
                        <div class="misi-box scroll-in-right" style="transition-delay: 0.3s">
                            <p>2. Building a comfortable and inclusive ecosystem for members to grow and thrive for various goals</p>
                        </div>
                    </div>
                    <div class="mission-item">
                        <img src="sreidn-logo/logo 2.png" class="misi-icon scroll-in-right" style="transition-delay: 0.4s" alt="icon 3">
                        <div class="misi-box scroll-in-right" style="transition-delay: 0.5s">
                            <p>3. Strengthening partnership among member and expanding network form other SRE chapter
                                and external organizations to drive impactful initiatives and long-term impact</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="ourtagline">
                <div class="scroll-in">
                    <h1><span class="our">What</span> We Believe In</h1>
                </div>
                
                <div class="scroll-container">
                    <div class="scroll-in">
                        <div class="tagline-item">
                            <h2>Young</h2>
                            <p>Enthusiasm, creativity, and great potential of youth in bringing about change</p>
                        </div>
                    </div>
                    <div class="scroll-in">
                        <div class="tagline-item">
                            <h2>Energy</h2>
                            <p>Enthusiasm, creativity, and great potential of youth in bringing about change</p>
                        </div>
                    </div>
                    <div class="scroll-in">
                        <div class="tagline-item">
                            <h2>Infinite</h2>
                            <p>Opportunities and innovations that can be created by youth are endless</p>
                        </div>
                    </div>
                    <div class="scroll-in">
                        <div class="tagline-item">
                            <h2>Possibilities</h2>
                            <p>Opportunity and potential to innovate, grow and create change for themself and in the world of renewable energy</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <img src="assets/SRE_logo_green.png" alt="SRE UPNVY Logo" class="footer-logo"> 
                </div>

                <div class="col-lg-2 mb-4">
                    <h5>Quick Links</h5>
                    <ul class="quick-links">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="About.php">About</a></li>
                        <li><a href="Ourteam.php">Our Team</a></li>
                        <li><a href="activity.php">Our Activity</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 mb-4">
                    <h5>Contact Us</h5>
                    <p>Jl. SWK 104 (Lingkar Utara)<br>Condongcatur, Yogyakarta 55283</p>
                    <p>sre@upnyk.ac.id</p>
                    <p>+62 274 486733</p>
                </div>

                <div class="col-lg-3 mb-4">
                    <h5>About SRE</h5>
                    <p style="font-size: 0.95rem;">Fokus pada penelitian dan pengembangan energi terbarukan untuk masa depan yang berkelanjutan.</p>
                </div>
            </div>

            <div class="footer-bottom text-center">
                <p class="mb-0">&copy; 2024 SRE UPNVY. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        const elements = document.querySelectorAll('.scroll-in, .scroll-in-right');
      
        const observer = new IntersectionObserver((entries) => {
          entries.forEach(entry => {
            if (entry.isIntersecting && !entry.target.classList.contains('show')) {
              entry.target.classList.add('show');
            }
          });
        }, {
          threshold: 0.2
        });
      
        elements.forEach(el => observer.observe(el));
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>