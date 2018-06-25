<?php
	include "php/includes/sessionUtils.php";
	
	$session = new sessionUtils();
	echo $session->encryptIt("123");
?>

<form id="feedbackForm" name="feedbackForm" method="post" action="php/updateFB.php">
	<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
	  <thead>
	  <tr>
	      <th class="mdl-data-table__cell--non-numeric"></th>
	      <th class="mdl-data-table__cell--non-numeric">C01</th>
	      <th class="mdl-data-table__cell--non-numeric">C02</th>
	      <th class="mdl-data-table__cell--non-numeric">C03</th>
	      <th class="mdl-data-table__cell--non-numeric">C04</th>
	      <th class="mdl-data-table__cell--non-numeric">C05</th>
	      <th class="mdl-data-table__cell--non-numeric">C06</th>
	  </tr>
	  </thead>
	  <tbody>
	<?php for ($i=1; $i <= 12; $i++) { ?>
	      <tr>
	          <td class="mdl-data-table__cell--non-numeric mdl-typography--font-bold">PO<?=$i?></td>
	          <td>
			        <input type="radio" id="co1" class="mdl-radio__button" name="co1" value="1">
			        <input type="radio" id="co1" class="mdl-radio__button" name="co1" value="2">
			        <input type="radio" id="co1" class="mdl-radio__button" name="co1" value="3">
	          </td>
	          <td>
		          <input type="radio" id="co2" class="mdl-radio__button" name="co2" value="1">
		          <input type="radio" id="co2" class="mdl-radio__button" name="co2" value="2">
		          <input type="radio" id="co2" class="mdl-radio__button" name="co2" value="3">
	          </td>
	          <td>
		          <input type="radio" id="co3" class="mdl-radio__button" name="co3" value="1">
		          <input type="radio" id="co3" class="mdl-radio__button" name="co3" value="2">
		          <input type="radio" id="co3" class="mdl-radio__button" name="co3" value="3">
	          </td>
	          <td>
		          <input type="radio" id="co4" class="mdl-radio__button" name="co4" value="1">
		          <input type="radio" id="co4" class="mdl-radio__button" name="co4" value="2">
		          <input type="radio" id="co4" class="mdl-radio__button" name="co4" value="3">
	          </td>
	          <td>
		          <input type="radio" id="co5" class="mdl-radio__button" name="co5" value="1">
		          <input type="radio" id="co5" class="mdl-radio__button" name="co5" value="2">
		          <input type="radio" id="co5" class="mdl-radio__button" name="co5" value="3">
	          </td>
	          <td>
		          <input type="radio" id="co6" class="mdl-radio__button" name="co6" value="1">
		          <input type="radio" id="co6" class="mdl-radio__button" name="co6" value="2">
		          <input type="radio" id="co6" class="mdl-radio__button" name="co6" value="3">
	          </td>
	      </tr>
	<?php } ?>
	  </tbody>
	</table>
	<div class="mdl-card__actions mdl-card--border mdl-color-text--white">
		<a href="#" onclick="document.getElementById('feedbackForm').submit()" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
			<i class="material-icons">done_all</i> Submit
		</a>
	</div>
</form>