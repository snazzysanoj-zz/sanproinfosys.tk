<?php
$uiq = uniqid();
$image_folder = "uploads/";
$uploaded = false;
if(isset($_POST['upload_image'])){ 
if($_FILES['userImage']['error'] == 0 ){
$up = move_uploaded_file($_FILES['userImage']['tmp_name'], $image_folder.$_FILES['userImage']['name']);
if($up){
$uploaded = true;   
}
}
}
?>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js"></script>
<script type="application/javascript">
$(document).ready(function(){
var randIDS = '<?php echo $uiq?>'; 
// Add Hidden Field
var hidden = $("<input>");
hidden.attr({
name:"APC_UPLOAD_PROGRESS",
id:"progress_key",
type:"hidden",
value:randIDS
});
$("#uploadImage").prepend(hidden); 
$("#uploadImage").submit(function(e){

var p = $(this);
p.attr('target','tmpForm');
  
// creating iframe
if($("#tmpForm").length == 0){
var frame = $("<iframe>");
frame.attr({
name:'tmpForm',
id:'tmpForm',
action:'about:blank',
border:0
}).css('display','none');
p.after(frame);
}  
// Start file upload  
$.get("get_progress.php", {progress_key:randIDS, rand:Math.random()},
function(data){ 
var uploaded = parseInt(data);
if(uploaded == 100){
$(".progress, .badge").hide();
clearInterval(loadLoader);
}
else if(uploaded < 100)
{
$(".progress, .badge").show();
$(".badge").text(uploaded+"%");
var cWidth = $(".bar").css('width', uploaded+"%");           
}
if(uploaded < 100)
var loader = setInterval(loadLoader,2000);
});
  
var loadLoader = function(){
$.get("get_progress.php", {progress_key:randIDS, rand:Math.random()}, function(data)
{
var uploaded = parseInt(data);
if(uploaded == 100){
$(".progress, .badge").hide();
parent.location.href="index.php?success";
}
else if(uploaded < 100)
{
$(".progress, .badge").show();
$(".badge").text(uploaded+"%");
var cWidth = $(".bar").css('width', uploaded+"%");           
}
});
}
});});
</script>
</head>
<body>
<form name="uploadImage" id="uploadImage" enctype="multipart/form-data" action="upload.php?progress=<?php echo($uiq)?>" method="post" class="well">
<label>Select File</label>
<input type="file" name="userImage" id="userImage" /> 
<span class="badge badge-info" style="display:none;">0%</span> 
<input type="submit" class="btn btn-success" name="upload_image" id="upload_image" value="Go!!!" /> 
<div class="progress" style="display:none;"><div class="bar" style="width:0%;"></div></div>
</form>
</body>
</html>