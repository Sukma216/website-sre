<?php
include 'koneksi/database.php';

// Menggunakan alias kolom agar lebih aman dan jelas
$database = "SELECT hd.*, d.nama_department AS nama_department_valid, d.Id_department AS id_department_fk
            FROM head_department hd
            LEFT JOIN department d ON hd.Id_department = d.Id_department
            ORDER BY hd.Id_head ASC"; 
$result = $db->query($database);

// Error handling
if (!$result) {
    die("Query Error: " . $db->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SRE WEBSITE - Our Team</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        /* === 1. GLOBAL & FONT FIX === */
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

        /* === 2. NAVBAR === */
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

        .nav-link:hover {
            color: var(--accent-gold) !important;
        }

        /* Class khusus untuk menu yang sedang aktif */
        .nav-link.active-page {
            background-color: var(--primary-green) !important;
            color: white !important;
            box-shadow: 0 4px 10px rgba(45, 80, 22, 0.2);
        }

        /* === 3. CARD MEMBER & LAYOUT === */
        .section-title {
            color: var(--primary-green);
            margin-bottom: 50px;
            position: relative;
            display: inline-block;
        }
        
        /* Judul Department di Luar Kotak */
        .department-label {
            color: var(--primary-green);
            font-size: 1rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-align: center;
            margin-bottom: 15px;
            min-height: 40px; /* Tinggi minimal agar kartu sejajar walau teks panjang */
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
            height: 100%; /* Agar tinggi kartu seragam */
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

        .member-card:hover .member-photo {
            transform: scale(1.05);
        }

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

        /* Social Icons */
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

        /* Button See More */
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

        /* === 4. HORIZONTAL SCROLL FIX === */
        .horizontal-scroll-wrapper {
            overflow-x: auto;
            overflow-y: hidden;
            padding: 20px 10px 50px 10px;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none;
        }
        .horizontal-scroll-wrapper::-webkit-scrollbar {
            display: none;
        }
        
        .scrolling-row {
            display: flex;
            flex-wrap: nowrap;
            gap: 25px;
            align-items: stretch; /* Agar tinggi kolom sama */
        }

        .scrolling-col {
            flex: 0 0 320px;
            max-width: 320px;
            display: flex;
            flex-direction: column;
        }

        @media (max-width: 768px) {
            .navbar { padding: 15px 20px; background-color: white !important; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
            .scrolling-col { flex: 0 0 280px; max-width: 280px; }
            .section-title { font-size: 1.5rem; margin-top: 80px; }
        }

        /* === 5. FOOTER === */
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
            /* Background putih dihapus */
        }
        .footer-bottom { border-top: 1px solid rgba(255,255,255,0.15); margin-top: 50px; padding-top: 25px; font-size: 0.9rem; }
        .quick-links li { margin-bottom: 12px; list-style: none; }
        .quick-links { padding-left: 0; }
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
    
    <section class="container" style="margin-top: 120px;">
        <div class="text-center">
            <h2 class="section-title">MEET OUR HEAD OF DEPARTMENT</h2>
        </div>
        
        <div class="horizontal-scroll-wrapper">
            <div class="scrolling-row">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $dept_title = $row['nama_department'];
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
            const cards = document.querySelectorAll('.member-card');
            const observer = new IntersectionObserver((entries) => {
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
                observer.observe(card);
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>