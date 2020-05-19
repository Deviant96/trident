<?php
/**
 *
 * Member Area/Information
 * Copyright (C) 2009  Arie Nugraha (dicarve@yahoo.com)
 * Patched by Hendro Wicaksono (hendrowicaksono@yahoo.com)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 */


$info = __('Registration');
$page_title = __('Registration');
// Modified by Ilham Arnomo
if (isset($_POST['daftarButton'])) {
	
	$member_id = $dbs->escape_string(trim($_POST['member_id']));
	$member_name = $dbs->escape_string(trim($_POST['member_name']));
	$birth_date = $dbs->escape_string(trim($_POST['birth_date']));
	//$register_date = $_POST['register_date'];
	$register_date = $dbs->escape_string(trim(date("Y-m-d")));
	$expire_date = $dbs->escape_string(trim(date("Y-m-d")));
	$member_since_date = $dbs->escape_string(trim(date("Y-m-d")));
	$last_update = $dbs->escape_string(trim(date("Y-m-d")));
	$inst_name = $dbs->escape_string(trim($_POST["inst_name"]));
	$member_type_id = $dbs->escape_string(trim($_POST['member_type_id']));
	$gender = $dbs->escape_string(trim($_POST['gender']));
	$member_address = $dbs->escape_string(trim($_POST['member_address']));
	$postal_code = $dbs->escape_string(trim($_POST['postal_code']));
	$member_phone = $dbs->escape_string(trim($_POST['member_phone']));
	$pin = $dbs->escape_string(trim($_POST['pin']));
	$member_email = $dbs->escape_string(trim($_POST['member_email']));
	$mpasswd = $dbs->escape_string(trim(md5($_POST['mpasswd'])));


	$tambah = sprintf("INSERT INTO member(member_id, member_name, inst_name, birth_date,
		register_date,expire_date,member_since_date,member_type_id,gender,member_address,
		postal_code,is_pending,member_phone,pin, member_email, last_update, mpasswd) 
		VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', %d, %d, '%s', '%s', %d, '%s', '%s', 
			'%s', '%s', '%s')",
			$member_id, $member_name, $inst_name, $birth_date,
			$register_date, $expire_date,$member_since_date, $member_type_id, $gender, $member_address,
			$postal_code, 1, $member_phone, $pin, $member_email, $last_update, $mpasswd);

	//die($tambah);

	$hasil = $dbs->query($tambah);
	if ($dbs->affected_rows > 0 ) {
		echo '<div class="infoBox">Terima kasih, anda telah terdaftar.</div>';
	} else if ($dbs->error) {
		echo '<div class="errorBox">'.$dbs->error.'</div>';
	}	
}
?>
<div class="loginInfo">
  <form id="form1" name="form1" method="post" enctype="multipart/form-data" action="index.php?p=form">
    <p><b><?php echo __('Online Member Registration'); ?></b><label></label>
      <label></label>
    </p>

    <div class="form-group row">
      <label for="textfield3" class="col-sm-2 col-form-label"><?php echo __('Member Name'); ?></label>
      <div class="col-sm-10">
        <div class="login_input">
          <input type="text" class="form-control" id="textfield3" name="member_name">
        </div>
      </div>
    </div>

    <div class="form-group row">
      <label for="member_id" class="col-sm-2 col-form-label"><?php echo __('NIM'); ?></label>
      <div class="col-sm-10">
        <div class="login_input">
          <input type="number" class="form-control" id="member_id" name="member_id" aria-describedby="nimHelpBlock">
          <small id="nimHelpBlock" class="form-text text-muted">
            <?php echo __('Without period.'); ?>
          </small>
        </div>
      </div>
    </div>

    <div class="form-group row">
      <label for="datepicker" class="col-sm-2 col-form-label"><?php echo __('Birthdate'); ?></label>
      <div class="col-sm-10">
        <div class="login_input">
          <input type="text" class="form-control" id="datepicker" name="birth_date" aria-describedby="birthHelpBlock">
          <small id="nirthHelpBlock" class="form-text text-muted">
            YYYY-MM-DD
          </small>
        </div>
      </div>
    </div>

    <div class="form-group row">
      <label for="textfield3" class="col-sm-2 col-form-label"><?php echo __('Institution'); ?></label>
      <div class="col-sm-10">
        <div class="login_input">
          <input type="text" class="form-control" id="textfield3" name="inst_name">
        </div>
      </div>
    </div>

    <div class="form-group row">
      <label for="lstbln" class="col-sm-2 col-form-label"><?php echo __('Membership Type'); ?></label>
      <div class="col-sm-10">
        <div class="login_input">
        <select id="lstbln" class="custom-select mr-sm-2" name="member_type_id">
                          <option selected value="1">Undergraduate</option>
        <option  value="2">Lecture</option>
        <option value="5">Master</option>
        <option value="4">Doctoral</option>
                          <option value="3">Employee</option>
        </select>
        </div>
      </div>
    </div>

    <div class="form-group row">
      <label for="lstbln" class="col-sm-2 col-form-label"><?php echo __('Gender'); ?></label>
      <div class="col-sm-10">
        <div class="login_input">
          <select id="lstbln" class="custom-select mr-sm-2" name="gender">
            <option selected value="1">Male</option>
            <option value="0">Female</option>
          </select>
        </div>
      </div>
    </div>

    <div class="form-group row">
      <label for="textfield3" class="col-sm-2 col-form-label"><?php echo __('Address'); ?></label>
      <div class="col-sm-10">
        <div class="login_input">
          <textarea name="member_address" class="form-control" type="textarea" id="textfield3" cols="45" rows="3"></textarea>
        </div>
      </div>
    </div>

    <div class="form-group row">
      <label for="textfield3" class="col-sm-2 col-form-label"><?php echo __('Postal Code'); ?></label>
      <div class="col-sm-10">
        <div class="login_input">
          <input type="text" class="form-control" id="textfield3" name="postal_code">
        </div>
      </div>
    </div>

    <div class="form-group row">
      <label for="textfield3" class="col-sm-2 col-form-label"><?php echo __('Phone Number'); ?>*</label>
      <div class="col-sm-10">
        <div class="login_input">
          <input type="text" class="form-control" id="textfield3" name="member_phone" required>
        </div>
      </div>
    </div>

    <div class="form-group row">
      <label for="mail" class="col-sm-2 col-form-label"><?php echo __('Email'); ?>*</label>
      <div class="col-sm-10">
        <div class="login_input">
          <input type="email" class="form-control" id="mail" name="member_email" required>
        </div>
      </div>
    </div>
    
    <div class="form-group row">
      <label for="inputPassword3" class="col-sm-2 col-form-label"><?php echo __('Password'); ?>*</label>
      <div class="col-sm-10">
        <div class="login_input">
          <input type="password" class="form-control" id="inputPassword3" name="mpasswd">
        </div>
      </div>
    </div>

    <div class="form-group row">
      <div class="col-sm-10 centeri">
        <input type="submit" name="daftarButton" id="button" value="<?php echo __('Register'); ?>" class="memberButton" />
      </div>
    </div>

        </td>
        </tr>
    </table>
  </form>
</div>
</align>

<script>
const email = document.getElementById("mail");

email.addEventListener("input", function (event) {
  if (email.validity.typeMismatch) {
    email.setCustomValidity("I am expecting an e-mail address!");
  } else {
    email.setCustomValidity("");
  }
});
</script>