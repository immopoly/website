<h1>Benutzerprofil</h1>

<?php if(empty($_GET['username'])): ?>

<div class="row">
	<div class="span6 offset3">
		<form id="username" class="well form-search">
			<p>Um mehr Informationen über einen Spieler zu erhalten, gib bitte dessen Namen hier ein:</p>
		  	<input type="text" name="username" class="input-medium search-query">
		  	<button type="submit" class="btn btn-inverse">Benutzerprofil anzeigen</button>
		</form>
	</div>
</div>

<?php else: ?>

<div class="row user_loader">
	<div class="span6 offset3">
		<form id="username" class="well" style="text-align: center;">
				 <img src="img/layout/ajax-loader.gif" alt="Twitter-Avatar"/>
				 <p>Lade Daten von <strong><?php echo $_GET['username']; ?></strong>...</p>
		</form>
	</div>
</div>


<div class="user_wrapper" style="display:none;">

	<p class="lead">
		Mehr Informationen über den Spieler findest Du hier:
	</p>

	<div class="row">
		<div class="span6">
			<div id="user_info">
				<h2 class="user_name">Lade...</h2>
				<table id="user_details" class="table-striped table-bordered table-condensed"> 
					 <thead> 
							 <tr colspan="2"> 
								 <th>Details</th>
							 </tr>
					 </thead>
					 <tbody>
						 <tr class="loading">
							 <td colspan="3" class="center">
								 <img src="img/layout/ajax-loader.gif" alt="Twitter-Avatar"/>
								 <p>Lade Daten...</p>
							 </td>
						 </tr>
					 </tbody>
			 </table>
			</div>
			<ul id="user_badges"></ul>	
		</div>

		<div class="span6">
			<h2>Die letzten Aktionen im Spiel</h2>

			 <table id="history_list"  class="table-striped history table-bordered table-condensed"> 
					 <thead> 
							 <tr> 
									 <th>Name</th> 
									 <th>Datum</th> 
									 <th>Ereignis</th> 
							 </tr>
					 </thead>
					 <tbody>
							 <tr class="loading">
									 <td colspan="3" class="center">
											 <img src="img/layout/ajax-loader.gif" alt="Lade..."/>
											 <p>Lade Daten...</p>
									 </td>
							 </tr>
					 </tbody>
			 </table>
		</div>
	</div>
</div>

<?php endif; ?>	