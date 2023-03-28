<!DOCTYPE html>
<html>
<head>
	<title>Günlük Bakım Uygulamaları</title>
	<style>
		table {
			border-collapse: collapse;
			margin: auto;
		}
		td, th {
			border: 1px solid black;
			padding: 5px;
			text-align: center;
			vertical-align: middle;
			min-width: 50px;
		}
		th {
			background-color: lightgray;
			position: sticky;
			left: 0;
			z-index: 1;
		}
		td input {
			width: 100%;
			box-sizing: border-box;
		}
        table tr td:nth-child(3) {
            width: 400px;
        }
        h1 {
			text-align: center;
		}
        #alan{
            text-align: left;
        }
        #odem{
            text-align: left;
        }
        #row{
            height: 50px;
        }
	</style>
</head>
<body>
    <h1>Günlük Bakım Uygulamaları</h1>
	<table>
		<thead>
			<tr>
				<th id="alan", colspan="6", contenteditable="true"><div style="display: inline;" contentEditable="false">Değerlendirilen Alan:</div></th>
			</tr>
            <tr>
                <th id="odem", colspan="6">Ödemin Şiddeti</th>
            </tr>
		</thead>
		<tbody>
            <tr>
				
				<td><input type="checkbox">Ödem Yok</input></td>
                <td><input type="checkbox">+1</input></td>
                <td><input type="checkbox">+2</input></td>
                <td><input type="checkbox">+3</input></td>
				<td><input type="checkbox">+4</input></td>

				
			</tr>
		</tbody>
	</table>
</body>
</html>
