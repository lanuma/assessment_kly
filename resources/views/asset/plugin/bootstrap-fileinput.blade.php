@push('plugin-styles')
<link rel="stylesheet" href="{{ asset('plugins/bootstrap-fileinput/css/fileinput.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/bootstrap-fileinput/themes/explorer-fa/theme.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('plugins/bootstrap-fileinput/js/fileinput.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-fileinput/js/plugins/piexif.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-fileinput/themes/explorer-fa/theme.min.js') }}"></script>
@endpush
