
	<nav class="collapse navbar-collapse">
		<ul class="nav navbar-nav navbar-right navbar-iconic">
			<li class="drawer-pf-trigger dropdown">
				<a class="nav-item-iconic drawer-pf-trigger-icon faa-parent animated-hover">
					<?php
					if ($notifications_count == 0) :
					?>
						<span class="pficon fa fa-bell-o" title="Notifications"></span>
					<?php
					else :
					?>
						<span class="pficon fa fa-bell faa-ring fa-gold" title="Notifications"></span>
					<?php
					endif;
					?>
					<!-- When all notifications read, the icon should be fa-bell-o -->
				</a>
			</li>
		</ul>
		<div class="drawer-pf drawer-pf-notifications-non-clickable hide">
			<div class="drawer-pf-title">
				<h3 class="text-center">Notifications Drawer</h3>
			</div>
			<div class="panel-group" id="notification-drawer-accordion" style="overflow-y: hidden;">
				<div class="panel panel-default">
					<div class="panel-heading" data-component="collapse-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#notification-drawer-accordion" href="#notifications"<?php
								if ($notifications_count == 0) {
									echo ' aria-expanded="false" class="collapsed"';
								}
							 ?>>Notifications</a>
						</h4>
						<span class="panel-counter"><?php echo $notifications_count; ?> New Events</span>
					</div>
					<div id="notifications" <?php
						if ($notifications_count == 0) {
							echo 'class="panel-collapse collapse" aria-expanded="false"';
						} else {
							echo 'class="panel-collapse collapse in"';
						}
					?>>
						<div class="panel-body" style="max-height: 141px; overflow-y: auto;">

							<?php foreach($notifications as $alert) : ?>
							<div class="drawer-pf-notification unread">
								<div class="pull-right">
									<a class="drawer-pf-mark-read btn btn-link" href="/connect/notifications/mark_read/<?php echo $alert['Notification']['id']; ?>">
										<span class="pficon fa fa-times-circle-o"></span>
									</a>
								</div>
								<span class="pficon fa fa-info-circle pull-left"></span>
								<span class="drawer-pf-notification-message">
								<?php
									echo substr($alert['Notification']['title'], 0, 35);
									if (strlen($alert['Notification']['title']) > 35 ) {
										echo '...';
									}
								?>
								</span>
								<div class="drawer-pf-notification-info">
									<span>
										<?php echo $alert['Notification']['description'].' :'; ?>
										<?php
											echo "<br/><a href='";
											if ($isSiteAdmin) { // if the user is an admin then their notifications should link to the admin page
												echo "/connect/admin/projects/view/";
											} else {
												echo "/connect/projects/view/";
											}
											echo $alert['Project']['id']."'>".substr($alert['Project']['title'], 0, 35);
											if (strlen($alert['Project']['title']) > 35 ) {
												echo '...';
											}
											echo "</a><br/>";
										?>
									</span>
									<span class="date"><?php echo $this->Time->timeAgoInWords($alert['Notification']['created'], array('format' => 'F jS, Y', 'end' => '+2 weeks')); ?></span>
								</div>
							</div>
							<?php endforeach; ?>

						</div>
						<div class="drawer-pf-action">
							<a href="/connect/notifications/mark_all_read" class="drawer-pf-mark-all-read btn btn-link btn-block">Mark All Read</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</nav>
<?php
$toggleDrawer = '$(document).ready(function(){$(\'.drawer-pf-trigger\').click(function(){var $drawer = $(\'.drawer-pf\');$(this).toggleClass(\'open\');if ($drawer.hasClass(\'hide\')) {$drawer.removeClass(\'hide\');setTimeout(function (){if (window.dispatchEvent){window.dispatchEvent(new Event(\'resize\'));}if ($(document).fireEvent){$(document).fireEvent(\'onresize\');}}, 100);} else {$drawer.addClass(\'hide\');}});$(\'#notification-drawer-accordion\').initCollapseHeights(\'.panel-body\');});';
echo $this->Html->scriptBlock($toggleDrawer, array('block' => 'scriptBottom', 'defer' => true));
?>
