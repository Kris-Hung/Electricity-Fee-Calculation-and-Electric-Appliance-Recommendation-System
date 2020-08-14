<?php
function connectTv(){
	global $link;
	if(isset($_POST['tvSizeName'])&&isset($_POST['brand']))//電視
	{
		$tvSize=intval($_POST['tvSizeName']);
		$brand=$_POST['brand'];
		if($brand=="無")
			$sql="select * from `tv` where `尺寸`<=$tvSize && `尺寸`>($tvSize-10) order by `能源效率` DESC limit 0,3";
		else
			$sql="select * from `tv` where `尺寸`<=$tvSize && `尺寸`>($tvSize-10) && `商標名稱`like '$brand' order by `尺寸` DESC limit 0,3";
		$result = mysqli_query($link,$sql);
		if ($result->num_rows > 0) 
		{ 
		// 輸出每行數據 
			echo "<h4>以下為推薦您的電視:</h4>";
			while($row = mysqli_fetch_assoc($result)) 
			{ 
				echo "<a href='https://ecshweb.pchome.com.tw/search/v3.3/?q={$row['產品型號']}'>";
				echo "商品型號: ". $row["產品型號"]. "  商標名稱: ". $row["商標名稱"]."  能源效率: ". $row["能源效率"]."  年耗電量: ". $row["年耗電量"]."  尺寸: ". $row["尺寸"]."</a><br> "; 
			} 
		}
		else
			echo "抱歉並無符合條件的產品";
	}
	
}
?>

