<?php
// There's too much logic in here for my taste. Would be nice to refactor this a bit. Into a View Helper maybe?
?>
<div class="container-fluid">
	<div class="row toolbar-pf">
		<div class="col-sm-12">
			<?php
			echo $this->Form->create(null, array(
				'url' => array_merge(
					array(
						'action' => 'index',
					),
					$this->params['pass']
				),
				'class' => 'toolbar-pf-actions navbar-form',
			)); ?>
			<div class="form-group toolbar-pf-filter-dropdown">
				<div class="dropdown btn-group">
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo 'Filters'; ?> <span class="caret"></span></button>
					<ul class="dropdown-menu">
						<?php
						$currentQuery = [];

						// add currently active filters (excluding status and review_status)
						if (!empty($activeFilters)) {
							foreach ($activeFilters as $key => $value) {
								if ($key === 'status' || $key === 'review_status') {
									// skip since we will deal with that later
									continue;

								} elseif (array_key_exists($key, $boolFilterOptions)) {
									// this is one of the boolean filters
									$currentQuery[$key] = '1';

								} else {
									$currentQuery[$key] = $value;

								}
							}
						}

						// build dropdown list
						foreach ($filterOptions as $key => $filterText) {
							$query = [];

							// what kind of entry is this option?
							$isSeparator = in_array($key, array('separator', 'separator2'));
							$isActive = array_key_exists($key, $activeFilters);
							$isCurrentStatus = !empty($activeFilters['status']) && $key === $activeFilters['status'];
							$isStatusFilter = array_key_exists($key, $statusFilterOptions);

							// if review status is a valid filter for this view
							if (!empty($defaultReviewStatus)) {
								$isCurrentReviewStatus = !empty($activeFilters['review_status']) && $key === $activeFilters['review_status'];
								$isReviewStatusFilter = array_key_exists($key, $reviewStatusFilterOptions);

							} else {
								$isCurrentReviewStatus = false;
								$isReviewStatusFilter = false;
							}

							if ($isSeparator) {
								// add separator divider in dropdown list
								echo '<li role="separator" class="divider"></li>';

							} elseif ($isActive || $isCurrentStatus || $isCurrentReviewStatus) {
								// if we find the key, then disable the dropdown entry
								echo '<li><a href="#" class="disabled" style="color: #fff; background: #777;" data-toggle="tooltip" data-container="body" title="Filter is currently active">' . $filterText . '</a></li>';

							} else {
								// Render dropdown item as active link

								// First, check if current item is a new status filter
								if ($isStatusFilter) {
									// set new status in query
									$query['status'] = $key;

								} else {
									// otherwise just add current status to query string if not default
									if ($status !== $defaultStatus) {
										$query['status'] = $status;
									}
								}

								// if review status is a valid filter for this view
								if (!empty($defaultReviewStatus)) {
									// check if current item is a new review status filter
									if ($isReviewStatusFilter) {
										$query['review_status'] = $key;

									} else {
										// otherwise just add current review status to query string if not default
										if ($reviewStatus !== $defaultReviewStatus) {
											$query['review_status'] = $reviewStatus;
										}
									}
								}

								// add sort, but only if they aren't default
								if (!($sort === $defaultSort && $sortdir === $defaultSortDir)) {
									$query['sort'] = $sort;
									$query['direction'] = $sortdir;
								}

								// add rest of active query
								$query = $query + $currentQuery;

								// if not already added as new Status or Review Status, then add this dropdown item as new boolean filter
								if (!$isStatusFilter && !$isReviewStatusFilter) {
									$query[$key] = '1';
								}

								echo '<li>';
								echo $this->Html->link($filterText,
									array(
											'action' => 'index',
											'?' => $query,
									),
									array(
											'escape' => false,
									)
								);
								echo '</li>';
							}
						}
						?>
					</ul>
				</div>
			</div>

			<div class="form-group">
				<div class="dropdown btn-group">
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo 'Sorting: ' . $sortOptions[$sort]; ?> <span class="caret"></span></button>
					<ul class="dropdown-menu">
						<?php
						foreach ($sortOptions as $key => $text) {
							// don't include current sort in dropdown
							if ($key !== $sort) {
								echo '<li>';
								$query = array();

								// add status to query string
								if ($status !== $defaultStatus) {
									$query['status'] = $status;
								}

								// if review status is a valid filter for this view and is not default
								if (!empty($defaultReviewStatus) && $reviewStatus !== $defaultReviewStatus) {
									// add review status to query string
									$query['review_status'] = $reviewStatus;
								}

								// add new sort (default to ascending)
								$query['sort'] = $key;
								$query['direction'] = 'asc';

								// and add existing filters
								$query = $query + $currentQuery;

								echo $this->Html->link($text,
									array(
											'action' => 'index',
											'?' => $query,
									),
									array(
											'escape' => false,
									)
								);
								echo '</li>';
							}
						}
						?>
					</ul>
				</div>
				<?php
				$query = [];

				// add status to query string
				if ($status !== $defaultStatus) {
					$query['status'] = $status;
				}

				// if review status is valid filter and not default, add review status to query string
				if (!empty($defaultReviewStatus) && $reviewStatus !== $defaultReviewStatus) {
					$query['review_status'] = $reviewStatus;
				}

				// set new sort direction
				$query['sort'] = $sort;
				if ($sortdir === 'asc') {
					$query['direction'] = 'desc';
					$linkText = '<span class="fa fa-sort-alpha-asc"></span>';

				} else {
					$query['direction'] = 'asc';
					$linkText = '<span class="fa fa-sort-alpha-desc"></span>';

				}

				// and add existing filters
				$query = $query + $currentQuery;

				echo $this->Html->link($linkText,
					array(
							'action' => 'index',
							'?' => $query,
					),
					array(
							'class' => 'btn btn-link',
							'escape' => false,
					)
				);
				?>
			</div>

			<div class="form-group toolbar-pf-view-selector toolbar-pf-search">
				<?php
				echo $this->Form->input('search', array(
						'div' => 'input-group',
						'type' => 'text',
						'label' => false,
						'class' => 'form-control',
						// 'value' => $input,
						'placeholder' => 'Search',
						'wrapInput' => false,
						'after' => '<div class="input-group-btn"><button id="submitsearch" type="submit" class="btn btn-default" onclick = "submit()"><i class="fa fa-search" aria-hidden="true"></i></button></div>',
				));
				?>
			</div>
			<?php
			// only display "Add [Model]" button for internships and projects and to Site Coordinators/Managers
			if (in_array($this->params['controller'], array('internships', 'projects')) && ($isSiteAdmin || $isScCoordinator)) :
			?>
			<div class="form-group toolbar-pf-view-selector">
				<?php
				echo $this->Html->link('Add ' . Inflector::classify($this->params['controller']),
					array(
							'admin' => true,
							//'controller' => 'internships',
							'action' => 'add',
							// '?' => $query,
					),
					array(
							'class' => 'btn btn-primary',
							// 'escape' => false,
					)
				);
				?>
			</div>
			<?php
			endif;
			echo $this->Form->end();
			?>

			<div class="row toolbar-pf-results">
				<div class="col-sm-12">
					<div class="form-group toolbar-pf-view-selector">
						<h5><?php echo $result_count; ?> Result<?php if ($result_count !== 1) echo 's'; ?></h5>
					</div>
					<div class="form-group toolbar-pf-filters toolbar-pf-open-right">
						<span class="toolbar-pf-filter-label">Active filters:</span>
						<ul class="list-inline">
							<?php
							foreach ($activeFilters as $key => $value) {
								//skip rendering item if it is review_status and we are not rendering that filter (because not Project Management View)
								if (empty($reviewStatusFilterOptions) && $key === 'review_status') {
									continue;
								}

								echo '<li>';
								echo '<span class="label label-default">';

								if ($key === 'status') {
									echo $statusFilterOptions[$value];
								} elseif ($key === 'review_status') {
									echo $reviewStatusFilterOptions[$value];
								} else {
									echo $value;
								}

								echo '</span>';
								echo '</li>';
							}
							?>
						</ul>
					</div>
					<div class="toolbar-pf-clear-filter">
					<p><?php
						echo $this->Html->link('<span class="pficon">Reset Filters</span>',
							array(
									'action' => 'index'
							),
							array(
									'class' => 'btn btn-default',
									'escape' => false
							)
						);
						?></p>
					</div>
				</div><!-- /col -->
			</div><!-- /row -->
		</div><!-- /col -->
	</div><!-- /row -->
</div><!-- /container -->
