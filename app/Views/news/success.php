<!-- Show me a notification on top-right corner with message news created sussefully -->
<?= session()->getFlashdata('success') ?>

<div class="alert alert-success d-flex align-items-center" role="alert">
    <i class="bi bi-check-circle-fill fs-4 me-3"></i>
    <div>
        La noticia s'ha creat correctament
    </div>
</div>

<!-- Wait 1 sec and redirect to news page -->
<script>
    setTimeout(function() {
        window.location.href = "/news";
    }, 1000);
</script>