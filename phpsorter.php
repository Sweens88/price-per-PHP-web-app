<html>
<head>
	<script type="text/javascript">
	//Form Control and Validation Functions
	function validateForm() {

		 // Variables to capture the values for all form fields
		var addItemList = document.pricePer.addItemList.value;
		var addItem = document.pricePer.addItem.value;
 		var addStoreList = document.pricePer.addStoreList.value;
 		var addStore = document.pricePer.addStore.value;
		var addPrice = document.pricePer.addPrice.value;
		var addWeight = document.pricePer.addWeight.value;
		var addMeasureList = document.pricePer.addMeasureList.value;
 		var addMeasure = document.pricePer.addMeasure.value;

		// Check that all mandatory fields have values
		if (fieldsEmpty ("Product Name", addItemList, addItem)) { return; }
 		if (fieldsEmpty ("Store Name", addStoreList, addStore)) { return; }
 		if (fieldEmpty ("Price", addPrice) ) { return; }
		if (fieldEmpty ("Weight or Quantity", addWeight) ) { return; }
 		if (fieldsEmpty ("Unit of Measure", addMeasureList, addMeasure)) { return; }

		// Check for correct inputs into text fieldsEmpty
		if (document.pricePer.addItemList.value == "notListed") {
			if ( fieldAlpha ("Product Name", addItem)) { return; }
		}

		if (document.pricePer.addStoreList.value == "notListed") {
			if ( fieldAlphanumeric ("Store Name", addStore)) { return; }
		}

		if (document.pricePer.addMeasureList.value == "notListed") {
			if ( fieldAlpha ("Unit of Measure", addMeasure)) { return; }
		}

		if ( fieldNumericWithPeriod ("Price", addPrice)) { return; }
		if ( fieldNumericWithPeriod ("Weight or Quantity", addWeight)) { return; }


	  alert ("Product information is valid and can now be saved to the database.");
		document.pricePer.submit.disabled = false;
		return 0; /* success */
	}
	//-------------------------Validation Functions-------------------------------

	//----------------------------------------------------------------------------
	//
	// Name: fieldAlphanumeric
	//
	// Description - Checks to see if a field value is only AlphaNumeric, only
	// letters (A-Z and a-z) and digits (0-9) are allowed).
	//
	// Sample Valid Values - 12A, abc12, and 9a1b12c
	//
	// Sample Invalid Value - 83$A% (has a $ and % character)
	//
	// Parameters: fieldName - The Field Name Label on the HTML form
	// fieldValue - The actual value within the field being tested
	//
	// Returns: 1 - fieldValue contains non alphanumeric characters
	// 0 - fieldValue contains alphanumeric characters
	//
	//----------------------------------------------------------------------------
	function fieldAlphanumeric (fieldName, fieldValue) {
	 	var msg =" must contain only letters and numbers";
		if ( /^[A-Za-z0-9]/.test(fieldValue) ) {
			return 0; // passes, contains only alphanumeric characters
		}
		else {
				alert (fieldName + (msg)); // fails, contains non alphanumeric characters
		 return 1;
		}
	}
	//----------------------------------------------------------------------------
	//
	// Name: fieldAlpha
	//
	// Description - Checks to see if a field value is only Alpha, only
	// letters (A-Z and a-z) and digits (0-9) are allowed).
	//
	// Sample Valid Values - 12A, abc12, and 9a1b12c
	//
	// Sample Invalid Value - 83$A% (has a $ and % character)
	//
	// Parameters: fieldName - The Field Name Label on the HTML form
	// fieldValue - The actual value within the field being tested
	//
	// Returns: 1 - fieldValue contains non alphanumeric characters
	// 0 - fieldValue contains alphanumeric characters
	//
	//----------------------------------------------------------------------------
	function fieldAlpha (fieldName, fieldValue) {
	 	var msg =" must contain only letters";
		if (/^[a-zA-Z]/.test(fieldValue)) {
		 	return 0;
		}
		else {
			alert (fieldName + (msg));
		 	return 1;
		}
	}
	//----------------------------------------------------------------------------
	//
	// Name: fieldNumericWithPeriod
	//
	// Description - Checks to see if a field value is only Numeric, only
	// digits (0-9) and periods (.) are allowed.
	//
	// Sample Valid Values - 12, 4.54, .2354
	//
	// Sample Invalid Value - 83$A% (has a $ and % character)
	//
	// Parame$_POST['field5'].' '.$_POST['field6']ters: fieldName - The Field Name Label on the HTML form
	// fieldValue - The actual value within the field being tested
	//
	// Returns: 1 - fieldValue contains non numeric characters
	// 0 - fieldValue contains numeric characters
	//
	//----------------------------------------------------------------------------	//----------------------------------------------------------------------------
	function fieldNumericWithPeriod (fieldName, fieldValue)	{

	 	var msg =" must contain only numbers and periods";
	 	if ( /[0-9.]/.test(fieldValue) ) {
	 		return 0; // passes, contains only numeric characters
	 	}
	 	else {
			alert (fieldName + (msg));
	 		return 1; // fails, contains non numeric characters
	 	}
}
	//----------------------------------------------------------------------------
	//
	// Name: fieldEmpty
	//
	// Description - Determines if a given fieldValue is empty
	//
	// Parameters: fieldName - The Field Name Label on the HTML form
	// fieldValue - The actual value within the field being tested
	//
	// Returns: 1 - fieldValue is empty
	// 0 - fieldValue
	//
	//----------------------------------------------------------------------------
	function fieldEmpty (fieldName, fieldValue) {
 		var msg=" is a required field";
 		if(fieldValue == "") {
 		alert (fieldName +(msg));
 		return 1;
 	}
 	else {
 	return 0;
 	}
	}
	//----------------------------------------------------------------------------
	//
	// Name: fieldsEmpty
	//
	// Description - Determines if two given fieldValue are empty
	//
	// Parameters: fieldName - The Field Name Label on the HTML form
	// fieldValue1 - The actual value within the field being tested
	// fieldValue2 - The actual value within the field being tested
	//
	// Returns: 1 - both fieldValue are empty
	// 0 - fieldValue
	//
	//----------------------------------------------------------------------------
	function fieldsEmpty (fieldName, fieldValue1, fieldValue2) {
 		var msg=" is a required field";
 		if((fieldValue1 == "notListed" || fieldValue1 == "") && (fieldValue2 == "")) {
 		alert (fieldName +(msg));
 		return 1;
 	}
 	else {
 	return 0;
 	}
	}

	//----------------------------------------------------------------------------
	//
	// Name: changeTextBox
	//
	// Description - If an item is not available in the drop down list, the
	// 							 text box will become usable
	//
	// Parameter: val - The value of the dropdown menu
	//
	// Sets disabled to false if user needs to enter their own data
	//
	//----------------------------------------------------------------------------
	function changeTextBox(val) {
		if(val==("notListed")) {
			document.pricePer.addItem.disabled = false;
		} else {
			document.pricePer.addItem.disabled = true;
		}
	}
	function changeTextBox2 (val) {
		if(val==("notListed")) {
			document.pricePer.addStore.disabled = false;
		} else {
			document.pricePer.addStore.disabled = true;
		}
	}
	function changeTextBox3 (val) {
		if(val==("notListed")) {
			document.pricePer.addMeasure.disabled = false;
		} else {
			document.pricePer.addMeasure.disabled = true;
		}
	}

</script>
</head>
<body>


	<?php
	//Main PHP script, reads database, parses info and creates a list of the cheapest
	//items per unit price.
	$inputFile = "pricedatainput.txt";
	$textInput = @fopen($inputFile, "r") or die("Unable to open file!");
	if ($textInput) {
		$textList = explode("\n", fread($textInput, filesize($inputFile)));
	}
	fclose($textInput);
	// Parse input text file ignoring incomplete or incorrect entries
	foreach ($textList as $value) {
		$splitLine = explode(", ", $value);

		if ((sizeOf($splitLine) == 5) &&
	      			($splitLine[2] > 0) &&
							($splitLine[3] > 0)) {
			//replace underscores with spaces and capitalize first letters
			$splitLine[0] = ucwords(str_replace("_", " ", $splitLine[0]));
			$splitLine[1] = ucwords(str_replace("_", " ", $splitLine[1]));
			//assign key-value pairs and push array into multidimensional array
			$organizedItem = array('Item'=>$splitLine[0], 'Store'=>$splitLine[1],
										         'Price'=>$splitLine[2], 'Size'=>$splitLine[3],
										         'Unit'=>$splitLine[4]);
			$organizedItemList[] = $organizedItem;
			//calculate price per unit and push array into multidimensional array
			$pricePer = round($splitLine[2] / $splitLine[3], 2);
			$pricePer = number_format((float)$pricePer, 2, '.', '');
			$pricePer = "$" . $pricePer . "/" . $splitLine[4];
			$pricePerItemList[] = array('Item'=>$splitLine[0],
																  'Store'=>$splitLine[1],
		                              'Price'=>$pricePer);
		}
	}

	//Arrays for displaying unique items in database for html form
	$uniqueMeasureList = array_unique(array_column($organizedItemList, "Unit"));
	sort($uniqueMeasureList);
	$uniqueStoreList = array_unique(array_column($pricePerItemList, 'Store'));
	sort($uniqueStoreList);

	$cheapestPricePerItemList = findCheapestPerItem($pricePerItemList, 'Item', 'Price');

	//A function that parses a multidimensional array and returns an array containing
	//the least expensive occurance of every grocery item type by name
	function findCheapestPerItem($array, $key, $price) {
	  $temp_array = array();
	  foreach($array as $val) {
			$itemNameExists = (in_array($val[$key], array_column($temp_array, $key)));
	  	if (!$itemNameExists) {
	   		$temp_array[] = $val;
			} else if ($itemNameExists) {
				$replacementItemPrice = $val[$price];
				$currentItemPrice = array_search($val[$key], array_column($temp_array, $key));
				$currentItemPrice = $temp_array[$currentItemPrice];
				$currentItemPrice = $currentItemPrice[$price];
				$currentItemPrice = preg_replace ("/[^0-9,.]/", "", $currentItemPrice);
				$replacementItemPrice = preg_replace ("/[^0-9,.]/", "", $replacementItemPrice);
				if ($currentItemPrice > $replacementItemPrice) {
					$replaceKey = array_search($val[$key], array_column($temp_array, $key));
					$temp_array[$replaceKey] = $val;
				}
			}
		}
    return $temp_array;
	}


	?>

	<form id="pricePer" name="pricePer" action="writer.php" method="post">
		<h1>Price Per Application</h1>
		<p>
			Enter additional items into the database:
		</p>
		<table>
			<tr>
				<td>Product Name:</td>
				<td><select required id="addItemList" name="addItemList" onChange='changeTextBox(this.value);'>
					<option disabled selected value>select an item</option>
					<option id="notListed" value="notListed">(Not Listed)</option>
					<?php
						foreach ($cheapestPricePerItemList as $item) {
						echo "<option value="."\"".$item["Item"]."\"".">".$item["Item"]."</option>";
					}	?>
			</td>
			</tr>
			<tr>
				<td colspan=2> If the item is not listed, type it below.</td>
			</tr>
			<tr>
				<td>Product Name:</td>
				<td><input type="text" id="addItem" name="addItem" size="25" disabled/></td>
			</tr>
			<tr>
				<td>Store Name:</td>
				<td><select required id="addStoreList" name="addStoreList"
					 	 onChange='changeTextBox2(this.value);'>
					<option disabled selected value>select a store</option>
					<option id="notListed" value="notListed">(Not Listed)</option>
					<?php
						foreach ($uniqueStoreList as $store) {
						echo "<option value="."\"".$store."\"".">" . $store . "</option>\"";
					}	?>
			</td>
			</tr>
			<tr>
				<td colspan=2> If the store is not listed, type it below.</td>
			</tr>
			<tr>
				<td>Store Name:</td>
				<td><input type="text" id = "addStore" name="addStore" size="25" disabled/></td>
			</tr>
			<tr>
				<td>Price($):</td>
				<td><input type="text" id = "addPrice" name="addPrice" size="6"/></td>
			</tr>
			<tr>
				<td>Weight or Quantity:</td>
				<td><input type="text" id = "addWeight" name="addWeight" size="6" /></td>
			</tr>
			<tr>
				<td>Unit of Measure:</td>
				<td><select required id="addMeasureList" name="addMeasureList"
					 	 onChange='changeTextBox3(this.value);'>
					<option disabled selected value>select a unit</option>
					<option id="notListed" value="notListed">(Not Listed)</option>
					<?php
						foreach ($uniqueMeasureList as $measure) {
						echo "<option value=".$measure.">" . $measure . "</option>";
					}	?>
			</td>
			</tr>
			<tr>
				<td colspan=2> If the unit of measure is not listed, type it below.</td>
			</tr>
			<tr>
				<td>Unit of Measure:</td>
				<td><input type="text" id = "addMeasure" name="addMeasure" size="6" disabled/></td>
			</tr>
			<tr>
				<td><input type="button" value="VALIDATE" onclick="validateForm();"/>
				<input type="button" value="CLEAR" onclick="document.pricePer.reset();" /></td>
				<td><input type="submit" name="submit" value="SUBMIT" disabled/></td>
			</tr>
		</form>

		</table>
		<h2>Cheapest Items Per Unit Price</h2>
		<?php if (count($cheapestPricePerItemList) > 0): ?>
		<table>
			<thead>
		    <tr>
		      <th><?php echo implode('</th><th>',
							array_keys(current($cheapestPricePerItemList))); ?></th>
		    </tr>
		  </thead>
		  <tbody>
		<?php foreach ($cheapestPricePerItemList as $row):
			             array_map('htmlentities', $row); ?>
		    <tr>
		      <td><?php echo implode('</td><td>', $row); ?></td>
		    </tr>
		<?php endforeach; ?>
		  </tbody>
		</table>
		<?php endif; ?>
		<h2>Entire List of Items</h2>
		<?php if (count($cheapestPricePerItemList) > 0): ?>
		<table>
			<thead>
		    <tr>
		      <th><?php echo implode('</th><th>',
							array_keys(current($organizedItemList))); ?></th>
		    </tr>
		  </thead>
		  <tbody>
		<?php foreach ($organizedItemList as $row):
			             array_map('htmlentities', $row); ?>
		    <tr>
		      <td><?php echo implode('</td><td>', $row); ?></td>
		    </tr>
		<?php endforeach; ?>
		  </tbody>
		</table>
		<?php endif; ?>

</body>
</html>
