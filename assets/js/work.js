//العمل السابق ////
const selectoldworkOption = document.getElementById("old_work");

    let sector = document.querySelector(".sector");
    let otype = document.querySelector(".otype");
    let ocertif = document.querySelector(".ocertif");
    let oplace = document.querySelector(".oplace");
    let ostartdate = document.querySelector(".ostartdate");
    let oenddate = document.querySelector(".oenddate");
    let oresion = document.querySelector(".oresion");
    let ctype = document.querySelector(".ctype");
    let ccertif = document.querySelector(".ccertif");
    let cplace = document.querySelector(".cplace");
    let cstartdate = document.querySelector(".cstartdate");
   
  
    // Function to show/hide gov divs based on the selected option
    function handleOptionChangeoldwork() {
      let selectOption = selectoldworkOption.value;
console.log(selectOption);
      // Toggle "d-none" class based on selected option
      if (selectOption === "نعم") {
        sector.classList.remove("d-none");
        sector.setAttribute('reqiured', '');

      } else if (selectOption === "كلا") {
        sector.classList.add("d-none");
        sector.removeAttribute('reqiured', '');
        otype.classList.add("d-none");
        otype.removeAttribute('reqiured', '');
        ocertif.classList.add("d-none");
        ocertif.removeAttribute('reqiured', '');
        oplace.classList.add("d-none");
        oplace.removeAttribute('reqiured', '');
        ostartdate.classList.add("d-none");
        ostartdate.removeAttribute('reqiured', '');
        oenddate.classList.add("d-none");
        oenddate.removeAttribute('reqiured', '');
        oresion.classList.add("d-none");
        oresion.removeAttribute('reqiured', '');

      }
    }

    // Add event listener for the change event of select element
    selectoldworkOption.addEventListener("change", handleOptionChangeoldwork);

    ////العمل الحالي //////
    const selectcurrworkOption = document.getElementById("curr_work");

    let csector = document.querySelector(".csector");

    // Function to show/hide gov divs based on the selected option
    function handleOptionChangecurrwork() {
      let selectOption = selectcurrworkOption.value;

      // Toggle "d-none" class based on selected option
      if (selectOption === "نعم") {
        csector.classList.remove("d-none");
        csector.setAttribute('reqiured', '');

      } else if (selectOption === "كلا") {
        csector.classList.add("d-none");
        csector.removeAttribute('reqiured', '');
        ctype.classList.add("d-none");
        ctype.removeAttribute('reqiured', '');
        ccertif.classList.add("d-none");
        ccertif.removeAttribute('reqiured', '');
        cplace.classList.add("d-none");
        cplace.removeAttribute('reqiured', '');
        cstartdate.classList.add("d-none");
        cstartdate.removeAttribute('reqiured', '');
    

      }
    }

    // Add event listener for the change event of select element
    selectcurrworkOption.addEventListener("change", handleOptionChangecurrwork);
    ///العمل التطوعي /////

    const selectgovOption = document.getElementById("work-gov");

    let gov = document.querySelector(".gov");
    let per_month = document.querySelector(".per-month");

    // Function to show/hide gov divs based on the selected option
    function handleOptionChangework() {
      let selectwoOption = selectgovOption.value;

      // Toggle "d-none" class based on selected option
      if (selectwoOption === "نعم") {
        gov.classList.remove("d-none");
        gov.setAttribute('reqiured', '');
        per_month.classList.remove("d-none");
        per_month.setAttribute('reqiured', '');

      } else if (selectwoOption === "كلا") {
        gov.classList.add("d-none");
        gov.removeAttribute('reqiured', '');
        per_month.classList.add("d-none");
        per_month.removeAttribute('reqiured', '');

      }
    }

    // Add event listener for the change event of select element
    selectgovOption.addEventListener("change", handleOptionChangework);
    
    ///في حالة اختيار القطاع  في العمل السابق 
    const selectgsectorOption = document.getElementById("sector");



    // Function to show/hide gov divs based on the selected option
    function handleOptionChangeoldg() {
      let selectOption = selectgsectorOption.value;

      // Toggle "d-none" class based on selected option
      if (selectOption === "عام") {
        otype.classList.remove("d-none");
        otype.setAttribute('reqiured', '');
        ocertif.classList.remove("d-none");
        ocertif.setAttribute('reqiured', '');
        oplace.classList.remove("d-none");
        oplace.setAttribute('reqiured', '');
        ostartdate.classList.remove("d-none");
        ostartdate.setAttribute('reqiured', '');
        oenddate.classList.remove("d-none");
        oenddate.setAttribute('reqiured', '');
        oresion.classList.remove("d-none");
        oresion.setAttribute('reqiured', '');

      } else if (selectOption === "خاص") {
        otype.classList.add("d-none");
        otype.removeAttribute('reqiured', '');
        ocertif.classList.add("d-none");
        ocertif.removeAttribute('reqiured', '');
        oplace.classList.remove("d-none");
        oplace.setAttribute('reqiured', '');
        ostartdate.classList.remove("d-none");
        ostartdate.setAttribute('reqiured', '');
        oenddate.classList.remove("d-none");
        oenddate.setAttribute('reqiured', '');
        oresion.classList.remove("d-none");
        oresion.setAttribute('reqiured', '');

      }
    }
    selectgsectorOption.addEventListener("change", handleOptionChangeoldg);

    ///في حالة اختيار القطاع  في العمل الحالي 
    const selectcsectorOption = document.getElementById("csector");

    

    // Function to show/hide gov divs based on the selected option
    function handleOptionChangecurrg() {
      let selectOption = selectcsectorOption.value;

      // Toggle "d-none" class based on selected option
      if (selectOption === "عام") {
        ctype.classList.remove("d-none");
        ctype.setAttribute('reqiured', '');
        ccertif.classList.remove("d-none");
        ccertif.setAttribute('reqiured', '');
        cplace.classList.remove("d-none");
        cplace.setAttribute('reqiured', '');
        cstartdate.classList.remove("d-none");
        cstartdate.setAttribute('reqiured', '');
        
       

      } else if (selectOption === "خاص") {
        ctype.classList.add("d-none");
        ctype.removeAttribute('reqiured', '');
        ccertif.classList.add("d-none");
        ccertif.removeAttribute('reqiured', '');
        cplace.classList.remove("d-none");
        cplace.setAttribute('reqiured', '');
        cstartdate.classList.remove("d-none");
        cstartdate.setAttribute('reqiured', '');

      }
    }
    selectcsectorOption.addEventListener("change", handleOptionChangecurrg);


    // Generate options for days
function populateDaySelect(elementId) {
    const daySelect = document.getElementById(elementId);
  
    for (let day = 1; day <= 31; day++) {
      let option = document.createElement("option");
      option.value = day;
      option.text = day;
      daySelect.appendChild(option);
    }
  }
  
  populateDaySelect("day");
  populateDaySelect("sday");
  populateDaySelect("eday");
  
  // Generate options for months
  function populateMonthSelect(elementId, months) {
    const monthSelect = document.getElementById(elementId);
  
    months.forEach(function (month) {
      let option = document.createElement("option");
      option.value = month.value;
      option.text = month.name;
      monthSelect.appendChild(option);
    });
  }
  
  // Define the months array
  const months = [
    { value: 1, name: "يناير" },
    { value: 2, name: "فبراير" },
    { value: 3, name: "مارس" },
    { value: 4, name: "أبريل" },
    { value: 5, name: "مايو" },
    { value: 6, name: "يونيو" },
    { value: 7, name: "يوليو" },
    { value: 8, name: "أغسطس" },
    { value: 9, name: "سبتمبر" },
    { value: 10, name: "أكتوبر" },
    { value: 11, name: "نوفمبر" },
    { value: 12, name: "ديسمبر" },
  ];
  
  populateMonthSelect("month", months);
  populateMonthSelect("smonth", months);
  populateMonthSelect("emonth", months);
  
  
  // Generate options for years
  function populateYearSelect(elementId, startYear, endYear) {
    const yearSelect = document.getElementById(elementId);
  
    for (let year = endYear; year >= startYear; year--) {
      let option = document.createElement("option");
      option.value = year;
      option.text = year;
      yearSelect.appendChild(option);
    }
  }
  
  let currentYear = new Date().getFullYear();
  populateYearSelect("year", currentYear - 100, currentYear);
  populateYearSelect("syear", currentYear - 100, currentYear);
  populateYearSelect("eyear", currentYear - 100, currentYear);
  