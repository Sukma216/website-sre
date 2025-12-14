<?php
include 'koneksi/database.php';

$query_pvp = "SELECT * FROM pvp WHERE jabatan IN ('President of SRE UPNVY', 'Vice President of SRE UPNVY') ORDER BY FIELD(jabatan, 'President of SRE UPNVY', 'Vice President of SRE UPNVY')";
$result_pvp = $db->query($query_pvp);

$query_hod = "SELECT hd.*, d.nama_department AS nama_department_valid, d.Id_department AS id_department_fk
             FROM head_department hd
             LEFT JOIN department d ON hd.Id_department = d.Id_department
             ORDER BY hd.Id_head ASC"; 
$result_hod = $db->query($query_hod);

if (!$result_pvp || !$result_hod) {
    die("Query Error: " . $db->error);
}

$pvp_data = [];
while ($row = $result_pvp->fetch_assoc()) {
    $pvp_data[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Team - SRE UPNVY</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
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
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.98) !important;
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            box-shadow: 0 2px 15px rgba(0,0,0,0.08);
            z-index: 100;
            transition: all 0.4s ease;
        }
        .navbar.transparent {
            background-color: transparent !important;
            box-shadow: none;
            backdrop-filter: none;
            -webkit-backdrop-filter: none;
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

        .nav-link:hover {
            color: var(--accent-gold) !important;
        }

        .nav-link.active-page {
            background-color: var(--primary-green) !important;
            color: white !important;
            box-shadow: 0 4px 10px rgba(45, 80, 22, 0.2);
        }

        /* === HERO SECTION === */
        .team-hero {
            position: relative;
            height: 60vh;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.45);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            color: white;
            max-width: 800px;
            padding: 0 20px;
        }

        .hero-content h1 {
            font-size: 4rem;
            font-weight: 800;
            letter-spacing: 2px;
            margin-bottom: 10px;
        }

        .hero-content p {
            font-size: 1.2rem;
            opacity: 0.9;
            font-style: italic;
        }

        @media (max-width: 768px) {
            .team-hero {
                height: 45vh;
            }
            .hero-content h1 {
                font-size: 2.8rem;
            }
            .hero-content p {
                font-size: 1rem;
            }
        }

        /* === PVP SECTION === */
        .pvp-section {
            padding: 80px 0 60px 0;
            background: linear-gradient(135deg, #f9fbf9 0%, #ffffff 100%);
        }

        .pvp-title {
            text-align: center;
            margin-bottom: 60px;
            color: var(--primary-green);
            font-size: 2.5rem;
            font-weight: 800;
        }

        .pvp-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 80px;
            position: relative;
            flex-wrap: wrap;
            padding: 40px 20px;
        }

        /* Lightning Bolt Decoration */
        .lightning-bolt {
            position: absolute;
            width: 120px;
            height: 120px;
            z-index: 1;
        }

        .lightning-bolt svg {
            width: 100%;
            height: 100%;
            filter: drop-shadow(0 0 20px rgba(181, 155, 42, 0.3));
        }

        /* PVP Card */
        .pvp-card {
            position: relative;
            text-align: center;
            z-index: 2;
        }

        /* --- PERBAIKAN UTAMA DI SINI --- */
        .pvp-photo-wrapper {
            position: relative;
            width: 220px;
            height: 220px; /* Dipertahankan sama dengan width */
            margin: 0 auto 20px;
            overflow: hidden; /* Tambahan untuk memastikan gambar terpotong rapi */
            border-radius: 50%; /* Tambahan agar pemotongan lingkaran sempurna */
        }

        .pvp-glow {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 260px;
            height: 260px;
            background: radial-gradient(circle, rgba(181, 155, 42, 0.3) 0%, transparent 70%);
            border-radius: 50%;
            animation: glow-pulse 3s ease-in-out infinite;
        }

        @keyframes glow-pulse {
            0%, 100% { transform: translate(-50%, -50%) scale(1); opacity: 0.5; }
            50% { transform: translate(-50%, -50%) scale(1.1); opacity: 0.8; }
        }

        .pvp-ring {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 240px;
            height: 240px;
            border: 4px solid var(--light-green);
            border-radius: 50%;
            box-shadow: 0 0 20px rgba(74, 124, 44, 0.3);
        }

        .pvp-photo {
            position: relative;
            width: 200px;
            height: 200px; /* Dipertahankan sama dengan width */
            border-radius: 50%;
            object-fit: cover; /* PENTING: Memaksa gambar menutupi area */
            border: 5px solid white;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            margin: 10px auto; /* Margin disesuaikan agar gambar di tengah wrapper 220x220 */
            transition: transform 0.3s ease;
        }

        .pvp-card:hover .pvp-photo {
            transform: scale(1.05);
        }
        /* --- AKHIR PERBAIKAN UTAMA --- */


        .pvp-name {
            font-size: 1.5rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 8px;
        }

        .pvp-role {
            font-size: 1rem;
            color: var(--primary-green);
            font-weight: 600;
            margin-bottom: 15px;
        }

        .pvp-socials {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .pvp-social-btn {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid var(--primary-green);
            border-radius: 50%;
            transition: all 0.3s;
            background: white;
        }

        .pvp-social-btn img {
            width: 20px;
            height: 20px;
        }

        .pvp-social-btn:hover {
            background-color: var(--primary-green);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(45, 80, 22, 0.3);
        }

        .pvp-social-btn:hover img { filter: brightness(0) invert(1); }

        /* === HOD SECTION === */
        .hod-section { padding: 60px 0;}

        .section-title {
            color: var(--primary-green);
            margin-bottom: 50px;
            text-align: center;
            font-size: 2rem;
        }
        
        .department-label {
            color: var(--primary-green);
            font-size: 1rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-align: center;
            margin-bottom: 15px;
            min-height: 40px;
            display: flex;
            align-items: flex-end;
            justify-content: center;
        }

        .member-card {
            background: #fff;
            border-radius: 20px;
            padding: 30px 20px;
            text-align: center;
            border: 1px solid rgba(0,0,0,0.05);
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            height: 100%;
        }

        .member-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(45, 80, 22, 0.15);
            border-color: var(--primary-green);
        }

        .member-photo {
            width: 140px;
            height: 140px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid white;
            box-shadow: 0 0 0 3px var(--primary-green);
            margin-bottom: 20px;
            transition: transform 0.3s;
        }

        .member-card:hover .member-photo { transform: scale(1.05);}
        .member-name {
            font-size: 1.2rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 5px;
        }
        .member-role {
            font-size: 0.9rem;
            color: #777;
            margin-bottom: 20px;
        }

        .social-btn {
            width: 38px;
            height: 38px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #ddd;
            border-radius: 50%;
            margin: 0 5px;
            transition: all 0.3s;
            background: white;
        }
        .social-btn img { width: 18px; height: 18px; }
        .social-btn:hover {
            background-color: var(--primary-green);
            border-color: var(--primary-green);
            filter: brightness(0) invert(1);
        }

        .btn-see-more {
            margin-top: 25px;
            background-color: var(--primary-green);
            color: white;
            padding: 10px 30px;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s;
            box-shadow: 0 4px 10px rgba(45, 80, 22, 0.2);
        }
        .btn-see-more:hover {
            background-color: var(--light-green);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(45, 80, 22, 0.3);
        }

        .horizontal-scroll-wrapper {
            overflow-x: auto;
            overflow-y: hidden;
            padding: 20px 10px 50px 10px;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none;
        }
        .horizontal-scroll-wrapper::-webkit-scrollbar { display: none;  }
        
        .scrolling-row {
            display: flex;
            flex-wrap: nowrap;
            gap: 25px;
            align-items: stretch;
        }
        .scrolling-col {
            flex: 0 0 320px;
            max-width: 320px;
            display: flex;
            flex-direction: column;
        }

        /* Scroll Animations */
        .scroll-in {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease;
        }

        .scroll-in.show {
            opacity: 1;
            transform: translateY(0);
        }

        /* === FOOTER === */
        .footer {
            background: linear-gradient(135deg, var(--primary-green) 0%, var(--light-green) 100%);
            color: white;
            padding: 70px 0 30px 0;
            margin-top: 80px;
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

        @media (max-width: 768px) {
            .navbar { padding: 15px 20px; }
            .scrolling-col { flex: 0 0 280px; max-width: 280px; }
            .pvp-container { gap: 40px; }
            .lightning-bolt { width: 80px; height: 80px; }
            
            /* --- PERBAIKAN MOBILE DI SINI --- */
            .pvp-photo-wrapper { 
                width: 160px; /* Dipertahankan sama */
                height: 160px; /* Dipertahankan sama */
            }
            .pvp-ring { width: 180px; height: 180px; }
            .pvp-photo { 
                width: 150px; /* Dipertahankan sama */
                height: 150px; /* Dipertahankan sama */
                margin: 5px auto; /* Margin (160-150)/2 = 5px */
            }
            /* --- AKHIR PERBAIKAN MOBILE --- */
        }
    </style>
</head>
<body>
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
                    <li class="nav-item"><a class="nav-link" href="About.php">About</a></li>
                    <li class="nav-item"><a class="nav-link active-page" href="Ourteam.php">Our Team</a></li>
                    <li class="nav-item"><a class="nav-link" href="activity.php">Our Activity</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="team-hero">
        <div class="hero-overlay"></div>
        <div class="hero-content scroll-in">
            <h1>OUR TEAM</h1>
            <p>Meet the dedicated individuals driving renewable energy forward<br>Society of Renewable Energy</p>
        </div>
    </section>

    <section class="pvp-section">
        <div class="container">
            <h2 class="pvp-title scroll-in">MEET OUR PVP</h2>
            
            <div class="pvp-container">
                <?php if (count($pvp_data) >= 2): ?>
                    <div class="pvp-card scroll-in">
                        <div class="pvp-photo-wrapper">
                            <div class="pvp-glow"></div>
                            <div class="pvp-ring"></div>
                            <img src="<?php echo htmlspecialchars($pvp_data[1]['image']); ?>" class="pvp-photo" alt="<?php echo htmlspecialchars($pvp_data[1]['nama']); ?>">
                        </div>
                        <h3 class="pvp-name"><?php echo htmlspecialchars($pvp_data[1]['nama']); ?></h3>
                        <p class="pvp-role"><?php echo htmlspecialchars($pvp_data[1]['jabatan']); ?> of SRE UPNVY</p>
                        <div class="pvp-socials">
                            <?php if (!empty($pvp_data[1]['instagram'])): ?>
                            <a href="<?php echo htmlspecialchars($pvp_data[1]['instagram']); ?>" class="pvp-social-btn" target="_blank">
                                <img src="assets/contactlogo/instagram.png" alt="Instagram">
                            </a>
                            <?php endif; ?>
                            <?php if (!empty($pvp_data[1]['linkedin'])): ?>
                            <a href="<?php echo htmlspecialchars($pvp_data[1]['linkedin']); ?>" class="pvp-social-btn" target="_blank">
                                <img src="assets/contactlogo/linkedin.png" alt="LinkedIn">
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="lightning-bolt">
                        <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <polygon points="50,10 35,45 55,45 40,90 75,45 55,45 70,10" fill="#B59B2A" />
                        </svg>
                    </div>

                    <div class="pvp-card scroll-in">
                        <div class="pvp-photo-wrapper">
                            <div class="pvp-glow"></div>
                            <div class="pvp-ring"></div>
                            <img src="<?php echo htmlspecialchars($pvp_data[0]['image']); ?>" class="pvp-photo" alt="<?php echo htmlspecialchars($pvp_data[0]['nama']); ?>">
                        </div>
                        <h3 class="pvp-name"><?php echo htmlspecialchars($pvp_data[0]['nama']); ?></h3>
                        <p class="pvp-role"><?php echo htmlspecialchars($pvp_data[0]['jabatan']); ?> of SRE UPNVY</p>
                        <div class="pvp-socials">
                            <?php if (!empty($pvp_data[0]['instagram'])): ?>
                            <a href="<?php echo htmlspecialchars($pvp_data[0]['instagram']); ?>" class="pvp-social-btn" target="_blank">
                                <img src="assets/contactlogo/instagram.png" alt="Instagram">
                            </a>
                            <?php endif; ?>
                            <?php if (!empty($pvp_data[0]['linkedin'])): ?>
                            <a href="<?php echo htmlspecialchars($pvp_data[0]['linkedin']); ?>" class="pvp-social-btn" target="_blank">
                                <img src="assets/contactlogo/linkedin.png" alt="LinkedIn">
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php else: ?>
                    <p class="text-center">PVP data not available</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="hod-section">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title scroll-in">MEET OUR HEAD OF DEPARTMENT</h2>
            </div>
            
            <div class="horizontal-scroll-wrapper">
                <div class="scrolling-row">
                    <?php
                    if ($result_hod->num_rows > 0) {
                        while ($row = $result_hod->fetch_assoc()) {
                            $dept_title = $row['nama_department_valid'];
                            $id_department_fk = $row['id_department_fk'];
                            $has_department = !empty($id_department_fk);
                    ?>
                    
                    <div class="scrolling-col"> 
                        <div class="department-label">
                            <?php echo htmlspecialchars($dept_title); ?>
                        </div>

                        <div class="member-card">
                            <div>
                                <img src="<?php echo htmlspecialchars($row['image']); ?>" class="member-photo" alt="Foto <?php echo htmlspecialchars($row['nama_head']); ?>">
                                
                                <div class="member-name"><?php echo htmlspecialchars($row['nama_head']); ?></div>
                                <p class="member-role"><?php echo htmlspecialchars($row['jabatan']); ?></p>
                                
                                <div class="d-flex justify-content-center mb-3">
                                    <?php if (!empty($row['linkedin'])): ?>
                                    <a href="<?php echo htmlspecialchars($row['linkedin']); ?>" class="social-btn" target="_blank">
                                        <img src="assets/contactlogo/linkedin.png" alt="Linkedin">
                                    </a>
                                    <?php endif; ?>
                                    
                                    <?php if (!empty($row['instagram'])): ?>
                                    <a href="<?php echo htmlspecialchars($row['instagram']); ?>" class="social-btn" target="_blank">
                                        <img src="assets/contactlogo/instagram.png" alt="Instagram">
                                    </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <div>
                                <?php if ($has_department): ?>
                                    <a href="detail_department.php?id=<?php echo $id_department_fk; ?>" class="btn-see-more">See More</a>
                                <?php else: ?>
                                    <span class="d-inline-block mt-4 text-muted small fst-italic">Department info coming soon</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    
                    <?php
                        } 
                    } else {
                        echo '<div class="col-12"><p class="text-center text-muted">Data anggota tim belum tersedia saat ini.</p></div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

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
        document.addEventListener("DOMContentLoaded", function() {
            // Navbar scroll effect
            const navbar = document.querySelector('.navbar');
            navbar.classList.add('transparent');
            
            window.addEventListener('scroll', function() {
                if (window.scrollY > 50) {
                    navbar.classList.remove('transparent');
                } else {
                    navbar.classList.add('transparent');
                }
            });

            // Scroll animations
            const elements = document.querySelectorAll('.scroll-in');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting && !entry.target.classList.contains('show')) {
                        entry.target.classList.add('show');
                    }
                });
            }, { threshold: 0.2 });

            elements.forEach(el => observer.observe(el));

            // Member cards animation
            const cards = document.querySelectorAll('.member-card');
            const cardObserver = new IntersectionObserver((entries) => {
                entries.forEach((entry, index) => {
                    if (entry.isIntersecting) {
                        setTimeout(() => {
                            entry.target.style.opacity = "1";
                            entry.target.style.transform = "translateY(0)";
                        }, index * 100); 
                    }
                });
            }, { threshold: 0.1 });

            cards.forEach(card => {
                card.style.opacity = "0";
                card.style.transform = "translateY(30px)";
                card.style.transition = "opacity 0.6s ease, transform 0.6s ease";
                cardObserver.observe(card);
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>