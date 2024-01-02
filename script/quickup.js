$(document).ready(function()
{
	$(".row_edit").click(function()
	{
		var ID=$(this).attr('id');
		$("#P"+ID).hide();
		$("#N"+ID).show();

	}).change(function()
		{
			var ID=$(this).attr('id');
			var stname=$("#N"+ID).val();
			var stroll=$("#R"+ID).val();
			var dataString = '&roll='+ stroll +'&studentname='+stname;
			$("#I"+ID).html('<center><img src="image/loader.gif" /></center>'); 

			if(stname.length>0)
			{

				$.ajax({
					type: "POST",
					url: "resfiles/update_name.php",
					data: dataString,
					dataType: "text",
					success: function(html)
					{
						$("#P"+ID).html(stname);
						$("#I"+ID).html('<center>Updated !</center>'); 
						document.getElementById("div1").innerHTML = html;
					}
				});
			}
			else
			{
				alert('No changes Made !');
			}

		});

		// Edit input box click action
		$(".row_edit").mouseup(function() 
		{
			return false
		});

		// Outside click action
		$(document).mouseup(function()
		{
			$(".name2").hide();
			$(".name1").show();
		});

});