		var n = 5;
		var complexity = 10;
		var counter = 0;
		/*
		$(function(){
				var retVal = prompt("Enter your name : ", "your name here");
				$.post(
						"lo.php",
						{name : retVal},
						success: function(data){
							//data e rasp de la server
						}
						
				);
		});
		*/
		$(function(){
			first_game();
			$('button#new_game').click(new_game);
		});
		

		
		function first_game(){
			var table = $('#tableplace').append("<table></table>");
 			for(i=0;i<n;i++){
 				var row = table.append('<tr></tr>');
 				for(j=0;j<n;j++){
 					row.append('<td><div data-r=' + i + ' data-c=' + j + ' class=lights_on></div></td>' );
 				}
	  	}
	  	reBindAll();
			initialize(complexity);
			counter=0;
			$('.win').hide();
		}
		
		function new_game()
		{
			for(i=0;i<n;i++){
				for(j=0;j<n;j++)
				{
					$('#tableplace div[data-r='+ i +'][data-c=' + j + ']').replaceWith('<div data-r=' + i + ' data-c=' + j + ' class=lights_on></div>');
				}
			}
			reBindAll();
			initialize(complexity);
			$('h1#title').replaceWith("<h1 id='title'>Lights out</h1>");
			counter=0;
			$('.win').hide();
		}
		function reBindAll(){
			$('div.lights_on , div.lights_off').bind('click', function(){
				toggle5($(this).attr('data-r'),$(this).attr('data-c'));
				checkWin();
			});
		}
		function reBindSingle(row,column){
			$('#tableplace div[data-r='+ row +'][data-c=' + column + ']').bind('click', function(){
				toggle5($(this).attr('data-r'),$(this).attr('data-c'));
				checkWin();
			});
		}
		function toggle(row,column){
			var box = $('#tableplace div[data-r='+ row +'][data-c=' + column + ']');
			//console.log(box.attr('class'));
			
			if(box.attr('class') == "lights_off")
			{
				box.replaceWith( '<div data-r=' + row + ' data-c=' + column + ' class=lights_on></div>' );
				//console.log('turning lights on');
			}
			else
			{
				box.replaceWith( '<div data-r=' + row + ' data-c=' + column + ' class=lights_off></div>' );
				//console.log('turning lights off');
			}
			reBindSingle(row,column);
		}
		function initialize(moves)
		{
			for(i=0;i<moves;i++)
			{
				var row = getRandom(0,n-1);
				var column = getRandom(0,n-1);
				toggle5(row,column);
			}
		}
		function toggle5(row,column)
		{
				toggle(row,column);
				toggle(+row + 1,+column);
				toggle(+row,+column + 1);
				toggle(+row - 1,+column);
				toggle(+row,+column - 1);
				counter++;
		}
		function getRandom(min, max) {
    	return min + Math.floor(Math.random() * (max - min + 1));
		}
		function checkWin()
		{
				if ($('div.lights_off').length) { // if there is at least one div from class lights_off
					$('h1#title').show();
					$('.win').hide();
					//$('h1#title').replaceWith("<h1 id='title'>Lights out</h1>");
				}
				else
				{
						$('h1#title').hide();
						$('.win').show();
						unBindAll();
						win();
				}
		}
		function unBindAll()
		{
			$('div.lights_on , div.lights_off').off('click');
		}
		function win()
		{
			var retVal = prompt("Enter your name : ", "your name here");
				if(retVal!=null)
				{
					$.post(
						"store.php",
						{name : retVal, score: counter}).done(
							function(data)
							{
								console.log(data);
								$('table#top50').replaceWith(data);
							}
						);
				}
					
					//success: function(data){
							//data e rasp de la server
					//}
		}
