<!DOCTYPE html>
   <html>
   <head>
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
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <script>
		function addRow() {
			var table = document.getElementById("myTable1");
			var row = table.insertRow(-1);
			var cell1 = row.insertCell(0);
			var cell2 = row.insertCell(1);
			var cell3 = row.insertCell(2);
			var cell4 = row.insertCell(3);
            var row = table.insertRow(4);
			cell1.contentEditable = true;
			cell2.contentEditable = true;
			cell3.contentEditable = true;
			cell4.contentEditable = true;
			cell5.contentEditable = true;
		}
		function addRow2() {
			var table = document.getElementById("myTable2");
			var row = table.insertRow(-1);
			var cell1 = row.insertCell(0);
			var cell2 = row.insertCell(1);
			var cell3 = row.insertCell(2);
			var cell4 = row.insertCell(3);
            var row = table.insertRow(4);
			cell1.contentEditable = true;
			cell2.contentEditable = true;
			cell3.contentEditable = true;
			cell4.contentEditable = true;
			cell5.contentEditable = true;
		}
		function addRow3() {
			var table = document.getElementById("myTable3");
			var row = table.insertRow(-1);
			var cell1 = row.insertCell(0);
			var cell2 = row.insertCell(1);
			var cell3 = row.insertCell(2);
			var cell4 = row.insertCell(3);
            var row = table.insertRow(4);
			cell1.contentEditable = true;
			cell2.contentEditable = true;
			cell3.contentEditable = true;
			cell4.contentEditable = true;
			cell5.contentEditable = true;
		}
		function addRow4() {
			var table = document.getElementById("myTable4");
			var row = table.insertRow(-1);
			var cell1 = row.insertCell(0);
			var cell2 = row.insertCell(1);
			var cell3 = row.insertCell(2);
			var cell4 = row.insertCell(3);
            var row = table.insertRow(4);
			cell1.contentEditable = true;
			cell2.contentEditable = true;
			cell3.contentEditable = true;
			cell4.contentEditable = true;
			cell5.contentEditable = true;
		}
		function addRow5() {
			var table = document.getElementById("myTable5");
			var row = table.insertRow(-1);
			var cell1 = row.insertCell(0);
			var cell2 = row.insertCell(1);
			var cell3 = row.insertCell(2);
			var cell4 = row.insertCell(3);
            var row = table.insertRow(4);
			cell1.contentEditable = true;
			cell2.contentEditable = true;
			cell3.contentEditable = true;
			cell4.contentEditable = true;
			cell5.contentEditable = true;
		}
		function addRow6() {
			var table = document.getElementById("myTable6");
			var row = table.insertRow(-1);
			var cell1 = row.insertCell(0);
			var cell2 = row.insertCell(1);
			var cell3 = row.insertCell(2);
			var cell4 = row.insertCell(3);
            var row = table.insertRow(4);
			cell1.contentEditable = true;
			cell2.contentEditable = true;
			cell3.contentEditable = true;
			cell4.contentEditable = true;
			cell5.contentEditable = true;
		}
		function addRow7() {
			var table = document.getElementById("myTable7");
			var row = table.insertRow(-1);
			var cell1 = row.insertCell(0);
			var cell2 = row.insertCell(1);
			var cell3 = row.insertCell(2);
			var cell4 = row.insertCell(3);
            var row = table.insertRow(4);
			cell1.contentEditable = true;
			cell2.contentEditable = true;
			cell3.contentEditable = true;
			cell4.contentEditable = true;
			cell5.contentEditable = true;
		}
	</script>      
    </head>
      <body>

       <div data-role="page" id="pageone">
        <div data-role="header">
         <h1>Tetkik Sonuçları Girişi</h1>
        </div>

        <div data-role="main" class="ui-content">
         <h2>Birimler</h2>
         <div data-role="collapsible">
          <h4>Tıbbi Biyokimya</h4>
          <table id="myTable1">
		<thead>
			<tr>
				<th colspan="1">Tarih</th>
                <th colspan="1">Tetkik Adı</th>
                <th colspan="1">Tetkik Sonucu</th>
                <th colspan="1">Referans Değeri</th>
			</tr>
		</thead>
		<tbody>
            <tr>
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
			</tr>
            <tr>
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
			</tr>
		</tbody>
	</table>
    <button onclick="addRow()">Satır Ekle</button>
         </div>
         <div data-role="collapsible">
          <h4>Mikro Biyoloji</h4>
          <table id="myTable2">
		<thead>
			<tr>
				<th colspan="1">Tarih</th>
                <th colspan="1">Tetkik Adı</th>
                <th colspan="1">Tetkik Sonucu</th>
                <th colspan="1">Referans Değeri</th>
			</tr>
		</thead>
		<tbody>
            <tr>
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
			</tr>
            <tr>
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
			</tr>
		</tbody>
	</table>
    <button onclick="addRow2()">Satır Ekle</button>
         </div>
         <div data-role="collapsible">
          <h4>Radyoloji Bulguları</h4>
          <table id="myTable3">
		<thead>
			<tr>
				<th colspan="1">Tarih</th>
                <th colspan="1">Tetkik Adı</th>
                <th colspan="1">Tetkik Sonucu</th>
                <th colspan="1">Referans Değeri</th>
			</tr>
		</thead>
		<tbody>
            <tr>
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
			</tr>
            <tr>
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
			</tr>
		</tbody>
	</table>
    <button onclick="addRow3()">Satır Ekle</button>
         </div>
         <div data-role="collapsible">
          <h4>Kan Merkezi</h4>
          <table id="myTable4">
		<thead>
			<tr>
				<th colspan="1">Tarih</th>
                <th colspan="1">Tetkik Adı</th>
                <th colspan="1">Tetkik Sonucu</th>
                <th colspan="1">Referans Değeri</th>
			</tr>
		</thead>
		<tbody>
            <tr>
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
			</tr>
            <tr>
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
			</tr>
		</tbody>
	</table>
    <button onclick="addRow4()">Satır Ekle</button>
         </div>
         <div data-role="collapsible">
          <h4>Tomogrofi-MR</h4>
          <table id="myTable5">
		<thead>
			<tr>
				<th colspan="1">Tarih</th>
                <th colspan="1">Tetkik Adı</th>
                <th colspan="1">Tetkik Sonucu</th>
                <th colspan="1">Referans Değeri</th>
			</tr>
		</thead>
		<tbody>
            <tr>
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
			</tr>
            <tr>
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
			</tr>
		</tbody>
	</table>
    <button onclick="addRow5()">Satır Ekle</button>
         </div>
         <div data-role="collapsible">
          <h4>Ultrason-Doppler</h4>
          <table id="myTable6">
		<thead>
			<tr>
				<th colspan="1">Tarih</th>
                <th colspan="1">Tetkik Adı</th>
                <th colspan="1">Tetkik Sonucu</th>
                <th colspan="1">Referans Değeri</th>
			</tr>
		</thead>
		<tbody>
            <tr>
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
			</tr>
            <tr>
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
			</tr>
		</tbody>
	</table>
    <button onclick="addRow6()">Satır Ekle</button>
         </div>
         <div data-role="collapsible">
          <h4>Girişimsel Radyoloji</h4>
          <table id="myTable7">
		<thead>
			<tr>
				<th colspan="1">Tarih</th>
                <th colspan="1">Tetkik Adı</th>
                <th colspan="1">Tetkik Sonucu</th>
                <th colspan="1">Referans Değeri</th>
			</tr>
		</thead>
		<tbody>
            <tr>
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
			</tr>
            <tr>
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
			</tr>
		</tbody>
	</table>
    <button onclick="addRow7()">Satır Ekle</button>
         </div>
        
        <div data-role="footer">
         <h1>Hacettepe KDSE-BPYS</h1>
        </div>
       </div> 

      </body>
     </html>