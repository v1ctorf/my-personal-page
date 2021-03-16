<script type="text/javascript">
    window.csrf_token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    window.routes = {
        pagetop: "{{ url('/#page-top') }}",
        about: "{{ url('/#about') }}",
        portfolio: "{{ url('/#portfolio') }}",
        contact: "{{ url('/#contact') }}",
        blog: "{{ route('blog') }}",
        home: "{{ route('home') }}"
    }
</script>
