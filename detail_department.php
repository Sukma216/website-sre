<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'koneksi/database.php';

// Ambil ID department dari URL
$id_department = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id_department == 0) {
    header("Location: Ourteam.php");
    exit();
}

// Query untuk mendapatkan detail department, FOTO TEAM (d.image), dan head of department (hd.image)
$id_department_diterima = $_GET['id']; 
$query_dept = "SELECT 
                    d.*, 
                    hd.nama_head, hd.image AS head_image, hd.jabatan, hd.linkedin, hd.instagram
               FROM 
                    department d
               LEFT JOIN 
                    head_department hd 
                    ON d.Id_department = hd.Id_department 
               WHERE 
                    d.Id_department = ?";

$stmt = $db->prepare($query_dept);
$stmt->bind_param("i", $id_department);
$stmt->execute();
$result_dept = $stmt->get_result();
$department = $result_dept->fetch_assoc();

// Cek apakah department ditemukan
if (!$department) {
    echo "<script>alert('Department tidak ditemukan!'); window.location.href='Ourteam.php';</script>";
    exit();
}

// === START: LOGIKA UNTUK DEPUTY ===
$deputies = [];

// 1. Dapatkan Id_head dari department yang bersangkutan
$query_head_id = "SELECT Id_head FROM head_department WHERE Id_department = ?";
$stmt_head_id = $db->prepare($query_head_id);
$stmt_head_id->bind_param("i", $id_department);
$stmt_head_id->execute();
$result_head_id = $stmt_head_id->get_result();
$head_info = $result_head_id->fetch_assoc();
$stmt_head_id->close();

if ($head_info) {
    $Id_head = $head_info['Id_head'];
    
    // 2. Dapatkan semua Deputy yang terkait dengan Id_head tersebut
    $query_deputy = "SELECT * FROM deputy WHERE Id_head = ?";
    $stmt_deputy = $db->prepare($query_deputy);
    $stmt_deputy->bind_param("i", $Id_head);
    $stmt_deputy->execute();
    $result_deputy = $stmt_deputy->get_result();
    
    while ($deputy = $result_deputy->fetch_assoc()) {
        $deputies[] = $deputy;
    }
    $stmt_deputy->close();
}
// === END: LOGIKA UNTUK DEPUTY ===


// Query untuk mendapatkan divisi dan scope
$query_divisi = "SELECT 
                    nama_divisi, jobdesk_detail
                 FROM 
                    divisi
                 WHERE 
                    Id_department = ?";
$stmt_divisi = $db->prepare($query_divisi);
$stmt_divisi->bind_param("i", $id_department);
$stmt_divisi->execute();
$result_divisi = $stmt_divisi->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($department['nama_department']); ?> - SRE WEBSITE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        /* === COLOR & FONT VARIABLES === */
        :root {
            --primary-green: #2D5016;
            --light-green: #4A7C2C;
            --accent-gold: #B39B2A;
            --green-bg-gradient: linear-gradient(135deg, var(--primary-green) 0%, var(--light-green) 100%);
        }
        body {
            font-family: 'Poppins', sans-serif !important;
            background-color: #f8f9fa;
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Poppins', sans-serif !important;
            font-weight: 700;
        }

        /* === 1. HERO SECTION (HOD Profile - Full Screen Prominence) === */
        .hero-section {
            background: var(--green-bg-gradient); 
            color: white;
            padding: 100px 0 80px;
            min-height: 85vh; 
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .head-profile { text-align: center; width: 100%; }
        
        /* REVISI: Mengatur ukuran H1 (Judul Departemen) agar lebih kecil */
        .head-profile h1 {
            font-size: 2.5rem !important; 
            letter-spacing: 0.5px;
        }
        @media (min-width: 992px) {
            .head-profile h1 {
                font-size: 3.2rem !important; 
            }
        }
        /* AKHIR REVISI JUDUL */

        .head-photo {
            width: 180px; height: 180px; object-fit: cover;
            border-radius: 50%; border: 5px solid white;
            box-shadow: 0 0 0 5px white, 0 0 0 8px var(--accent-gold); 
            margin-bottom: 20px;
        }
        .social-link {
            display: inline-block; width: 40px; height: 40px; border-radius: 50%;
            background-color: rgba(255,255,255,0.2); text-align: center; line-height: 40px;
            margin: 0 5px; transition: background-color 0.3s ease;
        }
        .social-link:hover { background-color: rgba(255,255,255,0.4); }
        .social-link img {
            width: 20px; height: 20px; vertical-align: middle; filter: brightness(0) invert(1);
        }

        /* --- CSS UNTUK DEPUTY --- */
        .deputy-container {
            margin-top: 50px;
            padding-top: 30px;
            border-top: 1px solid rgba(255,255,255,0.3);
        }

        .deputy-card {
            text-align: center;
            margin-bottom: 20px;
        }

        .deputy-photo {
            width: 120px; 
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid white;
            box-shadow: 0 0 0 3px var(--light-green); 
            margin-bottom: 10px;
        }

        .deputy-card h5 {
            font-weight: 600;
            font-size: 1.1rem;
            color: white;
            margin-bottom: 0;
        }

        .deputy-card p {
            font-size: 0.9rem;
            opacity: 0.8;
        }
        /* -------------------------- */


        /* === 2. MAIN CONTENT & SCOPE LAYOUT === */
        .section-title {
            color: var(--primary-green); font-weight: 800; margin-bottom: 30px;
            border-bottom: 3px solid var(--light-green); padding-bottom: 10px; display: inline-block;
        }

        /* LEFT COLUMN: Main Description Block - DIBATASI LEBARNYA */
        .main-info-block {
            background-color: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            height: 100%; 
            
            /* REVISI: Batasi lebar kolom dan pusatkan di dalam col-lg-5 */
            max-width: 450px; 
            margin: 0 auto; 
        }
        .main-dept-description {
            font-size: 1.05rem; line-height: 1.8; color: #444; margin-bottom: 0;
        }
        
        .team-photo-placeholder {
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 20px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        
        .team-photo-placeholder img {
            width: 100%; 
            height: auto;
            display: block;
        }

        /* RIGHT COLUMN: Division Cards */
        .divisi-card {
            border: none; background-color: #f1f7f1; border-radius: 15px;
            padding: 25px; margin-bottom: 25px; height: 100%;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05); transition: background-color 0.3s ease;
        }

        .divisi-card:hover { background-color: #e0ece0; }
        .divisi-title {
            color: var(--primary-green); font-weight: 800; font-size: 1.3rem;
            margin-bottom: 10px; text-transform: uppercase;
        }
        .scope-item p { font-size: 0.95rem; line-height: 1.6; color: #555; margin-bottom: 0; }
        
        /* === 3. BUTTON & FOOTER === */
        .btn-back {
            background-color: var(--primary-green); color: white; border-radius: 25px;
            padding: 10px 30px; text-decoration: none; transition: background-color 0.3s ease, transform 0.3s;
            display: inline-block; font-weight: 600;
        }

        .btn-back:hover { background-color: var(--light-green); transform: translateY(-2px); color: white; text-decoration: none; }
        
        .footer {
            background: linear-gradient(135deg, var(--primary-green) 0%, var(--light-green) 100%);
            color: white; padding: 70px 0 30px 0; margin-top: 50px;
        }
        .footer h5 { font-weight: 700; margin-bottom: 25px; letter-spacing: 0.5px; }
        .footer a { color: rgba(255,255,255,0.85); text-decoration: none; transition: 0.3s; }
        .footer a:hover { color: white; padding-left: 5px; }
        .footer-logo { max-width: 180px; margin-bottom: 20px; margin-top: 20px; margin-left: 20px; }
        
        .footer-bottom { 
            text-align: center; 
            border-top: 1px solid rgba(255,255,255,0.15); 
            margin-top: 50px; 
            padding-top: 25px; 
            font-size: 0.9rem; 
        }
        .quick-links li { margin-bottom: 12px; list-style: none; }
        .quick-links { padding-left: 0; }

        @media (max-width: 991.98px) {
            .hero-section { min-height: auto; padding: 100px 0 50px; }
            .main-info-block { max-width: 100%; margin: 0; } 
            .deputy-card { margin-bottom: 20px; }
            .head-profile h1 { font-size: 2.2rem !important; } /* Lebih kecil lagi di mobile */
        }
    </style>
</head>
<body>
    
    <section class="hero-section">
        <div class="container">
            <div class="head-profile">
                <h1 class="mb-3 fw-bolder"><?php echo htmlspecialchars($department['nama_department']); ?></h1>
                
                <?php if (!empty($department['nama_head'])): ?>
                    <div class="row justify-content-center">
                        <div class="col-auto">
                             <?php 
                                $image_path_head = !empty($department['head_image']) ? htmlspecialchars($department['head_image']) : 'assets/placeholder_head.png'; 
                            ?>
                            <img src="<?php echo $image_path_head; ?>" class="head-photo" alt="<?php echo htmlspecialchars($department['nama_head']); ?>">
                        </div>
                    </div>
                    
                    <h4 class="mt-3 fw-bold"><?php echo htmlspecialchars($department['nama_head']); ?></h4>
                    <p class="mb-2 lead"><?php echo htmlspecialchars($department['jabatan']); ?></p>
                    
                    <div class="mt-4">
                        <?php if (!empty($department['linkedin'])): ?>
                            <a href="<?php echo htmlspecialchars($department['linkedin']); ?>" class="social-link" target="_blank">
                                <img src="assets/contactlogo/linkedin.png" alt="LinkedIn">
                            </a>
                        <?php endif; ?>
                        
                        <?php if (!empty($department['instagram'])): ?>
                            <a href="<?php echo htmlspecialchars($department['instagram']); ?>" class="social-link" target="_blank">
                                <img src="assets/contactlogo/instagram.png" alt="Instagram">
                            </a>
                        <?php endif; ?>
                    </div>
                <?php else: ?>
                    <p class="lead">Head of Department information coming soon</p>
                <?php endif; ?>

                <?php if (!empty($deputies)): ?>
                    <div class="deputy-container">
                        <h4 class="text-center mb-4 text-uppercase" style="font-weight: 700; opacity: 0.9;">Deputy Heads</h4>
                        <div class="row justify-content-center">
                            <?php foreach ($deputies as $deputy): ?>
                                <div class="col-lg-3 col-md-4 col-sm-6 deputy-card">
                                    <?php 
                                        $image_path_deputy = !empty($deputy['image']) ? htmlspecialchars($deputy['image']) : 'assets/placeholder_head.png'; 
                                    ?>
                                    <img src="<?php echo $image_path_deputy; ?>" class="deputy-photo" alt="<?php echo htmlspecialchars($deputy['nama_deputy']); ?>">
                                    <h5><?php echo htmlspecialchars($deputy['nama_deputy']); ?></h5>
                                    <p><?php echo htmlspecialchars($deputy['jabatan_deputy']); ?></p>
                                    
                                    <div class="mt-2">
                                        <?php if (!empty($deputy['linkedin'])): ?>
                                            <a href="<?php echo htmlspecialchars($deputy['linkedin']); ?>" class="social-link" target="_blank" style="width: 30px; height: 30px; line-height: 30px; margin: 0 3px;">
                                                <img src="assets/contactlogo/linkedin.png" alt="LinkedIn" style="width: 15px; height: 15px;">
                                            </a>
                                        <?php endif; ?>
                                        
                                        <?php if (!empty($deputy['instagram'])): ?>
                                            <a href="<?php echo htmlspecialchars($deputy['instagram']); ?>" class="social-link" target="_blank" style="width: 30px; height: 30px; line-height: 30px; margin: 0 3px;">
                                                <img src="assets/contactlogo/instagram.png" alt="Instagram" style="width: 15px; height: 15px;">
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <main class="container py-5">
        <div class="row align-items-stretch">
            <div class="col-12 text-center mb-4">
                <h2 class="section-title">Department Overview & Scope</h2>
            </div>
            
            <div class="col-lg-5 mb-4 d-flex">
                <div class="main-info-block w-100">
                    
                    <div class="team-photo-placeholder"> 
                        <?php 
                            $team_image_path = !empty($department['image']) ? htmlspecialchars($department['image']) : 'assets/placeholder_team.jpg'; 
                        ?>
                        <img src="<?php echo $team_image_path; ?>" alt="Foto Tim <?php echo htmlspecialchars($department['nama_department']); ?>" class="img-fluid" style="border-radius: 10px;">
                    </div>
                    
                    <h3 class="text-center" style="color: var(--primary-green); font-weight: 800;"><?php echo htmlspecialchars($department['nama_department']); ?></h3>
                    
                    <?php if (isset($department['deskripsi']) && !empty($department['deskripsi'])): ?>
                        <p class="main-dept-description mt-3">
                            <?php echo nl2br(htmlspecialchars($department['deskripsi'])); ?>
                        </p>
                    <?php else: ?>
                        <p class="main-dept-description mt-3 text-muted fst-italic">Deskripsi utama departemen ini sedang dalam penyusunan.</p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-lg-7 mb-4">
                <div class="row h-100">
                    <?php if ($result_divisi->num_rows > 0): ?>
                        <?php while ($divisi = $result_divisi->fetch_assoc()): ?>
                            <div class="col-lg-6 col-md-6 d-flex"> 
                                <div class="divisi-card w-100">
                                    <h4 class="divisi-title"><?php echo htmlspecialchars($divisi['nama_divisi']); ?></h4>
                                    <div class="scope-item">
                                        <p><?php echo nl2br(htmlspecialchars($divisi['jobdesk_detail'])); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <div class="col-12 d-flex align-items-center">
                            <div class="alert alert-info text-center w-100 mt-3">
                                <h5 class="mb-3">📋 Division Information</h5>
                                <p class="mb-0">Data divisi untuk departemen ini sedang dalam proses penyusunan.</p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>

    <section class="container my-5 text-center pb-5">
        <a href="Ourteam.php" class="btn-back">
           Back to Our Team
        </a>
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
                        <li><a href="">Home</a></li>
                        <li><a href="#">About</a></li>
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
                    <p>Fokus pada penelitian dan pengembangan energi terbarukan untuk masa depan yang berkelanjutan.</p>
                </div>
            </div>

            <div class="footer-bottom">
                <p class="mb-0">&copy; 2024 SRE UPNVY. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>

<?php
$stmt_divisi->close();
$db->close();
?>