<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-104984998-2"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    
    gtag('js', new Date());
    
    gtag('config', 'UA-104984998-2', {
        'custom_map': {'dimension1': 'thumbnail'}
    });

    gtag('event', 'thumbnail_dimension', {'thumbnail': '{{ AB::getCurrentTest() }}'});
</script>