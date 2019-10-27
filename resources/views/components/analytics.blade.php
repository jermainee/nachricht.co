<?php if (\App\Http\Util\CookieConsentUtil::isAgreed()): ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-39078917-4"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-39078917-4', { 'anonymize_ip': true });
</script>
<?php endif; ?>