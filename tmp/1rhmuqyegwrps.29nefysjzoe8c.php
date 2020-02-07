<div class="card shadow mb-4">
    <div class="card-header py-3">
       <h6 class="m-0 font-weight-bold text-primary">Plugins</h6>
    </div>
	<div class="table-responsive">
		<table class="table table-striped table-bordered" id="dTPlugin" cellspacing="0">
			   <tr>
					<th scope="col">Id</th>
					<th scope="col">Name</th>
					<th scope="col">Description</th>
					<th scope="col" style="width:100px;">Status</th>
					<th scope="col" style="width:100px;">&nbsp;</th>
				</tr>
				<?php $i=0; foreach (($plugins?:[]) as $key=>$plugin): $i++; ?>
					<?php $tmpId = $plugins[$i-1]['Id'] ?>
					<?php $tmpStatus = $plugins[$i-1]['is_active'] ?>
					<tr>
						<th><?= ($tmpId) ?></th>
						<td><?= ($plugins[$i-1]['baseClass']) ?></td>
						<td><?= ($plugins[$i-1]['description']) ?></td>
						
						<?php if ($tmpStatus): ?>
							
								<th class="plugin-<?= ($tmpId) ?>-status-text">Active</th>
								<th>
									<button type="button" data-plugin="<?= ($tmpId) ?>" rel-status="<?= ($tmpStatus) ?>" 
									class="btn btn-sm btn-secondary">
										Deactivate
									</button>
								</th>
							
							<?php else: ?>
								<th class="plugin-<?= ($tmpId) ?>-status-text">Inactive</th>
								<th>
									<button type="button" data-plugin="<?= ($tmpId) ?>" rel-status="<?= ($tmpStatus) ?>" 
									class="btn btn-sm btn-success">
										Activate
									</button>
								</th>
							
						<?php endif; ?>
					</tr>
				<?php endforeach; ?>
		</table>
	</div>
</div>
<div>
	<?= ($asdff) ?> little spiders
</div>