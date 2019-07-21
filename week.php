<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Week</title>
	</head>
	<body>
	<?php 
		$month = date('n');

		$month_in_br = array(
			'1' => 'Janeiro',
			'2' => 'Fevereiro',
			'3' => 'Março',
			'4' => 'Abril',
			'5' => 'Maio',
			'6' => 'Junho',
			'7' => 'Julho',
			'8' => 'Agosto',
			'9' => 'Setembro',
			'10' => 'Outubro',
			'11' => 'Novembro',
			'12' => 'Dezembro',
		);

		$day_week_in_br = array(
			'7' => "Dom",
			'1' => "Seg",
			'2' => "Ter",
			'3' => "Qua",
			'4' => "Qui",
			'5' => "Sex",
			'6' => "Sáb"
		);

		$get_date = 'now'; // now or set date in format '2019/07/20'

		$set_timezone = new DateTimeZone('America/Sao_Paulo'); // or Brazil/East

		$date = new DateTime( $get_date, $set_timezone );

		$get_key_day_week = $date->format( 'N' );
	?>

		<table>
			<thead>
				<tr>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<tr>
			<?php 

			// list before today
			$countweewk1 = 1;

			for ($g = $date->format( 'N' ) - 1; $g > 0; $g--) : 
				$date = new DateTime( $get_date, $set_timezone );
				$date->modify( '-' . ( $g ) . ' days' ); 
			?>
			<td>
				<?php echo $day_week_in_br[ $date->format( 'N' ) ]; ?>
				<h4><?php echo $date->format( 'd' ); ?></h4>
			</td>
			<?php 

			endfor; 

			// list today
			$date = new DateTime( $get_date, $set_timezone );
			?>

			<td>
				<b><?php echo $day_week_in_br[$get_key_day_week]; ?></b>
				<h4><?php echo $date->format( 'd' ); ?></h4>
			</td>

			<?php 
			// list after today
			for ($i = $date->format( 'N' ); $i <= 6; $i++) : 
				$date = new DateTime( $get_date, $set_timezone );
				$date->modify( '+' . ( $countweewk1 ) . ' days' ); ?>

				<td>
					<?php echo $day_week_in_br[ $date->format( 'N' ) ]; ?>
					<h4><?php echo $date->format( 'd' ); ?></h4>
				</td>

			<?php 
				$countweewk1++;
				endfor; 
			?>
				</tr>
			</tbody>
		</table>
	</body>
</html>