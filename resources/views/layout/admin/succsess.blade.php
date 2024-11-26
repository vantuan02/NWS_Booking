@if (Session::has('success'))
<script>
  toastr.options = {
    "closeButton": true,
    "progressBar": true,
    "positionClass": "toast-top-right", // Vị trí hiển thị
    "timeOut": "5000", // Thời gian hiển thị (ms)
  }
  toastr.success("{{ Session::get('success') }}");
</script>
@endif
