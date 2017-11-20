<div id="navBar">
    <div id="navContainer">
        <!-- TODO: it will convert to user photo when user is signed in . -->
        <img id='logoImage' src="themes/<?= $info['theme'] ?>/images/logo.png"/>
        <div id="spLine"></div>

        <!-- TODO: it will convert to user name when user is signed in . -->
        <span id="navName"><?= $info['name'] ?></span>

        <div id="navOtherSide">
            <button type="button" onclick="alert('Soon')" id="inButton"><i class="fa fa-sign-in" aria-hidden="true"></i>
                &nbsp;Sign in
            </button>
            <button type="button" onclick="alert('Soon')" id="UpButton"><i class="fa fa-user-plus"
                                                                           aria-hidden="true"></i>
                &nbsp;Sign up
            </button>


            <div id="menuBtn">
                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
            </div>


        </div>


    </div>
</div>