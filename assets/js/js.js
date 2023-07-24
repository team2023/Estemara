function populateProvinceSelect(elementId, provinces) {
  const select = document.getElementById(elementId);

  provinces.forEach(function (province) {
    let option = document.createElement("option");
    option.value = province;
    option.text = province;
    select.appendChild(option);
  });
}

const provinces = [
  "بغداد",
  "البصرة",
  "الموصل",
  "أربيل",
  "كربلاء",
  "النجف",
  "السليمانية",
  "كركوك",
  "ديالى",
  "الأنبار",
  "ذي قار",
  "ميسان",
  "صلاح الدين",
  "بابل",
  "واسط",
  "المثنى",
  "دهوك",
  "الديوانية",
];
populateProvinceSelect("id-province1", provinces);



function populateDaySelect(elementId) {
    const daySelect = document.getElementById(elementId);
  
    for (let day = 1; day <= 31; day++) {
      let option = document.createElement("option");
      option.value = day;
      option.text = day;
      daySelect.appendChild(option);
    }
  }
  
  populateDaySelect("id-day");
  populateDaySelect("day");
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
  populateMonthSelect("id-month", months);
  populateMonthSelect("month", months);

  
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
  populateYearSelect("id-year", currentYear - 100, currentYear);
  ////////////الحالة الاجتماعية ///////////////////
const selectmarrOption = document.getElementById("marr-type");
console.log(selectmarrOption);
let child = document.querySelector(".child");
let up18 = document.querySelector(".up18");
let down18 = document.querySelector(".down18");
let ch1=document.querySelector(".ch1");
let ch2=document.querySelector(".ch2");
let ch3=document.querySelector(".ch3");
let ch4=document.querySelector(".ch4");
// Function to show/hide gov divs based on the selected option
function handleOptionChangemarr() {
  let selectmarOption = selectmarrOption.value;

  // Toggle "d-none" class based on selected option
  if (selectmarOption === "متزوج" || selectmarOption === "ارمل" || selectmarOption === "مطلق") {
    child.classList.remove("d-none");
    child.setAttribute('reqiured','');
    
  } else if (selectmarOption === "اعزب") {
    child.classList.add("d-none");
    child.removeAttribute('reqiured','');
    up18.classList.add("d-none");
    up18.removeAttribute('reqiured','');
    down18.classList.add("d-none");
    down18.removeAttribute('reqiured','');
    ch1.classList.add("d-none");
    ch1.removeAttribute('reqiured','');
    ch2.classList.add("d-none");
    ch2.removeAttribute('reqiured','');
    ch3.classList.add("d-none");
    ch3.removeAttribute('reqiured','');
    ch4.classList.add("d-none");
    ch4.removeAttribute('reqiured','')
  }
}

// Add event listener for the change event of select element
selectmarrOption.addEventListener("change", handleOptionChangemarr);

////هل تمتلك اطفال //////////////////
const selectchildOption = document.getElementById("child");

// Function to show/hide gov divs based on the selected option
function handleOptionChangechild() {
  let selectchOption = selectchildOption.value;

  // Toggle "d-none" class based on selected option
  if (selectchOption === "نعم" ) {
    up18.classList.remove("d-none");
    up18.setAttribute('reqiured','');
    down18.classList.remove("d-none");
    down18.setAttribute('reqiured','');
    
  } else if (selectchOption === "كلا") {
    up18.classList.add("d-none");
    up18.removeAttribute('reqiured','');
    down18.classList.add("d-none");
    down18.removeAttribute('reqiured','');
    
  }
}

// Add event listener for the change event of select element
selectchildOption.addEventListener("change", handleOptionChangechild);


///////////////اسباب الاعالة ///////////////////////////

const selectnumchildOption = document.getElementById("up18");


// Function to show/hide gov divs based on the selected option
function handleOptionnumChangechild() {
  let selectnumchOption = selectnumchildOption.value;
  console.log(selectnumchOption);
  // Toggle "d-none" class based on selected option
  if (selectnumchOption === "4" ) {
    ch1.classList.remove("d-none");
    ch1.setAttribute('reqiured','');
    ch2.classList.remove("d-none");
    ch2.setAttribute('reqiured','');
    ch3.classList.remove("d-none");
    ch3.setAttribute('reqiured','');
    ch4.classList.remove("d-none");
    ch4.setAttribute('reqiured','');
    
  } else if (selectnumchOption === "3") {
    ch1.classList.remove("d-none");
    ch1.setAttribute('reqiured','');
    ch2.classList.remove("d-none");
    ch2.setAttribute('reqiured','');
    ch3.classList.remove("d-none");
    ch3.setAttribute('reqiured','');
    ch4.classList.add("d-none");
    ch4.removeAttribute('reqiured','');
    
    
  }
  else if (selectnumchOption === "2") {
    ch1.classList.remove("d-none");
    ch1.setAttribute('reqiured','');
    ch2.classList.remove("d-none");
    ch2.setAttribute('reqiured','');
    ch3.classList.add("d-none");
    ch3.removeAttribute('reqiured','');
    ch4.classList.add("d-none");
    ch4.removeAttribute('reqiured','')
    
  }
  else if (selectnumchOption === "1") {
    ch1.classList.remove("d-none");
    ch1.setAttribute('reqiured','');
    ch2.classList.add("d-none");
    ch2.removeAttribute('reqiured','');
    ch3.classList.add("d-none");
    ch3.removeAttribute('reqiured','');
    ch4.classList.add("d-none");
    ch4.removeAttribute('reqiured','')
    
  }
  else if (selectnumchOption === "0") {
    ch1.classList.add("d-none");
    ch1.removeAttribute('reqiured','');
    ch2.classList.add("d-none");
    ch2.removeAttribute('reqiured','');
    ch3.classList.add("d-none");
    ch3.removeAttribute('reqiured','');
    ch4.classList.add("d-none");
    ch4.removeAttribute('reqiured','')
    
  }
  
}

// Add event listener for the change event of select element
selectnumchildOption.addEventListener("change", handleOptionnumChangechild);


/////صلة القرابة //////////////////////////////////
const selectrelOption = document.getElementById("family-pay");
let rel = document.querySelector('.relative');
// Function to show/hide gov divs based on the selected option
function handleOptionChangerel() {
  let selectrelativeOption = selectrelOption.value;

  // Toggle "d-none" class based on selected option
  if (selectrelativeOption === "نعم" ) {
    rel.classList.remove("d-none");
    rel.setAttribute('reqiured','');
   
    
  } else if (selectrelativeOption === "كلا") {
    rel.classList.add("d-none");
    rel.removeAttribute('reqiured','');
    
    
  }
}

// Add event listener for the change event of select element
selectrelOption.addEventListener("change", handleOptionChangerel);


/////////////////////////////القنوات //////////////////////////////////
const selectchanalOption = document.getElementById("channel");
let Martyrs = document.querySelector('.Martyrs');
let Martyrs_name = document.querySelector('.Martyrs-name');
let Martyrs_mother = document.querySelector('.Martyrs-mother');
let Martyrs_qrarnumber = document.querySelector('.Martyrs-qrarnumber');
let Martyrs_qraba = document.querySelector('.Martyrs-qraba');
let prisoner_name = document.querySelector('.prisoner-name');
let prisoner_mother = document.querySelector('.prisoner-mother');
let prisoner_qrarnumber = document.querySelector('.prisoner-qrarnumber');
let prisoner_qraba = document.querySelector('.prisoner-qraba');
// Function to show/hide gov divs based on the selected option
function handleOptionChangechannel() {
  let selectchanativeOption = selectchanalOption.value;

  // Toggle "d-none" class based on selected option
  if (selectchanativeOption === "2" || selectchanativeOption === "3" ) {
    Martyrs.classList.remove("d-none");
    Martyrs.setAttribute('reqiured','');
    Martyrs_name.classList.remove("d-none");
    Martyrs_name.setAttribute('reqiured','');
    Martyrs_mother.classList.remove("d-none");
    Martyrs_mother.setAttribute('reqiured','');
    Martyrs_qrarnumber.classList.remove("d-none");
    Martyrs_qrarnumber.setAttribute('reqiured','');
    Martyrs_qraba.classList.remove("d-none");
    Martyrs_qraba.setAttribute('reqiured','');
    prisoner_name.classList.add("d-none");
    prisoner_name.removeAttribute('reqiured','');
    prisoner_mother.classList.add("d-none");
    prisoner_mother.removeAttribute('reqiured','');
    prisoner_qrarnumber.classList.add("d-none");
    prisoner_qrarnumber.removeAttribute('reqiured','');
    prisoner_qraba.classList.add("d-none");
    prisoner_qraba.removeAttribute('reqiured','');
   
    
  } else if (selectchanativeOption === "4") {
    Martyrs.classList.add("d-none");
    Martyrs.removeAttribute('reqiured','');
    Martyrs_name.classList.add("d-none");
    Martyrs_name.removeAttribute('reqiured','');
    Martyrs_mother.classList.add("d-none");
    Martyrs_mother.removeAttribute('reqiured','');
    Martyrs_qrarnumber.classList.add("d-none");
    Martyrs_qrarnumber.removeAttribute('reqiured','');
    Martyrs_qraba.classList.add("d-none");
    Martyrs_qraba.removeAttribute('reqiured','');
    prisoner_name.classList.remove("d-none");
    prisoner_name.setAttribute('reqiured','');
    prisoner_mother.classList.remove("d-none");
    prisoner_mother.setAttribute('reqiured','');
    prisoner_qrarnumber.classList.remove("d-none");
    prisoner_qrarnumber.setAttribute('reqiured','');
    prisoner_qraba.classList.remove("d-none");
    prisoner_qraba.setAttribute('reqiured','');
    
    
  }
  else{
    Martyrs.classList.add("d-none");
    Martyrs.removeAttribute('reqiured','');
    Martyrs_name.classList.add("d-none");
    Martyrs_name.removeAttribute('reqiured','');
    Martyrs_mother.classList.add("d-none");
    Martyrs_mother.removeAttribute('reqiured','');
    Martyrs_qrarnumber.classList.add("d-none");
    Martyrs_qrarnumber.removeAttribute('reqiured','');
    Martyrs_qraba.classList.add("d-none");
    Martyrs_qraba.removeAttribute('reqiured','');
    prisoner_name.classList.add("d-none");
    prisoner_name.removeAttribute('reqiured','');
    prisoner_mother.classList.add("d-none");
    prisoner_mother.removeAttribute('reqiured','');
    prisoner_qrarnumber.classList.add("d-none");
    prisoner_qrarnumber.removeAttribute('reqiured','');
    prisoner_qraba.classList.add("d-none");
    prisoner_qraba.removeAttribute('reqiured','');
  }
}

// Add event listener for the change event of select element
selectchanalOption.addEventListener("change", handleOptionChangechannel);