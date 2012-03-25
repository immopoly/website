<link href="css/overrides.css" rel="stylesheet">
<script type="text/javascript" src="js/interactive.js"></script>
<script type="text/javascript">

//do on start
$(document).ready(function() {
  updateTable("topx_balanceMonth", 0, 30);
});
</script>
<div class="span6">
	<h2>Die Top-Makler (dieser Monat)</h2>
	<table id="topx_list" class="table-striped table-bordered table-condensed"> 
	 <colgroup>
			 <col class="rank"></col>
			 <col class="name"></col>
			 <col class="balance"></col>
		 	 <col class="balanceMonth"></col>
	 </colgroup> 
	 <thead> 
			 <tr> 
					 <th>Platz</th> 
					 <th>Name</th> 
					 <th>Kontostand</th>
					 <th>monatl. Umsatz</th>
			 </tr>
	 </thead>
	 <tbody>
			 <tr class="loading">
					 <td colspan="5" class="center">
							 <img src="img/layout/ajax-loader.gif" alt="Lade..."/>
							 <p>Lade Daten...</p>
					 </td>
			 </tr>
	 </tbody>
	</table>
</div>
