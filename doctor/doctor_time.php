<!DOCTYPE html>
<style>
    		body {
			background-color: #f2f2f2;
			font-family: Arial, sans-serif;
			font-size: 16px;
			line-height: 1.6;
			margin: 0;
			padding: 0;
		}

		form {
			background-color: #fff;
			border-radius: 5px;
			box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
			margin: 20px auto;
			max-width: 500px;
			padding: 20px;
			text-align: center;
		}

		label {
			display: block;
			font-weight: bold;
			margin-bottom: 10px;
		}

		input[type="time"],
		select {
			border: 1px solid #ddd;
			border-radius: 3px;
			font-size: 16px;
			margin-bottom: 20px;
			padding: 10px;
			width: 100%;
		}

		button[type="submit"] {
			background-color: #4CAF50;
			border: none;
			border-radius: 5px;
			color: #fff;
			cursor: pointer;
			font-size: 16px;
			font-weight: bold;
			margin-top: 20px;
			padding: 10px 20px;
			transition: background-color 0.3s ease;
		}

		button[type="submit"]:hover {
			background-color: #2E8B57;
		}
		table {
			border-collapse: collapse;
			margin: 20px auto;
			max-width: 800px;
			width: 100%;
		}

		th, td {
			border: 1px solid #ddd;
			padding: 10px;
			text-align: center;
			vertical-align: middle;
		}

		th {
			background-color: #f2f2f2;
			font-weight: bold;
		}

		td {
			background-color: #fff;
		}

		tr:nth-child(odd) td {
			background-color: #f9f9f9;
		}

		tr:hover td {
			background-color: #e6e6e6;
		}
</style>
<body>
    
	<form method="POST" action="admin_method.php">
	    
	    
	    <!--<input type="hidden" id="start-time" name="doctor_id_time" value="<?php echo $id;?>" required>-->
	    <input type="hidden" id="start-time" name="doctor_id_time" value="102" required>
		<label for="start-time">ساعت شروع:</label>
		<input type="time" id="start-time" name="start_time" required>

		<label for="end-time">ساعت پایان:</label>
		<input type="time" id="end-time" name="end_time" required>

		<label for="day">روز هفته:</label>
		<select id="day" name="day" required>
			<option value="">-- روز هفته را انتخاب کنید --</option>
			<option value="0">شنبه</option>
			<option value="1">یک‌شنبه</option>
			<option value="2">دوشنبه</option>
			<option value="3">سه‌شنبه</option>
			<option value="4">چهارشنبه</option>
			<option value="5">پنج‌شنبه</option>
			<option value="6">جمعه</option>
		</select>

		<button type="submit">ثبت</button>
	</form>
		<table style="direction: rtl">
		<tr>
			<th>روز هفته</th>
			<th>ستون ۱</th>
			<th>ستون ۲</th>
			<th>ستون ۳</th>
			<th>ستون ۴</th>
			<th>ستون ۵</th>
		</tr>
		<tr>
			<td>شنبه</td>
			<?php
			$d1 = new Doctor;
			$time = $d1->see_time_by_doctor_day(102, 0);
			$tnum = sizeof($time);
			$tcounter = 0;
			
			while($tcounter < $tnum){
			?>
			<td><?php echo $time[$tcounter][3] . "-" . $time[$tcounter][4];?></td>
			<?php
			$tcounter = $tcounter + 1;
			}
			?>
		</tr>
		<tr>
			<td>یک‌شنبه</td>
			<?php
			$d1 = new Doctor;
			$time = $d1->see_time_by_doctor_day(102, 1);
			$tnum = sizeof($time);
			$tcounter = 0;
			
			while($tcounter < $tnum){
			?>
			<td><?php echo $time[$tcounter][3] . "-" . $time[$tcounter][4];?></td>
			<?php
			$tcounter = $tcounter + 1;
			}
			?>
		</tr>
		<tr>
			<td>دوشنبه</td>
			<?php
			$d1 = new Doctor;
			$time = $d1->see_time_by_doctor_day(102, 2);
			$tnum = sizeof($time);
			$tcounter = 0;
			
			while($tcounter < $tnum){
			?>
			<td><?php echo $time[$tcounter][3] . "-" . $time[$tcounter][4];?></td>
			<?php
			$tcounter = $tcounter + 1;
			}
			?>
		</tr>
		<tr>
			<td>سه‌شنبه</td>
			<?php
			$d1 = new Doctor;
			$time = $d1->see_time_by_doctor_day(102, 3);
			$tnum = sizeof($time);
			$tcounter = 0;
			
			while($tcounter < $tnum){
			?>
			<td><?php echo $time[$tcounter][3] . "-" . $time[$tcounter][4];?></td>
			<?php
			$tcounter = $tcounter + 1;
			}
			?>
		</tr>
		<tr>
			<td>چهارشنبه</td>
			<?php
			$d1 = new Doctor;
			$time = $d1->see_time_by_doctor_day(102, 4);
			$tnum = sizeof($time);
			$tcounter = 0;
			
			while($tcounter < $tnum){
			?>
			<td><?php echo $time[$tcounter][3] . "-" . $time[$tcounter][4];?></td>
			<?php
			$tcounter = $tcounter + 1;
			}
			?>
		</tr>
		<tr>
			<td>پنج‌شنبه</td>
			<?php
			$d1 = new Doctor;
			$time = $d1->see_time_by_doctor_day(102, 5);
			$tnum = sizeof($time);
			$tcounter = 0;
			
			while($tcounter < $tnum){
			?>
			<td><?php echo $time[$tcounter][3] . "-" . $time[$tcounter][4];?></td>
			<?php
			$tcounter = $tcounter + 1;
			}
			?>
		</tr>
		<tr>
			<td>جمعه</td>
			<?php
			$d1 = new Doctor;
			$time = $d1->see_time_by_doctor_day(102, 6);
			$tnum = sizeof($time);
			$tcounter = 0;
			
			while($tcounter < $tnum){
			?>
			<td><?php echo $time[$tcounter][3] . "-" . $time[$tcounter][4];?></td>
			<?php
			$tcounter = $tcounter + 1;
			}
			?>
		</tr>
	</table>
</body>
</html>