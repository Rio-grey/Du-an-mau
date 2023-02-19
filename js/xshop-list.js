// $(document).ready(function () {
//   $("#check-all").click(function () {
//     $(":checkbox").prop("checked", true);
//   });
//   $("#clear-all").click(function () {
//     $(":checkbox").prop("checked", false);
//   });
//   $("#btn-delete").click(function () {
//     if ($(":checked").length === 0) {
//       alert("Vui lòng chọn ít nhất một mục!");
//       return false;
//     }
//   });
// });

document.getElementById("check-all").onclick = function () {
  // Lấy danh sách checkbox
  var checkboxes = document.getElementsByName("i");

  // Lặp và thiết lập checked
  for (var i = 0; i < checkboxes.length; i++) {
    checkboxes[i].checked = true;
  }
};

// Chức năng bỏ chọn hết
document.getElementById("clear-all").onclick = function () {
  // Lấy danh sách checkbox
  var checkboxes = document.getElementsByName("i");

  // Lặp và thiết lập Uncheck
  for (var i = 0; i < checkboxes.length; i++) {
    checkboxes[i].checked = false;
  }
};
