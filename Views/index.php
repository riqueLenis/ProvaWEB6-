<script>
         <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
         $(document).ready(function() {
            alert("Inscrição recebida!");
            window.location.href = "/FrontEnd-Loja/LenisSports/index.html";
        });
        <?php endif; ?>
        </script>