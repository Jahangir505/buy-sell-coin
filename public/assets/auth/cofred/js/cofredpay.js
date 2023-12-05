    $(document).ready(function () {
      $('#clr').css('display', 'none');
    });
    
$(".numeric").keydown(function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||65===e.keyCode&&(e.ctrlKey===!0||e.metaKey===!0)||e.keyCode>=35&&e.keyCode<=40||(e.shiftKey||e.keyCode<48||e.keyCode>57)&&(e.keyCode<96||e.keyCode>105)&&e.preventDefault()});
/*****************************************************************************/

   //$('#clr').css('display', 'none');
      function changeFunction()
      {
       if($('#mainNav').hasClass('navbar-shrink'))
        {
       
          $('#login').removeClass('btn-line-white');
          $('#login').addClass('btn-line-blue');
          $('#signup').removeClass('btn-solid-white');
          $('#signup').addClass('btn-solid-blue');
          $('#white').css('display', 'none');
          $('#clr').css('display', 'block');
        //  $('#mainNav').removeClass('blue-bg');
        }
        else //if($('#mainNav').hasClass('hidemenu'))
        {
          
          $('#login').removeClass('btn-line-blue');
          $('#login').addClass('btn-line-white');
          $('#signup').removeClass('btn-solid-blue');
          $('#signup').addClass('btn-solid-white');
          $('#white').css('display', 'block');
          $('#clr').css('display', 'none');
         // $('#mainNav').addClass('blue-bg');
        }
        var width = $(window).width();
        if (width < 768) {
           $('#white').css('display', 'none');
           $('#clr').css('display', 'block'); 
          $('#mainNav').removeClass('blue-bg');
         
        }
          
      }

   
      var width = $(window).width();
        if (width < 768) {
           $('#white').css('display', 'none');
           $('#clr').css('display', 'block');
           $('#mainNav').addClass('fixed-top');
         //  $('.fixed-top').css('margin-bottom' '70px');
         $('#mainNav').removeClass('blue-bg');
          
        }
        /***************************video script**********************************/
    $('#video').on('shown.bs.modal', function () {
    $('#ifamesrc').attr('src', 'https://www.youtube.com/embed/jC4jRBOKLVg?rel=0&amp;showinfo=0&autoplay=1');
})

  $('#video').on('hidden.bs.modal', function () {
    $('#ifamesrc').attr('src', '');
})
        /****************************end video script*********************************/



        var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the crurrent tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    //$('#next_btn').hide();
    //$('#submt_btn').show();
    document.getElementById("nextBtn").innerHTML = "Open Account <i class='fa fa-chevron-circle-right fa-fw'></i>";
    
  } else {
    document.getElementById("nextBtn").innerHTML = "Next <i class='fa fa-chevron-circle-right fa-fw'></i>";
    //$('#submt_btn').hide();
    //$('#next_btn').show();
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n)
{
  // This function will figure out which tab to display
  //alert(n);
  var getbtntext=$('#nextBtn').html();
  if(n != '-1')
  {
    if(getbtntext == 'Open Account <i class="fa fa-chevron-circle-right fa-fw"></i>')
    {
      $('#clksubmitbtn').trigger('click');
      return false;
    }
  }
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  if(currentTab == 0)
  {
    CheckStepone(function(d) {
        if(d == false)
        {
          //var pretb=currentTab - 1;
          //x[pretb].style.display = "block";
          return false; 
        }
        else
        {
          x[currentTab].style.display = "none";
          // Increase or decrease the current tab by 1:
          currentTab = currentTab + n;
          
          //alert(currentTab);
          // if you have reached the end of the form...
          if (currentTab >= x.length) {
            // ... the form gets submitted:
            document.getElementById("regForm").submit();
            return false;
          }
          // Otherwise, display the correct tab:
          showTab(currentTab);
        }
    });
  }
  else
  {
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    
    //alert(currentTab);
    // if you have reached the end of the form...
    if (currentTab >= x.length) {
      // ... the form gets submitted:
      //submit_form();
      //$('#clksubmitbtn').trigger('click');
      //document.getElementById("regForm").submit();
      return false;
    }
    else
    {
      currentTabs = currentTab - n;
      x[currentTabs].style.display = "none";
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
  }
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  var vvname;
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    vvname=y[i].name;
    if(vvname != 'address2' && vvname != 'referral_code')
    {
      if (y[i].value == "") {

        // add an "invalid" class to the field:
        y[i].className += " invalid";
        // and set the current valid status to false
        valid = false;
      }
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " Open Account";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}

$("#vsblitypassword").click(function(){
    if($('#visiblepass').hasClass('vsshow'))
    {
      $('#visiblepass').removeClass('vsshow');
      $('#visiblepass').addClass('vshide');
      $('#visiblepass').html('Hide Password');
      $('#password').prop('type', 'text');
      $('#cnfpassword').prop('type', 'text');
    }
    else if($('#visiblepass').hasClass('vshide'))
    {
      $('#visiblepass').removeClass('vshide');
      $('#visiblepass').addClass('vsshow');
      $('#visiblepass').html('Show Password');
      $('#password').prop('type', 'password');
      $('#cnfpassword').prop('type', 'password');
    }
});