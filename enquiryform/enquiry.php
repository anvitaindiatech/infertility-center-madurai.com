<?php 
session_start();
 ?>
<html>
<head>
 <link href="css/main.css" rel="stylesheet">

 <style type="text/css">
.rc-anchor-normal-footer {
    display: none;
    height: 70px;
    vertical-align: top;
}
.rc-anchor-normal {
    height: 74px!important;
    width: 278px!important;
}
.rc-anchor-logo-portrait {
    margin: 10px 0 0 26px;
    width: 58px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    display: none!important;
}
 </style>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src='https://www.google.com/recaptcha/api.js'></script>
  <script language="javascript" type="text/javascript">
      function clearText(field) {
          if (field.defaultValue == field.value) field.value = '';
          else if (field.value == '') field.value = field.defaultValue;
      }
      function change(obj){
        var val=event.target.id;
        document.getElementById(val).className = "";
        document.getElementById(val).className = "success";

      }
      function validatequickcontact() {
          var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
          var address = document.quickcontact.cemail.value;
          if ((document.quickcontact.cname.value == "") || (document.quickcontact.cname.value == "Name")) {
              document.quickcontact.cname.className = "";
              document.quickcontact.cname.className += "error";
              document.quickcontact.cname.focus();
              return false;
          }
          else if ((document.quickcontact.cemail.value == "") || (document.quickcontact.cemail.value == "Email")) {
              document.quickcontact.cemail.className = "";
              document.quickcontact.cemail.className += "error";
              document.quickcontact.cemail.focus();
          }
          else if ((document.quickcontact.cphoneno.value == "") || (document.quickcontact.cphoneno.value == "phoneno")) {
              document.quickcontact.cphoneno.className = "";
              document.quickcontact.cphoneno.className += "error";
              document.quickcontact.cphoneno.focus();
          }else if ((document.quickcontact.cmessage.value == "") || (document.quickcontact.cmessage.value == "Message")) {
              document.quickcontact.cmessage.className = "";
              document.quickcontact.cmessage.className += "error";
              document.quickcontact.cmessage.focus();
          }
          else if (reg.test(address) == false) {
              document.quickcontact.cemail.className = "";
              document.quickcontact.cemail.className += "error";
              document.quickcontact.cemail.focus();
              return false;
          }
         else if(document.quickcontact.countries.value == "") {

              document.quickcontact.countries.className = "";
              document.quickcontact.countries.className += "error";
              document.quickcontact.countries.focus();
              return false;
          }
          else if (validateph()) {
              if(document.quickcontact.cmessage.value == "" || document.quickcontact.cmessage.value == 'Message') {
                  document.quickcontact.cmessage.className = "";
                  document.quickcontact.cmessage.className += "error";
                  document.quickcontact.cmessage.focus();
                  return false;
              }
             else 
              {
                document.quickcontact.submit();
              }
          } else {
              return false;
          }
      }
      function validateph() {
          var ph1 = document.getElementById('cphoneno').value;
          if (ph1 == '') {
              document.quickcontact.cphoneno.className = "";
              document.quickcontact.cphoneno.className += "error";
              document.quickcontact.cphoneno.focus();
              return false;
          } 
          return true;
      }

      function getSelectedCountry() {
  
          var selected_index = document.getElementById("countries").selectedIndex;      
          if (selected_index > 0) {

              var selected_option_value = document.getElementById("countries").options[selected_index].value;
              var selected_option_text = document.getElementById("countries").options[selected_index].text; 
              //alert(selected_index );
              document.getElementById("selectedCountry").value = selected_option_text;
              document.getElementById("cphonecode").value = selected_option_value;
              document.getElementById("cphonecode").className = "";
              document.getElementById("cphonecode").className = "success";
              document.getElementById("countries").className = "";
              document.getElementById("countries").className = "success";
          } else {
              //alert('Please select a country from the drop down list');
              document.quickcontact.countries.className += "error";
              document.quickcontact.countries.focus();
          }
      }
  </script>
  
</head>
<body>
<div class="container">  
   <form method="post" role="form" name="quickcontact" id="quickcontact" action="sendenquiry.php" class="contact">
 
    <fieldset>
      <input placeholder="Your name" type="text" tabindex="1" autofocus name="cname" id="cname" class="" onfocus="clearText(this)" onblur="clearText(this)" onkeypress="change(cname)">
    </fieldset>
    <fieldset>
      <input placeholder="Your Email Address" type="email" tabindex="2" name="cemail" id="cemail" class="" onfocus="clearText(this)" onblur="clearText(this)" onkeypress="change(cemail)">
    </fieldset>
    <fieldset>
     <select name="countries" id="countries" class="country" onChange="getSelectedCountry()" class="" onfocus="clearText(this)" onblur="clearText(this)" >
     <option value="">Select Country</option>
               <option value="+93">Afghanistan</option>
               <option value="+355 ">Albania</option>
               <option value="+213">Algeria</option>
               <option value="+684">American Samoa</option>
               <option value="+376">Andorra</option>
               <option value="+244">Angola</option>
               <option value="+268">Antigua And Barbuda</option>
               <option value="+54">Argentina</option>
               <option value="+374">Armenia</option>
               <option value="+61">Australia</option>
               <option value="+43">Austria</option>
               <option value="+994">Azerbaijan</option>
               <option value="+242">Bahamas</option>
               <option value="+973">Bahrain</option>
               <option value="+880">Bangladesh</option>
               <option value="+246">Barbados</option>
               <option value="+375">Belarus</option>
               <option value="+32">Belgium</option>
               <option value="+441">Bermuda</option>
               <option value="+975">Bhutan</option>
               <option value="+591">Bolivia</option>
               <option value="+387">Bosnia And Herzegovina</option>
               <option value="+267">Botswana</option>
               <option value="+55">Brazil</option>
               <option value="+673">Brunei Darussalam</option>
               <option value="+359">Bulgaria</option>
               <option value="+257">Burundi</option>
               <option value="+855">Cambodia</option>
               <option value="+237">Cameroon</option>
               <option value="+1">Canada</option>
               <option value="+238">Cape Verde</option>
               <option value="+236">Central African Republic</option>
               <option value="+235">Chad</option>
               <option value="+56">Chile</option>
               <option value="+86">China</option>
               <option value="+57">Colombia</option>
               <option value="+242">Congo</option>
               <option value="+506">Costa Rica</option>
               <option value="+385">Croatia</option>
               <option value="+53">Cuba</option>
               <option value="+357">Cyprus</option>
               <option value="+420">Czech Republic</option>
               <option value="+45">Denmark</option>
               <option value="+20">Egypt</option>
               <option value="+372">Estonia</option>
               <option value="+251">Ethiopia</option>
               <option value="+679">Fiji</option>
               <option value="+358">Finland</option>
               <option value="+33">France</option>
               <option value="+995">Georgia</option>
               <option value="+49">Germany</option>
               <option value="+233">Ghana</option>
               <option value="+30">Greece</option>
               <option value="+592">Guyana</option>
               <option value="+509">Haiti</option>
               <option value="+504">Honduras</option>
               <option value="+852">Hong Kong</option>
               <option value="+36">Hungary</option>
               <option value="+354">Iceland</option>
               <option value="+91">India</option>
               <option value="+62">Indonesia</option>
               <option value="+98">Iran</option>
               <option value="+964">Iraq</option>
               <option value="+353">Ireland</option>
               <option value="+972">Israel</option>
               <option value="+39">Italy</option>
               <option value="+876">Jamaica</option>
               <option value="+81">Japan</option>
               <option value="+962">Jordan</option>
               <option value="+7">Kazakhstan</option>
               <option value="+254">Kenya</option>
               <option value="+82">Korea</option>
               <option value="+965">Kuwait</option>
               <option value="+961">Lebanon</option>
               <option value="+231">Liberia</option>
               <option value="+60">Malaysia</option>
               <option value="+960">Maldives</option>
               <option value="+223">Mali</option>
               <option value="+230">Mauritius</option>
               <option value="+522">Mexico</option>
               <option value="+212">Morocco</option>
               <option value="+95">Myanmar</option>
               <option value="+264">Namibia</option>
               <option value="+977">Nepal</option>
               <option value="+31">Netherlands</option>
               <option value="+64">New Zealand</option>
               <option value="+234">Nigeria</option>
               <option value="+47">Norway</option>
               <option value="968">Oman</option>
               <option value="+92">Pakistan</option>
               <option value="+507">Panama</option>
               <option value="+595">Paraguay</option>
               <option value="+51">Peru</option>
               <option value="+63">Philippines</option>
               <option value="+48">Poland</option>
               <option value="+351">Portugal</option>
               <option value="+974">Qatar</option>
               <option value="+250">Rwanda</option>
               <option value="+40">Romania</option>
               <option value="+7">Russia</option>
               <option value="+966">Saudi Arabia</option>
               <option value="+65">Singapore</option>
               <option value="+27">South Africa</option>
               <option value="+34">Spain</option>
               <option value="+94">Sri Lanka</option>
               <option value="+249">Sudan</option>
               <option value="+46">Sweden</option>
               <option value="+41">Switzerland</option>
               <option value="+886">Taiwan</option>
               <option value="+66">Thailand</option>
               <option value="+868">Trinidad And Tobago</option>
               <option value="+216">Tunisia</option>
               <option value="+90">Turkey</option>
               <option value="+256">Uganda</option>
               <option value="+380">Ukraine</option>
               <option value="+971">United Arab Emirates</option>
               <option value="+44">United Kingdom</option>
               <option value="+1">United States</option>
               <option value="+598">Uruguay</option>
               <option value="+998">Uzbekistan</option>
               <option value="+84">Viet Nam</option>
               <option value="+967">Yemen</option>
               <option value="+263">Zimbabwe</option>
               </select>
                <input type="hidden" name="selectedCountry" id="selectedCountry">
    </fieldset>
    <fieldset>
      <input placeholder="Ph Code" type="text" tabindex="3" name="cphonecode" id="cphonecode" class="" onfocus="clearText(this)" onblur="clearText(this)" readonly>
    </fieldset>
    <fieldset>
      <input placeholder="Your Phone Number" type="tel" tabindex="4" name="cphoneno" id="cphoneno" class="" onfocus="clearText(this)" onblur="clearText(this)" onkeypress="change(cphoneno)">
    </fieldset>
    <fieldset>
      <textarea placeholder="Type your message here...." tabindex="5" name="cmessage" id="cmessage" class="" onfocus="clearText(this)" onblur="clearText(this)" onkeypress="change(cmessage)"></textarea>
    </fieldset>
    <fieldset>
      <div class="captcha_wrapper">
        <div class="g-recaptcha" data-sitekey="6Lfh6hgUAAAAAMLNStmC47Pl25-ARtdTYjwYAIS7" style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
      </div>
    </fieldset>
    <fieldset>
      <button type="button" id="quicksubmit" name="quicksubmit" onclick="validatequickcontact()" >Submit</button>
    </fieldset>
    <fieldset>
      <?php echo(@$_SESSION['errmsg']) ?>
    </fieldset>
  </form>
</div>
<script type="text/javascript"> 
      $(document).ready( function() {
        $(".close").click(function(){
            $(".eror").hide(1000);
            <?php unset($_SESSION['errmsg']); ?>
        });
        $('.eror').delay(5000).fadeOut();
      });
    </script>
</body>
</html>