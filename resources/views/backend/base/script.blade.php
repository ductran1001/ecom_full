<script src="{{ asset('backend/assets/js/app.js') }}"></script>
<script src="{{ asset('backend/assets/js/chartjs-dashboard-line.js') }}"></script>
<script src="{{ asset('backend/assets/js/chartjs-dashboard-pie.js') }}"></script>
<script src="{{ asset('backend/assets/js/chartjs-dashboard-bar.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="{{ asset('backend/assets/js/changeToSlug.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="{{ asset('backend/assets/js/toastr-options.js') }}"></script>
<script src="{{ asset('backend/assets/js/do-form.js') }}"></script>
@if (session('error'))
    <script>
        toastr.error('{{ session('error') }}');
    </script>
@endif
