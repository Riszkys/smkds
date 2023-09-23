<script>
function stopVideo(playerId) {
    var videoPlayer = document.getElementById(playerId);
    if (videoPlayer) {
        videoPlayer.pause();
        videoPlayer.currentTime = 0;
    }
}
</script>

Dalam kode di atas, sebuah fungsi JavaScript bernama stopVideo ditambahkan. Fungsi ini menerima ID pemutar video sebagai
argumen dan menghentikan pemutaran video serta mengatur posisi waktu kembali ke awal (0 detik) saat tombol Close modal
ditekan. Pemanggilan fungsi ini dilakukan melalui atribut onclick pada tombol Close modal.


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>