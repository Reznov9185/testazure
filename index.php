<?php
	$dom = simplexml_load_file("menu.xml");
?>
<head>
<title>Three Aces</title>
<script type='application/javascript'>
	var bill=0.00;
	document.getElementById('bline').innerHTML="Your bill is "+bill;
	function bill(b)
	{
		bill+=b;
		alert(bill);
		document.getElementById('bline').innerHTML="Your bill is "+bill;
	}
</script>
</head>
<body>
<table align="center" width="960px">
	<tr>
		<td align="left">
			<h3>Three Aces</h3>
			<div>1613 Massachusetts Ave</div>
			<div>Cambridge, MA 02139</div>
			<div>Btwn Mellen &amp; Everett St.</div>
		</td>	
		<td align="right">
			<h3><u>HOTLINE</u></h3>
			<h3>617 491-2884</h3>
			<h3>617 491-2889</h3>
			<br/>
			<div id='bline'></div>
		</td>
	</tr>
	<tr><td colspan="2"><br/></td></tr>
	<tr><td colspan="2"><br/></td></tr>
<?php
foreach ($dom->catagory as $cat)
{
	echo "<tr>";
	echo "<td colspan='2'>";
	echo "<h4>".$cat->title."</h4>";
	echo "<table width='960px'>";
	foreach($cat->items->item as $itm)
	{
		echo "<tr>";
		echo "<td width='320px'>";
		echo "<span>".$itm."</span>";
		if($itm["type"]!="")
		{
			echo "(".$itm["type"].")";
		}
		echo "</td>";
		echo "<td>";
		echo "<span>".$itm["price"]."</span>"."<br/>";
		echo "</td>";
		echo "<td align='right'>";
		echo "<input type='button' value='ADD' id='btn' onclick='bill(".$itm['price'].")'>";
		echo "</td>";
		echo "</tr>";
	}
	echo "</table>";
	echo "</td>";
	echo "</tr>";
	echo "<tr><td colspan='2'><br/></td></tr>";
}
?>
</table>
</body>