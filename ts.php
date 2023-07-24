<?php
if(isset($_POST['okk'])){
    $dat=$_POST['dataa'];
    $data_array = json_decode($dat, true);
print_r($data_array);
echo "okkkk";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>توليد رقم عشوائي</title>
</head>
<body>
<table>
  <tr>
    <th><input type="checkbox" id="selectAll" onchange="toggleCheckboxes()"></th>
    <th>Name</th>
    <th>Email</th>
    <!-- أضف حقول إضافية حسب الحاجة -->
  </tr>
  <tr>
    <td><input type="checkbox" class="checkbox"></td>
    <td>John Doe</td>
    <td>johndoe@example.com</td>
  </tr>
  <tr>
    <td><input type="checkbox" class="checkbox"></td>
    <td>Jane Smith</td>
    <td>janesmith@example.com</td>
  </tr>
  <!-- أضف صفوف إضافية حسب الحاجة -->
</table>

<button onclick="openModal()">Open Modal</button>

<!-- مودال -->
<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <p id="modalData"></p>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
  /* تحديد الخانة في أعلى الجدول لتحديد جميع الصفوف
  const selectAll = document.getElementById("select-all");

  // تحديد الخانات في الصفوف لتحديد صفوف مفردة
  const selectRows = document.querySelectorAll(".select-row");

  // الحصول على عنصر Modal HTML
  const modal = document.getElementById("modal");

  // الحصول على حقل الإدخال المخفي في عنصر Modal HTML
  const selectedDataField = document.getElementById("selected-data");

  // إضافة حدث onchange للخانة في أعلى الجدول لتحديد جميع الصفوف
  selectAll.onchange = () => {
    selectRows.forEach((row) => {
      row.checked = selectAll.checked;
    });
  };

  // إضافة حدث onchange للخانات في الصفوف لتحديد صفوف مفردة
  selectRows.forEach((row) => {
    row.onchange = () => {
      const allChecked = Array.from(selectRows).every((row) => row.checked);
      selectAll.checked = allChecked;
    };
  });

  // إضافة حدث onclick لفتح Modal
  function openModal() {
    // استخراج الحقول المحددة
    const selectedFields = [];
    selectRows.forEach((row) => {
      if (row.checked) {
        const name = row.parentElement.nextElementSibling.textContent;
        const email = row.parentElement.nextElementSibling.nextElementSibling.textContent;
        const age = row.parentElement.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        selectedFields.push({ name, email, age });
      }
    });

    // تعيين القيم في حقل الإدخال المخفي في عنصر Modal HTML
    selectedDataField.value = JSON.stringify(selectedFields);

    // عرض عنصر Modal HTML
    modal.style.display = "block";
  }

  function saveData() {
  const selectedData = document.getElementById('selected-data').value;
  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'ajax.php', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = function() {
    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
      console.log(this.responseText);
    }
    else{
        console.log(selectedData);
    }
  };
  xhr.send('selectedData=' + encodeURIComponent(selectedData));
}

  // إضافة حدث onclick لإغلاق Modal HTML
  function closeModal() {
    modal.style.display = "none";
  }*/
  function openModal() {
  // احصل على الحقول المحددة
  var selectedFields = [];
  var checkboxes = document.getElementsByClassName("checkbox");
  for (var i = 0; i < checkboxes.length; i++) {
    if (checkboxes[i].checked) {
      var row = checkboxes[i].parentNode.parentNode;
      var name = row.cells[1].innerText;
      var email = row.cells[2].innerText;
      selectedFields.push({
        name: name,
        email: email
      });
    }
  }

  // استعرض بيانات الحقول في المودال
  var modalData = "";
  for (var j = 0; j < selectedFields.length; j++) {
    modalData += "Name: " + selectedFields[j].name + "<br>Email: " + selectedFields[j].email + "<br><br>";
  }
  document.getElementById("modalData").innerHTML = modalData;

  // اعرض المودال
  document.getElementById("myModal").style.display = "block";
}

function toggleCheckboxes() {
  var checkboxes = document.getElementsByClassName("checkbox");
  var selectAllCheckbox = document.getElementById("selectAll");
  for (var i = 0; i < checkboxes.length; i++) {
    checkboxes[i].checked = selectAllCheckbox.checked;
  }
}

</script>

</body>
</html>
