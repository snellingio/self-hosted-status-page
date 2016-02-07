
<script type="text/javascript">
	$.get('/api/v1/uptimerobot', function(data) {
		<?php if (UPTIMEROBOT_RESPONSE_TIME): ?>
		var latencies_labels = [];
		var latencies 		 = [];
		var latency_avg 	 = 0;
		for (var check in data.latency) {
			var day = new Date(data.latency[check].time * 1000).toString('MMM d');
			if (latencies_labels.indexOf(day) === -1) {
				latencies_labels.push(day);
			} else {
				latencies_labels.push('');
			}
			latency_avg += (data.latency[check].ms);
			latencies.push(data.latency[check].ms);
		}
		latencies_labels[0] = '';
		latency_avg 	    = Math.ceil(latency_avg / latencies.length);
		latencies_labels    = latencies_labels.reverse();
		latencies           = latencies.reverse();

		var chart_data = {
			labels: latencies_labels,
			series: [
				{
					name: 'ms',
					data: latencies
				}
			]
		};
		var context = {
			axisY: {
			    labelInterpolationFnc: function(value) {
			      return value + 'ms';
			    }
		  	}
		};
		$('#uptimerobot-latency-graph').html('');
		$('#uptimerobot-average-latency').html('Average ' + latency_avg + 'ms ');
		new Chartist.Line('#uptimerobot-latency-graph', chart_data, context);
		<?php endif?>
		<?php if (UPTIMEROBOT_UP_TIME): ?>
		var uptime_labels = [];
		var uptime 		  = [];
		for (var check in data.statuses) {
			var day = new Date(data.statuses[check].time * 1000).toString('MMM d');
			if (uptime_labels.indexOf(day) === -1) {
				uptime_labels.push(day);
			} else {
				uptime_labels.push('');
			}
			uptime.push(data.statuses[check].status);
		}
		uptime_labels[0] = '';
		uptime_labels 	 = uptime_labels.reverse();
		uptime        	 = uptime.reverse();

		var chart_data = {
			labels: uptime_labels,
			series: [
				{
					name: '%',
					data: uptime
				}
			]
		};
		var context = {
			axisY: {
			    labelInterpolationFnc: function(value) {
			      return value + '%';
			    }
		  	},
		  	lineSmooth: Chartist.Interpolation.none(),
		};
		$('#uptimerobot-uptime-graph').html('');
		$('#uptimerobot-uptime').html('Average ' + data.uptimeratios.seven + '% ');
		new Chartist.Line('#uptimerobot-uptime-graph', chart_data, context);
		<?php endif?>
	});
</script>


<div class="container">
	<div class="row">
		<?php if (UPTIMEROBOT_RESPONSE_TIME): ?>
			<?php if (UPTIMEROBOT_UP_TIME): ?>
				<div class="col-sm-6">
			<?php else: ?>
				<div class="col-sm-8 col-sm-offset-2">
			<?php endif?>
				<div class="graph-container">
					<div class="row">
						<div class="col-sm-12">
							<h4 class="pull-left">Response Time</h4>
							<h4 id="uptimerobot-average-latency" class="pull-right text-muted"></h4>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div id="uptimerobot-latency-graph" class="graph">
								<h4 class="text-muted">Loading...</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endif?>
		<?php if (UPTIMEROBOT_UP_TIME): ?>
			<?php if (UPTIMEROBOT_RESPONSE_TIME): ?>
				<div class="col-sm-6">
			<?php else: ?>
				<div class="col-sm-8 col-sm-offset-2">
			<?php endif?>
				<div class="graph-container">
					<div class="row">
						<div class="col-sm-12">
							<h4 class="pull-left">Uptime</h4>
							<h4 id="uptimerobot-uptime" class="pull-right text-muted"></h4>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div id="uptimerobot-uptime-graph" class="graph">
								<h4 class="text-muted">Loading...</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endif?>
	</div>
</div>
