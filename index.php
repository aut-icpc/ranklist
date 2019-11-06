<?php include("Header.php"); ?>
<?php include("DOMdoc.php"); ?>
	
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
					<div class="table">

						<div class="row header">
							<div class="cell">
								Team Name
							</div>
							<div class="cell">
								RANK
							</div>
							<div class="cell">
								SCORE
							</div>

						
						</div>

				<?php 

					$i = 0;
					foreach ($Combine as $x=>$x_value)
					{
						$i++;
						echo "
						<div class='row'>";
						
						
						echo "<div class='cell' data-title='Team Name'>";


							echo $x . " <br>";
						


						
						echo"
						</div>";

						echo"
						<div class='cell' data-title='Rank'>";

						echo $i;
							
						echo "</div>";

						echo"
						<div class='cell' data-title='Score'>";



						echo $x_value;


						echo "</div>";

						echo "</div>";
					}



				?>


					</div>
			</div>
		</div>
	</div>


	
<?php include("footer.php"); ?>