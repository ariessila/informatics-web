	
			$("#kirim").on('click',function() 
			{	

				// var element = $(this);
				var judul = $("#judul").val();
				var konten = $("#konten").val();
				var nama = $("#nama").val();
				var email = $("#email").val();
				var validcode = $("#validcode").val();
				var dataString = 'judul='+ judul + '&konten='+ konten + '&nama='+ nama + '&email='+ email + '&validcode='+ validcode;
				
				if(judul=='')
				{
					alert("Judul aspirasi anda masih kosong!");
				}
				else if(konten=='')
				{
					alert("Aspirasi Anda Masih Kosong!");
				}
				else if(nama=='')
				{
					alert("Masukan nama anda!");
				}
				else if(email=='')
				{
					alert("Masukan email anda!");
				}
				else
				{
					$("#flash").show();
					$("#flash").fadeIn(400).html('<img src="images/content/component/wait.gif" align="absmiddle">&nbsp;<span class="loading">Loading Update...</span>');
						
					$.ajax({
						type: "POST",
						url: "aduan/",
						data: dataString,
						cache: false,
						success: function(html){
						
							location.href=document.getElementById('url').value;

							$("#flash").hide();	
							
						}
					});
				}
				
				return false;
			});
			
			
			
			$("#dukung").on('click',function() 
			{	

				// var element = $(this);
				var token = $("#token").val();
				var val = $("#val").val();
				var random = $("#random").val();
				
				var dataString = 'token='+ token + '&val='+ val+ '&random='+ random ;
				
				if(1)
				{
					$("#flash").show();
					$("#flash").fadeIn(400).html('<img src="images/content/component/wait.gif" align="absmiddle">&nbsp;<span class="loading">Loading Update...</span>');
						
					$.ajax({
						type: "POST",
						url: "aduan/",
						data: dataString,
						cache: false,
						success: function(html){
						
							location.href=document.getElementById('url').value;
							alert('Terima kasih telah memberikan dukungan');
							$("#flash").hide();	
							
						}
					});
				}
				
				return false;
			});
				
			
			
