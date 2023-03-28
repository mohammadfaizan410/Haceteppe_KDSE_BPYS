<!DOCTYPE html>
<html>
<head>
	<title>Yaşamsal Bulgu Takibi</title>
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
            var cell6 = row.insertCell(5);
			var cell7 = row.insertCell(6);
			var cell8 = row.insertCell(7);
			var cell9 = row.insertCell(8);
			var cell10 = row.insertCell(9);
            var cell11 = row.insertCell(10);
			var cell12 = row.insertCell(11);
            var row = table.insertRow(12);
			cell1.contentEditable = true;
			cell2.contentEditable = true;
			cell3.contentEditable = true;
			cell4.contentEditable = true;
			cell5.contentEditable = true;
            cell6.contentEditable = true;
            cell7.contentEditable = true;
			cell8.contentEditable = true;
			cell9.contentEditable = true;
			cell10.contentEditable = true;
			cell11.contentEditable = true;
            cell12.contentEditable = true;
            cell13.contentEditable = true;
		}
	</script>
</head>
<body>
    <h1>Yaşamsal Bulgu Takibi</h1>
	<table id="myTable">
		<thead>
			<tr>
				<th colspan="1">Saat</th>
                <th colspan="1">Vücut Sıcaklığı</th>
                <th colspan="1">VS Ölçüm Yeri</th>
                <th colspan="1">Nabız Hızı/Yeri</th>
                <th colspan="1">Solunum Sayısı</th>
                <th colspan="1">Solunum Özelliği</th>
                <th colspan="1">Kan Basıncı</th>
                <th colspan="1">KB Ölçüm Yeri</th>
                <th colspan="1">SPO2(%)</th>
                <th colspan="1">O2 verme durumu/ Yöntemi</th>
                <th colspan="1">Günlük Kilo Takibi</th>
                <th colspan="1">MEUS Skoru</th>
			</tr>
		</thead>
		<tbody>
            <tr>
				<td contenteditable="true"></td>
				<td contenteditable="true"></td>
				<td contenteditable="true"></td>
				<td contenteditable="true"></td>
				<td contenteditable="true"></td>
                <td contenteditable="true"></td>
				<td contenteditable="true"></td>
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
                <td contenteditable="true"></td>
				<td contenteditable="true"></td>
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
                <td contenteditable="true"></td>
				<td contenteditable="true"></td>
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
                <td contenteditable="true"></td>
				<td contenteditable="true"></td>
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
