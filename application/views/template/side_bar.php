		<!-- Left Sidebar Menu -->
		<div class="fixed-sidebar-left">
			<ul class="nav navbar-nav side-nav nicescroll-bar">
				<li class="navigation-header">
					<span>Main</span>
					<i class="zmdi zmdi-more"></i>
				</li>
				<li>
					<hr class="light-grey-hr mb-10" />
				</li>
				<li>
					<a <?= ($this->router->fetch_class() == 'dashboard' ? 'class="active"' : ''); ?> href="<?= base_url(); ?>dashboard">
						<div class="pull-left"><i class="glyphicon glyphicon-stats mr-20"></i><span class="right-nav-text">Dashboard</span></div>
						<div class="clearfix"></div>
					</a>
				</li>
				<?php foreach (getSidebarMenuHeader() as $sidebarMenuHeader) : ?>
					<li>
						<?php if ($sidebarMenuHeader->class != '') : ?>
							<a <?= (($this->router->fetch_class() == $sidebarMenuHeader->class) ? 'class="active"' : ''); ?> href="<?= base_url() . $sidebarMenuHeader->class; ?>">
								<div class="pull-left"><i class="<?= $sidebarMenuHeader->icon ?> mr-20"></i><span class="right-nav-text"><?= $sidebarMenuHeader->caption ?></span></div>
								<div class="clearfix"></div>
							</a>
						<?php else : ?>
							<a <?= (($this->router->fetch_class() == getClass($sidebarMenuHeader->page)) ? 'class="active"' : ''); ?> href="javascript:void(0);" data-toggle="collapse" data-target="#<?= str_replace(' ', '_', strtolower($sidebarMenuHeader->caption)) . '_button' ?>">
								<div class="pull-left"><i class="<?= $sidebarMenuHeader->icon ?> mr-20"></i><span class="right-nav-text"><?= $sidebarMenuHeader->caption ?></span></div>
								<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
								<div class="clearfix"></div>
							</a>
							<ul id="<?= str_replace(' ', '_', strtolower($sidebarMenuHeader->caption)) . '_button' ?>" class="collapse collapse-level-1 <?= (($this->router->fetch_class() == getClass($sidebarMenuHeader->page)) ? 'in' : ''); ?>">
								<?php foreach (getSidebarMenuSubordinate($sidebarMenuHeader->page) as $sidebarMenuSubordinate) : ?>
									<li>
										<a href="<?= base_url() . $sidebarMenuSubordinate->class; ?>" <?= ($this->router->fetch_class() == $sidebarMenuSubordinate->class) ? 'class="active"' : '' ?>><?= $sidebarMenuSubordinate->caption ?></a>
									</li>
								<?php endforeach ?>
							</ul>
						<?php endif ?>
					</li>
				<?php endforeach ?>
			</ul>
		</div>
		<!-- /Left Sidebar Menu -->