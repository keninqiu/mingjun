<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\captcha\Captcha;

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
<div class="container clearfix submit-form">
<h3><span class="txtImportant">*</span> indicates required fields.</h3>
<form action="/site/quote-create" method="POST" onsubmit="return check()">
  <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
  <div class="form-group">
    <label for="exampleInputEmail1"><span class="txtImportant">*</span>Inquiry subject:</label>
    <input type="text" class="form-control" name="Quote[subject]" id="subject" placeholder="">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1"><span class="txtImportant">*</span> Message:</label>
    <textarea class="form-control" id="message" name="Quote[message]" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1"><span class="txtImportant">*</span> Name:</label>
    <input type="text" class="form-control" id="name" name="Quote[name]"  placeholder="">
  </div>  
  <div class="form-group">
    <label for="exampleInputEmail1"><span class="txtImportant">*</span> Company:</label>
    <input type="text" class="form-control" id="company" name="Quote[company]" placeholder="">
  </div>  
  <div class="form-group">
    <label for="exampleInputEmail1"><span class="txtImportant">*</span> Address:</label>
    <input type="text" class="form-control" id="address" name="Quote[address]" placeholder="">
  </div>  
  <div class="form-group">
    <label for="exampleInputEmail1"> City:</label>
    <input type="text" class="form-control" id="city" name="Quote[city]" placeholder="">
  </div>  
  <div class="form-group">
    <label for="exampleInputEmail1"> State/Province:</label>
    <input type="text" class="form-control" id="province" name="Quote[province]" placeholder="">
  </div>  
  <div class="form-group">
    <label for="exampleInputEmail1"> Zip/Postal code:</label>
    <input type="text" class="form-control" id="postal" name="Quote[postal]" placeholder="">
  </div>  
  <div class="form-group">
    <label for="exampleInputEmail1"><span class="txtImportant">*</span> Country:</label>
    <select class="form-control" id="country" name="Quote[country]">
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
  </div> 

  <div class="form-group">
    <label for="exampleInputEmail1"><span class="txtImportant">*</span> TEL:</label>
    <input type="text" class="form-control" id="phone" name="Quote[phone]" placeholder="">
  </div>    
  <div class="form-group">
    <label for="exampleInputEmail1"><span class="txtImportant"></span> FAX:</label>
    <input type="text" class="form-control" id="fax" name="Quote[fax]" placeholder="">
  </div>  
  <div class="form-group">
    <label for="exampleInputEmail1"><span class="txtImportant">*</span> Email:</label>
    <input type="text" class="form-control" id="email" name="Quote[email]" placeholder="">
  </div>  
  <div class="form-group">
    <label for="exampleInputEmail1"><span class="txtImportant">*</span> Business Type:</label>
    <input type="hidden" class="form-control" id="type" name="Quote[type]" placeholder="">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck" name="typeCheck" onclick="formType()" value="Importer">
      <label class="form-check-label" for="gridCheck">
        Importer
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck" name="typeCheck" onclick="formType()" value="Wholesaler">
      <label class="form-check-label" for="gridCheck">
        Wholesaler
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck" name="typeCheck" onclick="formType()" value="Department Store">
      <label class="form-check-label" for="gridCheck">
        Department Store
      </label>
    </div>    
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck" name="typeCheck" onclick="formType()" value="Supermarket">
      <label class="form-check-label" for="gridCheck">
        Supermarket
      </label>
    </div>  
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck" name="typeCheck" onclick="formType()" value="Commission Agent">
      <label class="form-check-label" for="gridCheck">
        Commission Agent
      </label>
    </div>   
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck" name="typeCheck" onclick="formType()" value="End User">
      <label class="form-check-label" for="gridCheck">
        End User
      </label>
    </div>     
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck" name="typeCheck" onclick="formType()" value="Manufacturer">
      <label class="form-check-label" for="gridCheck">
        Manufacturer
      </label>
    </div>          
  </div>  
  <div>
    <?php 
      echo Captcha::widget([
          'name' => 'captcha',
      ]);    
    ?>
  </div>
  <div class="submit-button">
    <button type="submit" class="btn btn-primary" >Submit</button>
  </div>
</form>
<script>

function check()
{
  

  if ($('#subject').val() == "")
    {
      alert("Please input your Inquiry subject!");
      $('#subject').focus();
      return (false);
    }
  if ($('#message').val() == "")
    {
      alert("Please input your Message!");
      $('#message').focus();
      return (false);
    }    
  if ($('#name').val() == "")
    {
      alert("Please input your Name!");
      $('#name').focus();
      return (false);
    }

  if ($('#company').val() == "")
    {
      alert("Please input your Company!");
      $('#company').focus();
      return (false);
    }
  if ($('#address').val() == "")
    {
      alert("Please input your Address!");
      $('#address').focus();
      return (false);
    }

  if ($('#country').val() == "")
    {
      alert("Please input your Country!");
      $('#country').focus();
      return (false);
    }

  if ($('#phone').val() == "")
    {
      alert("Please input your TEL!");
      $('#phone').focus();
      return (false);
    }
  
  if ($('#email').val() == "")
    {
      alert("Please input your Email!");
      $('#email').focus();
      return (false);
    }
    
 if ( $('#email').val() != "" &&  ! /^[_\.\d\w\-]+@([\d\w][\d\w\-]+\.)+[\w]{2,3}$/.test($('#email').val())) 
   { 
     alert("Email address error! Please check your email again."); 
     $('#email').focus();
     return (false); 
   } 
   
  if ($('#type').val() == "")
    {
      alert("Please input your Business Type!");
      return (false);
    }

return (true);
}


function formType() {

var typeCom = '';
$("input:checkbox[name=typeCheck]:checked").each(function(){
    typeCom += $(this).val() + ',';
});

if(typeCom != '') {
  typeCom = typeCom.substring(0, typeCom.length - 1);
}

$("#type").val(typeCom);
}
</script>
		</div>
	</div>
</div>