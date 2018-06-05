<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
$this->params["settings"] = $settings;
?>
<div class="content">
	<div id="page-title">
		<div class="container clearfix">
		<h1>Contact Us</h1>
		</div>
		</div>
		<div class="content-wrap">
<div class="container clearfix">
<h1></h1>
<h1></h1>
<h1></h1>
<div class="col_full">
<div class="InquiryForm"><form name="InquiryForm" method="post" action="http://www.sct.com.tw/SiteShare6/AP/SendContact3c2.php" enctype="multipart/form-data" onsubmit="return check(this)"><input type="hidden" name="ComDIR" value="org/ee/smartcabling">
<input type="hidden" name="http_referer" value="http://www.sct.com.tw/">
 <input type="hidden" name="lang" value="en"> 					<h3><span class="txtImportant">*</span> indicates required fields.</h3>
				<table cellspacing="0" cellpadding="0" class="inquForm">
				
					<tbody>
						<tr>
							<td class="columnName"><span class="txtImportant">*</span> Inquiry subject:</td>
							<td><input name="Subject" type="text" class="text"></td>
						</tr>
						<tr>
							<td class="columnName"><span class="txtImportant">*</span> Message:</td>
							<td><textarea class="message" id="message" name="Buyer[Message]" cols="50" rows="6"></textarea></td>
						</tr>
						<tr>
							<td class="columnName"><span class="txtImportant">*</span> Name:</td>
							<td><input name="Name" type="text" class="text"></td>
						</tr>
						<tr>
							<td class="columnName"><span class="txtImportant">*</span> Company:</td>
							<td><input name="Company" type="text" class="text"></td>
						</tr>
						<tr>
							<td class="columnName"><span class="txtImportant">*</span> Address:</td>
							<td><input name="Address" type="text" class="text"></td>
						</tr>
						<tr>
							<td class="columnName">City:</td>
							<td><input name="City" type="text" class="text"></td>
						</tr>
						<tr>
							<td class="columnName">State/Province:</td>
							<td><input name="State" type="text" class="text"></td>
						</tr>
						<tr>
							<td class="columnName">Zip/Postal code:</td>
							<td><input name="Zip" type="text" class="text"></td>
						</tr>
						
						<tr>
							<td class="columnName"><span class="txtImportant">*</span> Country:</td>
							<td>
								<select name="Country">
                                  <option></option>
                                  <option>Albania</option>
                                  <option>Algeria</option>
                                  <option>American Samoa</option>
                                  <option>Andorra</option>
                                  <option>Angola</option>
                                  <option>Anguilla</option>
                                  <option>Antarctic Bases</option>
                                  <option>Antigua</option>
                                  <option>Argentina</option>
                                  <option>Aruba</option>
                                  <option>Ascension</option>
                                  <option>Australia</option>
                                  <option>Austria</option>
                                  <option>Azerbaijan</option>
                                  <option>Bahamas</option>
                                  <option>Bahrain</option>
                                  <option>Balearic Is.</option>
                                  <option>Bangladesh</option>
                                  <option>Barbados</option>
                                  <option>Belarus</option>
                                  <option>Belgium</option>
                                  <option>Belize</option>
                                  <option>Benin</option>
                                  <option>Bermuda Is.</option>
                                  <option>Bhutan</option>
                                  <option>Bolivia</option>
                                  <option>Bophuthatswana</option>
                                  <option>Bosnia-Herzego-Vina Rep.</option>
                                  <option>Botswana</option>
                                  <option>Brazil</option>
                                  <option>British Virgin Is.</option>
                                  <option>Brunei</option>
                                  <option>Bulgaria</option>
                                  <option>Burkina Faso</option>
                                  <option>Burundi Rep.</option>
                                  <option>Cambodia</option>
                                  <option>Cameroon</option>
                                  <option>Canada</option>
                                  <option>Canary Is.</option>
                                  <option>Cape Verde Is. Rep.</option>
                                  <option>Cayman Is.</option>
                                  <option>Central African</option>
                                  <option>Chad</option>
                                  <option>Chile</option>
                                  <option>China</option>
                                  <option>Christmas Is.</option>
                                  <option>Ciskei</option>
                                  <option>Cocos Is.</option>
                                  <option>Colombia</option>
                                  <option>Congo</option>
                                  <option>Cook Is.</option>
                                  <option>Costa Rica</option>
                                  <option>Croatia</option>
                                  <option>Cuba</option>
                                  <option>Cyprus</option>
                                  <option>Czech Rep.</option>
                                  <option>Denmark</option>
                                  <option>Diego Garcia</option>
                                  <option>Djibouti</option>
                                  <option>Dominica</option>
                                  <option>Dominican Rep.</option>
                                  <option>Ecuador</option>
                                  <option>Egypt</option>
                                  <option>El Salvador</option>
                                  <option>Eritrea</option>
                                  <option>Estonia</option>
                                  <option>Ethiopia</option>
                                  <option>Falkland Is.</option>
                                  <option>Faroe Is.</option>
                                  <option>Fiji</option>
                                  <option>Finland</option>
                                  <option>France</option>
                                  <option>French Guiana</option>
                                  <option>French Polynesia</option>
                                  <option>Gabonese Rep.</option>
                                  <option>Gambia</option>
                                  <option>Georgia</option>
                                  <option>Germany</option>
                                  <option>Ghana</option>
                                  <option>Gibraltar</option>
                                  <option>Greece(Hellenic)</option>
                                  <option>Greenland</option>
                                  <option>Grenada</option>
                                  <option>Guadeloupe I.</option>
                                  <option>Guam</option>
                                  <option>Guatemala</option>
                                  <option>Guinea</option>
                                  <option>Guinea-Bissau Rep.</option>
                                  <option>Guyana</option>
                                  <option>Haiti</option>
                                  <option>Honduras</option>
                                  <option>Hong Kong</option>
                                  <option>Hungary</option>
                                  <option>Iceland</option>
                                  <option>India</option>
                                  <option>Indonesia</option>
                                  <option>Iran</option>
                                  <option>Iraq</option>
                                  <option>Ireland</option>
                                  <option>Israel</option>
                                  <option>Italy</option>
                                  <option>Ivory Coast</option>
                                  <option>Jamaica</option>
                                  <option>Japan</option>
                                  <option>Jordan</option>
                                  <option>Kazakhstan</option>
                                  <option>Kenya</option>
                                  <option>Kiribati Rep.</option>
                                  <option>Korea North</option>
                                  <option>Korea South</option>
                                  <option>Kuwait</option>
                                  <option>Kyrgyzstan</option>
                                  <option>Laos</option>
                                  <option>Latvia</option>
                                  <option>Lebanon Rep.</option>
                                  <option>Lesotho</option>
                                  <option>Liberia</option>
                                  <option>Libya</option>
                                  <option>Liechtenstein</option>
                                  <option>Lithuania</option>
                                  <option>Luxembourg</option>
                                  <option>Macao</option>
                                  <option>Macedonia Rep.</option>
                                  <option>Madagascar</option>
                                  <option>Malawi</option>
                                  <option>Malaysia</option>
                                  <option>Maldives</option>
                                  <option>Mali, Rep.</option>
                                  <option>Malta</option>
                                  <option>Mariana Is.</option>
                                  <option>Marshall Is.</option>
                                  <option>Martinique Is.</option>
                                  <option>Maurithnia</option>
                                  <option>Mauritius</option>
                                  <option>Mayotte Is.</option>
                                  <option>Mexico</option>
                                  <option>Micronesia</option>
                                  <option>Moldova</option>
                                  <option>Monaco</option>
                                  <option>Mongolia</option>
                                  <option>Montserrat Is.</option>
                                  <option>Morocco</option>
                                  <option>Mozambique</option>
                                  <option>Myanmar</option>
                                  <option>Namibia</option>
                                  <option>Nauru Rep.</option>
                                  <option>Nepal</option>
                                  <option>Netherlands</option>
                                  <option>Netherlands Antilles</option>
                                  <option>New Caledonia</option>
                                  <option>New Zealand</option>
                                  <option>Nicaragua</option>
                                  <option>Niger</option>
                                  <option>Nigeria</option>
                                  <option>Niue Is.</option>
                                  <option>Norfold Is.</option>
                                  <option>Norway</option>
                                  <option>Oman</option>
                                  <option>Pakistan</option>
                                  <option>Palau</option>
                                  <option>Panama</option>
                                  <option>Papua New Guinea</option>
                                  <option>Paraguay</option>
                                  <option>Peru</option>
                                  <option>Philippines</option>
                                  <option>Poland</option>
                                  <option>Portugal</option>
                                  <option>Puerto Rico</option>
                                  <option>Qatar</option>
                                  <option>Reunion Is.</option>
                                  <option>Romania</option>
                                  <option>Russia</option>
                                  <option>Rwanda Rep.</option>
                                  <option>Saint Christopher &amp; Nevis</option>
                                  <option>San Marino</option>
                                  <option>Sao Tome And Principe Democratic Rep.</option>
                                  <option>Saudi Arabia,Dingdom Of</option>
                                  <option>Senegal</option>
                                  <option>Seychelles</option>
                                  <option>Sierra Leone Rep.</option>
                                  <option>Singapore</option>
                                  <option>Slovak</option>
                                  <option>Slovenia</option>
                                  <option>Solomon Is.</option>
                                  <option>Somalia</option>
                                  <option>South Africa</option>
                                  <option>Spain</option>
                                  <option>Spanish North African Terr.</option>
                                  <option>Sri Lanka</option>
                                  <option>St. Helena</option>
                                  <option>St. Kittsst Nevis</option>
                                  <option>St. Lucia</option>
                                  <option>St. Pierre &amp; Miquelon Is.</option>
                                  <option>St. Vincent</option>
                                  <option>Sudan</option>
                                  <option>Surinam Rep.</option>
                                  <option>Swaziland</option>
                                  <option>Sweden</option>
                                  <option>Switzerland</option>
                                  <option>Syria</option>
                                  <option>Taiwan</option>
                                  <option>Tajikistan</option>
                                  <option>Tanzania</option>
                                  <option>Thailand</option>
                                  <option>Togolese Rep.</option>
                                  <option>Tonga</option>
                                  <option>Transkei</option>
                                  <option>Trinidad &amp; Tobago</option>
                                  <option>Tunisia Rep.</option>
                                  <option>Turkey</option>
                                  <option>Turkmenistan</option>
                                  <option>Turks And Caicos Is.</option>
                                  <option>Tuvalu</option>
                                  <option>U.S.A. Virgin Is.</option>
                                  <option>Uganda</option>
                                  <option>Ukraine</option>
                                  <option>United Arabemirates</option>
                                  <option>United Kingdom</option>
                                  <option>United States</option>
                                  <option>Uruguay</option>
                                  <option>Uzbekstan</option>
                                  <option>Vanuatu</option>
                                  <option>Vatican</option>
                                  <option>Venda</option>
                                  <option>Venezuela</option>
                                  <option>Vietnam</option>
                                  <option>Wallis And Futuna Is.</option>
                                  <option>Wellington</option>
                                  <option>Western Samoa</option>
                                  <option>Yemen Rep.</option>
                                  <option>Yugoslavia</option>
                                  <option>Zaire</option>
                                  <option>Zambia</option>
                                  <option>Zimbabwe</option>
                                </select>
							</td>
						</tr>
						<tr>
							<td class="columnName"><span class="txtImportant">*</span> TEL:</td>
							<td><input name="Tel" type="text" class="text"></td>
						</tr>
						<tr>
							<td class="columnName"><span class="txtImportant">*</span> FAX:</td>
							<td><input name="Fax" type="text" class="text"></td>
						</tr>
						<tr>
							<td class="columnName"><span class="txtImportant">*</span> Email:</td>
							<td><input name="Email" type="text" class="text" value="">
							</td>
						</tr>
						
						<tr>
							<td valign="top" class="columnName"><span class="txtImportant">*</span> Business Type:</td>
							<td>
								<input name="Buyer[Btypes][0]" type="checkbox" class="checkbox" value="1">Importer<br>
                                <input name="Buyer[Btypes][1]" type="checkbox" class="checkbox" value="1">Wholesaler<br>
                                <input name="Buyer[Btypes][2]" type="checkbox" class="checkbox" value="1">Department Store<br>
                                <input name="Buyer[Btypes][3]" type="checkbox" class="checkbox" value="1">Supermarket<br>
                                <input name="Buyer[Btypes][4]" type="checkbox" class="checkbox" value="1">Commission Agent<br>
                                <input name="Buyer[Btypes][5]" type="checkbox" class="checkbox" value="1">End User<br>
                                <input name="Buyer[Btypes][6]" type="checkbox" class="checkbox" value="1">Manufacturer
							</td>
						</tr>
						<tr>
							<td class="columnName"><span class="txtImportant">*</span> Verification:</td>
							<td><span class="txtImportant">Please enter the code you see in the box below.</span><br><img src="/SiteShare6/AP/chknum.php"> <input name="authnumx2" type="text" size="8" class="authnumx2"></td>
						</tr>
					</tbody>
				</table>
				<div align="center">
					<input type="Submit" name="Submit" value="Submit" class="btnLogin">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="Clear" value="Clear" class="btnLogin">
				</div></form>
	    <script language="javascript">
function check(theForm)
{
  

  if (theForm.Subject.value == "")
    {
      alert("Please input your Inquiry subject!");
      theForm.Subject.focus();
      return (false);
    }
  if (theForm.Name.value == "")
    {
      alert("Please input your Name!");
      theForm.Name.focus();
      return (false);
    }

  if (theForm.Company.value == "")
    {
      alert("Please input your Company!");
      theForm.Company.focus();
      return (false);
    }
  if (theForm.Address.value == "")
    {
      alert("Please input your Address!");
      theForm.Address.focus();
      return (false);
    }

  var index=theForm.Country.selectedIndex;
  theForm.Country.options[index].value=theForm.Country.options[index].text;
  if (theForm.Country.options[index].value == "")
    {
      alert("Please input your Country!");
      theForm.Country.options.focus();
      return (false);
    }
  if (theForm.Tel.value == "")
    {
      alert("Please input your TEL!");
      theForm.Tel.focus();
      return (false);
    }

  if (theForm.Fax.value == "")
    {
      alert("Please input your FAX!");
      theForm.Fax.focus();
      return (false);
    }
  
  if (theForm.Email.value == "")
    {
      alert("Please input your Email!");
      theForm.Email.focus();
      return (false);
    }
    
 if ( theForm.Email.value != "" &&  ! /^[_\.\d\w\-]+@([\d\w][\d\w\-]+\.)+[\w]{2,3}$/.test(theForm.Email.value)) 
   { 
     alert("Email address error! Please check your email again."); 
     theForm.Email.focus();
     return (false); 
   } 
   

    if (document.getElementById("message").value == "")
    {
      alert("Please input your Message!");
      document.getElementById("message").focus();
      return (false);
    }
    if (theForm.authnumx2.value == "")
    {
      alert("Please input your Verification!");
      theForm.authnumx2.focus();
      return (false);
    }
return (true);
}


</script>
</div>        </div>

		</div>
	</div>
</div>