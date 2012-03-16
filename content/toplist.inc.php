<link href="css/overrides.css" rel="stylesheet">
<script type="text/javascript" src="js/interactive.js"></script>
<script type="text/javascript">

//do on start
$(document).ready(function() {
  updateTable("#top_makler","top", 0, 20);
});
</script>

<div class="row">
	<div class="span6">
		<table id="top_list" class="table-striped table-bordered table-condensed"> 
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
</div>