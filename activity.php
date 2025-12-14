<?php
// =================================================================
// 1. KONEKSI DATABASE
// =================================================================
include 'koneksi/database.php';

// =================================================================
// 2. INISIALISASI VARIABEL PENGAMBILAN DATA
// =================================================================
$activities = [];

if (!isset($db) || !$db) {
    die("Error: Objek koneksi \$db tidak tersedia atau gagal terinisialisasi. Cek 'koneksi/database.php'.");
}

try {
    $query_activities = "SELECT Id_activity, nama_activity, deskripsi, sdg_image, sdg_deskripsi FROM activity ORDER BY Id_activity";
    $result = $db->query($query_activities);
    
    if ($result && $result->num_rows > 0) {
        while ($activity = $result->fetch_assoc()) {
            $id = $activity['Id_activity'];
            
            // Ambil kolaborator
            $query_kolaborator = "SELECT logo_url FROM kolaborator WHERE Id_activity = ?";
            $stmt = $db->prepare($query_kolaborator);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $res_kolaborator = $stmt->get_result();
            $kolaborator = [];
            while ($row = $res_kolaborator->fetch_assoc()) {
                $kolaborator[] = $row['logo_url'];
            }
            $stmt->close();
            
            // Ambil dokumentasi
            $query_dokumentasi = "SELECT image_path FROM dokumentasi WHERE Id_activity = ?";
            $stmt = $db->prepare($query_dokumentasi);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $res_dokumentasi = $stmt->get_result();
            $dokumentasi = [];
            while ($row = $res_dokumentasi->fetch_assoc()) {
                $dokumentasi[] = $row['image_path'];
            }
            $stmt->close();
            
            // Gabungkan semua data
            $activities[] = [
                'id' => $id,
                'nama' => $activity['nama_activity'],
                'deskripsi' => $activity['deskripsi'],
                'sdg_image' => $activity['sdg_image'],
                'sdg_deskripsi' => $activity['sdg_deskripsi'],
                'kolaborator' => $kolaborator,
                'dokumentasi' => $dokumentasi
            ];
        }
    }
} catch (Exception $e) {
    die("Database Error: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Activity - SRE UPNVY</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body, html {
            font-family: 'Poppins', sans-serif;
            height: auto !important;
            min-height: 100vh;
            overflow-y: auto !important;
            overflow-x: hidden;
            background-color: #f9fbf9;
        }
        :root {
            --primary-green: #2D5016;
            --light-green: #4A7C2C;
            --accent-gold: #B39B2A;
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
        .activity-hero {
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
            .activity-hero {
                height: 45vh;
            }
            .hero-content h1 {
                font-size: 2.8rem;
            }
            .hero-content p {
                font-size: 1rem;
            }
        }

        /* === ACTIVITY CONTENT === */
        .activity-section {
            padding-top: 80px;
            padding-bottom: 80px;
        }

        /* See More Activity Button */
        .see-more-container {
            text-align: center;
            margin: 40px 0 60px 0;
        }

        .see-more-btn {
            background: #2D5016;
            color: white;
            border: 2px solid #2D5016;
            padding: 12px 40px;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .see-more-btn:hover {
            background: #4A7C2C;
            border-color: #4A7C2C;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(45, 80, 22, 0.3);
        }

        /* Button Navigation Styles */
        .button-navigation {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 40px 0;
            gap: 15px;
            padding: 0 20px;
        }

        .arrow-btn {
            background: #2D5016;
            color: white;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 20px;
            transition: all 0.3s;
            flex-shrink: 0;
            font-weight: bold;
        }

        .arrow-btn:hover {
            background: #4A7C2C;
            transform: scale(1.1);
        }

        .arrow-btn:disabled {
            background: #ccc;
            cursor: not-allowed;
            opacity: 0.5;
        }

        .buttons-container {
            overflow: hidden;
            flex: 1;
            max-width: 800px;
        }

        .buttons-wrapper {
            display: flex;
            gap: 15px;
            transition: transform 0.3s ease;
        }

        .activity-btn {
            padding: 12px 30px;
            border: 2px solid #2D5016;
            background: white;
            color: #2D5016;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            white-space: nowrap;
            flex-shrink: 0;
        }

        .activity-btn:hover {
            background: #f0f0f0;
            transform: translateY(-2px);
        }

        .activity-btn.active {
            background: #2D5016;
            color: white;
        }

        /* Activity Content */
        .activity-content {
            display: none;
            animation: fadeIn 0.5s;
        }

        .activity-content.active {
            display: block;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
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

        /* Footer Styles */
        .footer {
            background: linear-gradient(135deg, #2D5016 0%, #4A7C2C 100%);
            color: white;
            padding: 70px 0 30px 0;
            margin-top: 80px;
        }

        .footer h5 {
            font-weight: 700;
            margin-bottom: 25px;
            letter-spacing: 0.5px;
        }

        .footer p, .footer a {
            color: rgba(255, 255, 255, 0.85);
            text-decoration: none;
            line-height: 1.8;
        }

        .footer a:hover {
            color: white;
            padding-left: 5px;
        }

        .footer-logo {
            max-width: 180px;
            margin-bottom: 20px;
            margin-top: 20px;
            margin-left: 20px;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.15);
            margin-top: 50px;
            padding-top: 25px;
            text-align: center;
            font-size: 0.9rem;
        }

        .quick-links li {
            list-style: none;
            margin-bottom: 12px;
        }

        .quick-links {
            padding: 0;
        }
    </style>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"> 
                <img src="assets/SRE_logo_green.png" alt="logo sre">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li> 
                    <li class="nav-item"><a class="nav-link" href="about.php">About</a></li> 
                    <li class="nav-item"><a class="nav-link" href="Ourteam.php">Our Team</a></li>
                    <li class="nav-item"><a class="nav-link active-page" href="activity.php">Our Activity</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="activity-hero">
        <div class="hero-overlay"></div>
        <div class="hero-content scroll-in">
            <h1>OUR ACTIVITY</h1>
            <p>Explore our initiatives for a sustainable future<br>Society of Renewable Energy</p>
        </div>
    </section>

    <!-- See More Button -->
    <div class="see-more-container">
        <a href="all_activities.php" class="see-more-btn">See More Activity</a>
    </div>

    <?php if (empty($activities)): ?>
        <div class="container text-center py-5">
            <h3>Tidak ada aktivitas yang tersedia</h3>
            <p>Silakan tambahkan data aktivitas di database.</p>
        </div>
    <?php else: ?>
        <!-- Button Navigation -->
        <div class="button-navigation">
            <button class="arrow-btn" id="prevBtn" onclick="scrollButtons(-1)">‹</button>
            <div class="buttons-container">
                <div class="buttons-wrapper" id="buttonsWrapper">
                    <?php foreach ($activities as $index => $activity): ?>
                        <button class="activity-btn <?php echo $index === 0 ? 'active' : ''; ?>" 
                                onclick="showActivity(<?php echo $index; ?>)">
                            <?php echo htmlspecialchars($activity['nama']); ?>
                        </button>
                    <?php endforeach; ?>
                </div>
            </div>
            <button class="arrow-btn" id="nextBtn" onclick="scrollButtons(1)">›</button>
        </div>

        <!-- Activity Content -->
        <div class="container">
            <?php foreach ($activities as $index => $activity): ?>
                <div class="activity-content <?php echo $index === 0 ? 'active' : ''; ?>" id="activity-<?php echo $index; ?>">
                    <div class="activity-section">
                        <div class="text-center">
                            <h2 class="fw-bold mb-0" style="color: #2D5016; 
                                                                font-size: 2rem; 
                                                                text-transform: uppercase; 
                                                                letter-spacing: 1px;
                                                                text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
                                                                border-bottom: 3px solid #4A7C2C;
                                                                padding-bottom: 10px;
                                                                display: inline-block;">
                                <?php echo htmlspecialchars($activity['nama']); ?>
                            </h2>
                        </div>
                        
                        <div class="row align-items-start mt-5">
                            <!-- Dokumentasi Images -->
                            <div class="col-lg-4 mb-4 mb-lg-0 d-flex justify-content-center">
                                <?php if (!empty($activity['dokumentasi'])): ?>
                                <div class="d-flex flex-column align-items-center gap-4">
                                    <div class="d-flex gap-4 align-items-center">
                                        <img src="<?php echo htmlspecialchars($activity['dokumentasi'][0]); ?>" 
                                            alt="<?php echo htmlspecialchars($activity['nama']); ?>"
                                            class="rounded-circle border shadow" 
                                            style="width: 150px; height: 150px; object-fit: cover; border-width: 3px !important; border-color: #2D5016 !important;">
                                        
                                        <?php if (count($activity['dokumentasi']) > 1): ?>
                                        <img src="<?php echo htmlspecialchars($activity['dokumentasi'][1]); ?>" 
                                            class="rounded-circle border shadow-sm" 
                                            style="width: 100px; height: 100px; object-fit: cover; border-width: 2px !important; border-color: #4A7C2C !important;">
                                        <?php endif; ?>
                                    </div>
                                    
                                    <?php if (count($activity['dokumentasi']) > 2): ?>
                                    <div class="d-flex gap-4">
                                        <?php 
                                        $remaining = min(count($activity['dokumentasi']) - 2, 2);
                                        for ($i = 2; $i < 2 + $remaining; $i++): 
                                        ?>
                                            <img src="<?php echo htmlspecialchars($activity['dokumentasi'][$i]); ?>" 
                                                class="rounded-circle border shadow-sm" 
                                                style="width: 100px; height: 100px; object-fit: cover; border-width: 2px !important; border-color: #ddd !important;">
                                        <?php endfor; ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                            
                            <!-- Description & SDG -->
                            <div class="col-lg-8">
                                <div class="row align-items-start">
                                    <!-- Description & Kolaborator -->
                                    <div class="col-lg-5 mb-3 mb-lg-0">
                                        <p style="text-align: justify; margin-bottom: 20px;"><?php echo nl2br(htmlspecialchars($activity['deskripsi'])); ?></p>
                                        
                                        <?php if (!empty($activity['kolaborator'])): ?>
                                            <h4 class="mt-4">Kolaborator:</h4>
                                            <div class="d-flex flex-wrap gap-3 align-items-center">
                                                <?php foreach ($activity['kolaborator'] as $logo_url): ?>
                                                    <img src="<?php echo htmlspecialchars($logo_url); ?>" 
                                                        alt="Logo Kolaborator" 
                                                        style="width: 70px; height: 70px; object-fit: contain; border-radius: 50%; border: 2px solid #ddd; padding: 5px; background: white;">
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <!-- SDG Section -->
                                    <div class="col-lg-7">
                                        <div class="bg-light p-3 rounded shadow-sm">
                                            <div class="d-flex flex-column gap-3 mb-3">
                                                <div class="d-flex flex-wrap gap-2 justify-content-center">
                                                    <?php 
                                                    $sdg_paths = !empty($activity['sdg_image']) ? explode(',', $activity['sdg_image']) : [];
                                                    foreach ($sdg_paths as $sdg_path): 
                                                        if (trim($sdg_path) !== ''): 
                                                    ?>
                                                            <img src="<?php echo htmlspecialchars(trim($sdg_path)); ?>" 
                                                                alt="SDG" 
                                                                style="width: 90px; height: 90px; object-fit: contain; display: block;">
                                                    <?php 
                                                        endif;
                                                    endforeach; 
                                                    ?>
                                                </div>
                                                
                                                <div class="text-center">
                                                    <img src="sdg/SDGLogo.gif" alt="Sustainable Development Goals" 
                                                            style="max-width: 250px; height: 60px; object-fit: contain;">
                                                </div>
                                            </div>
                                            
                                            <div class="bg-secondary text-white p-3" style="border-radius: 8px; background-color: #4A7C2C !important;">
                                                <p class="m-0" style="font-size: 0.95rem; line-height: 1.5;">
                                                    <?php echo nl2br(htmlspecialchars($activity['sdg_deskripsi'])); ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <!-- Footer -->
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
                        <li><a href="about.php">About</a></li>
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

            <div class="footer-bottom">
                <p class="mb-0">&copy; 2024 SRE UPNVY. All Rights Reserved.</p>
            </div>
        </div>
    </footer>
    
    <script>
        let currentScroll = 0;
        const scrollAmount = 300;

        function showActivity(index) {
            document.querySelectorAll('.activity-content').forEach(content => {
                content.classList.remove('active');
            });
            
            document.querySelectorAll('.activity-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            
            const activityContent = document.getElementById('activity-' + index);
            const activityButton = document.querySelectorAll('.activity-btn')[index];
            
            if (activityContent && activityButton) {
                activityContent.classList.add('active');
                activityButton.classList.add('active');
            }
        }

        function scrollButtons(direction) {
            const wrapper = document.getElementById('buttonsWrapper');
            const container = wrapper.parentElement;
            
            if (!wrapper || !container) return;

            const maxScroll = wrapper.scrollWidth - container.clientWidth;
            
            currentScroll += direction * scrollAmount;
            currentScroll = Math.max(0, Math.min(currentScroll, maxScroll));
            
            wrapper.style.transform = `translateX(-${currentScroll}px)`;
            
            document.getElementById('prevBtn').disabled = currentScroll === 0;
            document.getElementById('nextBtn').disabled = currentScroll >= maxScroll;
        }

        document.addEventListener('DOMContentLoaded', function() {
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

            // Initialize activities
            if (document.querySelectorAll('.activity-btn').length > 0) {
                showActivity(0);
            }
            
            const wrapper = document.getElementById('buttonsWrapper');
            const container = wrapper ? wrapper.parentElement : null;
            
            if (wrapper && container) {
                const maxScroll = wrapper.scrollWidth - container.clientWidth;
                
                document.getElementById('prevBtn').disabled = true;
                document.getElementById('nextBtn').disabled = maxScroll <= 0;
            }

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
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>