<h1>Live</h1>
<p class="lead">
	Kein Spiel ohne Bestenliste! Hier siehst Du wer gerade die Top-Liste anführt und was die anderen Spieler zuletzt so getrieben haben, um die Spitze zu erklimmen.
</p>

<script type="text/javascript">
</script>

<div id="toplist_switcher">
		<strong>Andere Statistik aufrufen:</strong>
		<a href="#overall" class="topx_balance btn btn-small btn-inverse" data-type="topx_balance" title="Die Statistik nach Gesamtvermögen sortieren">Gesamt</a>
		<a href="#month" class="topx_balancemonth btn btn-small btn-inverse" data-type="topx_balancemonth" title="Die Statistik nach Monatsgewinnen sortieren">Monat</a>
		<a href="#releasebadge" class="topx_balancereleasebadge btn btn-small btn-inverse" data-type="topx_balancereleasebadge" title="Die Statistik nach Gesamtvermögen seit Release-Test-Start sortieren">Release-Tester</a>
</div>

<div class="row">
	<div id="toplists">
		<div class="span6">
			<h2>Top-Liste</h2>
			<div style="text-align: center;">
				<img src="img/layout/ajax-loader.gif" alt="Lade..."/>
				<p>Lade Daten...</p>
			</div>	
		</div>
	</div>	

	<div class="span6">
		<h2>Die letzten Aktionen im Spiel (Gesamthistorie)</h2>

		 <table id="history_list"  class="table-striped history table-bordered table-condensed"> 
				 <colgroup>
						 <col class="name"></col>
						 <col class="date"></col>
						 <col class="event"></col>
				 </colgroup>
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
<hr/>
<div class="row">
	<div class="span10 offset1 center">
		<h2>Immopoly - Deutschlandweit die neuesten 250 Wohnungen unserer Makler</h2>
		<div id="heatmapArea">
			
		</div>
	</div>
</div>	