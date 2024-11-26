@if (Session::has('import_errors'))
<script>
  toastr.options = {
    "closeButton": true,
    "progressBar": true,
    "positionClass": "toast-top-right", // Vị trí hiển thị
    "timeOut": "8000", // Thời gian hiển thị lâu hơn cho lỗi
  };

  @foreach (Session::get('import_errors') as $failures)
    toastr.error("Row: {{ $failures->row() }} - Error: {{ $failures->errors()[0] }}");
  @endforeach
</script>
@endif
