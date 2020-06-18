<div class='panel panel-default'>
		<div class='panel-heading text-center'>
			<strong>Menu Manager</strong>
		</div>
		<div class='panel-body'>
<?php 
if(isset($model)):
date_default_timezone_set('Asia/Jakarta');
// include('../../lib');
$aksi = URL."controllers/menu_manager/manajemen_halaman_control.php?model=manajemen_halaman&method="; // halaman untuk eksekusi


// var_dump($method);
switch($method){

default :
$hasil =  $manajemen_halaman->getManajemenHalaman();
$hasil['halaman'] = empty($hasil['halaman'])?'[{"id":"1"}]':$hasil['halaman'] ;

	$before   = $manajemen_halaman->getHalamanByPosisi0();
	// $before   = $halaman->getHalamanBefore();

	echo "
	<div class='cf nestable-lists'>

        <div class='dd' id='nestable'>
            <ol class='dd-list'>";
if(empty($before)){
echo'<div class="dd-empty"></div>';
}
	foreach($before as $pre)
	{
				
	echo "		<li class='dd-item' data-id='".$pre['id_halaman']."'>
                    <div class='dd-handle'>".$pre['judul_halaman_id']."</div>
                </li>";
	}
	
	echo	"</ol>
        </div>
	";
		
// bagian kedua----------------------------------------------------------------------------------------

$data = json_decode($hasil['halaman'],true);
//langsung ke halaman 

$induk  = $halaman->getHalamanParent();


echo "
<div class='dd' id='nestable2'>
	<ol class='dd-list'>";
	
	if(empty($induk)){
		echo'<div class="dd-empty"></div>';
	}
	
	foreach($induk as $induk){
		$child= $halaman->getHalamanChild($induk['id_halaman']);
	
	echo "
		<li class='dd-item' data-id='".$induk['id_halaman']."'>
			<div class='dd-handle'>".$induk['judul_halaman_id']."</div>
			";
		if(isset($child)){	
		echo"<ol class='dd-list'>";
		foreach($child as $child){
			echo "
				<li class='dd-item' data-id='".$child['id_halaman']."'>
				<div class='dd-handle'>".$child['judul_halaman_id']."</div>
				</li>";
		}
		echo "</ol>";
		}
		
		echo "
			
		</li>
		
		";
	
	}
echo "
	</ol>
</div>
";


// var_dump($data);
//[{"id":"1"}]
/*
echo "	<div class='dd' id='nestable2'>
            <ol class='dd-list'>";
			
	if(empty($data)){
				echo'<div class="dd-empty"></div>';
				}			
		foreach($data as $parrent)
		{ 
		
		// 	var_dump($halaman->getHalamanById($parrent['id'])); 

			if(isset($parrent['children']))
			{
			echo "	<li class='dd-item' data-id='".$parrent['id']."'>
						<div class='dd-handle'>".$halaman->getHalamanById($parrent['id'])['judul_halaman_id']."</div>
					<ol class='dd-list'>";
			
				foreach($parrent['children'] as $sub)
				{ // sub yang pertama
					// echo "&nbsp ".$sub['id'];
					if(isset($sub['children']))
					{	
					echo "	<li class='dd-item' data-id='".$sub['id']."'>
								<div class='dd-handle'>".$halaman->getHalamanById($sub['id'])['judul_halaman_id']."</div>
								<ol class='dd-list'>";
						
						foreach($sub['children'] as $sub2)
						{ 	
							if(isset($sub2['children']))
							{
						echo "	<li class='dd-item' data-id='".$sub2['id']."'>
									<div class='dd-handle'>".$halaman->getHalamanById($sub2['id'])['judul_halaman_id']."</div>
									<ol class='dd-list'>";
							
								foreach($sub2['children'] as $sub3){ //sub ke 3
									if(isset($sub3['children'])){
							echo "	<li class='dd-item' data-id='".$sub3['id']."'>
										<div class='dd-handle'>".$halaman->getHalamanById($sub3['id'])['judul_halaman_id']."</div>
										<ol class='dd-list'>";
							echo "		</ol>
									</li>
							";		
									}else{
								echo " <li class='dd-item' data-id='".$sub3['id']."'>
											<div class='dd-handle'>".$halaman->getHalamanById($sub3['id'])['judul_halaman_id']."</div>
										</li>";
									}//child sub 3
								}//akhir sub 3
						echo "		</ol>
								</li>";
							}else{
					echo "	<li class='dd-item' data-id='".$sub2['id']."'>
								<div class='dd-handle'>".$halaman->getHalamanById($sub2['id'])['judul_halaman_id']."</div>
							</li>";
							} //child sub 2
						}//akhir sub 2
					
					echo "		</ol>
							</li>
						";
					}else{
			echo "     <li class='dd-item' data-id='".$sub['id']."'>
							<div class='dd-handle'>".$halaman->getHalamanById($sub['id'])['judul_halaman_id']."</div>
						</li>"; 
					}
					//child sub 1
				}//akhir sub 1
			echo "
					</ol>
				</li>
					";
			}else{
	echo "     <li class='dd-item' data-id='".$parrent['id']."'>
                    <div class='dd-handle'>".$halaman->getHalamanById($parrent['id'])['judul_halaman_id']."</div>
                </li>"; 
			}
		
		}//akhir parrent
echo"</ol>
</div>";

*/

echo"
    
	</div>


    <input type='hidden' id='nestable2-output'>
    <input type='hidden' id='nestable-output'>
    <input type='hidden' id='tulis'>
	
	
	<a style='margin-bottom:20px;' href='".$aksi."restore' class='btn btn-warning'  onclick='return confirm(\"Apakah Anda benar-benar mengembalikan posisi halaman seperti semula?\");' >Restore Default</a>
	
	";
break;

}
?>


<?php endif;?>


<style type='text/css'>

.cf:after { visibility: hidden; display: block; font-size: 0; content: ' '; clear: both; height: 0; }
* html .cf { zoom: 1; }
*:first-child+html .cf { zoom: 1; }


h1 { font-size: 1.75em; margin: 0 0 0.6em 0; }

a { color: #2996cc; }
a:hover { text-decoration: none; }

p { line-height: 1.5em; }
.small { color: #666; font-size: 0.875em; }
.large { font-size: 1.25em; }

/**
 * Nestable
 */

.dd { position: relative; display: block; margin: 0; padding: 0; max-width: 600px; list-style: none; font-size: 13px; line-height: 20px; }

.dd-list { display: block; position: relative; margin: 0; padding: 0; list-style: none; }
.dd-list .dd-list { padding-left: 30px; }
.dd-collapsed .dd-list { display: none; }

.dd-item,
.dd-empty,
.dd-placeholder { display: block; position: relative; margin: 0; padding: 0; min-height: 20px; font-size: 13px; line-height: 20px; }

.dd-handle { display: block; height: 30px; margin: 5px 0; padding: 5px 10px; color: #333; text-decoration: none; font-weight: bold; border: 1px solid #ccc;
    background: #fafafa;
    background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
    background:    -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
    background:         linear-gradient(top, #fafafa 0%, #eee 100%);
    -webkit-border-radius: 3px;
            border-radius: 3px;
    box-sizing: border-box; -moz-box-sizing: border-box;
}
.dd-handle:hover { color: #2ea8e5; background: #fff; }

.dd-item > button { display: block; position: relative; cursor: pointer; float: left; width: 25px; height: 20px; margin: 5px 0; padding: 0; text-indent: 100%; white-space: nowrap; overflow: hidden; border: 0; background: transparent; font-size: 12px; line-height: 1; text-align: center; font-weight: bold; }
.dd-item > button:before { content: '+'; display: block; position: absolute; width: 100%; text-align: center; text-indent: 0; }
.dd-item > button[data-action='collapse']:before { content: '-'; }

.dd-placeholder,
.dd-empty { margin: 5px 0; padding: 0; min-height: 30px; background: #f2fbff; border: 1px dashed #b6bcbf; box-sizing: border-box; -moz-box-sizing: border-box; }
.dd-empty { border: 1px dashed #bbb; min-height: 100px; background-color: #e5e5e5;
    background-image: -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
                      -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
    background-image:    -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
                         -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
    background-image:         linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
                              linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
    background-size: 60px 60px;
    background-position: 0 0, 30px 30px;
}

.dd-dragel { position: absolute; pointer-events: none; z-index: 9999; }
.dd-dragel > .dd-item .dd-handle { margin-top: 0; }
.dd-dragel .dd-handle {
    -webkit-box-shadow: 2px 4px 6px 0 rgba(0,0,0,.1);
            box-shadow: 2px 4px 6px 0 rgba(0,0,0,.1);
}

/**
 * Nestable Extras
 */

.nestable-lists { display: block; clear: both; padding: 30px 0; width: 100%; border: 0; border-top: 2px solid #ddd; border-bottom: 2px solid #ddd; }

#nestable-menu { padding: 0; margin: 20px 0; }

#nestable-output,
#nestable2-output { width: 100%; height: 7em; font-size: 0.75em; line-height: 1.333333em; font-family: Consolas, monospace; padding: 5px; box-sizing: border-box; -moz-box-sizing: border-box; }

#nestable2 .dd-handle {
    color: #fff;
    border: 1px solid #999;
    background: #bbb;
    background: -webkit-linear-gradient(top, #bbb 0%, #999 100%);
    background:    -moz-linear-gradient(top, #bbb 0%, #999 100%);
    background:         linear-gradient(top, #bbb 0%, #999 100%);
}
#nestable2 .dd-handle:hover { background: #bbb; }
#nestable2 .dd-item > button:before { color: #fff; }

@media only screen and (min-width: 700px) {

    .dd { float: left; width: 48%; }
    .dd + .dd { margin-left: 2%; }

}

.dd-hover > .dd-handle { background: #2ea8e5 !important; }

/**
 * Nestable Draggable Handles
 */

.dd3-content { display: block; height: 30px; margin: 5px 0; padding: 5px 10px 5px 40px; color: #333; text-decoration: none; font-weight: bold; border: 1px solid #ccc;
    background: #fafafa;
    background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
    background:    -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
    background:         linear-gradient(top, #fafafa 0%, #eee 100%);
    -webkit-border-radius: 3px;
            border-radius: 3px;
    box-sizing: border-box; -moz-box-sizing: border-box;
}
.dd3-content:hover { color: #2ea8e5; background: #fff; }

.dd-dragel > .dd3-item > .dd3-content { margin: 0; }

.dd3-item > button { margin-left: 30px; }

.dd3-handle { position: absolute; margin: 0; left: 0; top: 0; cursor: pointer; width: 30px; text-indent: 100%; white-space: nowrap; overflow: hidden;
    border: 1px solid #aaa;
    background: #ddd;
    background: -webkit-linear-gradient(top, #ddd 0%, #bbb 100%);
    background:    -moz-linear-gradient(top, #ddd 0%, #bbb 100%);
    background:         linear-gradient(top, #ddd 0%, #bbb 100%);
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}
.dd3-handle:before { content: '≡'; display: block; position: absolute; left: 0; top: 3px; width: 100%; text-align: center; text-indent: 0; color: #fff; font-size: 20px; font-weight: normal; }
.dd3-handle:hover { background: #ddd; }
</style>

<script>
// document.getElementById('uraian').value='';

$(document).ready(function()
{
	
    var updateOutput = function(e)
    {
        var list   = e.length ? e : $(e.target),
            output = list.data('output');
        if (window.JSON) {
            output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
        } else {
            output.val('JSON browser support required for this demo.');
        }
    };

    // activate Nestable for list 1
    $('#nestable').nestable({
        group: 1, maxDepth :2
    })
    .on('change', updateOutput);

    // activate Nestable for list 2
    $('#nestable2').nestable({
        group: 1, maxDepth :2
    })
    .on('change', updateOutput);

    // output initial serialised data
    updateOutput($('#nestable').data('output', $('#nestable-output')));
    updateOutput($('#nestable2').data('output', $('#nestable2-output')));

$('#nestable2').nestable({ 
        group: 1, maxDepth :2
    }).on('change', function() {
var data = $('.dd').nestable('serialize');
 ajaxx(data);
});

function ajaxx(data){
      $.ajax({
        type: "POST", 
		 beforeSend: function(msg){
				$("#tunggu").html("tunggu");
		},
        url:'controllers/menu_manager/manajemen_halaman_control.php?model=manajemen_halaman&method=tambah', 
        data: {
            save: data
        }, 
       success: function(data){
		 // alert(data);
		 $("#tunggu").html("tunggu");
		 $('#tulis').val(data);
       }
    });
}

/////


	

});
</script>
</div>
</div>
