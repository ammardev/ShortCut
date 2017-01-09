<div class="navBar">
	<div class="navContainer">
		<!-- TODO: it will convert to user photo when user is signed in . -->
		<img class='logo' src="themes/shortcut2016/images/logo.png"/>
		<div class="line"></div>

		<!-- TODO: it will convert to user name when user is signed in . -->
		<span class="name"><h4><?= $info['name']?></h4></span>

		<div class="navOtherSide">
			<button type="button" class="inButton"><i class="fa fa-sign-in" aria-hidden="true"></i>
				&nbsp;Sign in
			</button>
			<button type="button" class="UpButton"><i class="fa fa-user-plus"
			                                          aria-hidden="true"></i>
				&nbsp;Sign up
			</button>


			<div class="menuBtn" onclick="openNav()">
				<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
			</div>


		</div>


	</div>
</div>