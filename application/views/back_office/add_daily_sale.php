<div class="page">
      <div class="page-main">
          <div class="page-content">
              <div class="container">
              <div class="row">
        <div class="col-12" id="filter-div">
            <form class="card" id="add_daily_sale_form" action="" enctype="multipart/form-data" method="post">
            <div class="card-header">
                <h3 class="card-title"><?php echo $mode;?> Daily Sales</h3>
                <?php if(isset($_SERVER["HTTP_REFERER"])){?>
                <a href="<?php echo $_SERVER["HTTP_REFERER"];?>" class="btn btn-primary ml-auto">Back</a>
                <?php }?>
            </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php
                                    $val = "";
                                    if(isset($filters)){
                                            $val = $filters["sales_manager_id"];
                                    }
                                    else if(isset($sale["sales_manager_id"])){
                                        $val = $sale["sales_manager_id"];
                                    }
                                ?>
                                <?php echo form_label('Sales Manager', 'sales_manager_id', array('class' => 'form-label'));?>
                                <select name="sales_manager_id" id="sales_manager_id" class="form-control custom-select">
                                    <option value="">Please Select</option>
                                    <?php
                                    foreach($dropdowns['sales_manager'] as $smanager){
                                        $sel = "";
                                        if($val != "" && ($smanager["id"] == $val))
                                            $sel = " selected='selected'";
                                    ?>
                                    <option value="<?php echo $smanager["id"];?>"<?php echo $sel;?>><?php echo ucfirst($smanager["first_name"]) . " " . ucfirst($smanager["last_name"]);?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Acquisition DSE/TSA/CSR', 'acquistion', array('class' => 'form-label'));?>
                                <select name="acquistion" id="acquistion" class="form-control custom-select">
                                <?php
                                $sel = "";
                                if(isset($filters)){
                                    if(isset($filters["acquistion"]) && $filters["acquistion"] != ""){
                                        $sel = $filters["acquistion"];
                                    }
                                }
                                else if(isset($sale["acquistion"]) && $sale["acquistion"] != ""){
                                        $sel = $sale["acquistion"];
                                    }
                                ?>
                                    <option value="">Please Select</option>
                                    <option value="DSE"<?php echo ($sel == "DSE")?" selected=''selected":"";?>>DSE</option>
                                    <option value="TSA"<?php echo ($sel == "TSA")?" selected=''selected":"";?>>TSA</option>
                                    <option value="CSR"<?php echo ($sel == "CSR")?" selected=''selected":"";?>>CSR</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                            <?php
                                $val = "";
                                if(isset($filters)){
                                        $val = $filters["acquistion_agent_id"];
                                }
                                else if(isset($sale["acquistion_agent_id"])){
                                    $val = $sale["acquistion_agent_id"];
                                }
                            ?>
                                <?php echo form_label('Acquisition (DSE/TSA/CSR) Name', 'sales_manager_id', array('class' => 'form-label'));?>
                                <select name="acquistion_agent_id" id="acquistion_agent_id" class="form-control custom-select">
                                    <option value="">Please Select</option>
                                    <?php
                                    $dropdowns['csrs'] = array();//by default should be empty
                                    foreach($dropdowns['csrs'] as $csr){
                                        $sel = "";
                                        if($val != "" && ($csr["id"] == $val))
                                            $sel = " selected='selected'";
                                    ?>
                                    <option value="<?php echo $csr["id"];?>"<?php echo $sel;?>><?php echo ucfirst($csr["first_name"]) . " " . ucfirst($csr["last_name"]);?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                            <?php
                                $val = "";
                                if(isset($filters)){
                                        $val = $filters["teamlead_id"];
                                }
                                else if(isset($sale["teamlead_id"])){
                                    $val = $sale["teamlead_id"];
                                }
                            ?>
                                <?php echo form_label('Team Leader', 'teamlead_id', array('class' => 'form-label'));?>
                                <select name="teamlead_id" id="teamlead_id" class="form-control custom-select">
                                    <option value="">Please Select</option>
                                    <?php
                                    foreach($dropdowns['teamleads'] as $teamlead){
                                        $sel = "";
                                        if($val != "" && ($teamlead["id"] == $val))
                                            $sel = " selected='selected'";
                                    ?>
                                    <option value="<?php echo $teamlead["id"];?>"<?php echo $sel;?>><?php echo ucfirst($teamlead["first_name"]) . " " . ucfirst($teamlead["last_name"]);?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Location', 'location_id', array('class' => 'form-label'));?>
                                <select name="location_id" id="location_id" class="form-control custom-select">
                                    <option value="">Please Select</option>
                                    <?php
                                    foreach($dropdowns['call_centers'] as $call_center){
                                        $sel = "";
                                        if(isset($filters["location_id"])){
                                            if(isset($filters["location_id"]) && $filters["location_id"] == $call_center["id"]){
                                                $sel = " selected='selected'";
                                            }
                                        }
                                        elseif(isset($sale["location_id"]) && $sale["location_id"] == $call_center["id"]){
                                            $sel = " selected='selected'";
                                        }
                                    ?>
                                    <option value="<?php echo $call_center["id"]?>"<?php echo $sel;?>><?php echo ucfirst($call_center["name"]);?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                            <?php
                                $val = "";
                                if(isset($filters)){
                                    //if(isset($filters["activation_agent_id"]) && $filters["activation_agent_id"] != ""){
                                        $val = $filters["activation_agent_id"];
                                    //}
                                }
                                else if(isset($sale["activation_agent_id"])){
                                    $val = $sale["activation_agent_id"];
                                }
                            ?>
                                <?php echo form_label('Activation Agent', 'activation_agent_id', array('class' => 'form-label'));?>
                                <select name="activation_agent_id" id="activation_agent_id" class="form-control custom-select">
                                    <option value="">Please Select</option>
                                    <?php
                                    $dropdowns['csrs'] = array();//BY default should be empty
                                    foreach($dropdowns['csrs'] as $csr){
                                        $sel = "";
                                        if($val != "" && ($csr["id"] == $val))
                                            $sel = " selected='selected'";
                                        /*if(isset($filters)){
                                            if(isset($filters["activation_agent_id"]) && $filters["activation_agent_id"] == $csr["id"]){
                                                $sel = " selected='selected'";
                                            }
                                        }*/
                                    ?>
                                    <option value="<?php echo $csr["id"]?>"<?php echo $sel;?>><?php echo ucfirst($csr["first_name"]) . " ". ucfirst($csr["last_name"]);?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Submission Date <span class="required">*</span>', 'submission_date', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="submission_date" name="submission_date" placeholder="" value="<?php echo (isset($_REQUEST["submission_date"]) && $_REQUEST["submission_date"] != "")?$_REQUEST["submission_date"]:((isset($sale["submission_date"]) && $sale["submission_date"] != "")?date("m/d/Y", strtotime($sale["submission_date"])):"");?>" required autocomplete="off"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('DP ID', 'series_start', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="dp_id" name="dp_id" placeholder="DP ID" value="<?php echo (isset($filters["dp_id"]) && $filters["dp_id"] != "")?$filters["dp_id"]:((isset($sale["dp_id"]) && $sale["dp_id"] != "")?$sale["dp_id"]:"");?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Sim Serial No.', 'sim_serial_no', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="sim_serial_no" name="sim_serial_no" placeholder="Sim Serial No." value="<?php echo (isset($filters["sim_serial_no"]) && $filters["sim_serial_no"] != "")?$filters["sim_serial_no"]:((isset($sale["sim_serial_no"]) && $sale["sim_serial_no"] != "")?$sale["sim_serial_no"]:"");?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Directory No.', 'directory_no', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="directory_no" name="directory_no" placeholder="Directory No." value="<?php echo (isset($filters["directory_no"]) && $filters["directory_no"] != "")?$filters["directory_no"]:((isset($sale["directory_no"]) && $sale["directory_no"] != "")?$sale["directory_no"]:"");?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Alternate No. (FNF)', 'alternate_no', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="alternate_no" name="alternate_no" placeholder="Alternate No. (FNF)" value="<?php echo (isset($_REQUEST["alternate_no"]) && $_REQUEST["alternate_no"] != "")?$_REQUEST["alternate_no"]:((isset($sale["alternate_no"]) && $sale["alternate_no"] != "")?$sale["alternate_no"]:"");?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Alternative No. (Office/Land Line)', 'alternate_no_official_land', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="alternate_no_official_land" name="alternate_no_official_land" placeholder="Alternative No. (Office/Land Line)" value="<?php echo (isset($_REQUEST["alternate_no_official_land"]) && $_REQUEST["alternate_no_official_land"] != "")?$_REQUEST["alternate_no_official_land"]:((isset($sale["alternate_no_official_land"]) && $sale["alternate_no_official_land"] != "")?$sale["alternate_no_official_land"]:"");?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Alternative No. (BSCS)', 'alternate_no_official_land', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="alternate_no_bscs" name="alternate_no_bscs" placeholder="Alternative No. (BSCS)" value="<?php echo (isset($_REQUEST["alternate_no_bscs"]) && $_REQUEST["alternate_no_bscs"] != "")?$_REQUEST["alternate_no_bscs"]:((isset($sale["alternate_no_bscs"]) && $sale["alternate_no_bscs"] != "")?$sale["alternate_no_bscs"]:"");?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Email', 'email', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo (isset($_REQUEST["email"]) && $_REQUEST["email"] != "")?$_REQUEST["email"]:((isset($sale["email"]) && $sale["email"] != "")?$sale["email"]:"");?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Customer Name', 'series_start', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Customer Name" value="<?php echo (isset($filters["customer_name"]) && $filters["customer_name"] != "")?$filters["customer_name"]:((isset($sale["customer_name"]) && $sale["customer_name"] != "")?$sale["customer_name"]:"");?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php
                                    $sel = "";
                                    if(isset($filters["nationality"])){
                                        $sel = $filters["nationality"];
                                    }
                                    else if(isset($sale["nationality"])){
                                        $sel = $sale["nationality"];
                                    }
                                    ?>
                                <?php echo form_label('Nationality', 'nationality', array('class' => 'form-label'));?>
                                <select name="nationality" id="nationality" class="form-control custom-select">
                                    
                                    <option value="">Please Select</option>
                                    <option value="Afghanistan"<?php echo ($sel == "Afghanistan")?" selected='selected'":"";?>>Afghanistan</option>
                                    <option value="Albania"<?php echo ($sel == "Albania")?" selected='selected'":"";?>>Albania</option>
                                    <option value="Algeria"<?php echo ($sel == "Algeria")?" selected='selected'":"";?>>Algeria</option>
                                    <option value="American Samoa"<?php echo ($sel == "American Samoa")?" selected='selected'":"";?>>American Samoa</option>
                                    <option value="Andorra"<?php echo ($sel == "Andorra")?" selected='selected'":"";?>>Andorra</option>
                                    <option value="Angola"<?php echo ($sel == "Angola")?" selected='selected'":"";?>>Angola</option>
                                    <option value="Anguilla"<?php echo ($sel == "Anguilla")?" selected='selected'":"";?>>Anguilla</option>
                                    <option value="Antigua and Barbuda"<?php echo ($sel == "Antigua and Barbuda")?" selected='selected'":"";?>>Antigua and Barbuda</option>
                                    <option value="Argentina"<?php echo ($sel == "Argentina")?" selected='selected'":"";?>>Argentina</option>
                                    <option value="Armenia"<?php echo ($sel == "Armenia")?" selected='selected'":"";?>>Armenia</option>
                                    <option value="Aruba"<?php echo ($sel == "Aruba")?" selected='selected'":"";?>>Aruba</option>
                                    <option value="Australia"<?php echo ($sel == "Australia")?" selected='selected'":"";?>>Australia</option>
                                    <option value="Austria"<?php echo ($sel == "Austria")?" selected='selected'":"";?>>Austria</option>
                                    <option value="Azerbaijan"<?php echo ($sel == "Azerbaijan")?" selected='selected'":"";?>>Azerbaijan</option>
                                    <option value="Bahamas"<?php echo ($sel == "Bahamas")?" selected='selected'":"";?>>Bahamas</option>
                                    <option value="Bahrain"<?php echo ($sel == "Bahrain")?" selected='selected'":"";?>>Bahrain</option>
                                    <option value="Bangladesh"<?php echo ($sel == "Bangladesh")?" selected='selected'":"";?>>Bangladesh</option>
                                    <option value="Barbados"<?php echo ($sel == "Barbados")?" selected='selected'":"";?>>Barbados</option>
                                    <option value="Belarus"<?php echo ($sel == "Belarus")?" selected='selected'":"";?>>Belarus</option>
                                    <option value="Belgium"<?php echo ($sel == "Belgium")?" selected='selected'":"";?>>Belgium</option>
                                    <option value="Belize"<?php echo ($sel == "Belize")?" selected='selected'":"";?>>Belize</option>
                                    <option value="Benin"<?php echo ($sel == "Benin")?" selected='selected'":"";?>>Benin</option>
                                    <option value="Bermuda"<?php echo ($sel == "Bermuda")?" selected='selected'":"";?>>Bermuda</option>
                                    <option value="Bhutan"<?php echo ($sel == "Bhutan")?" selected='selected'":"";?>>Bhutan</option>
                                    <option value="Bolivia"<?php echo ($sel == "Bolivia")?" selected='selected'":"";?>>Bolivia</option>
                                    <option value="Bosnia and Herzegovina"<?php echo ($sel == "Bosnia and Herzegovina")?" selected='selected'":"";?>>Bosnia and Herzegovina</option>
                                    <option value="Botswana"<?php echo ($sel == "Botswana")?" selected='selected'":"";?>>Botswana</option>
                                    <option value="Brazil"<?php echo ($sel == "Brazil")?" selected='selected'":"";?>>Brazil</option>
                                    <option value="Brunei<?php echo ($sel == "Brunei")?" selected='selected'":"";?>">Brunei</option>
                                    <option value="Bulgaria"<?php echo ($sel == "Bulgaria")?" selected='selected'":"";?>>Bulgaria</option>
                                    <option value="Burkina Faso"<?php echo ($sel == "Burkina Faso")?" selected='selected'":"";?>>Burkina Faso</option>
                                    <option value="Burundi"<?php echo ($sel == "Burundi")?" selected='selected'":"";?>>Burundi</option>
                                    <option value="Cambodia"<?php echo ($sel == "Cambodia")?" selected='selected'":"";?>>Cambodia</option>
                                    <option value="Cameroon"<?php echo ($sel == "Cameroon")?" selected='selected'":"";?>>Cameroon</option>
                                    <option value="Canada"<?php echo ($sel == "Canada")?" selected='selected'":"";?>>Canada</option>
                                    <option value="Cape Verde"<?php echo ($sel == "Cape Verde")?" selected='selected'":"";?>>Cape Verde</option>
                                    <option value="Cayman Islands"<?php echo ($sel == "Cayman Islands")?" selected='selected'":"";?>>Cayman Islands</option>
                                    <option value="Central African Republic"<?php echo ($sel == "Central African Republic")?" selected='selected'":"";?>>Central African Republic</option>
                                    <option value="Chad"<?php echo ($sel == "Chad")?" selected='selected'":"";?>>Chad</option>
                                    <option value="Chile"<?php echo ($sel == "Chile")?" selected='selected'":"";?>>Chile</option>
                                    <option value="China"<?php echo ($sel == "China")?" selected='selected'":"";?>>China</option>
                                    <option value="Christmas Island"<?php echo ($sel == "Christmas Island")?" selected='selected'":"";?>>Christmas Island</option>
                                    <option value="Cocos (Keeling) Islands"<?php echo ($sel == "Cocos (Keeling) Islands")?" selected='selected'":"";?>>Cocos (Keeling) Islands</option>
                                    <option value="Colombia"<?php echo ($sel == "Colombia")?" selected='selected'":"";?>>Colombia</option>
                                    <option value="Comoros"<?php echo ($sel == "Comoros")?" selected='selected'":"";?>>Comoros</option>
                                    <option value="Congo"<?php echo ($sel == "Congo")?" selected='selected'":"";?>>Congo</option>
                                    <option value="Congo, The Democratic Republic of the"<?php echo ($sel == "Congo, The Democratic Republic of the")?" selected='selected'":"";?>>Congo, The Democratic Republic of the</option>
                                    <option value="Cook Islands"<?php echo ($sel == "Cook Islands")?" selected='selected'":"";?>>Cook Islands</option>
                                    <option value="Costa Rica"<?php echo ($sel == "Costa Rica")?" selected='selected'":"";?>>Costa Rica</option>
                                    <option value="Cote dIvoire"<?php echo ($sel == "Cote dIvoire")?" selected='selected'":"";?>>Côte d'Ivoire</option>
                                    <option value="Croatia"<?php echo ($sel == "Croatia")?" selected='selected'":"";?>>Croatia</option>
                                    <option value="Cuba"<?php echo ($sel == "Cuba")?" selected='selected'":"";?>>Cuba</option>
                                    <option value="Cyprus"<?php echo ($sel == "Cyprus")?" selected='selected'":"";?>>Cyprus</option>
                                    <option value="Czech Republic"<?php echo ($sel == "Czech Republic")?" selected='selected'":"";?>>Czech Republic</option>
                                    <option value="Denmark"<?php echo ($sel == "Denmark")?" selected='selected'":"";?>>Denmark</option>
                                    <option value="Djibouti"<?php echo ($sel == "Djibouti")?" selected='selected'":"";?>>Djibouti</option>
                                    <option value="Dominica"<?php echo ($sel == "Dominica")?" selected='selected'":"";?>>Dominica</option>
                                    <option value="Dominican Republic"<?php echo ($sel == "Dominican Republic")?" selected='selected'":"";?>>Dominican Republic</option>
                                    <option value="East Timor"<?php echo ($sel == "East Timor")?" selected='selected'":"";?>>East Timor</option>
                                    <option value="Ecuador"<?php echo ($sel == "Ecuador")?" selected='selected'":"";?>>Ecuador</option>
                                    <option value="Egypt"<?php echo ($sel == "Egypt")?" selected='selected'":"";?>>Egypt</option>
                                    <option value="El Salvador"<?php echo ($sel == "El Salvador")?" selected='selected'":"";?>>El Salvador</option>
                                    <option value="Equatorial Guinea"<?php echo ($sel == "Equatorial Guinea")?" selected='selected'":"";?>>Equatorial Guinea</option>
                                    <option value="Eritrea"<?php echo ($sel == "Eritrea")?" selected='selected'":"";?>>Eritrea</option>
                                    <option value="Estonia"<?php echo ($sel == "Estonia")?" selected='selected'":"";?>>Estonia</option>
                                    <option value="Ethiopia"<?php echo ($sel == "Ethiopia")?" selected='selected'":"";?>>Ethiopia</option>
                                    <option value="Falkland Islands"<?php echo ($sel == "Falkland Islands")?" selected='selected'":"";?>>Falkland Islands</option>
                                    <option value="Faroe Islands"<?php echo ($sel == "Faroe Islands")?" selected='selected'":"";?>>Faroe Islands</option>
                                    <option value="Fiji Islands"<?php echo ($sel == "Fiji Islands")?" selected='selected'":"";?>>Fiji Islands</option>
                                    <option value="Finland"<?php echo ($sel == "Finland")?" selected='selected'":"";?>>Finland</option>
                                    <option value="France"<?php echo ($sel == "France")?" selected='selected'":"";?>>France</option>
                                    <option value="French Guiana"<?php echo ($sel == "French Guiana")?" selected='selected'":"";?>>French Guiana</option>
                                    <option value="French Polynesia"<?php echo ($sel == "French Polynesia")?" selected='selected'":"";?>>French Polynesia</option>
                                    <option value="Gabon"<?php echo ($sel == "Gabon")?" selected='selected'":"";?>>Gabon</option>
                                    <option value="Gambia"<?php echo ($sel == "Gambia")?" selected='selected'":"";?>>Gambia</option>
                                    <option value="Georgia"<?php echo ($sel == "Georgia")?" selected='selected'":"";?>>Georgia</option>
                                    <option value="Germany"<?php echo ($sel == "Germany")?" selected='selected'":"";?>>Germany</option>
                                    <option value="Ghana"<?php echo ($sel == "Ghana")?" selected='selected'":"";?>>Ghana</option>
                                    <option value="Gibraltar"<?php echo ($sel == "Gibraltar")?" selected='selected'":"";?>>Gibraltar</option>
                                    <option value="Greece"<?php echo ($sel == "Greece")?" selected='selected'":"";?>>Greece</option>
                                    <option value="Greenland"<?php echo ($sel == "Greenland")?" selected='selected'":"";?>>Greenland</option>
                                    <option value="Grenada"<?php echo ($sel == "Grenada")?" selected='selected'":"";?>>Grenada</option>
                                    <option value="Guadeloupe"<?php echo ($sel == "Guadeloupe")?" selected='selected'":"";?>>Guadeloupe</option>
                                    <option value="Guam"<?php echo ($sel == "Guam")?" selected='selected'":"";?>>Guam</option>
                                    <option value="Guatemala"<?php echo ($sel == "Guatemala")?" selected='selected'":"";?>>Guatemala</option>
                                    <option value="Guinea"<?php echo ($sel == "Guinea")?" selected='selected'":"";?>>Guinea</option>
                                    <option value="Guinea-Bissau"<?php echo ($sel == "Guinea-Bissau")?" selected='selected'":"";?>>Guinea-Bissau</option>
                                    <option value="Guyana"<?php echo ($sel == "Guyana")?" selected='selected'":"";?>>Guyana</option>
                                    <option value="Haiti"<?php echo ($sel == "Haiti")?" selected='selected'":"";?>>Haiti</option>
                                    <option value="Holy See (Vatican City State)"<?php echo ($sel == "Holy See (Vatican City State)")?" selected='selected'":"";?>>Holy See (Vatican City State)</option>
                                    <option value="Honduras"<?php echo ($sel == "Honduras")?" selected='selected'":"";?>>Honduras</option>
                                    <option value="Hong Kong"<?php echo ($sel == "Hong Kong")?" selected='selected'":"";?>>Hong Kong</option>
                                    <option value="Hungary"<?php echo ($sel == "Hungary")?" selected='selected'":"";?>>Hungary</option>
                                    <option value="Iceland"<?php echo ($sel == "Iceland")?" selected='selected'":"";?>>Iceland</option>
                                    <option value="India"<?php echo ($sel == "India")?" selected='selected'":"";?>>India</option>
                                    <option value="Indonesia"<?php echo ($sel == "Indonesia")?" selected='selected'":"";?>>Indonesia</option>
                                    <option value="Iran"<?php echo ($sel == "Iran")?" selected='selected'":"";?>>Iran</option>
                                    <option value="Iraq"<?php echo ($sel == "Iraq")?" selected='selected'":"";?>>Iraq</option>
                                    <option value="Ireland"<?php echo ($sel == "Ireland")?" selected='selected'":"";?>>Ireland</option>
                                    <option value="Israel"<?php echo ($sel == "Israel")?" selected='selected'":"";?>>Israel</option>
                                    <option value="Italy"<?php echo ($sel == "Italy")?" selected='selected'":"";?>>Italy</option>
                                    <option value="Jamaica"<?php echo ($sel == "Jamaica")?" selected='selected'":"";?>>Jamaica</option>
                                    <option value="Japan"<?php echo ($sel == "Japan")?" selected='selected'":"";?>>Japan</option>
                                    <option value="Jordan"<?php echo ($sel == "Jordan")?" selected='selected'":"";?>>Jordan</option>
                                    <option value="Kazakstan"<?php echo ($sel == "Kazakstan")?" selected='selected'":"";?>>Kazakstan</option>
                                    <option value="Kenya"<?php echo ($sel == "Kenya")?" selected='selected'":"";?>>Kenya</option>
                                    <option value="Kiribati"<?php echo ($sel == "Kiribati")?" selected='selected'":"";?>>Kiribati</option>
                                    <option value="Kuwait"<?php echo ($sel == "Kuwait")?" selected='selected'":"";?>>Kuwait</option>
                                    <option value="Kyrgyzstan"<?php echo ($sel == "Kyrgyzstan")?" selected='selected'":"";?>>Kyrgyzstan</option>
                                    <option value="Laos"<?php echo ($sel == "Laos")?" selected='selected'":"";?>>Laos</option>
                                    <option value="Latvia"<?php echo ($sel == "Latvia")?" selected='selected'":"";?>>Latvia</option>
                                    <option value="Lebanon"<?php echo ($sel == "Lebanon")?" selected='selected'":"";?>>Lebanon</option>
                                    <option value="Lesotho"<?php echo ($sel == "Lesotho")?" selected='selected'":"";?>>Lesotho</option>
                                    <option value="Liberia"<?php echo ($sel == "Liberia")?" selected='selected'":"";?>>Liberia</option>
                                    <option value="Libyan Arab Jamahiriya"<?php echo ($sel == "Libyan Arab Jamahiriya")?" selected='selected'":"";?>>Libyan Arab Jamahiriya</option>
                                    <option value="Liechtenstein"<?php echo ($sel == "Liechtenstein")?" selected='selected'":"";?>>Liechtenstein</option>
                                    <option value="Lithuania"<?php echo ($sel == "Lithuania")?" selected='selected'":"";?>>Lithuania</option>
                                    <option value="Luxembourg"<?php echo ($sel == "Luxembourg")?" selected='selected'":"";?>>Luxembourg</option>
                                    <option value="Macao"<?php echo ($sel == "Macao")?" selected='selected'":"";?>>Macao</option>
                                    <option value="Macedonia"<?php echo ($sel == "Macedonia")?" selected='selected'":"";?>>Macedonia</option>
                                    <option value="Madagascar"<?php echo ($sel == "Madagascar")?" selected='selected'":"";?>>Madagascar</option>
                                    <option value="Malawi"<?php echo ($sel == "Malawi")?" selected='selected'":"";?>>Malawi</option>
                                    <option value="Malaysia"<?php echo ($sel == "Malaysia")?" selected='selected'":"";?>>Malaysia</option>
                                    <option value="Maldives"<?php echo ($sel == "Maldives")?" selected='selected'":"";?>>Maldives</option>
                                    <option value="Mali"<?php echo ($sel == "Mali")?" selected='selected'":"";?>>Mali</option>
                                    <option value="Malta"<?php echo ($sel == "Malta")?" selected='selected'":"";?>>Malta</option>
                                    <option value="Marshall Islands"<?php echo ($sel == "Marshall Islands")?" selected='selected'":"";?>>Marshall Islands</option>
                                    <option value="Martinique"<?php echo ($sel == "Martinique")?" selected='selected'":"";?>>Martinique</option>
                                    <option value="Mauritania"<?php echo ($sel == "Mauritania")?" selected='selected'":"";?>>Mauritania</option>
                                    <option value="Mauritius"<?php echo ($sel == "Mauritius")?" selected='selected'":"";?>>Mauritius</option>
                                    <option value="Mayotte"<?php echo ($sel == "Mayotte")?" selected='selected'":"";?>>Mayotte</option>
                                    <option value="Mexico"<?php echo ($sel == "Mexico")?" selected='selected'":"";?>>Mexico</option>
                                    <option value="Micronesia, Federated States of"<?php echo ($sel == "Micronesia, Federated States of")?" selected='selected'":"";?>>Micronesia, Federated States of</option>
                                    <option value="Moldova"<?php echo ($sel == "Moldova")?" selected='selected'":"";?>>Moldova</option>
                                    <option value="Monaco"<?php echo ($sel == "Monaco")?" selected='selected'":"";?>>Monaco</option>
                                    <option value="Mongolia"<?php echo ($sel == "Mongolia")?" selected='selected'":"";?>>Mongolia</option>
                                    <option value="Montserrat"<?php echo ($sel == "Montserrat")?" selected='selected'":"";?>>Montserrat</option>
                                    <option value="Morocco"<?php echo ($sel == "Morocco")?" selected='selected'":"";?>>Morocco</option>
                                    <option value="Mozambique"<?php echo ($sel == "Mozambique")?" selected='selected'":"";?>>Mozambique</option>
                                    <option value="Myanmar"<?php echo ($sel == "Myanmar")?" selected='selected'":"";?>>Myanmar</option>
                                    <option value="Namibia"<?php echo ($sel == "Namibia")?" selected='selected'":"";?>>Namibia</option>
                                    <option value="Nauru"<?php echo ($sel == "Nauru")?" selected='selected'":"";?>>Nauru</option>
                                    <option value="Nepal"<?php echo ($sel == "Nepal")?" selected='selected'":"";?>>Nepal</option>
                                    <option value="Netherlands"<?php echo ($sel == "Netherlands")?" selected='selected'":"";?>>Netherlands</option>
                                    <option value="Netherlands Antilles"<?php echo ($sel == "Netherlands Antilles")?" selected='selected'":"";?>>Netherlands Antilles</option>
                                    <option value="New Caledonia"<?php echo ($sel == "New Caledonia")?" selected='selected'":"";?>>New Caledonia</option>
                                    <option value="New Zealand"<?php echo ($sel == "New Zealand")?" selected='selected'":"";?>>New Zealand</option>
                                    <option value="Nicaragua"<?php echo ($sel == "Nicaragua")?" selected='selected'":"";?>>Nicaragua</option>
                                    <option value="Niger"<?php echo ($sel == "Niger")?" selected='selected'":"";?>>Niger</option>
                                    <option value="Nigeria"<?php echo ($sel == "Nigeria")?" selected='selected'":"";?>>Nigeria</option>
                                    <option value="Niue"<?php echo ($sel == "Niue")?" selected='selected'":"";?>>Niue</option>
                                    <option value="Norfolk Island"<?php echo ($sel == "Norfolk Island")?" selected='selected'":"";?>>Norfolk Island</option>
                                    <option value="North Korea"<?php echo ($sel == "North Korea")?" selected='selected'":"";?>>North Korea</option>
                                    <option value="Northern Mariana Islands"<?php echo ($sel == "Northern Mariana Islands")?" selected='selected'":"";?>>Northern Mariana Islands</option>
                                    <option value="Norway"<?php echo ($sel == "Norway")?" selected='selected'":"";?>>Norway</option>
                                    <option value="Oman"<?php echo ($sel == "Oman")?" selected='selected'":"";?>>Oman</option>
                                    <option value="Pakistan"<?php echo ($sel == "Pakistan")?" selected='selected'":"";?>>Pakistan</option>
                                    <option value="Palau"<?php echo ($sel == "Palau")?" selected='selected'":"";?>>Palau</option>
                                    <option value="Palestine"<?php echo ($sel == "Palestine")?" selected='selected'":"";?>>Palestine</option>
                                    <option value="Panama"<?php echo ($sel == "Panama")?" selected='selected'":"";?>>Panama</option>
                                    <option value="Papua New Guinea"<?php echo ($sel == "Papua New Guinea")?" selected='selected'":"";?>>Papua New Guinea</option>
                                    <option value="Paraguay"<?php echo ($sel == "Paraguay")?" selected='selected'":"";?>>Paraguay</option>
                                    <option value="Peru"<?php echo ($sel == "Peru")?" selected='selected'":"";?>>Peru</option>
                                    <option value="Philippines"<?php echo ($sel == "Philippines")?" selected='selected'":"";?>>Philippines</option>
                                    <option value="Pitcairn"<?php echo ($sel == "Pitcairn")?" selected='selected'":"";?>>Pitcairn</option>
                                    <option value="Poland"<?php echo ($sel == "Poland")?" selected='selected'":"";?>>Poland</option>
                                    <option value="Portugal"<?php echo ($sel == "Portugal")?" selected='selected'":"";?>>Portugal</option>
                                    <option value="Puerto Rico"<?php echo ($sel == "Puerto Rico")?" selected='selected'":"";?>>Puerto Rico</option>
                                    <option value="Qatar"<?php echo ($sel == "Qatar")?" selected='selected'":"";?>>Qatar</option>
                                    <option value="Reunion"<?php echo ($sel == "Reunion")?" selected='selected'":"";?>>Réunion</option>
                                    <option value="Romania"<?php echo ($sel == "Romania")?" selected='selected'":"";?>>Romania</option>
                                    <option value="Russian Federation"<?php echo ($sel == "Russian Federation")?" selected='selected'":"";?>>Russian Federation</option>
                                    <option value="Rwanda"<?php echo ($sel == "Rwanda")?" selected='selected'":"";?>>Rwanda</option>
                                    <option value="Saint Helena"<?php echo ($sel == "Saint Helena")?" selected='selected'":"";?>>Saint Helena</option>
                                    <option value="Saint Kitts and Nevis"<?php echo ($sel == "Saint Kitts and Nevis")?" selected='selected'":"";?>>Saint Kitts and Nevis</option>
                                    <option value="Saint Lucia"<?php echo ($sel == "Saint Lucia")?" selected='selected'":"";?>>Saint Lucia</option>
                                    <option value="Saint Pierre and Miquelon"<?php echo ($sel == "Saint Pierre and Miquelon")?" selected='selected'":"";?>>Saint Pierre and Miquelon</option>
                                    <option value="Saint Vincent and the Grenadines"<?php echo ($sel == "Saint Vincent and the Grenadines")?" selected='selected'":"";?>>Saint Vincent and the Grenadines</option>
                                    <option value="Samoa"<?php echo ($sel == "Samoa")?" selected='selected'":"";?>>Samoa</option>
                                    <option value="San Marino"<?php echo ($sel == "an Marino")?" selected='selected'":"";?>>San Marino</option>
                                    <option value="Sao Tome and Principe"<?php echo ($sel == "Sao Tome and Principe")?" selected='selected'":"";?>>Sao Tome and Principe</option>
                                    <option value="Saudi Arabia"<?php echo ($sel == "Saudi Arabia")?" selected='selected'":"";?>>Saudi Arabia</option>
                                    <option value="Senegal"<?php echo ($sel == "Senegal")?" selected='selected'":"";?>>Senegal</option>
                                    <option value="Seychelles"<?php echo ($sel == "Seychelles")?" selected='selected'":"";?>>Seychelles</option>
                                    <option value="Sierra Leone"<?php echo ($sel == "Sierra Leone")?" selected='selected'":"";?>>Sierra Leone</option>
                                    <option value="Singapore"<?php echo ($sel == "Singapore")?" selected='selected'":"";?>>Singapore</option>
                                    <option value="Slovakia"<?php echo ($sel == "Slovakia")?" selected='selected'":"";?>>Slovakia</option>
                                    <option value="Slovenia"<?php echo ($sel == "Slovenia")?" selected='selected'":"";?>>Slovenia</option>
                                    <option value="Solomon Islands"<?php echo ($sel == "Solomon Islands")?" selected='selected'":"";?>>Solomon Islands</option>
                                    <option value="Somalia"<?php echo ($sel == "Somalia")?" selected='selected'":"";?>>Somalia</option>
                                    <option value="South Africa"<?php echo ($sel == "South Africa")?" selected='selected'":"";?>>South Africa</option>
                                    <option value="South Korea"<?php echo ($sel == "South Korea")?" selected='selected'":"";?>>South Korea</option>
                                    <option value="Spain"<?php echo ($sel == "Spain")?" selected='selected'":"";?>>Spain</option>
                                    <option value="Sri Lanka"<?php echo ($sel == "Sri Lanka")?" selected='selected'":"";?>>Sri Lanka</option>
                                    <option value="Sudan"<?php echo ($sel == "Sudan")?" selected='selected'":"";?>>Sudan</option>
                                    <option value="Suriname"<?php echo ($sel == "Suriname")?" selected='selected'":"";?>>Suriname</option>
                                    <option value="Svalbard and Jan Mayen"<?php echo ($sel == "Svalbard and Jan Mayen")?" selected='selected'":"";?>>Svalbard and Jan Mayen</option>
                                    <option value="Swaziland"<?php echo ($sel == "Swaziland")?" selected='selected'":"";?>>Swaziland</option>
                                    <option value="Sweden"<?php echo ($sel == "Sweden")?" selected='selected'":"";?>>Sweden</option>
                                    <option value="Switzerland"<?php echo ($sel == "Switzerland")?" selected='selected'":"";?>>Switzerland</option>
                                    <option value="Syria"<?php echo ($sel == "Syria")?" selected='selected'":"";?>>Syria</option>
                                    <option value="Taiwan"<?php echo ($sel == "Taiwan")?" selected='selected'":"";?>>Taiwan</option>
                                    <option value="Tajikistan"<?php echo ($sel == "Tajikistan")?" selected='selected'":"";?>>Tajikistan</option>
                                    <option value="Tanzania"<?php echo ($sel == "Tanzania")?" selected='selected'":"";?>>Tanzania</option>
                                    <option value="Thailand"<?php echo ($sel == "Thailand")?" selected='selected'":"";?>>Thailand</option>
                                    <option value="Togo"<?php echo ($sel == "Togo")?" selected='selected'":"";?>>Togo</option>
                                    <option value="Tokelau"<?php echo ($sel == "Tokelau")?" selected='selected'":"";?>>Tokelau</option>
                                    <option value="Tonga"<?php echo ($sel == "Tonga")?" selected='selected'":"";?>>Tonga</option>
                                    <option value="Trinidad and Tobago"<?php echo ($sel == "Trinidad and Tobago")?" selected='selected'":"";?>>Trinidad and Tobago</option>
                                    <option value="Tunisia"<?php echo ($sel == "Tunisia")?" selected='selected'":"";?>>Tunisia</option>
                                    <option value="Turkey"<?php echo ($sel == "Turkey")?" selected='selected'":"";?>>Turkey</option>
                                    <option value="Turkmenistan"<?php echo ($sel == "Turkmenistan")?" selected='selected'":"";?>>Turkmenistan</option>
                                    <option value="Turks and Caicos Islands"<?php echo ($sel == "Turks and Caicos Islands")?" selected='selected'":"";?>>Turks and Caicos Islands</option>
                                    <option value="Tuvalu"<?php echo ($sel == "Tuvalu")?" selected='selected'":"";?>>Tuvalu</option>
                                    <option value="Uganda"<?php echo ($sel == "Uganda")?" selected='selected'":"";?>>Uganda</option>
                                    <option value="Ukraine"<?php echo ($sel == "Ukraine")?" selected='selected'":"";?>>Ukraine</option>
                                    <option value="United Arab Emirates"<?php echo ($sel == "United Arab Emirates")?" selected='selected'":"";?>>United Arab Emirates</option>
                                    <option value="United Kingdom"<?php echo ($sel == "United Kingdom")?" selected='selected'":"";?>>United Kingdom</option>
                                    <option value="United States"<?php echo ($sel == "United States")?" selected='selected'":"";?>>United States</option>
                                    <option value="Uruguay"<?php echo ($sel == "Uruguay")?" selected='selected'":"";?>>Uruguay</option>
                                    <option value="Uzbekistan"<?php echo ($sel == "Uzbekistan")?" selected='selected'":"";?>>Uzbekistan</option>
                                    <option value="Vanuatu"<?php echo ($sel == "Vanuatu")?" selected='selected'":"";?>>Vanuatu</option>
                                    <option value="Venezuela"<?php echo ($sel == "Venezuela")?" selected='selected'":"";?>>Venezuela</option>
                                    <option value="Vietnam"<?php echo ($sel == "Vietnam")?" selected='selected'":"";?>>Vietnam</option>
                                    <option value="Virgin Islands, British"<?php echo ($sel == "Virgin Islands, British")?" selected='selected'":"";?>>Virgin Islands, British</option>
                                    <option value="Virgin Islands, U.S."<?php echo ($sel == "Virgin Islands, U.S.")?" selected='selected'":"";?>>Virgin Islands, U.S.</option>
                                    <option value="Wallis and Futuna"<?php echo ($sel == "Wallis and Futuna")?" selected='selected'":"";?>>Wallis and Futuna</option>
                                    <option value="Western Sahara"<?php echo ($sel == "Western Sahara")?" selected='selected'":"";?>>Western Sahara</option>
                                    <option value="Yemen"<?php echo ($sel == "Yemen")?" selected='selected'":"";?>>Yemen</option>
                                    <option value="Yugoslavia"<?php echo ($sel == "Yugoslavia")?" selected='selected'":"";?>>Yugoslavia</option>
                                    <option value="Zambia"<?php echo ($sel == "Zambia")?" selected='selected'":"";?>>Zambia</option>
                                    <option value="Zimbabwe"<?php echo ($sel == "Zimbabwe")?" selected='selected'":"";?>>Zimbabwe</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                             <?php
                                $val = "";
                                if(isset($filters)){
                                    $val = $filters["city_id"];
                                }
                                else if(isset($sale["city_id"])){
                                    $val = $sale["city_id"];
                                }
                            ?>
                                <?php echo form_label('City ', 'city_id', array('class' => 'form-label'));?>
                                <select name="city_id" id="city_id" class="form-control custom-select">
                                    <option value="">Please Select</option>
                                    <?php
                                    foreach($dropdowns['cities'] as $city){
                                        $sel = "";
                                        if($val != "" && ($city["id"] == $val))
                                            $sel = " selected='selected'";
                                    ?>
                                    <option value="<?php echo $city["id"];?>"<?php echo $sel;?>><?php echo ucwords($city["city_name"])?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Account ID', 'series_start', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="account_id" name="account_id" placeholder="Account ID" value="<?php echo (isset($filters["account_id"]) && $filters["account_id"] != "")?$filters["account_id"]:((isset($sale["account_id"]) && $sale["account_id"] != "")?$sale["account_id"]:"");?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Contract Code', 'series_start', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="contract_code" name="contract_code" placeholder="contract code" value="<?php echo (isset($filters["contract_code"]) && $filters["contract_code"] != "")?$filters["contract_code"]:((isset($sale["contract_code"]) && $sale["contract_code"] != "")?$sale["contract_code"]:"");?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                            <?php
                                $val = "";
                                if(isset($filters)){
                                        $val = $filters["plan_short"];
                                }
                                else if(isset($sale["plan_short"])){
                                    $val = $sale["plan_short"];
                                }
                            ?>
                                <?php echo form_label('Plan Short', 'plan_short', array('class' => 'form-label'));?>
                                <select name="plan_short" id="plan_short" class="form-control custom-select">
                                    <option value="">Please Select</option>
                                    <?php
                                    foreach($dropdowns['packages'] as $package){
                                        $sel = "";
                                        if($val != "" && ($package["package_price"] == $val))
                                            $sel = " selected='selected'";
                                    ?>
                                    <option value="<?php echo $package["package_price"];?>"<?php echo $sel;?>><?php echo ucwords($package["package_price"])?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                            <?php
                                $val = "";
                                if(isset($filters)){
                                        $val = $filters["package_id"];
                                }
                                else if(isset($sale["package_id"])){
                                    $val = $sale["package_id"];
                                }
                            ?>
                                <?php echo form_label('Rate plan', 'package_id', array('class' => 'form-label'));?>
                                <select name="package_id" id="package_id" class="form-control custom-select">
                                    <option value="">Please Select</option>
                                    <?php
                                    foreach($dropdowns['packages'] as $package){
                                        $sel = "";
                                        if($val != "" && ($package["id"] == $val))
                                            $sel = " selected='selected'";
                                    ?>
                                    <option value="<?php echo $package["id"];?>"<?php echo $sel;?>><?php echo ucwords($package["package_name"])?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                            <?php
                                $val = "";
                                if(isset($filters)){
                                        $val = $filters["package_detail_id"];
                                }
                                else if(isset($sale["package_detail_id"])){
                                    $val = $sale["package_detail_id"];
                                }
                                $selectedDetail = "";

                            ?>
                                <?php echo form_label('Contract Duration', 'package_detail_id', array('class' => 'form-label'));?>
                                <select name="package_detail_id" id="package_detail_id" class="form-control custom-select">
                                    <option value="">Please Select</option>
                                    <?php
                                        $package_detail_content_html = "";
                                        if(isset($sale["package_selected_detail"]) && !isset($filter)){
                                            foreach($sale["package_selected_detail"] as $package_selected_detail){
                                                $package_detail_content_html .= '<option value="'.$package_selected_detail["id"].'">'.$package_selected_detail["package_description"].'</option>';
                                                $sel = "";
                                                if($val != "" && ($package_selected_detail["id"] == $val)){
                                                    $sel = " selected='selected'";
                                                    $selectedDetail = $package_selected_detail["package_description"];
                                                }
                                                ?>
                                                <option value="<?php echo $package_selected_detail["id"];?>"<?php echo $sel;?>><?php echo $package_selected_detail["package_duration"];?></option>
                                                <?php
                                            }
                                        }
                                    ?>
                                </select>
                                <select id="package_detail_content" style="display:none;"><?php echo $package_detail_content_html;?></select>
                            </div>
                            
                        </div>

                        <div class="col-md-3 col-lg-3">
                            
                            <div class="form-group" id="plan_description_div">
                                <div id="popup_hover" style="display: none;background-color:#f8f9fa;position: absolute;z-index: 999999;width: 200px;height: 170px;padding: 13px;">
                                
                                </div>
                                <?php echo form_label('Add On (300+ Package) Name', 'plan_description', array('class' => 'form-label'));?>
                                <input type="text" id="plan_description" class="form-control" readonly value="<?php echo ($selectedDetail != "")?$selectedDetail:"";?>"/>
                            </div>
                        </div>

                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                            <?php
                                $val = "";
                                if(isset($filters)){
                                        $val = $filters["package_classification_id"];
                                }
                                else if(isset($sale["package_classification_id"])){
                                    $val = $sale["package_classification_id"];
                                }
                            ?>
                                <?php echo form_label('Package Classification', 'package_classification_id', array('class' => 'form-label'));?>
                                <select name="package_classification_id" id="package_classification_id" class="form-control custom-select">
                                    <option value="">Please Select</option>
                                    <?php
                                    foreach($dropdowns['package_classifications'] as $package_classification){
                                        $sel = "";
                                        if($val != "" && ($package_classification["id"] == $val))
                                            $sel = " selected='selected'";
                                    ?>
                                    <option value="<?php echo $package_classification["id"];?>"<?php echo $sel;?>><?php echo ucwords($package_classification["classifications_name"]);?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Activation Date', 'submission_date', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="activation_date" name="activation_date" placeholder="" value="<?php echo (isset($_REQUEST["activation_date"]) && $_REQUEST["activation_date"] != "")?$_REQUEST["activation_date"]:((isset($sale["activation_date"]) && $sale["activation_date"] != "")?date("m/d/Y", strtotime($sale["activation_date"])):"");?>" required autocomplete="off"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                             <?php
                                $val = "";
                                if(isset($filters)){
                                    //if(isset($filters["promo_device_id"]) && $filters["promo_device_id"] != ""){
                                        $val = $filters["promo_device_id"];
                                    //}
                                }
                                else if(isset($sale["promo_device_id"])){
                                    $val = $sale["promo_device_id"];
                                }
                            ?>
                                <?php echo form_label('Promo Device', 'promo_device_id', array('class' => 'form-label'));?>
                                <select name="promo_device_id" id="promo_device_id" class="form-control custom-select">
                                    <option value="">Please Select</option>
                                    <?php
                                    foreach($dropdowns['promo_devices'] as $promo_device){
                                        $sel = "";
                                        if($val != "" && ($promo_device["id"] == $val))
                                            $sel = " selected='selected'";
                                    ?>
                                    <option value="<?php echo $promo_device["id"];?>"<?php echo $sel;?>><?php echo ucfirst($promo_device["name"])?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                            <?php
                                $val = "";
                                if(isset($filters)){
                                    $val = $filters["handset_type_id"];
                                }
                                else if(isset($sale["handset_type_id"])){
                                    $val = $sale["handset_type_id"];
                                }
                            ?>
                                <?php echo form_label('Handset Type', 'handset_type_id', array('class' => 'form-label'));?>
                                <select name="handset_type_id" id="handset_type_id" class="form-control custom-select">
                                    <option value="">Please Select</option>
                                    <?php
                                    foreach($dropdowns['handset_types'] as $handset_type){
                                        $sel = "";
                                        if($val != "" && ($handset_type["id"] == $val))
                                            $sel = " selected='selected'";
                                    ?>
                                    <option value="<?php echo $handset_type["id"];?>"<?php echo $sel;?>><?php echo ucwords($handset_type["name"])?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                            <?php
                                $val = "";
                                if(isset($filters)){
                                    $val = $filters["handset_model_id"];
                                }
                                else if(isset($sale["handset_model_id"])){
                                    $val = $sale["handset_model_id"];
                                }
                            ?>
                                <?php echo form_label('Handset Model', 'handset_model_id', array('class' => 'form-label'));?>
                                <select name="handset_model_id" id="handset_model_id" class="form-control custom-select">
                                    <option value="">Please Select</option>
                                    <?php
                                    foreach($dropdowns['handset_models'] as $handset_model){
                                        $sel = "";
                                        if($val != "" && ($handset_model["id"] == $val))
                                            $sel = " selected='selected'";
                                    ?>
                                    <option value="<?php echo $handset_model["id"];?>"<?php echo $sel;?>><?php echo ucwords($handset_model["name"])?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                            <?php
                                $val = "";
                                if(isset($filters)){
                                    $val = $filters["handset_color_id"];
                                }
                                else if(isset($sale["handset_color_id"])){
                                    $val = $sale["handset_color_id"];
                                }
                            ?>
                                <?php echo form_label('Handset Color', 'handset_color_id', array('class' => 'form-label'));?>
                                <select name="handset_color_id" id="handset_color_id" class="form-control custom-select">
                                    <option value="">Please Select</option>
                                    <?php
                                    foreach($dropdowns['handset_colors'] as $handset_color){
                                        $sel = "";
                                        if($val != "" && ($handset_color["id"] == $val))
                                            $sel = " selected='selected'";
                                    ?>
                                    <option value="<?php echo $handset_color["id"];?>"<?php echo $sel;?>><?php echo ucwords($handset_color["color"])?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Reference Number', 'reference_no', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="reference_no" name="reference_no" placeholder="" value="<?php echo (isset($_REQUEST["reference_no"]) && $_REQUEST["reference_no"] != "")?$_REQUEST["reference_no"]:((isset($sale["reference_no"]) && $sale["reference_no"] != "")?$sale["reference_no"]:"");?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                            <?php
                                $val = "";
                                if(isset($filters)){
                                        $val = $filters["lead_classification_id"];
                                }
                                else if(isset($sale["lead_classification_id"])){
                                    $val = $sale["lead_classification_id"];
                                }
                                
                            ?>
                                <?php echo form_label('Lead Classification', 'lead_classification_id', array('class' => 'form-label'));?>
                                <select name="lead_classification_id" id="lead_classification_id" class="form-control custom-select">
                                    <option value="">Please Select</option>
                                    <?php
                                    foreach($dropdowns['lead_classifications'] as $lead_classification){
                                        $sel = "";
                                        if($val != "" && ($lead_classification["classification"] == $val))
                                            $sel = " selected='selected'";
                                    ?>
                                    <option value="<?php echo $lead_classification["id"];?>"<?php echo $sel;?>><?php echo ucfirst($lead_classification["classification"])?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <?php
                                $val = "";
                                if(isset($filters)){
                                    $val = $filters["status"];
                                }
                                else if(isset($sale["status"])){
                                    $val = $sale["status"];
                                }
                            ?>
                            <div class="form-group">
                                <?php echo form_label('Status', 'status', array('class' => 'form-label'));?>
                                <select name="status" id="status" class="form-control custom-select">
                                    <option value="">Please Select</option>
                                    <option value="Active"<?php echo ($val == "Active")?" selected=''selected":"";?>>Active</option>
                                    <option value="Rejected"<?php echo ($val == "Rejected")?" selected=''selected":"";?>>Rejected</option>
                                    <option value="Suspended"<?php echo ($val == "Suspended")?" selected=''selected":"";?>>Suspended</option>
                                    <option value="Prepaid"<?php echo ($val == "Prepaid")?" selected=''selected":"";?>>Prepaid</option>
                                    <option value="Deactivated"<?php echo ($val == "Deactivated")?" selected=''selected":"";?>>Deactivated</option>
                                    <option value="Not Active"<?php echo ($val == "Not Active")?" selected=''selected":"";?>>Not Active</option>
                                    <option value="On Hold"<?php echo ($val == "On Hold")?" selected=''selected":"";?>>On Hold</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('OM ID', 'om_id', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="om_id" name="om_id" placeholder="" value="<?php echo (isset($_REQUEST["om_id"]) && $_REQUEST["om_id"] != "")?$_REQUEST["om_id"]:((isset($sale["om_id"]) && $sale["om_id"] != "")?$sale["om_id"]:"");?>"/>
                            </div>
                        </div>

                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php
                                    $val = "";
                                    if(isset($filters)){
                                            $val = $filters["kiosk_id"];
                                    }
                                    else if(isset($sale["kiosk_id"])){
                                        $val = $sale["kiosk_id"];
                                    }
                                ?>
                                <?php echo form_label('Kiosk Paid Location', 'kiosk_id', array('class' => 'form-label'));?>
                                <select name="kiosk_id" id="kiosk_id" class="form-control custom-select">
                                    <option value="">Please Select</option>
                                    <?php
                                    foreach($dropdowns['kiosks'] as $kiosk){
                                        $sel = "";
                                        if($val != "" && ($kiosk["id"] == $val))
                                            $sel = " selected='selected'";
                                    ?>
                                    <option value="<?php echo $kiosk["id"];?>"<?php echo $sel;?>><?php echo ucwords($kiosk["name"]);?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php
                                    $val = "";
                                    if(isset($filters)){
                                            $val = $filters["verification_status"];
                                    }
                                    else if(isset($sale["verification_status"])){
                                        $val = $sale["verification_status"];
                                    }
                                ?>
                                <?php echo form_label('Verification Status', 'verification_status', array('class' => 'form-label'));?>
                                <select name="verification_status" id="verification_status" class="form-control custom-select">
                                    <option value="">Please Select</option>
                                    <option value="1"<?php echo ($val == "1")?" selected=''selected":"";?>>Verified</option>
                                    <option value="0"<?php echo ($val == "0")?" selected=''selected":"";?>>Not Verified</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Verification Remarks', 'verification_remarks', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="verification_remarks" name="verification_remarks" placeholder="" value="<?php echo (isset($_REQUEST["verification_remarks"]) && $_REQUEST["verification_remarks"] != "")?$_REQUEST["verification_remarks"]:((isset($sale["verification_remarks"]) && $sale["verification_remarks"] != "")?$sale["verification_remarks"]:"");?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                            <?php
                                $val = "";
                                if(isset($filters)){
                                    $val = $filters["auto_payment"];
                                }
                                else if(isset($sale["auto_payment"])){
                                    $val = $sale["auto_payment"];
                                }
                            ?>
                                <?php echo form_label('CC Auto Payment', 'auto_payment', array('class' => 'form-label'));?>
                                <select name="auto_payment" id="auto_payment" class="form-control custom-select">
                                    <option value="">Please Select</option>
                                    <option value="1"<?php echo ($val == "1")?" selected=''selected":"";?>>Yes</option>
                                    <option value="0"<?php echo ($val == "0")?" selected=''selected":"";?>>No</option>
                                </select>
                            </div>
                        </div>                                                               
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                             <?php
                                $val = "";
                                if(isset($filters)){
                                    $val = $filters["document_id"];
                                }
                                else if(isset($sale["document_id"])){
                                    $val = $sale["document_id"];
                                }
                            ?>
                                <?php echo form_label('Documentation', 'document_id', array('class' => 'form-label'));?>
                                <select name="document_id" id="document_id" class="form-control custom-select">
                                    <option value="">Please Select</option>
                                    <?php
                                    foreach($dropdowns['documents'] as $document){
                                        $sel = "";
                                        if($val != "" && ($document["id"] == $val))
                                            $sel = " selected='selected'";
                                    ?>
                                    <option value="<?php echo $document["id"];?>"<?php echo $sel;?>><?php echo ucwords($document["name"])?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>   
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Extra Remarks', 'extra_remarks', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" name="extra_remarks" id="extra_remarks" rows="6" placeholder="Extra Remarks" value='<?php echo (isset($_REQUEST["extra_remarks"]) && $_REQUEST["extra_remarks"] != "")?$_REQUEST["extra_remarks"]:((isset($sale["extra_remarks"]) && $sale["extra_remarks"] != "")?$sale["extra_remarks"]:"");?>'>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Team Leader Remarks', 'extra_remarks', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" name="team_leader_remarks" id="team_leader_remarks" rows="6" placeholder="Team Leader Remarks"><?php echo (isset($_REQUEST["team_leader_remarks"]) && $_REQUEST["team_leader_remarks"] != "")?$_REQUEST["team_leader_remarks"]:((isset($sale["team_leader_remarks"]) && $sale["extra_remarks"] != "")?$sale["team_leader_remarks"]:"");?>
                            </div>
                        </div>      

                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Company Name', 'company_name', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="company_name" name="company_name" placeholder="" value="<?php echo (isset($_REQUEST["company_name"]) && $_REQUEST["company_name"] != "")?$_REQUEST["company_name"]:((isset($sale["company_name"]) && $sale["company_name"] != "")?$sale["company_name"]:"");?>"/>
                            </div>
                        </div> 

                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Designation', 'designation', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="designation" name="designation" placeholder="" value="<?php echo (isset($_REQUEST["designation"]) && $_REQUEST["designation"] != "")?$_REQUEST["designation"]:((isset($sale["designation"]) && $sale["designation"] != "")?$sale["designation"]:"");?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                            <?php
                                $val = "";
                                if(isset($filters)){
                                    $val = $filters["business_card"];
                                }
                                else if(isset($sale["business_card"])){
                                    $val = $sale["business_card"];
                                }
                            ?>
                                <?php echo form_label('Business Card', 'business_card', array('class' => 'form-label'));?>
                                <select name="business_card" id="business_card" class="form-control custom-select">
                                    <option value="">Please Select</option>
                                    <option value="1"<?php echo ($val == "1")?" selected=''selected":"";?>>Yes</option>
                                    <option value="0"<?php echo ($val == "0")?" selected=''selected":"";?>>No</option>
                                </select>
                            </div>
                        </div>  
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Welcome Call Remarks', 'extra_remarks', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" name="welcome_call_remarks" id="welcome_call_remarks" rows="6" placeholder="Welcome Call Remarks"><?php echo (isset($_REQUEST["welcome_call_remarks"]) && $_REQUEST["welcome_call_remarks"] != "")?$_REQUEST["team_leader_remarks"]:((isset($sale["welcome_call_remarks"]) && $sale["welcome_call_remarks"] != "")?$sale["welcome_call_remarks"]:"");?>
                            </div>
                        </div>     

                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php
                                $val = "";
                                if(isset($filters)){
                                    $val = $filters["internal_discount"];
                                }
                                else if(isset($sale["internal_discount"])){
                                    $val = $sale["internal_discount"];
                                }
                            ?>
                                <?php echo form_label('Internal Discount', 'internal_discount', array('class' => 'form-label'));?>
                                <select name="internal_discount" id="internal_discount" class="form-control custom-select">
                                    <option value="">Please Select</option>
                                    <?php
                                    foreach($dropdowns['internal_discount'] as $internal_discount){
                                        $sel = "";
                                        if($val != "" && ($internal_discount["id"] == $val))
                                            $sel = " selected='selected'";
                                    ?>
                                    <option value="<?php echo $internal_discount["id"];?>"<?php echo $sel;?>><?php echo ucwords($internal_discount["discount"])?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('CM pic', 'internal_discount', array('class' => 'form-label'));?>
                                <select id="cm_pic" name="cm_pic" class="form-control custom-select">
                                    <option value="">Please Select</option>
                                    <option value="1"<?php echo ($val == "1")?" selected=''selected":"";?>>Yes</option>
                                    <option value="0"<?php echo ($val == "0")?" selected=''selected":"";?>>No</option>
                                </select>
                            </div>    
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Agent Location', 'internal_discount', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="agent_location" name="agent_location" placeholder="Agent Location" value="<?php echo (isset($_REQUEST["agent_location"]) && $_REQUEST["agent_location"] != "")?$_REQUEST["agent_location"]:((isset($sale["agent_location"]) && $sale["agent_location"] != "")?$sale["agent_location"]:"");?>"/>
                            </div>
                        </div>
                        
                        
                                                
                        
                        
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                            <div class="form-label">Upload Files</div>
                            <div class="custom-file">                            
                              <input type="file" class="custom-file-input" id="attachments" name="attachments[]" multiple="multiple" >
                              <label class="custom-file-label">Choose file</label>
                              <?php /*?><?php if(isset($sale["attachments"]) && count($sale["attachments"]) > 0){?>
                              <select name="uploaded_attachments[]" multiple="multiple">
                                <?php
                                foreach($attachments){
                                    
                                }
                                ?>
                              </select>
                              <?php }?><?php */?>
                            </div>
                          </div>
                        </div>
            
                    </div>
                </div>
                <div class="card-footer text-right">
                  <div class="d-flex">
                    <button type="submit" class="btn btn-primary ml-auto" id="search_daily_sale"><?php echo $mode;?> Daily Sale</button>
                  </div>
                </div>                        
            </form>
        </div>
    </div>
              </div>
          </div>
      </div>
<script>
$(document).ready(function(){
    
    $("#month, #submission_date ,#alternative_bo_date ,#activation_date").datepicker({
                dateFormat: 'dd-mm-yy'
    });
    
    $("#package_id").on("change", function(){
        $.ajax({
            url: "/back-office/get-package-detail",
            type: 'POST',
            data: {
                package_id:$(this).val(),
            },
            success: function(response){
                var data = JSON.parse(response);
                var DetailHtml = "<option>Please Select</option>";
                var DetailDescriptionHtml = "";
                $.each(data, function(i, val) {
                    DetailHtml += '<option value="'+val['id']+'">';
                    DetailHtml += val['package_duration'];
                    DetailHtml += '</option>';
                    
                    DetailDescriptionHtml += '<option value="'+val['id']+'">';
                    DetailDescriptionHtml += val['package_description'];
                    DetailDescriptionHtml += '</option>';
                });
                $("#package_detail_id").html(DetailHtml);
                $("#package_detail_content").html(DetailDescriptionHtml);
            }
        });
    });
    
    $("#package_detail_id").on("change", function(){
        //console.log($("option[value='"+$(this).val()+"']", $(this)).index(), $(this).val());
        //console.log($("#package_detail_content option:eq("+($("option[value='"+$(this).val()+"']", $(this)).index() - 1))+")").val());
        console.log($(this).val());
        if($(this).val() != ""){
            //$("#plan_description").val($("#package_detail_content option:eq("+($("option[value='"+$(this).val()+"']", $(this)).index() - 1)+")").val());
            $("#plan_description").val($("#package_detail_content option[value='"+$(this).val()+"']").text());//option:eq("+($("option[value='"+$(this).val()+"']", $(this)).index() - 1)+")").val());
        }
    });
    $("#plan_description_div").mouseover(function(){
        var text = $("#plan_description").val();
        if(text != "")
        {
            $("#popup_hover").text(text);
            $("#popup_hover").show();
        }
    });
    $("#plan_description_div").mouseleave(function(){
        $("#popup_hover").hide();
    });
    $("#acquistion").change(function(){
        var type = $(this).val();
        $.ajax({
            url:"/users/get_teammember_by_type/"+type,
            success:function(res){
                var obj = JSON.parse(res);
                if(obj)
                    console.log(obj);
                    $("#acquistion_agent_id").html(obj['acquisition_name']);
                    $("#activation_agent_id").html(obj['activation_agent_name']);
            }
        });
    });
});
</script>