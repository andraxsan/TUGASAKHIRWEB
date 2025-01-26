// custom.js

// Event listener untuk tombol "Hapus"
$(document).on('click', '.btn-hapus', function() {
    var idUser = $(this).data('id');
    $('#hapus-id').val(idUser);
});

$(document).on('click', '.btn-hapus', function () {
    var nip = $(this).data('nip'); // Perbaikan dari data-id ke data-nip
    $('#hapus-nip').val(nip); // Perbaikan dari #hapus-id ke #hapus-nip
});

$(document).on('click', '.btn-hapus', function () {
    var nis = $(this).data('nis'); // Perbaikan dari data-id ke data-nis
    $('#hapus-nis').val(nis); // Perbaikan dari #hapus-id ke #hapus-nis
});

function updateTime() {
    const now = new Date();
    
    // Ambil nilai jam, menit, dan detik
    const hours = now.getHours().toString().padStart(2, '0');
    const minutes = now.getMinutes().toString().padStart(2, '0');
    const seconds = now.getSeconds().toString().padStart(2, '0');

    // Ambil nilai hari, bulan, tanggal, dan tahun
    const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    const dayName = days[now.getDay()];
    const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
        "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
    const monthIndex = now.getMonth();
    const year = now.getFullYear();
    const date = now.getDate();

    // Tampilkan waktu real-time
    document.getElementById('currentTime').innerHTML = `
        ${hours}:${minutes}:${seconds} <br/>
        ${dayName}, ${monthNames[monthIndex]} ${date}, ${year}
    `;
}

// Perbarui waktu setiap detik
setInterval(updateTime, 1000);
updateTime();

function updateTimeBlueCard() {
    const now = new Date();
    const year = now.getFullYear();
    const month = (now.getMonth() + 1).toString().padStart(2, '0');
    const day = now.getDate().toString().padStart(2, '0');
    const hours = now.getHours().toString().padStart(2, '0');
    const minutes = now.getMinutes().toString().padStart(2, '0');
    const seconds = now.getSeconds().toString().padStart(2, '0');
    const formattedTime = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
    document.getElementById('currentTimeBlue').textContent = formattedTime;
}

setInterval(updateTimeBlueCard, 1000); // Update setiap 1 detik
updateTimeBlueCard(); // Panggil langsung saat pertama kali load



// $(document).on('click', '.btn-detail-guru', function () {
//     // Ambil NIP dari tombol
//     const nip = $(this).data('nip');

//     // Kirim AJAX untuk mengambil detail guru berdasarkan NIP
//     $.ajax({
//         url: '<?= base_url("guru/getDetailGuru"); ?>', // Ganti dengan endpoint Anda
//         method: 'POST',
//         data: { nip: nip },
//         dataType: 'json',
//         success: function (data) {
//             if (data) {
//                 // Isi modal dengan data guru
//                 $('#detail-nip').text(data.nip);
//                 $('#detail-nama').text(data.nama_guru);
//                 $('#detail-alamat').text(data.alamat);
//                 $('#detail-email').text(data.email);
//                 const foto = data.foto ? '<?= base_url("uploads/guru/") ?>' + data.foto : '<?= base_url("uploads/default.png") ?>';
//                 $('#foto-guru').attr('src', foto);
//             } else {
//                 alert('Data guru tidak ditemukan.');
//             }
//         },
//         error: function () {
//             alert('Terjadi kesalahan. Silakan coba lagi.');
//         }
//     });
// });