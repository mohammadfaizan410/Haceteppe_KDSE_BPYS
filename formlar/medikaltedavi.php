<!DOCTYPE html>
<html>
<head>
	<title>Medikal Tedavi</title>
	<style>
		table {
			border-collapse: collapse;
		}
		th, td {
			border: 1px solid black;
			padding: 10px;
		}
		th {
			background-color: #eee;
		}
    h1 {
            text-align: center;
    }
    tr, td{
      width: 200px;
    }
	</style>
    <script>
		function addRow() {
			var table = document.getElementById("myTable");
			var row = table.insertRow(-1);
			var cell1 = row.insertCell(0);
			var cell2 = row.insertCell(1);
			var cell3 = row.insertCell(2);
			var cell4 = row.insertCell(3);
			var cell5 = row.insertCell(4);
            var row = table.insertRow(5);
			cell1.contentEditable = true;
			cell2.contentEditable = true;
			cell3.contentEditable = true;
			cell4.contentEditable = true;
			cell5.contentEditable = true;
            cell6.contentEditable = true;
		}
	</script>
</head>
<body>
    <h1>Medikal Tedavi</h1>
	<table id="myTable">
		<thead>
			<tr>
				<th colspan="1">Tarih-Saat</th>
                <th colspan="1">İlacın Adı</th>
                <th colspan="1">Dozu</th>
                <th colspan="1">Yolu</th>
                <th colspan="1">Uygulama Zamanı</th>
			</tr>
		</thead>
		<tbody>
            <tr>
				<td contenteditable="true"></td>
				<td contenteditable="true"></td>
				<td contenteditable="true"></td>
				<td contenteditable="true"></td>
				<td contenteditable="true"></td>
			</tr>
            <tr>
				<td contenteditable="true"></td>
				<td contenteditable="true"></td>
				<td contenteditable="true"></td>
				<td contenteditable="true"></td>
				<td contenteditable="true"></td>
			</tr>
            <tr>
				<td contenteditable="true"></td>
				<td contenteditable="true"></td>
				<td contenteditable="true"></td>
				<td contenteditable="true"></td>
				<td contenteditable="true"></td>
			</tr>
            <tr>
				<td contenteditable="true"></td>
				<td contenteditable="true"></td>
				<td contenteditable="true"></td>
				<td contenteditable="true"></td>
				<td contenteditable="true"></td>
			</tr>
		</tbody>
	</table>
    <button onclick="addRow()">Satır Ekle</button>
</body>
</html>
