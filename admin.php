<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}
include 'db_connect.php';

// Maka ny commande rehetra
$stmt = $conn->query("SELECT * FROM commandes ORDER BY created_at DESC");
$commandes = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Isan'ny commande total
$total_count = count($commandes);
?>
<!DOCTYPE html>
<html lang="mg">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Dashboard Admin</title>
</head>
<body class="bg-slate-50 font-sans">
    <div class="flex flex-col md:flex-row min-h-screen">
        <div class="w-full md:w-64 bg-slate-800 text-white p-6">
            <h2 class="text-2xl font-bold mb-8 flex items-center gap-2">
                <i class="fas fa-gauge-high text-blue-400"></i> Admin
            </h2>
            <nav class="space-y-4 text-slate-300">
                <a href="#" class="block py-2 px-4 bg-blue-600 text-white rounded-lg"><i class="fas fa-list mr-2"></i> Commandes</a>
                <a href="logout.php" class="block py-2 px-4 hover:text-white transition"><i class="fas fa-sign-out-alt mr-2"></i> Logout</a>
            </nav>
        </div>

        <div class="flex-1 p-4 md:p-10">
            <header class="flex justify-between items-center mb-10">
                <h2 class="text-2xl font-extrabold text-slate-800 uppercase tracking-wide">Fitantanana Commandes</h2>
                <div class="text-sm text-slate-500">Daty: <?= date('d/m/Y') ?></div>
            </header>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                    <p class="text-slate-500 text-sm font-medium">Total Commandes</p>
                    <h3 class="text-3xl font-bold text-slate-800"><?= $total_count ?></h3>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-slate-50 border-b border-slate-100">
                            <tr>
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase">Anarana</th>
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase">Contact</th>
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase">Type Site</th>
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase">Description</th>
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            <?php foreach ($commandes as $cmd): ?>
                            <tr class="hover:bg-slate-50 transition">
                                <td class="px-6 py-4 font-semibold text-slate-800"><?= htmlspecialchars($cmd['anarana']) ?></td>
                                <td class="px-6 py-4 text-sm text-slate-600">
                                    <span class="block"><i class="fas fa-phone text-blue-400 mr-1"></i> <?= htmlspecialchars($cmd['numero']) ?></span>
                                    <span class="block text-xs text-blue-500"><i class="fab fa-facebook mr-1"></i> <?= htmlspecialchars($cmd['facebook']) ?></span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-bold italic"><?= htmlspecialchars($cmd['type_site']) ?></span>
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-500 max-w-xs truncate"><?= htmlspecialchars($cmd['description']) ?></td>
                                <td class="px-6 py-4 text-center">
                                    <button class="text-red-500 hover:text-red-700 transition" onclick="alert('Mbola eo am-panamboarana ny bokotra hamafana')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>