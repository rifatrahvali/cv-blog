<!-- <div class="footer text-center my-3">
    <div class="line mb-3"></div>
    <p>
        <i class="bi bi-c-circle-fill"></i>
        Rıfat Rahvalı <b>2024</b>
    </p>
</div> -->
<div class="footer text-center my-3">
    <div class="line mb-3"></div>
    <p>
        <i class="bi bi-c-circle-fill"></i>
        {{ $siteSettings->footer_text ?? 'Default Footer Text' }} <b>{{ $siteSettings->footer_year ?? date('Y') }}</b>
    </p>
</div>