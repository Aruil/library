<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
<title>Βιβλιοθήκες και Υπηρεσίες Πληροφόρησης - Αρχική Σελίδα</title>
<LINK rel="stylesheet" type="text/css" href="./css/advsearch.css" title="Default Styles" media="screen">
</head>

<body>

	<form id="searchbox" action="">
		<div class="fields">
	    	<input id="search" type="text" placeholder="Search...">
	    	<input id="submit" type="submit" value="Search">
	    	<div style="clear:both"></div>
	    	<select id="search-options">
	    		<option value="titlos">Τίτλος</option>
	    		<option value="suggrafeas">Συγγραφέας</option>
	    	</select>
    	</div>
	</form>

	<div class="search-categories">
		<div class="search-categories-all-checkbox">
			<form action="">
				<input type="checkbox" name="check-all">Αναζήτηση σε όλες τις σχολές
			</form>
		</div>
	<ul class="collapsibleList">
	 <li class="list1">
	  <label for="mylist-node1">Αναζήτηση Ανά Σχολή</label>
	  <input type="checkbox" id="mylist-node1" />
	  <ul class="sxoles">
	   <li>
	   	<form action="">
			<input type="checkbox" name="agwghs">Επιστημών Της Αγωγής<br>
			<input type="checkbox" name="ugeias">Επιστημών Υγείας<br>
			<input type="checkbox" name="fusikhs_agwghs">Επιστήμης Φυσικής Αγωγής και Αθλητισμού<br>
			<input type="checkbox" name="theologikh">Θεολογική<br>
			<input type="checkbox" name="thetikwn">Θετικών Επιστημών<br>
			<input type="checkbox" name="nomikh">Νομική<br>
			<input type="checkbox" name="oikonomikwn">Οικονομικών και Πολιτικών Επιστημών<br>
			<input type="checkbox" name="filosofikh">Φιλοσοφική
			</form>
	   </li>

	  </ul>
	 </li>
	 <li class="list2">
	  <label for="mylist-node2">Αναζήτηση Ανά Τμήμα</label>
	  <input type="checkbox" id="mylist-node2" />
	  <ul class="tmhmata">
	   <li>
		   <form action="">
		   	<input type="checkbox" name="iatrikh">Τμήμα Ιατρικής<br>
		   	<input type="checkbox" name="theologia">Τμήμα Θεολογίας<br>
		   	<input type="checkbox" name="viologia">Τμήμα Βιολογίας<br>
		   	<input type="checkbox" name="mathimatiko">Τμήμα Μαθηματικών<br>
		   	<input type="checkbox" name="pliroforiki">Τμήμα Πληροφορικής και Τηλεπικοινωνιών<br>
		   	<input type="checkbox" name="fusiko">Τμήμα Φυσικής<br>
		   	<input type="checkbox" name="xhmeia">Τμήμα Χημείας<br>
		   	<input type="checkbox" name="nomiki">Νομική Σχολή<br>
		   	<input type="checkbox" name="agglikifilologia">Τμήμα Αγγλικής Γλώσσας και Φιλολογίας<br>
		   	<input type="checkbox" name="filologia">Τμήμα Φιλολογίας
		   	</form>
	   </li>
	  </ul>
	 </li>
	</ul>
	</div>

	<div class="book-type">
		<label for="book-types">Αναζήτηση για:</label>
		<form class="book-type-checkboxes" action="">
			<input type="checkbox" name="all">Όλα<br>
			<input type="checkbox" name="books">Βιβλία<br>
			<input type="checkbox" name="efhmerida">Εφημερίδα<br>
			<input type="checkbox" name="xeirografa">Χειρόγραφα<br>
			<input type="checkbox" name="periodika">Περιοδικά<br>
		</form>
	</div>

</body>
</html>
