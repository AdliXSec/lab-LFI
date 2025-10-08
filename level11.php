<?php
// TINGKAT 1: DASAR - Tidak ada filter sama sekali.
echo "<h1>Level 11: Iframe</h1>";

$page = "";
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    echo "<p>Gunakan parameter 'page' untuk memuat halaman.</p>";
}
echo $page;
?>
<iframe id="myFrame" style="display: none; width: 100%; height: 82vh;"></iframe>
    <script type="text/javascript">
		var omyFrame = document.getElementById("myFrame");
		omyFrame.style.display="block";
		omyFrame.src = "<?=$page?>";
	</script>