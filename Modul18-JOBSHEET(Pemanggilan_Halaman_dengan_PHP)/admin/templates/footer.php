  <div class="footer">
    &copy; <?= date('Y'); ?> Admin Panel - Portal<span style="color:#e74c3c;">.</span>ID
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Preview gambar saat upload (dipakai di modal berita)
    function previewImage(input, imgId, wrapId) {
      if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
          document.getElementById(imgId).src = e.target.result;
          document.getElementById(wrapId).classList.remove('d-none');
        };
        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>
</body>
</html>
