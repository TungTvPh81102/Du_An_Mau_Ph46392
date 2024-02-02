$(document).ready(function () {
  $("#check-all").click(function () {
    $("input[type='checkbox']").prop("checked", true);
  });
  $("#clear-all").click(function () {
    $("input[type='checkbox']").prop("checked", false);
  });
  $("#btn-delete").click(function () {
    if ($("input[type='checkbox']").length === 0) {
      alert("Vui lòng chọn ít nhất một mục!");
      return false;
    }
  });
});
