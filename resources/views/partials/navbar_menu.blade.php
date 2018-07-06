						<ul id="menu-main-menu" class="nav navbar-nav">
							<li><a href="/" title="Home"  id="home-icon-main-nav"><span class="fa fa-home hidden-xs hidden-sm" aria-hidden="true"></span><span class="hidden-md hidden-lg">Home</span></a></li>
							<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown" ><a title="Projects" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Projects <span class="caret"></span></a>
								<ul role="menu" class=" dropdown-menu">
									<li class="menu-item menu-item-type-custom menu-item-object-custom" ><a title="All Projects" href="/connect/projects">All Projects</a>
									<li class="menu-item menu-item-type-custom menu-item-object-custom" ><a title="Undergraduates" href="/connect/projects?undergrad=1">Undergraduates</a>
									<li class="menu-item menu-item-type-custom menu-item-object-custom" ><a title="Graduates" href="/connect/projects?grad=1">Graduates</a>
									<li class="menu-item menu-item-type-custom menu-item-object-custom" ><a title="Past Projects" href="/connect/projects?status=completed&sort=end_date&direction=desc">Past Projects</a>
								</ul>
							</li>
							<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown" ><a title="Internships" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Internships <span class="caret"></span></a>
								<ul role="menu" class=" dropdown-menu">
									<li class="menu-item menu-item-type-custom menu-item-object-custom" ><a title="All Internships" href="/connect/internships">All Internships</a>
									<li class="menu-item menu-item-type-custom menu-item-object-custom" ><a title="Undergraduates" href="/connect/internships?undergrad=1">Undergraduates</a>
									<li class="menu-item menu-item-type-custom menu-item-object-custom" ><a title="Graduates" href="/connect/internships?grad=1">Graduates</a>
								</ul>
							</li>
							<li class="menu-item menu-item-type-custom menu-item-object-custom"><a title="Submit Your Idea" href="/connect/submit_idea" id="nav-item_submit-your-idea">Submit Your Idea</a></li>
							<li class="menu-item menu-item-type-custom menu-item-object-custom" ><a title="Success Stories" href="/success-stories">Success Stories</a></li>
							<li class="menu-item menu-item-type-custom menu-item-object-custom" ><a title="News" href="/sc-news" id="nav-item_news">News</a></li>
							<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown"><a title="About" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">About <span class="caret"></span></a>
								<ul role="menu" class=" dropdown-menu">
									<li class="menu-item menu-item-type-custom menu-item-object-custom" ><a title="About Us" href="/about/">About Us</a></li>
									<li class="menu-item menu-item-type-custom menu-item-object-custom" ><a title="Contact Us" href="/about/contact-us/">Contact Us</a></li>
									<li class="menu-item menu-item-type-custom menu-item-object-custom" ><a title="Programs &amp; Partners" href="/about/programs-partners/">Programs &#038; Partners</a></li>
									<li class="menu-item menu-item-type-custom menu-item-object-custom" ><a title="Type of Opportunities" href="/about/types-of-opportunities/">Type of Opportunities</a></li>
									<li class="menu-item menu-item-type-custom menu-item-object-custom" ><a title="Why Work With Us" href="/about/why-work-with-us/">Why Work With Us</a></li>
									<li class="menu-item menu-item-type-custom menu-item-object-custom" ><a title="FAQ" href="/about/faq/">FAQ</a></li>
								</ul>
							</li>
							<?php
							/* ConnectApp Admin Menu */
							if ($isSiteAdmin || $isScCoordinator) :
							?>
							<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown" ><a title="Admin" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Admin <span class="caret"></span></a>
								<ul role="menu" class=" dropdown-menu">
									<li class="menu-item menu-item-type-custom menu-item-object-custom" ><a title="Admin Dashboard" href="/wp-admin">Admin Dashboard</a></li>
									<li class="menu-item menu-item-type-custom menu-item-object-custom" ><a title="Projects" href="/connect/admin/projects">Projects</a></li>
									<li class="menu-item menu-item-type-custom menu-item-object-custom" ><a title="Internships" href="/connect/admin/internships">Internships</a></li>
									<li class="menu-item menu-item-type-custom menu-item-object-custom" ><a title="Stories" href="/wp-admin/edit.php?s&post_status=all&post_type=post&action=-1&m=0&cat=2&filter_action=Filter&paged=1&action2=-1">Stories</a></li>
									<li class="menu-item menu-item-type-custom menu-item-object-custom" ><a title="News" href="/wp-admin/edit.php?s&post_status=all&post_type=post&action=-1&m=0&cat=3&filter_action=Filter&paged=1&action2=-1">News</a></li>
									<li class="menu-item menu-item-type-custom menu-item-object-custom" ><a title="Users" href="/connect/admin/users">Users</a></li>
								</ul>
							</li>
							<?php
							endif;
							?>
							<?php
							if (!$isAuthenticated) :
								$loginRedirect = $this->here;
							?>
							<li class="menu-item menu-item-type-custom menu-item-object-custom" ><a title="Sign In" href="/connect/login<?php if (!empty($loginRedirect)) echo '?login_redirect='.$loginRedirect; ?>" id="nav-item_login" class="navbar-btn btn btn-lg btn-gold">Sign In</a></li>
							<?php
							else :
							?>
							<li class="menu-item menu-item-type-custom menu-item-object-custom" ><a title="My Dashboard" href="/connect" id="nav-item_login" class="navbar-btn btn btn-lg btn-gold">My Dashboard</a></li>
							<?php
							endif;
							?>
						</ul>
